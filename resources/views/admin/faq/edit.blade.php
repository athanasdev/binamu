@extends('admin.layouts.app')
@section('title')
<title>Edit FAQ | {{ config('app.name') }}  </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit FAQ Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


	<section class="content">

	    <div class="container-fluid">

	        <div class="row">

	          <!-- left column -->

	          	<div class="col-md-12">



		            @if ($errors->any())

		                <div class="alert alert-danger">

		                    <ul>

		                        @foreach ($errors->all() as $error)

		                            <li>{{ $error }}</li>

		                        @endforeach

		                    </ul>

		                </div>

		            @endif

	          		

		            <!-- Horizontal Form -->

			            <div class="card card-info">

			              <div class="card-header">

			                <h3 class="card-title">Edit FAQ</h3>

			              </div>

			              <!-- /.card-header -->

			              <!-- form start -->


		              <form class="form-horizontal" action="{{URL::to('admin/faq/'.$faq->id)}}" method="post" enctype="multipart/form-data">



		              	@csrf

		              	@method('PATCH')

			                <div class="card-body">

			                  <div class="form-group row">

			                    <label for="inputEmail3" class="col-sm-3 col-form-label">Title</label>

			                    <div class="col-sm-9">

			                      <input type="text" class="form-control" name="title" placeholder="Title" value="{{ $faq->title }}">

			                    </div>

			                  </div>			                  


			                  <div class="form-group row">

			                    <label for="inputEmail3" class="col-sm-3 col-form-label">Description</label>

			                    <div class="col-sm-9">

			                      <textarea name="description" class="form-control" id="summernote" cols="30" rows="10">{!! $faq->description !!}</textarea>

			                    </div>

			                  </div>			                  



			                  <div class="form-group row">

			                    <label for="inputPassword3" class="col-sm-3 col-form-label">Status</label>

			                    <div class="col-sm-9">

			                      <select name="status" id="" class="form-control">

			                      	<option value="1" @php echo $faq->status==1?"selected":""; @endphp>Active</option>

                        			<option value="0" @php echo $faq->status==0?"selected":""; @endphp>Inactive</option>

			                      </select>

			                    </div>

			                  </div>

			                </div>

			                <!-- /.card-body -->

			                <div class="card-footer">

			                  <button type="submit" class="btn btn-info">Save</button>

			                  <button type="reset" class="btn btn-default float-right">Cancel</button>

			                </div>

			                <!-- /.card-footer -->

			              </form>

		            </div>

		            <!-- /.card -->

				</div>

			</div>

		</div>

	</section>


</div>


@endsection