<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SiteInfo;
use App\Models\DailyCheckInBonusHistory;
use App\Models\WatchAndEarnHistory;
use App\Models\LuckySpinHistory;
use App\Models\ReferBonusHistory;
use App\Models\Withdraw;
use App\Models\WithdrawHistory;
use Illuminate\Support\Facades\Validator;
use Hash;
use Auth;

class AuthController extends Controller
{
    
    public function register(Request $request)
    {

        $site_info = SiteInfo::first();

        $today = date('d-m-Y');

        $existing_user = User::where('phone', $request->phone)->first();

        if($existing_user){
            $response = ['message' => 'এই ফোন নম্বর আগেই ব্যবহার করা হয়েছে ! দয়া করে অন্য নম্বর ব্যবহার করুন'];
            return response()->json($response, 400);
        }

        $existing_ip = User::where('ipv4', $request->ipv4)->first();
        $existing_deivceId = User::where('deivceId', $request->deivceId)->where('model', $request->model)->where('brand', $request->brand)->first();

        if($existing_ip || $existing_deivceId){
            $response = ['message' => 'আপনি একই ডিভাইস ব্যবহার করে একাধিক অ্যাকাউন্ট নিবন্ধন করতে পারবেন না!'];
            return response()->json($response, 400);
        }


        if($request->refer_by){
            $refer_by_user = User::where('phone', $request->refer_by)->first();

            if(!$refer_by_user){
                $response = ['message' => 'এই রেফার কোড সঠিক নয়!'];
                return response()->json($response, 400);
            }

            User::where('id', $refer_by_user->id)->update([
                'balance' => $refer_by_user->balance + $site_info->refer_commission
            ]);

            $refer_bonus = new ReferBonusHistory();
            $refer_bonus->user_id = $refer_by_user->id;
            $refer_bonus->amount = $site_info->refer_commission;
            $refer_bonus->date = $today;
            $refer_bonus->save();


        }

        $data = new User();
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->refer_by = $request->refer_by;
        $data->own_refer_code = $request->phone;
        $data->balance = 0.00;
        $data->password = Hash::make($request->password);
        $data->password_str = $request->password;
        $data->ipv4 = $request->ipv4;
        $data->model = $request->model;
        $data->deivceId = $request->deivceId;
        $data->device = $request->device;
        $data->brand = $request->brand;
        $data->status = 1;
        $data->save();


        $empty_refer_by = [
            "name" => "-"
        ];
        


        $token = $data->createToken('Personal Access Token')->plainTextToken;
        $response = [
            'user' => $data, 
            'refer_by' => $refer_by_user ?? $empty_refer_by,
            'token' => $token, 
            'message' => 'Registration Successful'
        ];
        return response()->json($response, 200);




    }


    public function login(Request $request)
    {

        $rules = [
            'phone' => 'required',
            'password' => 'required|string|min:6',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

        $user = User::where('phone', $request->phone)->where('password_str', $request->password)->first();

        if(!$user) {
            return response([
                'message' => 'Incorrect phone number or password.'
            ], 400);
        }   

        if($user->status == 0){
            return response([
                'message' => 'Your account is blocked. Please contact with admin.'
            ], 400);
        }

        if($user->refer_by){
            $refer_by_user = User::where('phone', $user->refer_by)->first();
        }



             
        
        Auth::login($user);

        $empty_refer_by = [
            "name" => "-"
        ];
        


        return response([
            'user' => auth()->user(),
            'refer_by' => $refer_by_user ?? $empty_refer_by,
            'token' => auth()->user()->createToken('secret')->plainTextToken,
            'message' => 'Login Successful'
        ], 200);

    }


    public function user()
    {
        return response([
            'user' => auth()->user()
        ], 200);

    }
    
        
    
    public function logout()
    {

        auth()->user()->tokens()->delete();
        return response([
            'message' => 'Logout Success'
        ]);


    }

    public function daily_check_in(Request $request)
    {
        $site_info = SiteInfo::first();

        $user_id = $request->user_id;
        $coins = $site_info->daily_checkin_bonus;

        $today = date('d-m-Y');

        $user = User::where('id', $user_id)->first();

        $already_done = DailyCheckInBonusHistory::where('user_id', $user_id)->where('date', $today)->first();
        

        if($already_done){
            return response([
                'message' => 'Already collected your daily bonus!',
                'status' => 400
            ]);
        }


        User::where('id', $user_id)->update([
            'balance' => $user->balance + $coins
        ]);

        $history = new DailyCheckInBonusHistory();
        $history->user_id = $user_id;
        $history->amount = $coins;
        $history->date = $today;
        $history->save();


        $user = User::where('id', $user_id)->first();
        if($user->refer_by){
            $refer_by_user = User::where('phone', $user->refer_by)->first();
        }


        $empty_refer_by = [
            "name" => "-"
        ];

        if(!$user){
            return response([
                'message' => 'User not found!',
                'status' => 400
            ]);
        }

        return response([
            'user' => $user,
            'refer_by' => $refer_by_user ?? $empty_refer_by,
            'message' => 'Coins added to your account',
            'token' => auth()->user()->createToken('secret')->plainTextToken,
            'status' => 200
        ]);


    }


    public function watch_and_earn(Request $request)
    {

        $site_info = SiteInfo::first();

        $user_id = $request->user_id;
        $coins = $site_info->watch_and_earn;

        $today = date('d-m-Y');
        $user = User::where('id', $user_id)->first();

        $already_done = WatchAndEarnHistory::where('user_id', $user_id)->where('date', $today)->get();

        if(count($already_done) >= $site_info->max_watch_ads){
            return response([
                'message' => 'Already watched '.$site_info->max_watch_ads.' videos! Try again tomorrow.',
                'status' => 400
            ]);
        }


        User::where('id', $user_id)->update([
            'balance' => $user->balance + $coins
        ]);

        $history = new WatchAndEarnHistory();
        $history->user_id = $user_id;
        $history->amount = $coins;
        $history->date = $today;
        $history->save();


        $user = User::where('id', $user_id)->first();
        if($user->refer_by){
            $refer_by_user = User::where('phone', $user->refer_by)->first();
        }


        $empty_refer_by = [
            "name" => "-"
        ];

        if(!$user){
            return response([
                'message' => 'User not found!',
                'status' => 400
            ]);
        }

        return response([
            'user' => $user,
            'refer_by' => $refer_by_user ?? $empty_refer_by,
            'message' => 'Coins added to your account',
            'token' => auth()->user()->createToken('secret')->plainTextToken,
            'status' => 200
        ]);


    }


    public function lucky_spin(Request $request)
    {

        $site_info = SiteInfo::first();

        $user_id = $request->user_id;
        $coins = $request->coins;

        $today = date('d-m-Y');
        $user = User::where('id', $user_id)->first();

        $already_done = LuckySpinHistory::where('user_id', $user_id)->where('date', $today)->get();
        

        if(count($already_done) >= $site_info->max_lucky_spin){
            return response([
                'message' => 'Already spinned '.$site_info->max_lucky_spin.' times! Try again tomorrow.',
                'status' => 400
            ]);
        }


        User::where('id', $user_id)->update([
            'balance' => $user->balance + $coins
        ]);

        $history = new LuckySpinHistory();
        $history->user_id = $user_id;
        $history->amount = $coins;
        $history->date = $today;
        $history->save();


        $user = User::where('id', $user_id)->first();
        if($user->refer_by){
            $refer_by_user = User::where('phone', $user->refer_by)->first();
        }


        $empty_refer_by = [
            "name" => "-"
        ];

        if(!$user){
            return response([
                'message' => 'User not found!',
                'status' => 400
            ]);
        }

        return response([
            'user' => $user,
            'refer_by' => $refer_by_user ?? $empty_refer_by,
            'message' => $coins.' '.'Coins added to your account',
            'token' => auth()->user()->createToken('secret')->plainTextToken,
            'status' => 200
        ]);


    }


    public function team_members($user_id)
    {

        $site_info = SiteInfo::first();


        $today = date('d-m-Y');
        $user = User::where('id', $user_id)->first();
        $team_members = User::where('refer_by', $user->own_refer_code)->get();

        $empty_refer_by = [
            "name" => "-"
        ];

        if(!$user){
            return response([
                'message' => 'User not found!',
                'status' => 400
            ]);
        }

        return response([
            'user' => $user,
            'team_members' => $team_members,
            'refer_by' => $refer_by_user ?? $empty_refer_by,
            'message' => 'Here is your affiliate members',
            'token' => auth()->user()->createToken('secret')->plainTextToken,
            'status' => 200
        ]);


    }


    public function withdraw(Request $request)
    {

        $site_info = SiteInfo::first();


        $today = date('d-m-Y');
        $user = User::where('id', $request->user_id)->first();

        $empty_refer_by = [
            "name" => "-"
        ];

        if(!$user){
            return response([
                'message' => 'User not found!',
                'status' => 400
            ]);
        }


        if($user->balance < $request->amount){
            return response([
                'message' => 'Insuficient Balance!'.' '.'Your balance is: '.$user->balance.' '.'coins.',
                'status' => 400
            ]);
        }


        if($request->payment_method == 1 && $request->amount < 10000){
            return response([
                'message' => 'Minimum withdraw amount is 10000 Coins using Bkash',
                'status' => 400
            ]);
        }

        if($request->payment_method == 2 && $request->amount < 6250){
            return response([
                'message' => 'Minimum withdraw amount is 6250 Coins using Rocket',
                'status' => 400
            ]);
        }


        if($request->payment_method == 3 && $request->amount < 6250){
            return response([
                'message' => 'Minimum withdraw amount is 6250 Coins using Nagad',
                'status' => 400
            ]);
        }

        if($request->payment_method == 4 && $request->amount < 5000){
            return response([
                'message' => 'Minimum withdraw amount is 5000 Coins using Mobile Recharge',
                'status' => 400
            ]);
        }


        $data = new Withdraw();
        $data->user_id = $request->user_id;
        $data->payment_method = $request->payment_method;

        if($request->payment_method == 1){
            $data->payment_method_name = "bKash";
        }
        
        if($request->payment_method == 2){
            $data->payment_method_name = "Rocket";
        }
        
        if($request->payment_method == 3){
            $data->payment_method_name = "Nagad";
        }
        
        
        if($request->payment_method == 4){
            $data->payment_method_name = "Mobile Recharge";
        }
        
        $data->account_number = $request->account_number;
        $data->account_type = 0;
        $data->amount = $request->amount;
        $data->amount_taka = $request->amount / $site_info->coin_equal_taka;
        $data->status = 0;
        $data->save();

        $history = new WithdrawHistory();
        $history->user_id = $request->user_id;
        $history->withdraw_id = $data->id;
        $history->old_balance = $user->balance;
        $history->amount = $request->amount;
        $history->amount_taka = $request->amount / $site_info->coin_equal_taka;
        $history->new_balance = $user->balance - $request->amount;
        $history->save();


        User::where('id', $request->user_id)->update([
            'balance' => $user->balance - $request->amount,
        ]);

        $user = User::where('id', $request->user_id)->first();

        return response([
            'user' => $user,
            'refer_by' => $refer_by_user ?? $empty_refer_by,
            'message' => 'Withdraw submitted successful. Please wait sometimes, We will send your payment as soon as possible to your account',
            'token' => auth()->user()->createToken('secret')->plainTextToken,
            'status' => 200
        ]);


    }


    public function withdraw_history($user_id)
    {

        $site_info = SiteInfo::first();


        $today = date('d-m-Y');
        $user = User::where('id', $user_id)->first();
        $withdraw_histories = Withdraw::where('user_id', $user_id)->orderBy('id', 'desc')->get();

        $empty_refer_by = [
            "name" => "-"
        ];

        if(!$user){
            return response([
                'message' => 'User not found!',
                'status' => 400
            ]);
        }

        return response([
            'withdraw_histories' => $withdraw_histories,
            'message' => 'Here is your withdraw history',
            'status' => 200
        ]);


    }


    public function refur_bonus_history($user_id)
    {

        $site_info = SiteInfo::first();


        $today = date('d-m-Y');
        $user = User::where('id', $user_id)->first();
        $refer_bonus_history = ReferBonusHistory::where('user_id', $user_id)->orderBy('id', 'desc')->get();

        $empty_refer_by = [
            "name" => "-"
        ];

        if(!$user){
            return response([
                'message' => 'User not found!',
                'status' => 400
            ]);
        }

        return response([
            'refer_bonus_history' => $refer_bonus_history,
            'message' => 'Here is your Refer Bonus history',
            'status' => 200
        ]);


    }


    public function daily_checkin_history($user_id)
    {

        $site_info = SiteInfo::first();


        $today = date('d-m-Y');
        $user = User::where('id', $user_id)->first();
        $daily_checkin_history = DailyCheckInBonusHistory::where('user_id', $user_id)->orderBy('id', 'desc')->get();

        $empty_refer_by = [
            "name" => "-"
        ];

        if(!$user){
            return response([
                'message' => 'User not found!',
                'status' => 400
            ]);
        }

        return response([
            'daily_checkin_history' => $daily_checkin_history,
            'message' => 'Here is your Refer Bonus history',
            'status' => 200
        ]);


    }



}
