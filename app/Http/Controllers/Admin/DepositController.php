<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Deposit; 
use App\Models\Transaction; 
use App\Models\User; 
use App\Models\SiteInfo; 

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $datas = Deposit::latest()->get();
        return view('admin.deposit.index', compact('datas'));
    }

    public function approved_deposit()
    {
        $datas = Deposit::latest()->where('status', 1)->get();
        return view('admin.deposit.approved_deposit', compact('datas'));
    }

    public function pending_deposit()
    {
        $datas = Deposit::latest()->where('status', 0)->get();
        return view('admin.deposit.pending_deposit', compact('datas'));
    }

    public function canceled_deposit()
    {
        $datas = Deposit::latest()->where('status', 2)->get();
        return view('admin.deposit.canceled_deposit', compact('datas'));
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

        $data = Deposit::find($id);
        if(!$data){
            $notification=array(
                'message' => 'Deposit not found',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        $data->status = 1;
        $data->save();

        $user = User::find($data->user_id);
        if(!$user){
            $notification=array(
                'message' => 'User not found',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
        $old_user_balance = $user->balance;

        User::where('id', $data->user_id)->update([
            'balance' => $user->balance + $data->amount_coin,
        ]);

        $site_info = SiteInfo::first();
        if(!$site_info){
            $site_info = (object) ['first_level_commission' => 0, 'second_level_commission' => 0, 'third_level_commission' => 0];
        }

        $first_level = User::where('own_refer_code', $user->refer_by)->first();

        if($first_level){

            $old_balance = $first_level->balance;
            $commisson = ($data->amount_coin * $site_info->first_level_commission) / 100;

            User::where('id', $first_level->id)->update([
                'balance' => $first_level->balance + $commisson,
            ]);

            if($commisson > 0){
                $trx = new Transaction();
                $trx->user_id = $first_level->id;
                $trx->type = 'Deposit Commision';
                $trx->old_balance = $old_balance;
                $trx->debit = 0;
                $trx->credit = $commisson;
                $trx->new_balance = $old_balance + $commisson;
                $trx->decription = '1st Level Commision '.$commisson.' Coins';
                $trx->save();
            }



        }


        $second_level = null;
        if($first_level){
            $second_level = User::where('own_refer_code', $first_level->refer_by)->first();

            if($second_level){

                $old_balance = $second_level->balance;
                $commisson = ($data->amount_coin * $site_info->second_level_commission) / 100;

                User::where('id', $second_level->id)->update([
                    'balance' => $second_level->balance + $commisson,
                ]);


                if($commisson > 0){
                    $trx = new Transaction();
                    $trx->user_id = $second_level->id;
                    $trx->type = 'Deposit Commision';
                    $trx->old_balance = $old_balance;
                    $trx->debit = 0;
                    $trx->credit = $commisson;
                    $trx->new_balance = $old_balance + $commisson;
                    $trx->decription = '2nd Level  Commision '.$commisson.' Coins';
                    $trx->save();
                }
    
            }


        }

        $third_level = null;
        if($second_level){
            $third_level = User::where('own_refer_code', $second_level->refer_by)->first();

            if($third_level){

                $old_balance = $third_level->balance;
                $commisson = ($data->amount_coin * $site_info->third_level_commission) / 100;

                User::where('id', $third_level->id)->update([
                    'balance' => $third_level->balance + $commisson,
                ]);


                if($commisson > 0){
                    $trx = new Transaction();
                    $trx->user_id = $third_level->id;
                    $trx->type = 'Deposit Commision';
                    $trx->old_balance = $old_balance;
                    $trx->debit = 0;
                    $trx->credit = $commisson;
                    $trx->new_balance = $old_balance + $commisson;
                    $trx->decription = '3rd Level Commision '.$commisson.' Coins';
                    $trx->save();
                }
    
            }

        }
        

        $trx = new Transaction();
        $trx->user_id = $user->id;
        $trx->type = 'Deposit';
        $trx->old_balance = $old_user_balance;
        $trx->debit = 0;
        $trx->credit = $data->amount_coin;
        $trx->new_balance = $old_user_balance + $data->amount_coin;
        $trx->decription = 'Deposit '.$data->amount_coin.' Coins';
        $trx->save();

        

        $notification=array(
            'message' => 'Successfully Activated',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function cancel($id){
        $data = Deposit::find($id);
        $data->status = 2;
        $data->save();
        $notification=array(
            'message' => 'Successfully DeActivated',
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }

}
