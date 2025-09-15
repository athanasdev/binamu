@extends('frontend.layouts.app')

@section('title')
<title> My Profile | {{ config('app.name') }}  </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection

@section('content')    

<section class="my-profile-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="my-profile-wrapper">
                    <div class="profile-top" style="background-image: url('{{asset('assets/frontend/')}}/images/counter-bg.png');">
                        <div class="profile-id">
                            <h5>{{ $user->phone ?? '' }}</h5>
                            <h6>ID: {{ $user->unique_id ?? '' }}</h6>
                        </div>
                        <div class="d-flex w-100">
                            <div class="w-50">
                                <h3> {{ $user->balance ?? '0' }} </h3>
                                <p>Balance(Coins)</p>
                            </div>
                            <div class="w-50">
                                <h3>{{ $user->transaction_balance ?? '0' }}</h3>
                                <p>Transaction(Coins)</p>
                            </div>
                        </div>
                    </div>
                    <div class="profile-menu">
                        <ul>

                            @if($user)
                                
                                <li><a href="{{ route('recharge') }}">Recharge</a></li>
                                <li><a href="{{ route('withdraw') }}">Withdraw</a></li>
                                <li><a href="{{ route('recharge-record') }}">Recharge records</a></li>
                                <li><a href="{{ route('withdraw-record') }}">Withdraw records</a></li>
                                <li><a href="{{ route('money-log') }}">Money log</a></li>
                                <li><a href="{{ route('personal-data') }}">Personal data</a></li>

                            @endif



                            <li><a href="{{ $site_info->one_line_service_link ?? '#' }}">Online service</a></li>
                            <li><a href="{{ route('about-us') }}">About us</a></li>
                        </ul>


                        <br>

                        
                        @if($user)
                        
                        <a href="{{ route('logout') }}" style="width: 100%"><button class="" type="submit">Logout</button></a>

                        @else

                        <a href="{{ route('login') }}" style="width: 100%"><button class="" type="submit">Login</button></a>

                        @endif



                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop