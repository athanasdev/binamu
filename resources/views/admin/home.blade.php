@extends('admin.layouts.app')

@section('title')
<title> Admin Dashboard | {{ config('app.name') }}  </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
<!--           <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                  
                <?php
                    $date = date('Y-m-d');
                    $today_withdraw = App\Models\Withdraw::where('created_at', 'LIKE', '%' . $date .'%')->sum('amount');
                ?>                  
                  
                <h3 style="font-size: 28px;">{{ $today_withdraw ?? 0 }} Coins</h3>

                <p>Today Withdraw Coins</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                  
                <?php
                    $date = date('Y-m-d');
                    $today_withdraw_taka = App\Models\Withdraw::where('created_at', 'LIKE', '%' . $date .'%')->sum('amount_taka');
                ?>                  
                                    
                  
                <h3 style="font-size: 28px;"> {{ $today_withdraw_taka ?? 0 }} </h3>

                <p>Today Withrdaw Taka</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
<!--           <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                  
                <?php
                    $date = date('Y-m-d');
                    $today_withdraw_pending_coin = App\Models\Withdraw::where('created_at', 'LIKE', '%' . $date .'%')->where('status', 0)->sum('amount');
                ?>                  
                                    
                  
                <h3 style="font-size: 28px;"> {{ $today_withdraw_pending_coin ?? 0 }} </h3>

                <p>Today Withrdaw Pending Coin </p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                  
                  
                <?php
                    $date = date('Y-m-d');
                    $today_withdraw_pending_taka = App\Models\Withdraw::where('created_at', 'LIKE', '%' . $date .'%')->where('status', 0)->sum('amount_taka');
                ?>                     
                  
                <h3 style="font-size: 28px;"> {{ $today_withdraw_pending_taka ?? 0 }} </h3>

                <p>Today Withrdaw Pending Taka </p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          
          
          
          
<!--           
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                  
                  
                <?php
          
                    $available_balance = App\Models\User::where('status', 1)->sum('balance');
                    $available_taka = $available_balance / 125;
                ?>                     
                  
                <h3 style="font-size: 28px;"> {{ $available_balance ?? 0 }} ({{ $available_taka ?? 0 }} Taka)  </h3>

                <p> User's Available Coins </p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> 
           -->
          
          
          
          
          
          
          
          
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @stop