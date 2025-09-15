<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteInfo;
use App\Models\Slider;
use App\Models\FootballMatch;
use App\Models\MatchDemoScore;
use App\Models\GameBet;
use App\Models\Transaction;
use App\Models\User;
use Auth;
use Carbon\Carbon;

class WelcomeController extends Controller
{
    public function index()
    {

        $site_info = SiteInfo::first();

        $sliders = Slider::where('status', 1)->get();

        $matchs = FootballMatch::orderBy('id', 'desc')->where('status', 'Running')->get();

        return view('welcome', compact('site_info', 'sliders', 'matchs'));

    }
    public function about_us()
    {

        $site_info = SiteInfo::first();

        return view('about_us', compact('site_info'));

    }
    public function all_matchs() {
        $site_info = SiteInfo::first();

        $matches = FootballMatch::orderBy('id', 'desc')->where('status', 'Running')->orWhere('status', 'Upcomming')->get();

        return view('frontend.pages.all_matchs', compact('site_info', 'matches'));

    }

    public function tomorrow_matchs() {
        $site_info = SiteInfo::first();

        $today = Carbon::today()->toDateString();

        $tomorrow = Carbon::tomorrow();
        $formattedTomorrow = $tomorrow->format('Y-m-d');


        $matches = FootballMatch::orderBy('id', 'desc')->where('status', 'Upcomming')->get();

        return view('frontend.pages.tomorrow_matchs', compact('site_info', 'matches'));

    }

    public function details($id){

        $user = Auth::user();

        if($user){

            $site_info = SiteInfo::first();
            $match = FootballMatch::where('id', $id)->first();

            $matchStart = Carbon::parse($match->match_start);
            $now = Carbon::now();

    
            if ($now < $matchStart) {
                return back()->with('error','The match has not started yet !');
            }

            $full_time_scores = MatchDemoScore::where('match_id', $id)->where('part', 2)->get();
            $first_half_time_scores = MatchDemoScore::where('match_id', $id)->where('part', 1)->get();
    
            return view('frontend.pages.match_details', compact('site_info', 'match', 'full_time_scores', 'first_half_time_scores'));

        }else{
            return back()->with('error','Please Login !');
        }



    }

    public function confirm_bet(Request $request){

        $user = Auth::user();

        if($user){

            $site_info = SiteInfo::first();

            $match_id = $request->match_id;
            $score_id = $request->score_id;
            $amount = $request->amount;

            $match = FootballMatch::where('id', $match_id)->first();
            $score = MatchDemoScore::where('id', $score_id)->first();

            $bettingEnd = Carbon::parse($match->betting_end);
            $now = Carbon::now();

            $today = Carbon::now()->format('Y-m-d');
    
            $three_places = GameBet::where('user_id', $user->id)->where('date',  $today)->get();

            if (count($three_places) == 3) {
                return back()->with('error','You can not place bet over 3 in a day !');
            }

            if ($now > $bettingEnd) {
                return back()->with('error','Time is over !');
            }

            $already = GameBet::where('user_id', $user->id)->where('match_id',  $match_id)->first();
            if($already){
                return back()->with('error','Already placed a bet !');
            }
 
    

            if($site_info->min_bet <= $amount){
                if($user->balance >= $amount){
                    
                    $profit = ($amount * $score->percentage) / 100;
                   
                    $data = new GameBet();
                    $data->user_id = $user->id;
                    $data->date = $today;

                    $data->team_one = $match->team_one;
                    $data->team_two = $match->team_two;
                    $data->part = $score->part;
                    $data->score = $score->demo_score;
                    $data->match_start = $match->match_start;

                    $data->amount = $amount;
                    $data->match_id = $match_id;
                    $data->score_id = $score_id;
                    $data->profit_odds = $score->percentage;
                    $data->estimate_profit = $profit;
                    $data->match_result = 'Pending';
                    $data->profit_result = 'Pending';
                    $data->save();

                    User::where('id', $data->user_id)->update([
                        'balance' => $user->balance - $amount,
                        'transaction_balance' => $user->transaction_balance + $amount,
                    ]);

                    $trx = new Transaction();
                    $trx->user_id = $user->id;
                    $trx->type = 'Expend';
                    $trx->old_balance = $user->balance;
                    $trx->debit = $amount;
                    $trx->credit = 0;
                    $trx->new_balance = $user->balance - $amount;
                    $trx->decription = 'Amount '.$amount.' Coins';
                    $trx->save();

                    return back()->with('success','Your request placed successful !');

                }else{
                    return back()->with('error','Insufficient balance !');
                }
            }else{
                return back()->with('error','Min bet amount is: '.$site_info->min_bet.' Coins');
            }

        }else{
            return back()->with('error','Please Login !');
        }

 

    }

    public function get_bet_popup(Request $request) {


        $user = Auth::user();

        $score = MatchDemoScore::where('id', $request->demo_score_id)->first();
        $match = FootballMatch::where('id', $score->match_id)->first();
        $site_info = SiteInfo::first();


        return view('frontend.pages.get_bet_popup', compact('site_info', 'match', 'score', 'user'));



    }

    public function all_orders($id)
    {
        
        $site_info = SiteInfo::first();

        $match = FootballMatch::where('id', $id)->first();

        return view('frontend.pages.all_orders', compact('site_info', 'match'));

    }

}
