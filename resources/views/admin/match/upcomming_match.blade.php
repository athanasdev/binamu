@extends('admin.layouts.app')
@section('title')
<title>{{ config('app.name') }} | Manage match</title>
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
                        <li class="breadcrumb-item active">matchs</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="container-fluid">

      <div class="row">

        <div class="col-md-12">

          <div class="card">

            <div class="card-header">

              <h3 class="card-title">Manage match</h3>

            </div>

            <!-- /.card-header -->

            <div class="card-body">

              <table id="example1" class="table table-bordered table-striped">

                <thead>

                <tr>

                  <th>Sl.</th>

                  <th>League</th>

                  <th>Team </th>

                  <th>Profite </th>

                  <th>Match Start  </th>

                  <th>Betting Start  </th>

                  <th>Status</th>

                  <th>Action</th>

                </tr>

                </thead>

                <tbody>

            @php $i=1 @endphp

            @foreach($datas as $item)

                <tr>

                  	<td>{{$i++}}</td>

                    <td> {{ $item->league->title ?? '' }}  </td>

                    <td> {{ $item->team_one }} -  {{ $item->team_two }} </td>


                    <td> {{ $item->profite }}%  </td>

                    <td> {{ $item->match_start }}  </td>

                    <td> {{ $item->betting_start }}  </td>



	                <td>

	                     {{ $item->status }}

	                </td>

                  	<td>



                        <a href="{{URL::to('admin/match/'.$item->id.'/edit')}}" title="Edit" style="float: left;margin-right: 10px;">

                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>

                            </button>

                        </a>




                        <form action="{{URL::to('admin/match/'.$item->id)}}" method="post">

                          @csrf

                          @method('DELETE')

                          <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i></button>

                        </form>



                  	</td>

                </tr>

				@endforeach

	

                </tfoot>

              </table>

            </div>

            <!-- /.card-body -->

          </div>

          <!-- /.card -->



        </div>

        <!-- /.col -->

      </div>

      <!-- /.row -->

    </section>

</div>



@endsection