@extends('admin.layouts.app')
@section('title')
<title>{{ config('app.name') }} |  Agent Request</title>
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
                    <h1> Agent Request </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> Agent Request </li>
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
                                <h3 class="card-title"> Agent Request </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>প্রাথীর নাম</th>
                                        <th>পদের নাম</th>
                                        <th>বিজ্ঞপ্তি নম্বর</th>
                                        <th>যােগাযােগ</th>
                                        <th>একাউন্ট নম্বর </th>
                                        <th>এব্যাংকিং টাইপ  </th>
                                        <th>Amount ( BDT )</th>
                                        <th>TRX</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $i=1; @endphp
                                    @foreach($data as $item)
                                    <tr>
                                        <td>{{$i}}</td>
                                        
                                        <td>{{$item->candidate_name_en}}</td>
                                        <td>{{$item->post_name}}</td>
                                        <td>{{$item->notification_no}}</td>
                                        <td>{{$item->contact_number}}</td>
                                        <td>{{$item->birth_date}}</td>
                                        <td>{{$item->birth_date}}</td>
                                        <td>{{$item->agent_fee}} /-</td>
                                        <td>  </td>
                                        <td>
                                            <div class='badge badge-warning badge-shadow'>Pending</div>
                                        </td>
                                        <td>

                                            
                                            <a href="{{route('active-agent',[$item->id])}}"class="btn btn-warning btn-sm" title="Active"><i class="fa fa-arrow-up"></i></a>
                                          



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
