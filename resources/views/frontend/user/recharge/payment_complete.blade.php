@extends('frontend.layouts.app')

@section('title')
<title> Payment Complete | {{ config('app.name') }}  </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection

@section('content')    


<section class="payment-submit-message-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="payment-submit-wrapper">
                    <div class="image text-center">
                        <img src="{{asset('assets/frontend/')}}/images/online-payment.png" alt="">
                    </div>
                    <h6>অর্ডার পর্যালোচনা করা হচ্ছে, পর্যালোচনা এর ৩০ মিনিটের মধ্যে সম্পন্ন হবে বলে আশা করা যাচ্ছে</h6>
                    <div class="py-4 text-center">
                    <p>অর্ডার নম্বর: {{ $order->order_id }}</p>
                    <p>অর্ডারের পরিমান: {{ $order->amount_coin }} কয়েন</p>
                    <p>অর্ডারের রেট: {{ $order->rate }} </p>
                    <p>প্রকৃত অর্থপ্রদানের পরিমান: {{ $order->amount_taka }} টাকা</p>
                    </div>
                   <h5>কিছু সময় অপেক্ষা করুন আপনার {{ $site_info->site_name }} একাউন্ট এ টাকা যোগ হয়ে যাবে</h5>
                   <div class="w-100" style="text-align: center">

                        <a href="{{URL::to('/')}}">
                            <button class="recharge-btn" type="button">HOME</button>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>


@stop