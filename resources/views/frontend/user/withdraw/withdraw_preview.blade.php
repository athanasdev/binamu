@extends('frontend.layouts.app')

@section('title')
<title> Withdraw Preview | {{ config('app.name') }}  </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection

@section('content')    

<section class="my-profile-area">
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-6">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('submit-withdraw', ['amount' => $coin_amount, 'payment_method_id' => $payment_method->id]) }}" method="get">
          
                    <div class="my-profile-wrapper payment-preview-wrapper-main">
                        <div class="profile-top" style="background-image: url('assets/images/counter-bg.png');">
                            
                            <div class="">
                                <div class="w-100">
                                    <h3>Amount : <span style="color:yellow">{{$coin_amount}}</span> <span>Coins</span></h3>
                                </div>
                            </div>
                        </div>
                        <div class="payment-review-wrapper">
                            <div class="form-group mb-3">
                                <label for="">Your Account Number</label>
                                <input type="text" class="form-control shadow-none" name="account_number" placeholder="" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Payment Method</label>
                                <input type="text" class="form-control shadow-none" placeholder="{{ $payment_method->name }}" readonly disabled>
                            </div>
                            <button type="submit">Payment Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@stop