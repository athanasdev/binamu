@extends('frontend.layouts.app')

@section('title')
<title> Payment Information | {{ config('app.name') }}  </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection

@section('content')    




<section class="payment-information-area">
    <div class="container">
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

                <form action="{{ route('payment-confirm') }}" method="post">
                    @csrf
                    <div class="payment-info-wrapper">
                        <div class="info-item">
                            <h5>স্টেপ-১: {{ $payment_method->name ?? '' }} নম্বরটি কপি করুন</h5>
                            <input type="text" value="{{ $payment_method->id }}" name="payment_method_id" hidden>
                            <ul>
                                <li>{{ $payment_method->name ?? '' }} নাম্বার: 
                                    <span style="color: red; font-weight: bold" class="account_number">{{ $payment_method->number ?? '' }}</span> 
                                    <span class="copy" style="cursor: pointer"><i class="fa-solid fa-copy" style="font-size: 30px;"></i></span> 
                                </li>

                                <input type="text" value="{{ $sender_account_no }}" name="sender_account_no" hidden>
                                <input type="text" value="{{ $order_id }}" name="order_id" hidden>

                                <li> ১ কয়েন = {{$rate}} টাকা | আপনার টোটাল কয়েন = {{ $coin_amount }} | আপনার টোটাল টাকা = {{ $coin_amount * $rate }} TK </li>
                                <li>উপরের এই নাম্বার এ <span style="color:green"><strong>{{ $coin_amount * $rate }} TK</strong></span> সেন্ড মানি করুন</li>
                            </ul>
                        </div>
                        <div class="info-item">
                            <input type="text" value="{{ $coin_amount }}" name="amount_coin" hidden>

                            <h5>স্টেপ-২: {{ $payment_method->name ?? '' }} ট্রান্সফারের মাধ্যমে আপনি যে পরিমান টাকা রিচার্জ করতে চান তা আমাদের কাছে ট্রান্সফার করুন </h5>
                            <ul>
                                <li>অর্থ প্রদানের পরে অনুগ্রহ করে আপনার TrxID সুনিচ্ছিত করুন ।</li>
                            </ul>
                        </div>

                        <div class="info-item" style="padding: 10px">
                            <h5>স্টেপ-৩: রিচার্জ সম্পূর্ণ করতে অনুগ্রহ করে TrxID লেনদেন আইডি লিখুন</h5>

                            @if($payment_method->demo_trx_image)
                            <div class="text-center">
                                <img src="{{asset($payment_method->demo_trx_image ?? '')}}" alt="" style="width: 200px !important;">
                            </div>
                            @endif

                            <span><strong>Transaction ID</strong></span>
                            <input type="text" class="form-control shadow-none p-2" name="trx_id" placeholder="TrxID" required>
                            <ul>
                                <li>{{ $payment_method->name ?? '' }} সেন্ড মানি করার পর <span style="color: red; font-weight: bold"> {{ $payment_method->trx_id_length ?? '' }}</span> সংখ্যার Trx ID লিখুন</li>
                            </ul>
                        </div>
                        <div class="info-item">
                        <button type="submit">পেমেন্ট নিশ্চিত করুন</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Add a click event listener to the copy class
        document.querySelector('.copy').addEventListener('click', function () {
            // Get the text from the account_number class
            var accountNumber = document.querySelector('.account_number').textContent;

            // Create a temporary input element and set its value to the account number
            var tempInput = document.createElement('input');
            document.body.appendChild(tempInput);
            tempInput.value = accountNumber;
            tempInput.select();

            // Execute the copy command
            document.execCommand('copy');

            // Remove the temporary input element
            document.body.removeChild(tempInput);

            // You can provide visual feedback or alert the user that the text has been copied
            alert('Copied: ' + accountNumber);
        });
    });
</script>


@stop