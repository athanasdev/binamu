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
use App\Models\GameBet;
use App\Models\PaymentMethod;
use App\Models\Withdraw;
use App\Models\WithdrawHistory;
use App\Models\SiteImage;
use App\Models\SMSAPI;
use App\Models\Transaction;
use Auth;
use Hash;
use Str;
use Carbon\Carbon;
use Faker\Provider\ar_EG\Payment;

class UserController extends Controller
{
    
    public function dashboard()
    {
        $user = Auth::user();

        if($user){
            $site_info = SiteInfo::first();
            $online_methods = PaymentMethod::where('type', 0)->where('status', 1)->get();
            $digital_methods = PaymentMethod::where('type', 1)->where('status', 1)->get();
            return view('frontend.user.dashboard', compact('user', 'site_info', 'online_methods', 'digital_methods'));

        }else{
            return back()->with('error','Please Login !');
        }

    }  
    
    public function my_profile()
    {
        $user = Auth::user();

        if($user){
            $site_info = SiteInfo::first();

            return view('frontend.user.dashboard.my_profile', compact('user', 'site_info'));

        }else{
            return back()->with('error','Please Login !');
        }

    }  

    public function money_log()
    {
        $user = Auth::user();

        if($user){
            $site_info = SiteInfo::first();

            $recharges = Deposit::where('user_id', $user->id)->orderBy('id', 'desc')->get();
            $withdraws = Withdraw::where('user_id', $user->id)->orderBy('id', 'desc')->get();
            $logs = Transaction::where('user_id', $user->id)->orderBy('id', 'desc')->get();

            return view('frontend.user.dashboard.money_log', compact('recharges', 'withdraws', 'logs'));

        }else{
            return back()->with('error','Please Login !');
        }

    }  
    public function transaction()
    {
        $user = Auth::user();

        if($user){
            $site_info = SiteInfo::first();

            $transactions = GameBet::where('user_id', $user->id)->orderBy('id', 'desc')->get();

            return view('frontend.user.dashboard.transaction', compact('transactions', 'site_info'));

        }else{
            return back()->with('error','Please Login !');
        }

    }  


    public function my_team() {

        $user = Auth::user();

        if($user){
            $site_info = SiteInfo::first();

            $today = Carbon::today();


            $total_deposit_commission = Transaction::where('user_id', $user->id)->whereDate('created_at', '!=', $today)->where('type', 'Deposit Commision')->sum('credit');
            $total_bet_commission = Transaction::where('user_id', $user->id)->whereDate('created_at', '!=', $today)->where('type', 'Bet Commision')->sum('credit');
            $total_commission = $total_deposit_commission + $total_bet_commission;



            $today_deposit_commision = Transaction::where('user_id', $user->id)->whereDate('created_at', $today)->where('type', 'Deposit Commision')->sum('credit');
            $today_bet_commision = Transaction::where('user_id', $user->id)->whereDate('created_at', $today)->where('type', 'Bet Commision')->sum('credit');
            $today_commision = $today_deposit_commision + $today_bet_commision;


            $today_registration = User::whereDate('created_at', $today)->where('refer_by', $user->own_refer_code)->count();
            $my_refers = User::where('refer_by', $user->own_refer_code)->get();


            $today_recharge = []; 
            $total_recharge = 0;
            
            foreach ($my_refers as $key => $value) {
                $total_person = Deposit::whereDate('created_at', $today)->where('user_id', $value->id)->get();
                $total_recharge_amount = Deposit::whereDate('created_at', $today)->where('user_id', $value->id)->sum('amount_coin');
                
                if ($total_person->isNotEmpty()) {
                    foreach ($total_person as $person) {
                        array_push($today_recharge, $person);
                    }
                }
                $total_recharge = $total_recharge + $total_recharge_amount;

            }


            $today_withdraw = []; 
            $total_withdraw = 0;
            
            foreach ($my_refers as $key => $value) {
                $total_person = Withdraw::whereDate('created_at', $today)->where('user_id', $value->id)->get();
                $total_withdraw_amount = Withdraw::whereDate('created_at', $today)->where('user_id', $value->id)->sum('amount');
                
                if ($total_person->isNotEmpty()) {
                    foreach ($total_person as $person) {
                        array_push($today_withdraw, $person);
                    }
                }
                $total_withdraw = $total_withdraw + $total_withdraw_amount;

            }


            $total_trx_person = count($today_recharge) + count($today_withdraw);
            $total_trx_amount = $total_recharge + $total_withdraw;


            



            return view('frontend.user.dashboard.my_team', compact('today_commision','today_registration','total_commission','site_info', 'user', 'my_refers', 'total_recharge', 'today_recharge', 'today_withdraw', 'total_withdraw', 'total_trx_person', 'total_trx_amount'));

        }else{
            return back()->with('error','Please Login !');
        }
    }

    public function subordinate_list(){
        $user = Auth::user();

        if($user){
            $my_refers = User::where('refer_by', $user->own_refer_code)->get();
            return view('frontend.user.dashboard.subordinate_list', compact('my_refers', 'user'));

        }else{
            return back()->with('error','Please Login !');
        }
    }

    public function new_register_list(){
        $user = Auth::user();

        if($user){

            $today = Carbon::now();

            $my_refers = User::where('refer_by', $user->own_refer_code)->whereDate('created_at', $today)->get();
            return view('frontend.user.dashboard.new_register_list', compact('my_refers', 'user'));

        }else{
            return back()->with('error','Please Login !');
        }
    }


    public function update_password(Request $request) {

        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6', // 'confirmed' ensures password_confirmation matches
        ]);

        $user = Auth::user();

        if($user){

            // Check if the old password matches the stored password
            if (!Hash::check($request->old_password, $user->password)) {
                return redirect()->back()->with('error', 'Old password does not match.');
            }

            User::where('id', $user->id)->update([
                'password' => Hash::make($request->password),
                'password_str' => $request->password,
            ]);

            return redirect()->back()->with('success','Password updated successful.');

        }else{
            return back()->with('error','Please Login !');
        }

    }

    public function update_trade_password(Request $request) {

        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6', 
        ]);

        $user = Auth::user();

        if($user){

            // Check if the old password matches the stored password
            if (!Hash::check($request->old_password, $user->trade_password)) {
                return redirect()->back()->with('error', 'Old password does not match.');
            }

            User::where('id', $user->id)->update([
                'trade_password' => Hash::make($request->password),
                'trade_password_str' => $request->password,
            ]);

            return redirect()->back()->with('success','Trade password updated successful.');

        }else{
            return back()->with('error','Please Login !');
        }

    }

    public function update_bank_receipt_information(Request $request) {

        $request->validate([
            'payment_method_id' => 'required',
            'account_holder_name' => 'required',
            'account_no' => 'required',
        ]);

        $user = Auth::user();

        if($user){

            User::where('id', $user->id)->update([
                'payment_method_id' => $request->payment_method_id,
                'account_holder_name' => $request->account_holder_name,
                'account_no' => $request->account_no,
            ]);

            return redirect()->back()->with('success','Bank Receipt Information updated successful.');

        }else{
            return back()->with('error','Please Login !');
        }

    }

    public function update_virtual_currency_account(Request $request) {

        $request->validate([
            'digital_payment_method_id' => 'required',
            'address_to_receive' => 'required',
        ]);

        $user = Auth::user();

        if($user){

            User::where('id', $user->id)->update([
                'digital_payment_method_id' => $request->digital_payment_method_id,
                'address_to_receive' => $request->address_to_receive,
            ]);

            return redirect()->back()->with('success','Virtual currency account updated successful.');

        }else{
            return back()->with('error','Please Login !');
        }

    }



    public function privacy_policy()
    {

        $site_info = SiteInfo::first();

        return view('frontend.pages.privacy_policy', compact('site_info'));
    }
    
    
    
    public function terms_and_conditions()
    {

        $site_info = SiteInfo::first();

        return view('frontend.pages.terms_and_conditions', compact('site_info'));
    }
    

    
    public function wallet()
    {
        $user = Auth::user();
        $site_info = SiteInfo::first();
        return view('frontend.user.wallet', compact('user', 'site_info'));
    }
    
    public function edit_wallet()
    {
        $user = Auth::user();
        $site_info = SiteInfo::first();
        return view('frontend.user.edit_wallet', compact('user', 'site_info'));
    }

    
    public function update_wallet(Request $request)
    {

        $user = Auth::user();

        User::where('id', $user->id)->update([
            'mobile_banking_type' => $request->mobile_banking_type,
            'mobile_banking_number' => $request->mobile_banking_number,
        ]);

        return back()->with('success','Updated successful');

    }


    public function agent_information_pdf()
    {
        $data = Auth::user();

        $address = UserAddress::where('user_id', $data->id)->first();
        $education = UserEducation::where('user_id', $data->id)->first();
        $site_info = SiteInfo::first();
        $site_image = SiteImage::first();

        return view('frontend.user.agent_information_pdf', compact('data', 'address', 'education', 'site_info', 'site_image'));
    }

    public function profite_report()
    {
        $user = Auth::user();

        $forms = ApplicationForm::where('user_id', $user->id)->get();

        return view('frontend.user.profite_report', compact('user', 'forms'));
    }



    public function team()
    {
        $user = Auth::user();

        $total_members = User::where('referral_code', $user->refer_code)->get();

        $colors = array(
            'green' => 'green',
            'red' => 'red',
            'orange' => 'orange',
            'yellow' => 'yellow',
            'blue' => 'blue',
            'gray' => 'gray',
        );
        $color=array_rand($colors, 1);
        return view('frontend.user.team', compact('user', 'total_members', 'colors', 'color'));
    }

    public function invite_friend()
    {
        $user = Auth::user();
        return view('frontend.user.invite_friend', compact('user'));
    }

    public function settings()
    {
        $user = Auth::user();
        return view('frontend.user.settings', compact('user'));
    }

    public function set_login_password()
    {
        $user = Auth::user();
        return view('frontend.user.set_login_password', compact('user'));
    }

    public function set_transaction_password()
    {
        $user = Auth::user();
        return view('frontend.user.set_transaction_password', compact('user'));
    }

    public function update_login_password(Request $request)
    {

         $request->validate([
            'password' => 'required|string|min:6|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
         ]);

       $user = Auth::user();
       User::where('id', $user->id)->update([
            'password' => Hash::make($request->password),
       ]); 


       return back()->with('success','Login password updated successful');



    }

    public function update_transaction_password(Request $request)
    {

         $request->validate([
            'password' => 'required|string|min:6|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
         ]);

       $user = Auth::user();
       User::where('id', $user->id)->update([
            'transaction_password' => Hash::make($request->password),
       ]); 


       return back()->with('success','Transaction password updated successful');



    }


    public function form_fillup()
    {
        $user = Auth::user();
        return view('frontend.user.form_fillup', compact('user'));
    }

    public function my_all_forms()
    {
        $user = Auth::user();
        $forms = ApplicationForm::where('user_id', $user->id)->get();
        return view('frontend.user.all_forms', compact('user', 'forms'));
    }

    public function my_form_pdf($id)
    {
        $data = ApplicationForm::find($id);

        $site_info = SiteInfo::first();
        $site_image = SiteImage::first();

        return view('frontend.user.my_form_pdf', compact('data', 'site_info', 'site_image'));


    }

    public function submit_form(Request $request)
    {


    }




}
