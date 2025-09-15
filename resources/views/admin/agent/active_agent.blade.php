@extends('admin.layouts.app')
@section('title')
<title>{{ config('app.name') }} | Active User</title>
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
                    <h1>Active User </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Active User </li>
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
                                <h3 class="card-title">Active User </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Password</th>
                                        <th>Trade Password</th>
                                        <th>Balance ( Coins )</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $i=1; @endphp
                                    @foreach($data as $item)

                                    <tr>
                                        <td>{{$i}}</td>
                                      
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td>{{$item->password_str}}</td>
                                        <td>{{$item->trade_password_str}}</td>
                                        <td>{{$item->balance}}</td>
                                        
                                        <td>

                                            @if($item->status == 1)
                                                <div class='badge badge-success badge-shadow'>Active</div>
                                            @elseif($item->status == 2)
                                                <div class='badge badge-warning badge-shadow'>Pending</div>
                                            @else
                                                <div class='badge badge-warning badge-shadow'>Blocked</div>
                                            @endif
                                          
                                        </td>
                                        <td>

                                            <a href="{{URL::to('admin/agent/'.$item->id.'/edit')}}">
                                                
                                                <button class="btn btn-primary btn-sm"> <span class="fa fa-edit"></span> </button>

                                            </a>



                                        </td>
                                    </tr>
                                    @php $i++; @endphp
                                    @endforeach
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
