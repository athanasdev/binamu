<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Withdraw; 
use App\Models\Transaction; 
use App\Models\User; 

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $datas = Withdraw::latest()->get();
        return view('admin.withdraw.index', compact('datas'));
    }

    public function approved_withdraw()
    {
        $datas = Withdraw::latest()->where('status', 1)->get();
        return view('admin.withdraw.approved_withdraw', compact('datas'));
    }

    public function pending_withdraw()
    {
        $datas = Withdraw::latest()->where('status', 0)->get();
        return view('admin.withdraw.pending_withdraw', compact('datas'));
    }

    public function canceled_withdraw()
    {
        $datas = Withdraw::latest()->where('status', 2)->get();
        return view('admin.withdraw.canceled_withdraw', compact('datas'));
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
        //
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
        //
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

    public function approve(Request $request, $id){
  
        $data = Withdraw::find($id);
        $data->note = $request->note;
        $data->status = 1;
        $data->save();

        $user = User::where('id', $data->user_id)->first();

        $trx = new Transaction();
        $trx->user_id = $user->id;
        $trx->type = 'Withdraw';
        $trx->old_balance = $user->balance;
        $trx->debit = $data->amount;
        $trx->credit = 0;
        $trx->new_balance = $user->balance + $data->amount;
        $trx->decription = 'Withdraw '.$data->amount.' Coins';
        $trx->save();



        $notification=array(
            'message' => 'Successfully Activated',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function cancel($id){
        $data = Withdraw::find($id);
        $data->status = 2;
        $data->save();

        $user = User::where('id', $data->user_id)->first();

        User::where('id', $data->user_id)->update([
            'balance' => $user->balance + $data->amount,
        ]);

        $trx = new Transaction();
        $trx->user_id = $user->id;
        $trx->type = 'Withdraw';
        $trx->old_balance = $user->balance;
        $trx->debit = 0;
        $trx->credit = $data->amount;
        $trx->new_balance = $user->balance + $data->amount;
        $trx->decription = 'Withdraw '.$data->amount.' Coins';
        $trx->save();


        $notification=array(
            'message' => 'Successfully DeActivated',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }

}
