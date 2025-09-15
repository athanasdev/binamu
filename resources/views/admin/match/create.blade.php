@extends('admin.layouts.app')
@section('title')
<title>Create match | {{ config('app.name') }}  </title>
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
                        <li class="breadcrumb-item active">match Form</li>
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

			                <h3 class="card-title">Add match</h3>

			              </div>

			              <!-- /.card-header -->

			              <!-- form start -->

			              <form class="form-horizontal" action="{{URL::to('admin/match')}}" method="post" enctype="multipart/form-data">

			              	@csrf

			                <div class="card-body">


								<div class="form-group row">

								
									<div class="col-md-4">
										<label for="inputEmail3" class="col-form-label">League</label>
										  <select name="league_id" class="form-control" id="" required>
												@foreach($leagues as $item)
												<option value="{{ $item->id }}">{{ $item->title }}</option>
												@endforeach
										  </select>
									</div>


									<div class="col-md-4">
										<label for="inputEmail3" class=" col-form-label">Match Title</label>
										<input type="text" class="form-control" name="title" placeholder="" required>
									</div>
									

									<div class="col-md-6">
										<label for="inputEmail3" class="col-form-label">Team One</label>
										<input type="text" class="form-control" name="team_one" placeholder="" required>
									</div>

									<div class="col-md-6">
										<label for="inputEmail3" class="col-form-label">Team One Logo</label>
										<input type="file" class="form-control" name="team_one_logo" placeholder="" required>
									</div>

									<div class="col-md-6">
										<label for="inputEmail3" class="col-form-label">Team Two</label>
										<input type="text" class="form-control" name="team_two" placeholder="" required>
									</div>

									
									<div class="col-md-6">
										<label for="inputEmail3" class="col-form-label">Team Two Logo</label>
										<input type="file" class="form-control" name="team_two_logo" placeholder="" required>
									</div>


									<div class="col-md-4">
										<label for="inputEmail3" class="col-form-label">Match Start At</label>
										<input type="datetime-local" class="form-control" name="match_start"  placeholder="" required>
									</div>

							

									<div class="col-md-4">
										<label for="inputEmail3" class="col-form-label">Betting Start At</label>
										<input type="datetime-local" class="form-control" name="betting_start"  placeholder="" required>
									</div>		
								

									<div class="col-md-4">
										<label for="inputEmail3" class="col-form-label">Betting End At</label>
										<input type="datetime-local" class="form-control" name="betting_end"  placeholder="" required>
									</div>		

									<div class="col-md-3">
										<label for="inputEmail3" class="col-form-label">Profit (%)</label>
										<input type="number" step="0.01" class="form-control" name="profite" required>
									</div>
									
									<div class="col-md-3">
										<label for="inputEmail3" class="col-form-label">Wining Score</label>
										<input type="text" class="form-control" name="wining_score" value="0-0" placeholder="" required>
									</div>
									

														
									<div class="col-md-3">
										<label for="inputEmail3" class="col-form-label">Demo Volume</label>
										<input type="text" class="form-control" name="demo_volume"  placeholder="" required>
									</div>
									
									
									<div class="col-md-3">
										<label for="inputPassword3" class="col-form-label">Status</label>
										<select name="status" id="" class="form-control">
											<option value="Running">Running</option>
											<option value="Upcomming">Upcomming</option>
											<option value="Completed">Completed</option>
										</select>
									</div>



									<hr>



									<div class="col-sm-12">

										<br>
										<br>
										<br>

										<label for="inputEmail3" class="col-form-label">First Half Score</label>
										<table class="table table-striped product-item-table">
											<thead>
											<tr>
												<th>Demo Score</th>
												<th>Percentage (%)</th>
												<th>Is Profitable</th>
												<th>Action</th>
											</tr>
											</thead>
											<tbody id="sellProduct">
												<tr class="product-item-row">
													
													<td>
														<input type="text" class="form-control" name="demo_score[]" required>
													</td>
											   
													<td>
														<input type="number" step="0.1"  class="form-control " name="percentage[]" required>
													</td>
													
													<td>
														<select name="is_profitable[]" class="form-control" id="" required>
															<option value="0">No</option>
															<option value="1">Yes</option>
														</select>
													</td>
												
													
													<td>
														<select name="part[]" id="" class="form-control">
															<option value="1">First Half</option>
															<option value="2">Full Time</option>
														</select>
													</td>
												
													<td>
														<button id="addRow"  type="button" class="btn btn-light btn-sm addRow "><i class="fa fa-plus-circle"></i>  
														</button>   
													</td>                                              
												</tr>
	
											</tbody>
									
	
										</table>   
	
										 
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