@extends('admin.layouts.app')
@section('title')
<title> Manage Approved Withdraw  | {{ config('app.name') }} </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Approved Withdraw </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Approved Withdraw </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- right column -->
                <div class="col-md-12">
                    <!-- general form elements disabled -->
                    <div class="card card-warning">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Manage Approved Withdraw </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>User ID </th>
                                        <th>User </th>
                                        <th>Payment Method</th>
                                        <th>Account Number</th>

                                        <th>Request  ( Coin )</th>
                                        <th>Poundage  ( % )</th>
                                        <th>Cut  ( Coin )</th>
                                        <th>Rest  ( Coin )</th>
                                        <th>Rate</th>
                                        <th>Amount ( Taka )</th>


                                           <th>Note</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php 
                                        $i=1; 
                                        $total_coins = 0;
                                        $total_taka = 0;
                                    @endphp
                                    @foreach($datas as $item)
                                    
                                    <?php

                                        $payment_method = App\Models\PaymentMethod::where('id', $item->payment_method)->first();

                                        $total_coins = $total_coins + $item->rest_coin;
                                        $total_taka = $total_taka + $item->amount_taka;
                                    ?>

                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$item->user->unique_id ?? ''}}</td>
                                        <td>{{$item->user->name ?? ''}}</td>
                                        <td>

                                            {{ $payment_method->name ?? '' }}


                                        </td>

                                        <td>{{$item->account_number}}</td>


                                        <td>{{$item->amount}}</td>
                                        <td>{{$item->poundage}}</td>
                                        <td>{{$item->cut_coin}}</td>
                                        <td>{{$item->rest_coin}}</td>
                                        <td>{{$item->rate}}</td>


                                        <td>{{$item->amount_taka}}</td>
                                        <td>{{$item->note ?? ''}}</td>
                                        
                                        <td>

                                            @if($item->status == 1)
                                                <div class='badge badge-success badge-shadow'>Approved</div>
                                            @elseif($item->status == 2)
                                                <div class='badge badge-danger badge-shadow'>Cancel</div>
                                            @else
                                                <div class='badge badge-warning badge-shadow'>Pending</div>
                                            @endif
                                          
                                        </td>
                                        <td>

                                            @if($item->status == 0)
                                                
                                                <div class="row">
                                                        
                                                    <form action="{{route('approve-withdraw',[$item->id])}}" method="post">
                                                        @csrf
                                                        
                                                        <input name="note" placeholder="Note" requried />
                                                        
                                                        <button class="btn btn-success btn-sm" title="Approve"><i class="fa fa-arrow-up"></i> Approved</button>
                                                        
                                                    </form>
    
                                                    <!--<a href="{{route('approve-withdraw',[$item->id])}}" class="btn btn-success btn-sm" title="Approve"><i class="fa fa-arrow-up"></i> Approved</a>-->
                                              
    
                                                    <a href="{{route('cancel-withdraw',[$item->id])}}" class="btn btn-danger btn-sm" title="Cancel"><i  class="fa fa-arrow-down"></i> Cancel</a>     
                                                    
                                                </div>



                                            @endif



                                        </td>
                                    </tr>
                                    @php $i++; @endphp
                                    @endforeach
                                         
                                    
                                    </tbody>
                                    
                                    <tfoot>
                                              
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><b>{{ $total_coins  }} Coins</b></td>
                                            <td></td>
                                            <td><b>{{ $total_taka  }} Taka</b></td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                        </tr>  
                                    </tfoot>
                                    
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card-header -->

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
