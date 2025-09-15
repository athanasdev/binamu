@extends('frontend.layouts.app')

@section('title')
<title> All Orders | {{ config('app.name') }}  </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection

@section('content')    


    <section class="top-up-section">
        <div class="container">
            <div class="top-up-container d-md-flex justify-content-between w-100">

            	<div class="container">
            		<h2 style="text-align: center;">{{ $match->team_one }} - {{ $match->team_two }}</h2>

            		<br>

					<table class="table table-bordered">
					  <thead>
					    <tr>
					      <th scope="col">Score</th>
					      <th scope="col">Percentage</th>
					      <th scope="col">Amount</th>
					      <th scope="col">Order</th>
					    </tr>
					  </thead>
					  <tbody>

					    <tr>
					      <th scope="row">1-0</th>
					      <td style="color: green;">5.50%</td>
					      <td>220120K</td>
					      <td> <button class="btn btn-primary"> Order </button> </td>
					    </tr>

					    <tr>
					      <th scope="row">1-1</th>
					      <td style="color: green;">4.50%</td>
					      <td>22013420K</td>
					      <td> <button class="btn btn-primary"> Order </button> </td>
					    </tr>

					    <tr>
					      <th scope="row">0-1</th>
					      <td style="color: green;">4.50%</td>
					      <td>2204420K</td>
					      <td> <button class="btn btn-primary"> Order </button> </td>
					    </tr>
				
					  </tbody>
					</table>


            	</div>

            </div>
        </div>
    </section>
    <!-- end:: top up section -->




@stop