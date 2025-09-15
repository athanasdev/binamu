@extends('admin.layouts.app')
@section('title')
<title>{{ config('app.name') }} | Application forms</title>
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
                    <h1>Application forms </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Application forms </li>
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
                                <h3 class="card-title">Application forms </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Father Name</th>
                                        <th>Mother Name</th>
                                        <th>Date of birth</th>
                                        <th>NID/BC</th>
                                        <th>Number</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $i=1; @endphp
                                    @foreach($datas as $item)
                                    <tr>
                                        <td>{{$i}}</td>
                                       <td>
                                            @if($item->image)
                                            
                                                <a href="{{ asset($item->image) }}" target="_blank"><img src="{{ asset($item->image) }}" alt="" style="width: 50px;border: 2px solid; padding: 3px;"></a>

                                            @else

                                            @endif
                                        </td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->father_name}}</td>
                                        <td>{{$item->mother_name}}</td>
                                        <td>{{$item->birth_date}}</td>
                                        <td>{{$item->national_id_card_no_or_b_d_c}}</td>
                                        <td>{{$item->mobile_number}}</td>
                                      php
                                        </td>
                                        <td>

                                        	<a href="{{ route('edit-form', $item->id) }}">
                                        		
                                            	<button class="btn btn-primary btn-sm"> <span class="fa fa-edit"></span> </button>

                                        	</a>

                                        	<a href="{{ route('form-pdf', $item->id) }}" target="_blank">
                                        		
                                            	<button class="btn btn-primary btn-sm"> <span class="fa fa-book"></span> </button>

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
