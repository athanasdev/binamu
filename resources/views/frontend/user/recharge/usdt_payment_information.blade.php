@extends('frontend.layouts.app')

@section('title')
<title> USDT Payment Information | {{ config('app.name') }}  </title>
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

                <form action="{{ route('usdt-payment-confirm') }}" method="post">
                    @csrf
                    <div class="payment-info-wrapper">
                        <div class="info-item">
                            <h5>Step -1: {{ $payment_method->name ?? '' }} Copy  This Number</h5>
                            <input type="text" value="{{ $payment_method->id }}" name="payment_method_id" hidden>
                            <ul>
                                <li>{{ $payment_method->name ?? '' }} Number: 
                                    <span style="color: red; font-weight: bold" class="account_number">{{ $payment_method->number ?? '' }}</span> 
                                    <span class="copy" style="cursor: pointer"><i class="fa-solid fa-copy" style="font-size: 30px;"></i></span> 
                                </li>

                                <input type="text" value="{{ $sender_account_no }}" name="sender_account_no" hidden>
                                <input type="text" value="{{ $order_id }}" name="order_id" hidden>

                                <li> 1 Coin = {{$rate}} USDT | Your Total Coin = {{ $coin_amount }} | Your Total USDT = {{ $coin_amount * $rate }} USDT </li>
                                <li> Please send <span style="color:green"><strong>{{ $coin_amount * $rate }} USDT</strong></span> to this number above </li>
                            </ul>
                        </div>
                        <div class="info-item">
                            <input type="text" value="{{ $coin_amount }}" name="amount_coin" hidden>

                            <h5>Step-2: {{ $payment_method->name ?? '' }} Transfer the amount of USDT, how much you want to recharge via TRC20 transfer</h5>
                            <ul>
                                <li>Please confirm your TrxID after paying USDT.</li>
                            </ul>
                        </div>

                        <div class="info-item" style="padding: 10px">
                            <h5>
                                Step-3: Please enter the TrxID transaction ID to complete the recharge. </h5>

                            @if($payment_method->demo_trx_image)
                            <div class="text-center">
                                <img src="{{asset($payment_method->demo_trx_image ?? '')}}" alt="">
                            </div>
                            @endif

                            <span><strong>Transaction ID</strong></span>
                            <input type="text" class="form-control shadow-none p-2" name="trx_id" placeholder="TrxID" required>
                            <ul>
                                <li>Enter the <span style="color: red; font-weight: bold"> {{ $payment_method->trx_id_length ?? '' }}</span>  digit Trx ID after {{ $payment_method->name ?? '' }} send money</li>
                            </ul>
                        </div>
                        <div class="info-item">
                        <button type="submit">Confirm payment
                        </button>
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