@extends('frontend.layouts.app')

@section('title')
<title> USDT Payment Preview | {{ config('app.name') }}  </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection

@section('content')    

<section class="my-profile-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <form action="{{ route('usdt-payment-information', ['amount' => $coin_amount, 'payment_method_id' => $payment_method->id, 'order_id' => $order_id]) }}" method="get">
          
                    <div class="my-profile-wrapper payment-preview-wrapper-main">
                        <div class="profile-top" style="background-image: url('assets/images/counter-bg.png');">
                            <div class="profile-id">
                                <h5>Order ID: <span style="color:yellow">{{ $order_id }}</span></h5>
                            </div>
                            <div class="w-100">
                                <h3>Amount : <span style="color:yellow">{{ $coin_amount }}</span> <span>USDT</span></h3>
                            </div>
                        </div>

                        <div class="payment-review-wrapper">
                            {{-- Deposit Address --}}
                            <div class="form-group mb-3 text-center">
                                <label for="">Deposit Address</label>
                                <p class="fw-bold" style="font-size: 16px; word-wrap: break-word;">
                                    {{ $payment_method->wallet_address }}
                                </p>
                            </div>

                            {{-- QR Code --}}
                            <div class="form-group mb-3 text-center">
                                <label for="">Scan to Pay</label>
                                <br>
                                <img src="https://api.qrserver.com/v1/create-qr-code/?data={{ urlencode($payment_method->wallet_address) }}&size=200x200" 
                                     alt="QR Code" class="img-fluid rounded shadow">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Your Account Number</label>
                                <input type="text" class="form-control shadow-none" name="sender_account_no" placeholder="Enter your account number" required>
                            </div>


                        
                            <div class="form-group mb-3">
                                <label for="">Payment Method</label>
                                <input type="text" class="form-control shadow-none" value="{{ $payment_method->name }}" readonly>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Payment Now</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

@stop
