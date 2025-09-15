<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
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




class RechargeController extends Controller
{

    public function recharge()
    {
        $user = Auth::user();

        if($user){
            $site_info = SiteInfo::first();
            return view('frontend.user.recharge.recharge', compact('user', 'site_info'));

        }else{
            return back()->with('error','Please Login !');
        }



    }
    public function online_payment()
    {
        $user = Auth::user();

        if($user){
            $site_info = SiteInfo::first();

            $methods = PaymentMethod::where('type', 0)->where('status', 1)->get();
    
            return view('frontend.user.recharge.online_payment', compact('user', 'site_info', 'methods'));

        }else{
            return back()->with('error','Please Login !');
        }
    }


    public function onepay_payment(){
        $user = Auth::user();

        if($user){
            $site_info = SiteInfo::first();

            $methods = PaymentMethod::where('type', 0)->where('status', 1)->get();
    
            return view('frontend.user.recharge.onepay_payment', compact('user', 'site_info', 'methods'));

        }else{
            return back()->with('error','Please Login !');
        }
    }

    
    public function onepay(Request $request){
        $user = Auth::user();

        if($user){
            $site_info = SiteInfo::first();

            $payment_method_id = $request->input('payment_method_id');
            $amount = $request->input('amount');
            $order_id = rand(1111,9999).''.$user->id;

            $methods = PaymentMethod::where('type', 0)->where('status', 1)->get();
    
            return view('frontend.user.recharge.onepay_design_one', compact('user', 'site_info', 'methods', 'payment_method_id', 'amount', 'order_id'));

        }else{
            return back()->with('error','Please Login !');
        }
    }

    public function quartetSystem(Request $request){

        $user = Auth::user();

        if($user){
            $site_info = SiteInfo::first();

            $payment_method_id = $request->payment_method_id;
            $account_number = $request->account_number;
            $amount = $request->amount;
            $order_id = $request->order_id;


            $coin_amount = $amount;
            $rate = $site_info->rate;
            $total_taka = $coin_amount * $rate;
    

            $methods = PaymentMethod::where('type', 0)->where('status', 1)->get();

            $payment_method = PaymentMethod::where('id', $payment_method_id)->first();
    
            return view('frontend.user.recharge.onepay_design_two', compact('user', 'site_info', 'methods', 'payment_method_id', 'amount', 'order_id', 'payment_method', 'account_number', 'total_taka'));

        }else{
            return back()->with('error','Please Login !');
        }
        
    }

    public function final_submit(){
        
    }


    public function cencal(){
        return view('frontend.user.recharge.cencal');
    }

    public function commercial_payment()
    {
        $user = Auth::user();

        if($user){
            $site_info = SiteInfo::first();

            $methods = PaymentMethod::where('type', 0)->where('status', 1)->get();
    
            return view('frontend.user.recharge.commercial_payment', compact('user', 'site_info', 'methods'));

        }else{
            return back()->with('error','Please Login !');
        }
    }


    public function usdt_payment()
    {
        $user = Auth::user();

        if($user){
            $site_info = SiteInfo::first();

            $methods = PaymentMethod::where('type', 1)->where('status', 1)->get();
    
            return view('frontend.user.recharge.usdt_payment', compact('user', 'site_info', 'methods'));

        }else{
            return back()->with('error','Please Login !');
        }



    }

    public function payment_preview(Request $request){


        $validated = $request->validate([
            'amount' => 'required',
            'payment_method_id' => 'required',
        ]);

        
        $user = Auth::user();

        if($user){

            $site_info = SiteInfo::first();
            $amount = $request->amount;



            if($amount < $site_info->min_deposit_online || $amount > $site_info->max_deposit_online){
                return back()->with('error','Minimum deposit amount: '.$site_info->min_deposit_online.' Coins. Maximum deposit amount: '.$site_info->max_deposit_online.' Coins');
            }



            $payment_method_id = $request->payment_method_id;
    
            $methods = PaymentMethod::where('type', 0)->where('status', 1)->get();
            $payment_method = PaymentMethod::where('id', $payment_method_id)->first();
    
            $coin_amount = $amount;
            $rate = $site_info->rate;
            $total_taka = $coin_amount * $rate;
    
    
            $order_id = rand(1111,9999).''.$user->id;
    
            return view('frontend.user.recharge.payment_preview', compact('user', 'site_info', 'methods', 'payment_method', 'coin_amount', 'rate', 'total_taka', 'order_id'));

        }else{
            return back()->with('error','Please Login !');
        }


    }

    public function usdt_payment_preview(Request $request){


        $validated = $request->validate([
            'amount' => 'required',
            'payment_method_id' => 'required',
        ]);

        
        $user = Auth::user();

        if($user){

            $site_info = SiteInfo::first();
            $amount = $request->amount;



            if($amount < $site_info->min_deposit_usdt || $amount > $site_info->max_deposit_usdt){
                return back()->with('error','Minimum deposit amount: '.$site_info->min_deposit_usdt.' Coins. Maximum deposit amount: '.$site_info->max_deposit_usdt.' Coins');
            }



            $payment_method_id = $request->payment_method_id;
    
            $methods = PaymentMethod::where('type', 1)->where('status', 1)->get();
            $payment_method = PaymentMethod::where('id', $payment_method_id)->first();
    
            $coin_amount = $amount;
            $rate = $site_info->rate;
            $total_taka = $coin_amount * $rate;
    
    
            $order_id = rand(1111,9999).''.$user->id;
    
            return view('frontend.user.recharge.usdt_payment_preview', compact('user', 'site_info', 'methods', 'payment_method', 'coin_amount', 'rate', 'total_taka', 'order_id'));

        }else{
            return back()->with('error','Please Login !');
        }


    }



    public function payment_information(Request $request, $amount, $payment_method_id, $order_id){

        $user = Auth::user();


        if($user){
            $site_info = SiteInfo::first();

            $methods = PaymentMethod::where('type', 0)->where('status', 1)->get();
            $payment_method = PaymentMethod::where('id', $payment_method_id)->first();
    
            $coin_amount = $amount;
            $rate = $site_info->rate;
            $total_taka = $coin_amount * $rate;
    
            $sender_account_no = $request->sender_account_no;
    
            return view('frontend.user.recharge.payment_information', compact('user', 'site_info', 'methods', 'payment_method', 'coin_amount', 'rate', 'total_taka', 'sender_account_no', 'order_id'));
    

        }else{
            return back()->with('error','Please Login !');
        }



    }

    public function usdt_payment_information(Request $request, $amount, $payment_method_id, $order_id){

        $user = Auth::user();


        if($user){
            $site_info = SiteInfo::first();

            $methods = PaymentMethod::where('type', 1)->where('status', 1)->get();
            $payment_method = PaymentMethod::where('id', $payment_method_id)->first();
    
            $coin_amount = $amount;
            $rate = $site_info->rate_usdt;
            $total_taka = $coin_amount * $rate;
    
            $sender_account_no = $request->sender_account_no;
    
            return view('frontend.user.recharge.usdt_payment_information', compact('user', 'site_info', 'methods', 'payment_method', 'coin_amount', 'rate', 'total_taka', 'sender_account_no', 'order_id'));
    

        }else{
            return back()->with('error','Please Login !');
        }



    }

    public function payment_confirm(Request $request){

        $validated = $request->validate([
            'payment_method_id' => 'required',
            'sender_account_no' => 'required',
            'amount_coin' => 'required',
            'trx_id' => 'required',
            'order_id' => 'required',
        ]);

        $user = Auth::user();


        if($user){

            $site_info = SiteInfo::first();

            $payment_method_id = $request->payment_method_id;
            $sender_account_no = $request->sender_account_no;
            $amount_coin = $request->amount_coin;
            $trx_id = $request->trx_id;
            $order_id = $request->order_id;

            $payment_method = PaymentMethod::where('id', $payment_method_id)->first();
    

            $rate = $site_info->rate;
            $total_taka = $amount_coin * $rate;

            $data = new Deposit();

            if($request->type == "onepay"){
                $data->type = 'onepay';
            }else{
                if($payment_method->type == 1){
                    $data->type = 'usdt';
                }else{
                    $data->type = 'online';
                }
            }

            
            $data->user_id = $user->id;
            $data->order_id = $order_id;
            $data->payment_method_id = $payment_method_id;
            $data->amount_coin = $amount_coin;
            $data->rate = $site_info->rate;
            $data->amount_taka = $total_taka;
            $data->sender_account_no = $sender_account_no;
            $data->trx_id = $trx_id;
            $data->status = 0;
            $data->save();

            $update_user = Auth::user();
            

            if($request->type == "onepay"){
                return redirect()->route('onepay-payment-complete', [
                    'order_id' => $order_id,
                ]);
    
            }else{
                return redirect()->route('payment-complete', [
                    'order_id' => $order_id,
                ]);
    
            }



        }else{
            return back()->with('error','Please Login !');
        }



    }

    public function usdt_payment_confirm(Request $request){

        $validated = $request->validate([
            'payment_method_id' => 'required',
            'sender_account_no' => 'required',
            'amount_coin' => 'required',
            'trx_id' => 'required',
            'order_id' => 'required',
        ]);

        $user = Auth::user();


        if($user){

            $site_info = SiteInfo::first();

            $payment_method_id = $request->payment_method_id;
            $sender_account_no = $request->sender_account_no;
            $amount_coin = $request->amount_coin;
            $trx_id = $request->trx_id;
            $order_id = $request->order_id;

            $payment_method = PaymentMethod::where('id', $payment_method_id)->first();
    

            $rate = $site_info->rate_usdt;
            $total_taka = $amount_coin * $rate;

            $data = new Deposit();

            if($payment_method->type == 1){
                $data->type = 'usdt';
            }else{
                $data->type = 'online';
            }

            
            $data->user_id = $user->id;
            $data->order_id = $order_id;
            $data->payment_method_id = $payment_method_id;
            $data->amount_coin = $amount_coin;
            $data->rate = $site_info->rate_usdt;
            $data->amount_taka = $total_taka;
            $data->sender_account_no = $sender_account_no;
            $data->trx_id = $trx_id;
            $data->status = 0;
            $data->save();

            
            return redirect()->route('usdt-payment-complete', [
                'order_id' => $order_id,
            ]);



        }else{
            return back()->with('error','Please Login !');
        }



    }



    public function payment_complete($order_id){

        $user = Auth::user();
        if($user){
            $order = Deposit::where('order_id', $order_id)->first();
            $site_info = SiteInfo::first();

            return view('frontend.user.recharge.payment_complete', compact('user', 'order', 'site_info'));

        }else{
            return back()->with('error','Please Login !');
        }

    }

    public function onepay_payment_complete($order_id){

        $user = Auth::user();
        if($user){
            $order = Deposit::where('order_id', $order_id)->first();
            $site_info = SiteInfo::first();

            return view('frontend.user.recharge.onepay_payment_complete', compact('user', 'order', 'site_info'));

        }else{
            return back()->with('error','Please Login !');
        }

    }

    public function usdt_payment_complete($order_id){

        $user = Auth::user();
        if($user){
            $order = Deposit::where('order_id', $order_id)->first();
            $site_info = SiteInfo::first();

            return view('frontend.user.recharge.usdt_payment_complete', compact('user', 'order', 'site_info'));

        }else{
            return back()->with('error','Please Login !');
        }

    }
    

    public function recharge_record(){
        $user = Auth::user();

        if($user){

            $datas = Deposit::where('user_id', $user->id)->orderBy('id', 'desc')->get();
            $site_info = SiteInfo::first();

            return view('frontend.user.dashboard.recharge_record', compact('user', 'datas', 'site_info'));

        }else{
            return back()->with('error','Please Login !');
        }

    }

}
