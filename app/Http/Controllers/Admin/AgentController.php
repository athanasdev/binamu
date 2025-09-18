<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\UserEducation;
use App\Models\SiteInfo;
use App\Models\ApplicationForm;
use App\Models\GameBet;
use App\Models\SiteImage;

use Carbon\Carbon;
use Auth;
use Hash;
use Str;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::latest()->get();
        return view('admin.agent.index', compact('data'));
    }

    public function user_bets(){
        $datas = GameBet::latest()->paginate(50);
        return view('admin.agent.user_bets', compact('datas'));
    }

    public function active_agent()
    {
        $data = User::latest()->where('status', 1)->get();
        return view('admin.agent.active_agent', compact('data'));
    }

    public function blocked_agent()
    {
        $data = User::latest()->where('status', 0)->get();
        return view('admin.agent.blocked_agent', compact('data'));
    }

    public function agent_request()
    {
        $data = User::latest()->where('status', 2)->get();
        return view('admin.agent.agent_request', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data = User::find($id);
        return view('admin.agent.edit', compact('data'));
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


        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->balance = $request->balance;
        $user->password = Hash::make($request->password);
        $user->password_str = $request->password;
        $user->status = $request->status;
        $user->save();


        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function agent_pdf($id)
    {
        $data = User::find($id);
        $address = UserAddress::where('user_id', $id)->first();
        $education = UserEducation::where('user_id', $id)->first();


        $site_info = SiteInfo::first();
        $site_image = SiteImage::first();

        return view('admin.agent.agent_pdf', compact('data', 'address', 'education', 'site_info', 'site_image'));
    }

    public function active($id){
        $data = User::find($id);
        $data->status = 1;
        $data->save();
        $notification=array(
            'message' => 'Successfully Activated',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function inactive($id){
        $data = User::find($id);
        $data->status = 0;
        $data->save();
        $notification=array(
            'message' => 'Successfully DeActivated',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }

    public function agent_application_forms($id)
    {
        $user = Auth::user();

        $datas = ApplicationForm::where('user_id', $id)->get();

        return view('admin.agent.application_form.all_forms', compact('datas'));


    }


    public function all_forms()
    {
        $user = Auth::user();
        $datas = ApplicationForm::get();

        return view('admin.agent.application_form.all_forms', compact('datas'));


    }

    public function form_pdf($id)
    {
        $user = Auth::user();
        $data = ApplicationForm::find($id);

        $site_info = SiteInfo::first();
        $site_image = SiteImage::first();

        return view('admin.agent.application_form.form_pdf', compact('data', 'site_info', 'site_image'));


    }

    public function edit_form($id)
    {
        $data = ApplicationForm::find($id);
        return view('admin.agent.application_form.edit_form', compact('data'));
    }

    public function update_form(Request $request, $id)
    {



        $age = Carbon::parse($request->birth_date)->diff(Carbon::now())->format('%y');

        $form = ApplicationForm::find($id);
        $form->user_id = $form->user_id;
        $form->agent_bonus = $form->agent_bonus;
        $form->form_fee = $form->form_fee;
        $form->name = $request->name;
        $form->mother_name = $request->mother_name;
        $form->father_name = $request->father_name;
        $form->nationality = $request->nationality;
        $form->birth_date = $request->birth_date;
        $form->age = $age ?? '';
        $form->national_id_card_no_or_b_d_c = $request->national_id_card_no_or_b_d_c;
        $form->type_of_id = $request->type_of_id;
        $form->type_of_member = $request->type_of_member;
        $form->mobile_number = $request->mobile_number;
        $form->class = $request->class;
        $form->area = $request->area;

        $form->mobile_banking_number = $request->mobile_banking_number;
        $form->mobile_banking_type = $request->mobile_banking_type;
        $form->trx = $request->trx;
        
        $form->village_present = $request->village_present;
        $form->village_permanent = $request->village_permanent;

        $form->post_office_present = $request->post_office_present;
        $form->post_office_permanent = $request->post_office_permanent;
        
        $form->thana_present = $request->thana_present;
        $form->thana_permanent = $request->thana_permanent;

        $form->district_present = $request->district_present;
        $form->district_permanent = $request->district_permanent;


        $image = $request->file('image');
        if($image)
        {
            $image_name= Str::random(10);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name. '.' .$ext;
            $upload_path = 'images/agent_application_form/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            
            if($success)
            {
                $old_image = $request->old_image;
                if (file_exists($old_image)) {
                    unlink($request->old_image);
                }
                $form->image = $image_url;
            }
        }
        
        $form->save();


        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);


    }




}
