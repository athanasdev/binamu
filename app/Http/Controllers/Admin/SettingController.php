<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteImage;
use App\Models\SiteInfo;
use Illuminate\Http\Request;
use Image;
use Alert;

class SettingController extends Controller
{
    public function setting(){
        $imge = SiteImage::first();
        $site_info = SiteInfo::first();
        return view('admin.setting.site_setting',compact('imge', 'site_info'));
    }
    public function save_logo(Request $request){
        $logo = SiteImage::find($request->img_id);
        if($logo){
            $data = SiteImage::find($request->img_id);
            if($request->hasFile('logo')) {
                $image = $request->logo;
                $filename = $image->getClientOriginalName();
                $filename = preg_replace('/\s+/', '-', $filename);
                $folder = 'uploads/'.date('Y').'/'.date('m');
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                }
                $logo_img = $folder.'/'. time() . '-' . $filename;
                Image::make($image)->save($logo_img);
                $data->logo = asset($logo_img);
            }
            $data->save();
        }else{
            $data =new SiteImage();
            if($request->hasFile('logo')) {
                $image = $request->logo;
                $filename = $image->getClientOriginalName();
                $filename = preg_replace('/\s+/', '-', $filename);
                $folder = 'uploads/'.date('Y').'/'.date('m');
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                }
                $logo_img = $folder.'/'. time() . '-' . $filename;
                Image::make($image)->save($logo_img);
                $data->logo = asset($logo_img);
            }
            $data->save();
        }
        
        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function save_favicon(Request $request){
        $favicon = SiteImage::find($request->fav_id);
        if($favicon){
            $fav_data = SiteImage::find($request->fav_id);
            if($request->hasFile('fav_icon')) {
                $image = $request->fav_icon;
                $filename = $image->getClientOriginalName();
                $filename = preg_replace('/\s+/', '-', $filename);
                $folder = 'uploads/'.date('Y').'/'.date('m');
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                }
                $fav_icon = $folder.'/'. time() . '-' . $filename;
                Image::make($image)->resize(32, 32)->save($fav_icon);
                $fav_data->favicon = asset($fav_icon);
            }
            $fav_data->save();
        }else{
            $fav_data = new SiteImage();
            if($request->hasFile('fav_icon')) {
                $image = $request->fav_icon;
                $filename = $image->getClientOriginalName();
                $filename = preg_replace('/\s+/', '-', $filename);
                $folder = 'uploads/'.date('Y').'/'.date('m');
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                }
                $fav_icon = $folder.'/'. time() . '-' . $filename;
                Image::make($image)->resize(32, 32)->save($fav_icon);
                $fav_data->favicon = asset($fav_icon);
            }
            $fav_data->save();
        }
        
        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function save_site_info(Request $request)
    {

        $exist = SiteInfo::first();

        if($exist){

            $data = SiteInfo::find($exist->id);
            $data->site_name = $request->site_name;
            $data->marquee = $request->marquee;
            $data->min_bet = $request->min_bet;
            $data->rate = $request->rate;
            $data->rate_usdt = $request->rate_usdt;
            $data->max_deposit_usdt = $request->max_deposit_usdt;

            $data->min_deposit_usdt = $request->min_deposit_usdt;
            $data->min_deposit_online = $request->min_deposit_online;
            $data->max_deposit_online = $request->max_deposit_online;


            
            $data->min_withdraw_online = $request->min_withdraw_online;
            $data->max_withdraw_online = $request->max_withdraw_online;
            $data->min_withdraw_usdt = $request->min_withdraw_usdt;
            $data->max_withdraw_usdt = $request->max_withdraw_usdt;


            $data->first_level_commission = $request->first_level_commission;
            $data->second_level_commission = $request->second_level_commission;
            $data->third_level_commission = $request->third_level_commission;

            $data->bet_first_level_commission = $request->bet_first_level_commission;
            $data->bet_second_level_commission = $request->bet_second_level_commission;
            $data->bet_third_level_commission = $request->bet_third_level_commission;

            $data->slogan = $request->slogan;
            $data->contact_number = $request->contact_number;


            $data->min_withdraw = $request->min_withdraw;

            $data->email = $request->email;
            $data->address = $request->address;
            $data->facebook = $request->facebook;
            $data->whatsapp = $request->whatsapp;
            $data->youtube = $request->youtube;
            $data->insta = $request->insta;
            $data->linkedin = $request->linkedin;


            $data->about_us = $request->about_us;
            $data->privacy = $request->privacy;
            $data->contact_us = $request->contact_us;



            $data->one_line_service_link = $request->one_line_service_link;
            $data->notice = $request->notice;


            $data->save();

        }else{

            $data = new SiteInfo();
            $data->marquee = $request->marquee;
            $data->min_bet = $request->min_bet;
            $data->site_name = $request->site_name;

            $data->rate_usdt = $request->rate_usdt;
            $data->max_deposit_usdt = $request->max_deposit_usdt;
            $data->rate = $request->rate;
            $data->min_deposit_usdt = $request->min_deposit_usdt;
            $data->min_deposit_online = $request->min_deposit_online;
            $data->max_deposit_online = $request->max_deposit_online;


            $data->min_withdraw_online = $request->min_withdraw_online;
            $data->max_withdraw_online = $request->max_withdraw_online;
            $data->min_withdraw_usdt = $request->min_withdraw_usdt;
            $data->max_withdraw_usdt = $request->max_withdraw_usdt;


            $data->first_level_commission = $request->first_level_commission;
            $data->second_level_commission = $request->second_level_commission;
            $data->third_level_commission = $request->third_level_commission;

            $data->bet_first_level_commission = $request->bet_first_level_commission;
            $data->bet_second_level_commission = $request->bet_second_level_commission;
            $data->bet_third_level_commission = $request->bet_third_level_commission;

            $data->slogan = $request->slogan;
            $data->contact_number = $request->contact_number;

            $data->min_withdraw = $request->min_withdraw;
            $data->email = $request->email;
            $data->address = $request->address;
            $data->facebook = $request->facebook;
            $data->whatsapp = $request->whatsapp;
            $data->youtube = $request->youtube;
            $data->insta = $request->insta;
            $data->linkedin = $request->linkedin;

            $data->notice = $request->notice;
            $data->privacy = $request->privacy;
            $data->contact_us = $request->contact_us;


            $data->one_line_service_link = $request->one_line_service_link;
            $data->about_us = $request->about_us;

            
            $data->save();
        }

        Alert::success('Successfully Done', '');
        return redirect()->back();




    }



}
