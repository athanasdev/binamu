<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SiteInfo;
use App\Models\UserAddress;
use App\Models\UserEducation;
use App\Models\ApplicationForm;
use App\Models\AgentBonusHistory;
use App\Models\Deposit;
use App\Models\PaymentMethod;
use App\Models\Withdraw;
use App\Models\WithdrawHistory;
use App\Models\SiteImage;
use App\Models\SMSAPI;
use Auth;
use Hash;
use Str;
use Carbon\Carbon;
use Faker\Provider\ar_EG\Payment;

class UserWithdrawController extends Controller
{

    public function withdraw()
    {


        $user = Auth::user();

        if($user){
            $site_info = SiteInfo::first();

            $methods = PaymentMethod::where('status', 1)->get();

            return view('frontend.user.withdraw.withdraw', compact('user', 'site_info', 'methods'));

        }else{
            return back()->with('error','Please Login !');
        }




    }

    public function usdt_withdraw()
    {


        $user = Auth::user();

        if($user){

            if(!$user->digital_payment_method_id){
                return redirect('user/personal-data')->with('error','Please Virtual currency account!');
            }

            $site_info = SiteInfo::first();

            $methods = PaymentMethod::where('type', 1)->where('id', $user->digital_payment_method_id)->where('status', 1)->get();

            return view('frontend.user.withdraw.usdt_withdraw', compact('user', 'site_info', 'methods'));

        }else{
            return back()->with('error','Please Login !');
        }

    }

    public function online_withdraw()
    {


        $user = Auth::user();

        if($user){

            if(!$user->payment_method_id){
                return redirect('user/personal-data')->with('error','Please update bank receipt information!');
            }

            $site_info = SiteInfo::first();

            $methods = PaymentMethod::where('type', 0)->where('id', $user->payment_method_id)->where('status', 1)->get();

            return view('frontend.user.withdraw.online_withdraw', compact('user', 'site_info', 'methods'));

        }else{
            return back()->with('error','Please Login !');
        }

    }


    public function withdraw_preview(Request $request){


        $validated = $request->validate([
            'amount' => 'required',
            'payment_method_id' => 'required',
        ]);

        
        $user = Auth::user();

        if($user){

            $site_info = SiteInfo::first();
            $amount = $request->amount;
            $payment_method_id = $request->payment_method_id;

            
            $payment_method = PaymentMethod::where('id', $payment_method_id)->first();


            if($amount < $payment_method->min_withdraw){
                return back()->with('error','Minimum withdraw amount: '.$payment_method->min_withdraw.' coins');
            }
    
            $coin_amount = $amount;


            if($payment_method->type == 1){
                $rate = $site_info->rate_usdt;
            }else{
                $rate = $site_info->rate;
            }


            $total_taka = $coin_amount * $rate;
    
    
            return view('frontend.user.withdraw.withdraw_preview', compact('user', 'site_info', 'payment_method', 'coin_amount', 'rate', 'total_taka'));

        }else{
            return back()->with('error','Please Login !');
        }

    }



    public function submit_withdraw(Request $request)
    {



        $user = Auth::user();

        $site_info = SiteInfo::first();

        if($user->balance < $request->amount){
            return back()->with('error','Insuficient balance'); 
        }

        if($user->trade_password_str != $request->trade_password){
            return back()->with('error','Trade password is incorrect !'); 
        }


        $payment_method = PaymentMethod::where('id', $request->payment_method_id)->first();

        if(!$payment_method){
            return back()->with('error','Some thing wrong'); 
        }



        if($site_info->min_withdraw <= $request->amount){

            $withdraw_amount =  $request->amount;
            $cut_coin = ($withdraw_amount * $payment_method->poundage) / 100;
            $rest_coin = $withdraw_amount - $cut_coin;
            $real_money = ($rest_coin * $site_info->rate);



            $data = new Withdraw();
            $data->user_id = $user->id;

            $data->account_type = $request->account_type ?? '1';


            $data->amount = $request->amount;

            $data->payment_method = $payment_method->id;

            if($payment_method->type == 1){

                $data->account_number = $user->address_to_receive;

                $data->poundage = $payment_method->poundage;
                $data->cut_coin = $cut_coin;
                $data->rest_coin = $rest_coin;

                $data->amount_taka = $site_info->rate_usdt * $rest_coin;
                $data->rate = $site_info->rate_usdt;

            }else{

                $data->account_number = $user->account_no;

                $data->poundage = $payment_method->poundage;
                $data->cut_coin = $cut_coin;
                $data->rest_coin = $rest_coin;

                $data->amount_taka = $site_info->rate * $rest_coin;
                $data->rate = $site_info->rate;
            }
         
            $data->status = 0;
            $data->save();

            User::where('id', $user->id)->update([
                'balance' => $user->balance - $request->amount,
            ]); 

            $history = new WithdrawHistory();
            $history->user_id = $user->id;
            $history->withdraw_id = $data->id;
            $history->old_balance = $user->balance;
            $history->amount = $request->amount;
            $history->new_balance = $user->balance - $request->amount;
            $history->save();




            return redirect('/')->with('success','Withdraw Request Submitted successful');

        }else{

           return back()->with('error','Minimum withdraw amount: '.' '.$payment_method->min_withdraw.' '.'Coins');

        }



    }


    public function withdraw_record()
    {
        $user = Auth::user();
        $site_info = SiteInfo::first();
        $datas = Withdraw::where('user_id', $user->id)->get();

        return view('frontend.user.withdraw.withdraw_record', compact('user', 'site_info', 'datas'));
    }

    public function get_poundage_real_money(Request $request){

        $site_info = SiteInfo::first();

        $withdraw_amount =  $request->withdraw_amount;
        $payment_method_id =  $request->payment_method_id;

        $payment_method = PaymentMethod::where('id', $payment_method_id)->first();

        $cut_coin = ($withdraw_amount * $payment_method->poundage) / 100;
        $rest_coin = $withdraw_amount - $cut_coin;

        if($payment_method->type == 1){
 
            $rate = $site_info->rate_usdt;

        }else{
  
            $rate = $site_info->rate;
        }


        $real_money = ($rest_coin * $rate);

        return response()->json([
            'withdraw_amount' => $withdraw_amount,
            'poundage' => $payment_method->poundage,
            'rest_coin' => $rest_coin,
            'rate' => $rate,
            'real_money' => $real_money,
        ]);

    }



}
