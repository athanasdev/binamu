@extends('admin.layouts.app')
@section('title')
<title> Manage Method  | {{ config('app.name') }} </title>
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
                        <li class="breadcrumb-item active">Method Form</li>
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

			                <h3 class="card-title">Add Method</h3>

			              </div>

			              <!-- /.card-header -->

			              <!-- form start -->



					<form novalidate action="{{route('payment_method.update', [$data->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
						<div class="col-12">

							<div class="row">


								<div class="col-md-4">
									<div class="form-group">
										<h5>Type<span class="text-danger">*</span></h5>
										<div class="controls">
											<select class="form-control" name="type" required data-validation-required-message="This field is required">
												<option value="1" @php echo $data->type==1?"selected":""; @endphp>USDT</option>
												<option value="0" @php echo $data->type==0?"selected":""; @endphp>Online</option>
											</select>
										</div>
									</div>

								</div>

								<div class="col-md-4">

									<div class="form-group">
										<h5>Method Name<span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="name" class="form-control" required data-validation-required-message="This field is required" value="{{$data->name}}">
										 </div>
									</div>

								</div>
								<div class="col-md-4">

									<div class="form-group">
										<h5>Account Number <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="number" class="form-control" required data-validation-required-message="This field is required" value="{{$data->number}}">
										 </div>
									</div>

								</div>


								<div class="col-md-4">

									<div class="form-group">
										<h5>Account Holder</h5>
										<div class="controls">
											<input type="text" name="holder_name" value="{{$data->holder_name}}" class="form-control">
										 </div>
									</div>
									
								</div>

								<div class="col-md-4">

									<div class="form-group">
										<h5>Account Type</h5>
										<div class="controls">
											<input type="text" name="account_type" value="{{$data->account_type}}" class="form-control">
										 </div>
									</div>
									
								</div>

								<div class="col-md-2">

									<div class="form-group">
										<h5>TRX ID Length</h5>
										<div class="controls">
											<input type="number" name="trx_id_length" value="{{$data->trx_id_length}}" class="form-control">
										 </div>
									</div>
									
								</div>

								<div class="col-md-2">

									<div class="form-group">
										<h5> Min Withdraw </h5>
										<div class="controls">
											<input type="number" name="min_withdraw" value="{{$data->min_withdraw}}" class="form-control" required>
										 </div>
									</div>
									
								</div>

								

								<div class="col-md-2">

									<div class="form-group">
										<h5> poundage  </h5>
										<div class="controls">
											<input type="number" name="poundage"  value="{{$data->poundage}}"class="form-control" required>
										 </div>
									</div>
									
								</div>


								<div class="col-md-6">

									<div class="form-group">
										<h5>Logo</h5>
										<div class="controls">
											<input type="file" name="logo" class="form-control">


                                            @if(isset($data))
                                            <div class="form-group">
                                                <img src="{{ asset($data->logo) }}" alt="logo" style="width: 20%; margin-top: 8px">
                                                <input type="hidden" name="old_logo" value="{{ $data->logo }}">
                                            </div>
                                            @endif

										 </div>
									</div>
									
								</div>



								<div class="col-md-6">

									<div class="form-group">
										<h5>Demo Trnsaction Image</h5>
										<div class="controls">
											<input type="file" name="demo_trx_image" class="form-control">


                                            @if(isset($data))
                                            <div class="form-group">
                                                <img src="{{ asset($data->demo_trx_image) }}" alt="demo_trx_image" style="width: 20%; margin-top: 8px">
                                                <input type="hidden" name="old_demo_trx_image" value="{{ $data->demo_trx_image }}">
                                            </div>
                                            @endif

										 </div>
									</div>
									
								</div>


								<div class="col-md-6">


									<div class="form-group">
										<h5>Status<span class="text-danger">*</span></h5>
										<div class="controls">
											<select class="form-control" name="status" required data-validation-required-message="This field is required">
												<option value="1" @php echo $data->status==1?"selected":""; @endphp>Active</option>
												<option value="0" @php echo $data->status==0?"selected":""; @endphp>Inactive</option>
											</select>
										</div>
									</div>

								</div>

							</div>




							<div class="text-xs-right">
								<button type="submit" class="btn btn-rounded btn-info">Update</button>
							</div>						
						</div>
					</form>




                </div>

                <!-- /.card -->

            </div>

        </div>

    </div>

</section>


</div>

  
@endsection
@section('script')

@endsection