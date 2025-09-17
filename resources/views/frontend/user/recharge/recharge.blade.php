@extends('frontend.layouts.app')

@section('title')
<title> Recharge | {{ config('app.name') }}  </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection

@section('content')    


<section class="recharge-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="recharge-wrapper">
                    <div class="recharge-payment-top" style="background-image: url('{{asset('assets/frontend/')}}/images/counter-bg.png');">
                        <ul>
                            <li>
                                <span><img src="{{asset('assets/frontend/')}}/images/usdt.png" alt="usdt"></span>
                                <a href="{{ route('usdt-payment') }}">
                                    <h4>USDT</h4>
                                    <p>A Single transation minimum of {{$site_info->min_deposit_usdt ?? 0}} Coins</p>
                                </a>
                            </li>
                            <li>
                                <span><img src="{{asset('assets/frontend/')}}/images/online-payment.png" alt="online payment"></span>
                                <a href="{{ route('online-payment') }}">
                                    <h4>Online payment</h4>
                                    <p>A minimum of {{$site_info->min_deposit_online ?? 0}} Coins and a maximum of {{$site_info->max_deposit_online ?? 0}} Coins</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="reacharge-note">
                        <h4>Notes:</h4>
                        {!! $site_info->privacy ?? '' !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




@stop