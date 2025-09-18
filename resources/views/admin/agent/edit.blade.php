@extends('admin.layouts.app')
@section('title')
<title>{{ config('app.name') }} | Edit user</title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('content')

<link rel="stylesheet" href="{{asset('assets/frontend/')}}/dist/css/tailwind.css">


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>user Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">user Form</li>
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
                                <h3 class="card-title">Edit user information</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                                <form role="form" action="{{route('agent.update', $data->id)}}" method="post">
                                    @csrf
                                     @method('patch')
                                    <div class="card-body">


                                        <div class="row">




                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Name</label>
                                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Name" value="{{ $data->name }}">

                                                </div>
                                            </div>



                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">email</label>
                                                    <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="email" value="{{ $data->email }}">

                                                </div>
                                            </div>

                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Blance</label>
                                                    <input type="text" name="balance" class="form-control" id="exampleInputEmail1" placeholder="balance" value="{{ $data->balance }}">

                                                </div>
                                            </div>


                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Password</label>
                                                    <input type="text" name="password" class="form-control" id="exampleInputEmail1" placeholder="email" value="{{ $data->password_str }}">

                                                </div>
                                            </div>

                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="custom-select" name="status">
                                                        <option value="1" @php if ($data['status'] == 1) { echo "selected"; } @endphp>Active</option>
                                                        <option value="0" @php if ($data['status'] == 0) { echo "selected"; } @endphp>Inactive</option>
                                                    </select>
                                                </div>
                                            </div>





                                        </div>



                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>



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
