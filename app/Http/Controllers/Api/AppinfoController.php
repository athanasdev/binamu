<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteImage;
use App\Models\SiteInfo;
use App\Models\User;
use App\Models\FAQ;

class AppinfoController extends Controller
{
    public function app_info()
    {
        $info = SiteInfo::first();
        return response([
            'info' => $info
        ], 200);

    }
    public function app_image()
    {
        $image = SiteImage::first();

        return response([
            'image' => $image
        ], 200);

    }

    public function top_users()
    {

        $users = User::orderBy('balance', 'desc')->limit(100)->get();

        return response([
            'users' => $users,
            'message' => 'Our 100 top users',
            'status' => 200
        ]);
    }


    public function faqs()
    {

        $faqs = FAQ::where('status', 1)->get();

        return response([
            'faqs' => $faqs,
            'message' => 'FAQS',
            'status' => 200
        ]);
    }
    
    public function check_ip(Request $request){
        
        $ip = $request->ip_address;
    	$ip_details = geoip()->getLocation($ip);

    	
        return response([
            'country' => $ip_details->country,
            'message' => '',
            'status' => 200
        ]);
    	

        
  
        
    }

    
    
}
