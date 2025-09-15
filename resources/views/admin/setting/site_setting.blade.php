@extends('admin.layouts.app')
@section('title')
    <title>{{ config('app.name', 'Laravel') }} | Dashboard</title>
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Setting Section</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Footer Update Form</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
<!-- Main content -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">



                <li class="nav-item"><a class="nav-link " href="#activity" data-toggle="tab">Logo</a></li>


                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Favicon</a></li>

                <li class="nav-item"><a class="nav-link active" href="#siteInfo" data-toggle="tab">Site Info</a></li>


              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">

                @include('admin.setting.logo')

                @include('admin.setting.favicon')

                @include('admin.setting.site_info')
               
               
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
    </div>
    <!-- /.content-wrapper -->

@endsection
@section('script')
<script src="{{asset('admin/asset')}}/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $( document ).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click', '.add', function(){
            var html = '';
            html += '<tr>';
            html += '<td><input type="file" name="image[]" class="form-control" required/></td>';
            html += '<td><input type="text" name="link[]" class="form-control" placeholder="link"/></td>';
            html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="fa fa-minus-circle"></span></button></td></tr>';
            $('#productImage').append(html);
        });

        $(document).on('click', '.remove', function(){
            $(this).closest('tr').remove();
        });


        token = $( "input[value='_token']" ).val();
        $('#title').on('keyup',function(){
        data = {
            "_token": token,
            "str": $(this).val()
        };

    });
});
</script>
@endsection
