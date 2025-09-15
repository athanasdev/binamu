@extends('admin.layouts.app')
@section('title')
<title>Edit match | {{ config('app.name') }}  </title>
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

						  <form class="form-horizontal" action="{{URL::to('admin/match/'.$data->id)}}" method="post" enctype="multipart/form-data">
							@csrf
  
							@method('PATCH')
  

			                <div class="card-body">


								<div class="form-group row">

								
									<div class="col-md-4">
										<label for="inputEmail3" class="col-form-label">League</label>
										  <select name="league_id" class="form-control" id="" required>
												@foreach($leagues as $item)
												<option value="{{ $item->id }}" @php echo $data->league_id==$item->id?"selected":""; @endphp>{{ $item->title }}</option>
												@endforeach
										  </select>
									</div>

									
									<div class="col-md-4">
										<label for="inputEmail3" class=" col-form-label">Match Title</label>
										<input type="text" class="form-control" name="title" value="{{ $data->title }}" placeholder="" required>
									</div>
									

									<div class="col-md-6">
										<label for="inputEmail3" class="col-form-label">Team One</label>
										<input type="text" class="form-control" name="team_one" value="{{ $data->team_one}}" placeholder="" required>
									</div>

									<div class="col-md-6">
										<label for="inputEmail3" class="col-form-label">Team One Logo</label>
										<input type="file" class="form-control" name="team_one_logo"  placeholder="" >

										@if(isset($data))
										<div class="form-group">
											<img src="{{ asset($data->team_one_logo) }}" alt="team_one_logo" style="width: 20%; margin-top: 8px">
											<input type="hidden" name="old_team_one_logo" value="{{ $data->team_one_logo }}">
										</div>
										@endif

									</div>

									<div class="col-md-6">
										<label for="inputEmail3" class="col-form-label">Team Two</label>
										<input type="text" class="form-control" name="team_two" value="{{ $data->team_two }}" placeholder="" required>
									</div>

									
									<div class="col-md-6">
										<label for="inputEmail3" class="col-form-label">Team Two Logo</label>
										<input type="file" class="form-control" name="team_two_logo" placeholder="" >
										
										@if(isset($data))
										<div class="form-group">
											<img src="{{ asset($data->team_two_logo) }}" alt="team_two_logo" style="width: 20%; margin-top: 8px">
											<input type="hidden" name="old_team_two_logo" value="{{ $data->team_two_logo }}">
										</div>
										@endif

									</div>


									<div class="col-md-4">
										<label for="inputEmail3" class="col-form-label">Match Start At</label>
										<input type="datetime-local" class="form-control" name="match_start" value="{{ $data->match_start }}"  placeholder="" required>
									</div>

							

									<div class="col-md-4">
										<label for="inputEmail3" class="col-form-label">Betting Start At</label>
										<input type="datetime-local" class="form-control" name="betting_start" value="{{ $data->betting_start }}"  placeholder="" required>
									</div>		
								

									<div class="col-md-4">
										<label for="inputEmail3" class="col-form-label">Betting End At</label>
										<input type="datetime-local" class="form-control" name="betting_end" value="{{ $data->betting_end }}"  placeholder="" required>
									</div>		

									<div class="col-md-3">
										<label for="inputEmail3" class="col-form-label">Profit (%)</label>
										<input type="number" step="0.01" class="form-control" name="profite" value="{{ $data->profite }}" required>
									</div>
									
									<div class="col-md-3">
										<label for="inputEmail3" class="col-form-label">Wining Score</label>
										<input type="text" class="form-control" name="wining_score" value="{{ $data->wining_score }}" placeholder="" required>
									</div>
									

														
									<div class="col-md-3">
										<label for="inputEmail3" class="col-form-label">Demo Volume</label>
										<input type="text" class="form-control" name="demo_volume" value="{{ $data->demo_volume }}"  placeholder="" required>
									</div>
									
									
									<div class="col-md-3">
										<label for="inputPassword3" class="col-form-label">Status</label>
										<select name="status" id="" class="form-control">
											<option value="Running"  @php echo $data->status=="Running"?"selected":""; @endphp>Running</option>
											<option value="Upcomming"  @php echo $data->status=="Upcomming"?"selected":""; @endphp>Upcomming</option>
											<option value="Completed"  @php echo $data->status=="Completed"?"selected":""; @endphp>Completed</option>




										</select>
									</div>



									<hr>


									<div class="col-sm-12">

										<br>
										<br>
										<br>

										<label for="inputEmail3" class="col-form-label">Score</label>
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
												@if(count($scores) > 0)


												@foreach($scores as $item)
												<tr class="product-item-row">
													
													<td>
														<input type="text" class="form-control" name="demo_score[]" value="{{ $item->demo_score }}" required>
													</td>
											   
													<td>
														<input type="number" class="form-control " name="percentage[]" value="{{ $item->percentage }}"  required>
													</td>
													
													<td>
														<select name="is_profitable[]" class="form-control"  id="" required>
															<option value="0" @php echo $item->is_profitable==0?"selected":""; @endphp>No</option>
															<option value="1" @php echo $item->is_profitable==1?"selected":""; @endphp>Yes</option>
														</select>
													</td>
												
													
													
													<td>
														<select name="part[]" id="" class="form-control">
															<option value="1" @php echo $item->part==1?"selected":""; @endphp>First Half</option>
															<option value="2" @php echo $item->part==2?"selected":""; @endphp>Full Time</option>
														</select>
													</td>
												

													<td>
														<button id="addRow"  type="button" class="btn btn-light btn-sm addRow "><i class="fa fa-plus-circle"></i>  
														</button>   
													</td>                                              
												</tr>
												@endforeach
	

												@else

												<tr class="product-item-row">
													
													<td>
														<input type="text" class="form-control" name="demo_score[]" required>
													</td>
											   
													<td>
														<input type="number" step="0.1"  class="form-control " name="percentage[]" required>
													</td>
													
													<td>
														<select name="is_profitable[]" class="form-control" id="" required>
															<option value="0" @php echo $data->is_profitable==0?"selected":""; @endphp>No</option>
															<option value="1" @php echo $data->is_profitable==1?"selected":""; @endphp>Yes</option>
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
	

												@endif

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