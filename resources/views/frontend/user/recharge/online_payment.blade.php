@extends('frontend.layouts.app')

@section('title')
<title> Online Recharge | {{ config('app.name') }}  </title>
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
                            {{-- <li>
                                <span><img src="{{asset('assets/frontend/')}}/images/cash-withdrawal.png" alt=""></span>
                                <a href="{{ route('commercial-payment') }}">
                                    <h4>Commercial</h4>
                                </a>
                            </li> --}}

                            <li>
                                <span><img src="{{asset('assets/frontend/')}}/images/pay_logo.png" alt="online payment"></span>
                                <a href="{{ route('onepay-payment') }}">
                                    <h4>One Pay</h4>
                                </a>
                            </li>
                        </ul>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
</section>


@stop