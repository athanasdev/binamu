<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $methods = PaymentMethod::orderBy('id','desc')->get();
        return view('admin.payment_method.index',compact('methods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.payment_method.create');
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
            'name' => 'required',
            'number' => 'required',
            'min_withdraw' => 'required',
            'status' => 'required',

        ]);
        $data =new PaymentMethod();
        $data->name = $request->name;
        $data->type = $request->type ?? 0;
        $data->number = $request->number;
        $data->holder_name = $request->holder_name;
        $data->account_type = $request->account_type;
        $data->branch = $request->branch;
        $data->trx_id_length = $request->trx_id_length;
        $data->min_withdraw = $request->min_withdraw;
        $data->poundage = $request->poundage;
        $data->status = $request->status;

        $image = $request->file('logo');
        if($image)
        {
            $image_name= time().'_'.$image->getClientOriginalName();
            $image_full_name = $image_name;
            $upload_path = 'images/method_image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if($success)
            {
                $data->logo = $image_url;
            }
        }

        $image = $request->file('demo_trx_image');
        if($image)
        {
            $image_name= time().'_'.$image->getClientOriginalName();
            $image_full_name = $image_name;
            $upload_path = 'images/method_image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if($success)
            {
                $data->demo_trx_image = $image_url;
            }
        }


        $data->save();
        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
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
        $data = PaymentMethod::find($id);
        return view('admin.payment_method.edit',compact('data'));
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
        $data = PaymentMethod::findorfail($id);
        $data->name = $request->name;
        $data->type = $request->type ?? 0;
        $data->number = $request->number;
        $data->holder_name = $request->holder_name;
        $data->account_type = $request->account_type;
        $data->branch = $request->branch;
        $data->trx_id_length = $request->trx_id_length;
        $data->min_withdraw = $request->min_withdraw;
        $data->poundage = $request->poundage;
        $data->status = $request->status;

        $image = $request->file('logo');
        if($image)
        {
            $image_name= time().'_'.$image->getClientOriginalName();
            $image_full_name = $image_name;
            $upload_path = 'images/method_image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if($success)
            {

                $old_logo = $request->old_logo;
                if (file_exists($old_logo)) {
                    unlink($request->old_logo);
                }

                $data->logo = $image_url;
            }
        }


        $image = $request->file('demo_trx_image');
        if($image)
        {
            $image_name= time().'_'.$image->getClientOriginalName();
            $image_full_name = $image_name;
            $upload_path = 'images/method_image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if($success)
            {

                $old_demo_trx_image = $request->old_demo_trx_image;
                if (file_exists($old_demo_trx_image)) {
                    unlink($request->old_demo_trx_image);
                }

                $data->demo_trx_image = $image_url;
            }
        }

        $data->save();
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
        $data = PaymentMethod::find($id);
        $data->delete();
        $notification=array(
            'message' => 'Successfully Done',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function active_method($id){
        $data = PaymentMethod::find($id);
        $data->status = 1;
        $data->save();
        $notification=array(
            'message' => 'Successfully Activated',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function inactive_method($id){
        $data = PaymentMethod::find($id);
        $data->status = 0;
        $data->save();
        $notification=array(
            'message' => 'Successfully DeActivated',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }
    
}
