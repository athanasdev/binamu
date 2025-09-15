<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FootballMatch;
use App\Models\League;
use App\Models\MatchDemoScore;
use App\Models\Transaction;
use App\Models\SiteInfo;
use App\Models\User;
use Alert;
use App\Models\GameBet;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = FootballMatch::orderBy('id', 'desc')->get();
        return view('admin.match.index', compact('datas'));
    }

    public function running_match()
    {
        $datas = FootballMatch::orderBy('id', 'desc')->where('status', 'Running')->get();
        return view('admin.match.running_match', compact('datas'));
    }

    public function upcomming_match()
    {
        $datas = FootballMatch::orderBy('id', 'desc')->where('status', 'Upcomming')->get();
        return view('admin.match.upcomming_match', compact('datas'));
    }

    public function completed_match()
    {
        $datas = FootballMatch::orderBy('id', 'desc')->where('status', 'Completed')->get();
        return view('admin.match.completed_match', compact('datas'));
    }

    
    public function complete_match($id)
    {

        $data = FootballMatch::find($id);
        $data->status = 'Completed';
        $data->save();

        $bets = GameBet::where('match_id', $data->id)->get();
        foreach ($bets as $key => $value) {
           
            $user = User::where('id', $value->user_id)->first();

            $income = $user->balance + $value->amount + $value->estimate_profit;
     
            User::where('id', $value->user_id)->update([
                'balance' => $income,
                'transaction_balance' => $user->transaction_balance - $value->amount,
            ]);

            GameBet::where('match_id', $data->id)->update([
                'match_result' => 'Win',
                'profit_result' => 'Win',
            ]);


            $trx = new Transaction();
            $trx->user_id = $user->id;
            $trx->type = 'Income';
            $trx->old_balance = $user->balance;
            $trx->debit = 0;
            $trx->credit = $value->estimate_profit;
            $trx->new_balance = $income;
            $trx->decription = 'Income '.$income.' Coins';
            $trx->save();


            $site_info = SiteInfo::first();

            $first_level = User::where('own_refer_code', $user->refer_by)->first();
    
            if($first_level){
    
                $commisson = ($value->estimate_profit * $site_info->bet_first_level_commission) / 100;
    
                User::where('id', $first_level->id)->update([
                    'balance' => $first_level->balance + $commisson,
                ]);
    
                if($commisson > 0){
                    $trx = new Transaction();
                    $trx->user_id = $first_level->id;
                    $trx->type = 'Bet Commision';
                    $trx->old_balance = $first_level->balance;
                    $trx->debit = 0;
                    $trx->credit = $commisson;
                    $trx->new_balance = $first_level->balance + $commisson;
                    $trx->decription = '1st Level Commision '.$commisson.' Coins';
                    $trx->save();
                }
    
    
    
            }

            $second_level = null;
            if($first_level){
                $second_level = User::where('own_refer_code', $first_level->refer_by)->first();
    
                if($second_level){
    
                    $commisson = ($value->estimate_profit * $site_info->bet_second_level_commission) / 100;
        
                    User::where('id', $second_level->id)->update([
                        'balance' => $second_level->balance + $commisson,
                    ]);
                    
    
                    if($commisson > 0){
                        $trx = new Transaction();
                        $trx->user_id = $second_level->id;
                        $trx->type = 'Bet Commision';
                        $trx->old_balance = $second_level->balance;
                        $trx->debit = 0;
                        $trx->credit = $commisson;
                        $trx->new_balance = $second_level->balance + $commisson;
                        $trx->decription = '2nd Level  Commision '.$commisson.' Coins';
                        $trx->save();
                    }
        
                }
    
    
            }

            $third_level = null;
            if($second_level){
                $third_level = User::where('own_refer_code', $second_level->refer_by)->first();
    
                if($third_level){
    
                    $commisson = ($value->estimate_profit * $site_info->bet_third_level_commission) / 100;
        
                    User::where('id', $third_level->id)->update([
                        'balance' => $third_level->balance + $commisson,
                    ]);
                    
    
                    if($commisson > 0){
                        $trx = new Transaction();
                        $trx->user_id = $third_level->id;
                        $trx->type = 'Bet Commision';
                        $trx->old_balance = $third_level->balance;
                        $trx->debit = 0;
                        $trx->credit = $commisson;
                        $trx->new_balance = $third_level->balance + $commisson;
                        $trx->decription = '3rd Level Commision '.$commisson.' Coins';
                        $trx->save();
                    }
        
                }
    
            }
            




        }

        Alert::success('Successfully Done', '');
        return redirect()->back();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leagues = League::get();
        return view('admin.match.create', compact('leagues'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'league_id' => 'required',
            'title' => 'required',
            'team_one' => 'required',
            'team_one_logo' => 'required',
            'team_two' => 'required',
            'team_two_logo' => 'required',

            'match_start' => 'required',
            'betting_start' => 'required',
            'betting_end' => 'required',
            'profite' => 'required',
            'wining_score' => 'required',
            'demo_volume' => 'required',
            'status' => 'required',
        ]);

        date_default_timezone_set('Asia/Dhaka');

        $data = new FootballMatch();
        $data->league_id = $request->league_id;
        $data->title = $request->title;

        $data->team_one = $request->team_one;
        $data->team_two = $request->team_two;


        $data->match_start = $request->match_start;
        $data->betting_start = $request->betting_start;
        $data->betting_end = $request->betting_end;
        $data->profite = $request->profite;
        $data->wining_score = $request->wining_score;
        $data->demo_volume = $request->demo_volume;
        $data->status = $request->status;




        $image = $request->file('team_one_logo');
        if($image)
        {
            $image_name= time().'_'.$image->getClientOriginalName();
            $image_full_name = $image_name;
            $upload_path = 'images/team_logo/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if($success)
            {
                $data->team_one_logo = $image_url;
            }
        }

        $image = $request->file('team_two_logo');
        if($image)
        {
            $image_name= time().'_'.$image->getClientOriginalName();
            $image_full_name = $image_name;
            $upload_path = 'images/team_logo/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if($success)
            {
                $data->team_two_logo = $image_url;
            }
        }


        $data->save();


        $demo_score = $request->demo_score;
        $percentage = $request->percentage;
        $is_profitable = $request->is_profitable;
        $part = $request->part;

        foreach ($demo_score as $key => $value) {
            $score = new MatchDemoScore();
            $score->match_id = $data->id;
            $score->demo_score = $value;
            $score->percentage = $percentage[$key];
            $score->is_profitable = $is_profitable[$key];
            $score->part = $part[$key];
            $score->save();
        }


        Alert::success('Successfully Done', '');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = FootballMatch::find($id);

        $leagues = League::get();

        $scores = MatchDemoScore::where('match_id', $id)->get();

        return view('admin.match.edit', compact('data', 'leagues', 'scores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        date_default_timezone_set('Asia/Dhaka');
        
        $data = FootballMatch::find($id);
        $data->league_id = $request->league_id;
        $data->title = $request->title;

        $data->team_one = $request->team_one;
        $data->team_two = $request->team_two;


        $data->match_start = $request->match_start;
        $data->betting_start = $request->betting_start;
        $data->betting_end = $request->betting_end;
        $data->profite = $request->profite;
        $data->wining_score = $request->wining_score;
        $data->demo_volume = $request->demo_volume;
        $data->status = $request->status;


        $image = $request->file('team_one_logo');
        if($image)
        {
            $image_name= time().'_'.$image->getClientOriginalName();
            $image_full_name = $image_name;
            $upload_path = 'images/team_logo/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if($success)
            {
                $old_team_one_logo = $request->old_team_one_logo;
                if (file_exists($old_team_one_logo)) {
                    unlink($request->old_team_one_logo);
                }

                $data->team_one_logo = $image_url;
            }
        }

        $image = $request->file('team_two_logo');
        if($image)
        {
            $image_name= time().'_'.$image->getClientOriginalName();
            $image_full_name = $image_name;
            $upload_path = 'images/team_logo/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if($success)
            {
                $old_team_two_logo = $request->old_team_two_logo;
                if (file_exists($old_team_two_logo)) {
                    unlink($request->old_team_two_logo);
                }

                $data->team_two_logo = $image_url;
            }
        }

        $data->save();
        

        $demo_score = $request->demo_score;
        $percentage = $request->percentage;
        $is_profitable = $request->is_profitable;
        $part = $request->part;

        if(count($demo_score) > 0){

            MatchDemoScore::where('match_id', $id)->delete();

            foreach ($demo_score as $key => $value) {
                if($value){
                    $score = new MatchDemoScore();
                    $score->match_id = $data->id;
                    $score->demo_score = $value;
                    $score->percentage = $percentage[$key];
                    $score->is_profitable = $is_profitable[$key];
                    $score->part = $part[$key];
                    $score->save();
                }
    
            }
        }


        Alert::success('Successfully Done', '');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $match = FootballMatch::where('id', $id)->first();
        

        $team_one_logo_path = $match->team_one_logo;
        $team_two_logo_path = $match->team_two_logo;

        if (file_exists($team_one_logo_path)) {
            unlink($team_one_logo_path);
        }

        if (file_exists($team_two_logo_path)) {
            unlink($team_two_logo_path);
        }

        FootballMatch::where('id', $id)->delete();

        MatchDemoScore::where('match_id', $id)->delete();

        Alert::success('Successfully Done', '');
        return redirect()->back();


    }
}
