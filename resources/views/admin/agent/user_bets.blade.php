@extends('admin.layouts.app')
@section('title')
<title>{{ config('app.name') }} | User Bets</title>
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
                    <h1>User Bets</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                                <h3 class="card-title">User Bets </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>User Name</th>
                                        <th>Date</th>
                                        <th>Team</th>
                                        <th>Part</th>
                                        <th>Score</th>
                                        <th>Profit odds</th>
                                        <th>Estimate profit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $i=1; @endphp
                                    @foreach($datas as $item)

                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$item->user->name ?? ''}}</td>
                                        <td>{{$item->date}}</td>
                                        <td>{{$item->team_one}} VS {{$item->team_two}}</td>
                                        <td>{{$item->part}}</td>
                                        <td>{{$item->score}}</td>
                                        <td>{{$item->profit_odds}}</td>
                                        <td>{{$item->estimate_profit}}</td>
                                        
                                    </tr>
                                    @php $i++; @endphp
                                    @endforeach

                                </table>
                                {{ $datas->links() }}

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
