<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\UserEducation;
use App\Models\SiteInfo;
use App\Models\SMSAPI;
use Hash;
use Str;
use Auth;
use Session;
use Carbon\Carbon;

use GuzzleHttp\Client;



class AuthenticationController extends Controller
{
    public function registration()
    {
        return view('frontend.user.registration');
    }
    public function refer_friend($refer_code)
    {
        $refer_code = $refer_code;
    
        return view('frontend.user.registration', compact('refer_code'));
    }

    public function submit_registration(Request $request)
    {

        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required|unique:users',
            'password' => 'required|confirmed|min:6',
            'trade_password' => 'min:6|required_with:trade_password_confirmation|same:trade_password_confirmation',

        ]);

        $site_info = SiteInfo::first();

        $user = User::count();
        $total_user = $user + 1;

        $refer_bonus = 0;

        // dd($request->phone);

        $user = new User();
        $user->unique_id = 0;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->balance = 0;
        $user->transaction_balance = 0;
        $user->refer_by = $request->refer_by;
        $user->own_refer_code = '0';
        $user->password = Hash::make($request->password);
        $user->password_str = $request->password;
        $user->trade_password = Hash::make($request->trade_password);
        
        $user->trade_password_str = $request->trade_password;

        $user->status = 1;
        $user->save();

        User::where('id', $user->id)->update([
            'unique_id' => rand(1111,9999).''.$user->id,
        ]);

        $user = User::where('id', $user->id)->first();

        User::where('id', $user->id)->update([
            'own_refer_code' => 'RF'.$user->unique_id,
        ]);


        return redirect()->back()->with('success', 'Registration Successful');

    }

    public function login()
    {
        return view('frontend.user.login');
    }

    public function submit_login(Request $request)
    {
        $userdata = array(
          'phone' => $request->phone,
          'password' => $request->password
        );

        if (Auth::attempt($userdata))
        {
            $user = Auth::user();
            if($user->status == 1){

                return redirect('/')->with('success','Login successful');

            }else{
                return back()->with('error','Your account is pending or blocked');
            }
            
            return redirect('/')->with('success','Logout successful');
        }
        else
        {
            return back()->with('error','Email or password invalid');
        }
    }





    public function logout()
    {
        session::flush();
        return redirect('/')->with('success','Logout successful');
    }

}
