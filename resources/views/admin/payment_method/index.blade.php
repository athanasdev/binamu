@extends('admin.layouts.app')
@section('title')
<title> Manage Method  | {{ config('app.name') }} </title>
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
                    <h1>Method </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Method </li>
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
                                <h3 class="card-title">Manage Method information</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">



								<table id="example1" class="table table-bordered table-striped">
								  <thead>
									  <tr>
										  <th>Sl</th>
										  <th>Method Name</th>
										  <th>Number</th>
										  <th>poundage</th>
										  <th>Status</th>
										  <th>Action</th>
									  </tr>
								  </thead>
								  <tbody>
									  @php $i=1; @endphp
									  @foreach ($methods as $method)
									   <tr>
										   <td>{{$i}}</td>
										   <td>{{$method->name}}</td>
										   <td>{{$method->number}}</td>
										   <td>{{$method->poundage}} %</td>
										   <td>
											   @php
												   if($method->status == 1){
												   echo  "<div class='badge badge-success badge-shadow'>Active</div>";
												   }else{
												   echo  "<div class='badge badge-danger badge-shadow'>Inactive</div>";
												   }
											   @endphp
										   </td>
										   <td>

										   	<div class="row">
										
											   <?php  if($method->status == 1){ ?>
												   <a href="{{route('inactive-method',[$method->id])}}"
													  class="btn btn-success btn-sm ml-2" title="Inactive">Inactive</a>
												   <?php }else{ ?>
												   <a href="{{route('active-method',[$method->id])}}"
													  class="btn btn-warning btn-sm ml-2" title="Active">Active</a>
												<?php } ?>

                                                <a href="{{route('payment_method.edit',[$method->id])}}" class="btn btn-primary btn-sm ml-2 mr-2">Edit</a>

                                            	<form action="{{URL::to('admin/payment_method/'.$method->id)}}" method="post">
						                        	@csrf
						                        	@method('DELETE')
						                        	<button class="btn btn-danger btn-sm" type="submit">Delete</button>
						                        </form>

										   	</div>


										   </td>
									   </tr>
									   @php $i++ @endphp
									  @endforeach
								  </tbody>
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
