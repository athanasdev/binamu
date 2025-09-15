<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AgentController;
use App\Http\Controllers\Admin\WithdrawController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\MatchController;
use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\DepositController;
use App\Http\Controllers\Admin\LeagueController;


use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RechargeController;
use App\Http\Controllers\UserWithdrawController;


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear', function() {

   Artisan::call('cache:clear');
   Artisan::call('config:clear');
   Artisan::call('config:cache');
   Artisan::call('view:clear');

   return "Cleared!";

});

Route::get('/', [WelcomeController::class, 'index']);
Route::get('all-matchs', [WelcomeController::class, 'all_matchs'])->name('all-matchs');
Route::get('about-us', [WelcomeController::class, 'about_us'])->name('about-us');
Route::get('tomorrow-matchs', [WelcomeController::class, 'tomorrow_matchs'])->name('tomorrow-matchs');
Route::get('details/{id}', [WelcomeController::class, 'details'])->name('details');
Route::post('confirm_bet', [WelcomeController::class, 'confirm_bet'])->name('confirm_bet');


Route::get('get_bet_popup', [WelcomeController::class, 'get_bet_popup'])->name('get_bet_popup');


Route::get('all-orders/{id}', [WelcomeController::class, 'all_orders'])->name('all-orders');



Route::get('/registration', [AuthenticationController::class, 'registration'])->name('registration');
Route::get('/refer-friend/{refer_code}', [AuthenticationController::class, 'refer_friend'])->name('refer-friend');


Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
Route::post('/submit_registration', [AuthenticationController::class, 'submit_registration'])->name('submit_registration');
Route::post('/submit_login', [AuthenticationController::class, 'submit_login'])->name('submit_login');
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');


Route::post('/send-otp', [AuthenticationController::class, 'send_otp'])->name('send-otp');
Route::get('/submit-otp', [AuthenticationController::class, 'submit_otp'])->name('submit-otp');
Route::post('/submit-otp', [AuthenticationController::class, 'submit_otp_login'])->name('submit-otp');

Route::get('/privacy-policy', [UserController::class, 'privacy_policy'])->name('privacy-policy');
Route::get('/terms-and-conditions', [UserController::class, 'terms_and_conditions'])->name('terms-and-conditions');




Route::prefix('user')->group(function (){


    Route::get('/money-log', [UserController::class, 'money_log'])->name('money-log');
    Route::get('/transaction', [UserController::class, 'transaction'])->name('transaction');
    Route::get('/my-team', [UserController::class, 'my_team'])->name('my-team');
    Route::get('/subordinate-list', [UserController::class, 'subordinate_list'])->name('subordinate-list');
    Route::get('/new-register-list', [UserController::class, 'new_register_list'])->name('new-register-list');


    Route::get('/personal-data', [UserController::class, 'dashboard'])->name('personal-data');
    Route::get('/my_profile', [UserController::class, 'my_profile'])->name('my_profile');
    Route::post('/update_password', [UserController::class, 'update_password'])->name('update_password');
    Route::post('/update_trade_password', [UserController::class, 'update_trade_password'])->name('update_trade_password');
    Route::post('/update_bank_receipt_information', [UserController::class, 'update_bank_receipt_information'])->name('update_bank_receipt_information');
    Route::post('/update_virtual_currency_account', [UserController::class, 'update_virtual_currency_account'])->name('update_virtual_currency_account');









    //Recharge
    Route::get('/recharge', [RechargeController::class, 'recharge'])->name('recharge');
    Route::get('/online-payment', [RechargeController::class, 'online_payment'])->name('online-payment');
    Route::get('/commercial-payment', [RechargeController::class, 'commercial_payment'])->name('commercial-payment');


    Route::get('/onepay-payment', [RechargeController::class, 'onepay_payment'])->name('onepay-payment');
    Route::get('/onepay', [RechargeController::class, 'onepay'])->name('onepay');
    Route::get('/onepay/quartetSystem', [RechargeController::class, 'quartetSystem'])->name('onepay/quartetSystem');

    Route::get('/cencal', [RechargeController::class, 'cencal'])->name('cencal');

    Route::get('/payment-preview', [RechargeController::class, 'payment_preview'])->name('payment-preview');
    Route::get('/payment-information/{amount}/{payment_method_id}/{order_id}', [RechargeController::class, 'payment_information'])->name('payment-information');
    Route::post('/payment-confirm', [RechargeController::class, 'payment_confirm'])->name('payment-confirm');
    Route::get('/onepay-payment-complete/{order_id}', [RechargeController::class, 'onepay_payment_complete'])->name('onepay-payment-complete');
    Route::get('/payment-complete/{order_id}', [RechargeController::class, 'payment_complete'])->name('payment-complete');



    Route::get('/usdt-payment', [RechargeController::class, 'usdt_payment'])->name('usdt-payment');
    Route::get('/usdt-payment-preview', [RechargeController::class, 'usdt_payment_preview'])->name('usdt-payment-preview');
    Route::get('/usdt-payment-information/{amount}/{payment_method_id}/{order_id}', [RechargeController::class, 'usdt_payment_information'])->name('usdt-payment-information');
    Route::post('/usdt-payment-confirm', [RechargeController::class, 'usdt_payment_confirm'])->name('usdt-payment-confirm');
    Route::get('/usdt-payment-complete/{order_id}', [RechargeController::class, 'usdt_payment_complete'])->name('usdt-payment-complete');



    Route::get('/recharge-record', [RechargeController::class, 'recharge_record'])->name('recharge-record');





    //Withdraw
    Route::get('/withdraw', [UserWithdrawController::class, 'withdraw'])->name('withdraw');
    Route::get('/usdt-withdraw', [UserWithdrawController::class, 'usdt_withdraw'])->name('usdt-withdraw');
    Route::get('/online-withdraw', [UserWithdrawController::class, 'online_withdraw'])->name('online-withdraw');
    Route::get('/withdraw-preview', [UserWithdrawController::class, 'withdraw_preview'])->name('withdraw-preview');
    Route::get('/submit-withdraw', [UserWithdrawController::class, 'submit_withdraw'])->name('submit-withdraw');

    Route::get('/withdraw-history', [UserWithdrawController::class, 'withdraw_history'])->name('withdraw-history');



    Route::get('/withdraw-record', [UserWithdrawController::class, 'withdraw_record'])->name('withdraw-record');



    Route::post('/get_poundage_real_money', [UserWithdrawController::class, 'get_poundage_real_money'])->name('get_poundage_real_money');




});


Route::get('/team', [UserController::class, 'team'])->name('team');
Route::get('/wallet', [UserController::class, 'wallet'])->name('wallet');
Route::get('/edit-wallet', [UserController::class, 'edit_wallet'])->name('edit-wallet');
Route::post('/update-wallet', [UserController::class, 'update_wallet'])->name('update-wallet');
Route::get('/invite-friend', [UserController::class, 'invite_friend'])->name('invite-friend');
Route::get('/settings', [UserController::class, 'settings'])->name('settings');
Route::get('/profite-report', [UserController::class, 'profite_report'])->name('profite-report');
Route::get('/form-fillup', [UserController::class, 'form_fillup'])->name('form-fillup');
Route::get('/my-all-forms', [UserController::class, 'my_all_forms'])->name('my-all-forms');
Route::get('/my-form-pdf/{id}', [UserController::class, 'my_form_pdf'])->name('my-form-pdf');
Route::post('/submit_form', [UserController::class, 'submit_form'])->name('submit_form');
Route::get('/agent-information-pdf', [UserController::class, 'agent_information_pdf'])->name('agent-information-pdf');












Route::get('/set-login-password', [UserController::class, 'set_login_password'])->name('set-login-password');
Route::get('/set-transaction-password', [UserController::class, 'set_transaction_password'])->name('set-transaction-password');
Route::post('/update_login_password', [UserController::class, 'update_login_password'])->name('update_login_password');
Route::post('/update_transaction_password', [UserController::class, 'update_transaction_password'])->name('update_transaction_password');



Route::prefix('admin')->group(function (){
    Route::get('/login', [AdminController::class, 'login']);
    Route::get('/dashboard', [AdminController::class, 'home'])->name('dashboard');
    Route::post('/login', [AdminController::class, 'admin_login'])->name('admin-login');
    Route::get('/logout', [AdminController::class, 'admin_logout'])->name('admin-logout');
    Route::get('/forget-password', 'AdminController@forget_password')->name('forget-password');
    Route::group(['middleware' => ['AdminUserMiddleWare']], function () {
        Route::get('/dashboard', [AdminController::class, 'home'])->name('dashboard');
        Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
        Route::post('/profile', [AdminController::class, 'save_profile'])->name('save-profile');
        Route::get('/change-password', [AdminController::class, 'change_password'])->name('change-password');
        Route::post('/save-password', [AdminController::class, 'save_password'])->name('save-password');


        Route::get('/user_bets', [AgentController::class, 'user_bets'])->name('user_bets');
        

        //website setting
        Route::get('/site-setting', [SettingController::class, 'setting'])->name('site-setting');
        Route::post('/save-logo', [SettingController::class, 'save_logo'])->name('save-logo');
        Route::post('/save-favicon', [SettingController::class, 'save_favicon'])->name('save-favicon');
        Route::post('/save-site-info', [SettingController::class, 'save_site_info'])->name('save-site-info');


        //agent
        Route::resource('agent', AgentController::class);
        Route::get('/agent_request', [AgentController::class, 'agent_request'])->name('agent_request');
        Route::get('/active_agent', [AgentController::class, 'active_agent'])->name('active_agent');
        Route::get('/blocked_agent', [AgentController::class, 'blocked_agent'])->name('blocked_agent');
        Route::get('/agent-pdf/{id}', [AgentController::class, 'agent_pdf'])->name('agent-pdf');
        Route::get('/agent-application-forms/{id}', [AgentController::class, 'agent_application_forms'])->name('agent-application-forms');
        Route::get('/agent/active/{id}', [AgentController::class, 'active'])->name('active-agent');
        Route::get('/agent/inactive/{id}', [AgentController::class, 'inactive'])->name('inactive-agent');


        //forms
        Route::get('/all-forms', [AgentController::class, 'all_forms'])->name('all-forms');
        Route::get('/edit-form/{id}', [AgentController::class, 'edit_form'])->name('edit-form');
        Route::post('/update-form/{id}', [AgentController::class, 'update_form'])->name('update-form');
        Route::get('/form-pdf/{id}', [AgentController::class, 'form_pdf'])->name('form-pdf');



        //withdraw
        Route::resource('withdraw', WithdrawController::class);
        Route::get('/approved_withdraw', [WithdrawController::class, 'approved_withdraw'])->name('approved_withdraw');
        Route::get('/pending_withdraw', [WithdrawController::class, 'pending_withdraw'])->name('pending_withdraw');
        Route::get('/canceled_withdraw', [WithdrawController::class, 'canceled_withdraw'])->name('canceled_withdraw');
        Route::post('/withdraw/approve/{id}', [WithdrawController::class, 'approve'])->name('approve-withdraw');
        Route::get('/withdraw/cancel/{id}', [WithdrawController::class, 'cancel'])->name('cancel-withdraw');


        //deposit
        Route::resource('deposit', DepositController::class);
        Route::get('/approved_deposit', [DepositController::class, 'approved_deposit'])->name('approved_deposit');
        Route::get('/pending_deposit', [DepositController::class, 'pending_deposit'])->name('pending_deposit');
        Route::get('/canceled_deposit', [DepositController::class, 'canceled_deposit'])->name('canceled_deposit');
        Route::get('/deposit/approve/{id}', [DepositController::class, 'approve'])->name('approve-deposit');
        Route::get('/deposit/cancel/{id}', [DepositController::class, 'cancel'])->name('cancel-deposit');





        //faq
        Route::resource('faq', FAQController::class);

        //slider
        Route::resource('slider', SliderController::class);


        //league
        Route::resource('league', LeagueController::class);


        //match
        Route::resource('match', MatchController::class);
        Route::get('/running_match', [MatchController::class, 'running_match'])->name('running_match');
        Route::get('/upcomming_match', [MatchController::class, 'upcomming_match'])->name('upcomming_match');
        Route::get('/completed_match', [MatchController::class, 'completed_match'])->name('completed_match');
        Route::get('/complete_match/{id}', [MatchController::class, 'complete_match'])->name('complete_match');



        //Payment Method
        Route::resource('payment_method', PaymentMethodController::class);
        Route::get('/method/active/{id}', [PaymentMethodController::class, 'active_method'])->name('active-method');
        Route::get('/method/inactive/{id}', [PaymentMethodController::class, 'inactive_method'])->name('inactive-method');


        //country
        Route::resource('country', CountryController::class);
        Route::get('/country/active/{id}', [CountryController::class, 'active'])->name('active-country');
        Route::get('/country/inactive/{id}', [CountryController::class, 'inactive'])->name('inactive-country');


    });
});