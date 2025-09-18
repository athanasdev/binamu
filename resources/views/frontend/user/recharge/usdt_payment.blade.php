@extends('frontend.layouts.app')

@section('title')
<title> USDT Recharge | {{ config('app.name') }}  </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection

@section('content')    

<style>
    .recharge-amount-wrapper {
        position: relative;
    }

    .loading-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5); /* Semi-transparent black overlay */
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: white;
        font-size: 20px;
        text-align: center; /* Center the text horizontally */
        z-index: 999; /* Ensure the overlay is on top */
        display: none;
    }
</style>



<section class="recharge-amount-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="recharge-amount-wrapper">
                    <div class="loading-overlay"></div>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('usdt-payment-preview') }}" method="get">
               
                        <div class="form-group">
                            <span class="mb-1"><strong>Enter USDT to Depost</strong></span>
                            <input type="text" class="form-control shadow-none amount" name="amount" placeholder="Eg. 1000 USD" required>
                        </div>
                        <div class="amount-btn-wrapper">
                            <div class="row g-sm-2 g-1">
                                <div class="col-3">
                                    <button type="button" onclick="selectAmount(500)">500</button>
                                </div>
                                <div class="col-3">
                                    <button type="button" onclick="selectAmount(1000)">1k</button>
                                </div>
                                <div class="col-3">
                                    <button type="button" onclick="selectAmount(2000)">2k</button>
                                </div>
                                <div class="col-3">
                                    <button type="button" onclick="selectAmount(3000)">3k</button>
                                </div>
                                <div class="col-3">
                                    <button type="button" onclick="selectAmount(5000)">5k</button>
                                </div>
                                <div class="col-3">
                                    <button type="button" onclick="selectAmount(10000)">10k</button>
                                </div>
                                <div class="col-3">
                                    <button type="button" onclick="selectAmount(15000)">15k</button>
                                </div>
                                <div class="col-3">
                                    <button type="button" onclick="selectAmount(20000)">20k</button>
                                </div>
                                
                            </div>
                        </div>
                        <div class="payment-method">
                            <div class="row">

                                @foreach($methods as $item)
                                <div class="col-12 col-sm-6">
                                    <div class="payment-type">
                                        <input type="radio" id="for{{$item->name}}" name="payment_method_id" value="{{$item->id}}">
                                        <label for="for{{$item->name}}"><img src="{{asset($item->logo)}}" alt="" style=" height: 32px;"></label>
                                    </div>
                                </div>
                                @endforeach
                               
                            </div>
                        </div>
                        <button class="recharge-btn" type="submit">Recharge</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    function selectAmount(val) {
        // Show loading overlay only within the recharge-amount-wrapper div
        $('.recharge-amount-wrapper .loading-overlay').text('Loading...').fadeIn();

        // Simulate an asynchronous operation (e.g., an AJAX request)
        setTimeout(function () {
            // Set the value of the .amount element
            $('.recharge-amount-wrapper .amount').val(val);

            // Hide loading overlay after the operation is complete
            $('.recharge-amount-wrapper .loading-overlay').fadeOut();
        }, 1000); // Replace this with your actual asynchronous operation duration
    }
</script>

@stop