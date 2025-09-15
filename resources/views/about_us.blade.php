@extends('frontend.layouts.app')

@section('title')
<title> Home | {{ config('app.name') }}  </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection

@section('content')    

    <!-- start:: recharge page -->
    <section class="recharge-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="recharge-wrapper p-3">
                        <h4>About</h4>
                        <hr>
                        <p>{!! $site_info->about_us !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>




@stop