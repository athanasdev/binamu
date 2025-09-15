
<?php

    $amount = $match->demo_volume;
    if ($amount >= 1000) {
        if ($amount % 1000 === 0) {
            $formattedAmount = number_format($amount / 1000) . 'k';
        } else {
            $formattedAmount = number_format($amount / 1000, 1) . 'k';
        }
    } else {
        $formattedAmount = $amount;
    }


    $originalDateTime = $match->match_start;
    $carbonDateTime = Carbon\Carbon::parse($originalDateTime);
    $formattedDateTime = $carbonDateTime->format('d-m-Y H:i:s');


?>


<div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Tranding Information</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>

    <form action="{{ route('confirm_bet') }}" method="post">
        @csrf

        <div class="modal-body bed-now-modal">

            <input type="hidden" name="match_id" value="{{ $match->id }}">
            <input type="hidden" name="score_id" value="{{ $score->id }}">
    
            <div class="sport-wrapper" style="background-image: url('assets/images/counter-bg.png');">
                <div class="sport-left text-start">
                    <div class="image">
                        <img src="{{asset($match->team_one_logo)}}" alt="">
                    </div>
                    <h5>{{ $match->team_one }}</h5>
                    <h6><span><i class="fa-regular fa-clock"></i></span>  {{ $formattedDateTime }}</h6>
                </div>
                <div class="sport-vs text-center">
                    <p>Volume</p>
                    <p>{{ $formattedAmount }}</p>
                    <h4>VS</h4>
                </div>
                <div class="sport-right text-end">
                    <div class="image">
                        <img src="{{asset($match->team_two_logo)}}" alt="">
                    </div>
                    <h5>{{ $match->team_two }}</h5>
                    <h6><span><i class="fa-regular fa-clock"></i></span>  {{ $formattedDateTime }}</h6>
                </div>
            </div>
            <div class="mb-2 invers-score">
                <p>Now Invers score: {{ $score->demo_score }}</p>
                <p>Poundage: {{ $match->profite }}%</p>
            </div>
            
        <div class="amount-display">
            <div class="widget">
                <p>Amount</p>
                <input type="number" class="form-control shadow-none amount"  name="amount" id="" onkeyup="calculateProfit(this.value)">
            </div>
            <div class="widget">
                <p>Profit %</p>
                <p style="color: green;">x {{ $score->percentage }}%</p>
            </div>
            <div class="widget">
                <p>Estimate</p>
                <p style="color: green;"> <span class="estimate_earning">0</span> COIN</p>
            </div>
        </div>

        <div class="recharge-amount-wrapper">
            <div style="text-align: center" class=" mt-2">
                <div class="loading-overlay"></div>
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
                    <div class="col-3">
                        <button type="button" onclick="selectAmount(50000)">50k</button>
                    </div>
                    <div class="col-3">
                        <button type="button" onclick="selectAmount(100000)">100k</button>
                    </div>
                    <div class="col-3">
                        <button type="button" onclick="selectAmount(500000)">500k</button>
                    </div>
                    <div class="col-3">
                        <button type="button" onclick="selectAmount({{ $user->balance }})">ALL</button>
                    </div>
                </div>
            </div>
        </div>
        
        </div>
        <div class="modal-footer d-flex justify-content-between">
        <p><strong>Balance:</strong> <span style="color: green;">{{ $user->balance }} Coins</span></p>
        <button type="submit" class="btn btn-primary">Confirm</button>
        </div>


    </form>
</div>


  <script>
    function selectAmount(val) {
        // Show loading overlay only within the recharge-amount-wrapper div
        $('.loading-overlay').text('Loading...').fadeIn();

        // Simulate an asynchronous operation (e.g., an AJAX request)
        setTimeout(function () {
            // Set the value of the .amount element
            $('.amount').val(val);

            var profit_percentage = {{$score->percentage}};

            var profit = (val * profit_percentage) / 100;

            $('.estimate_earning').text(profit);

            // Hide loading overlay after the operation is complete
            $('.loading-overlay').fadeOut();
        }, 1000); // Replace this with your actual asynchronous operation duration
    }

    function calculateProfit(val) {
        // Show loading overlay only within the recharge-amount-wrapper div
        $('.loading-overlay').text('Loading...').fadeIn();

        // Simulate an asynchronous operation (e.g., an AJAX request)
        setTimeout(function () {
            // Set the value of the .amount element
            $('.amount').val(val);

            var profit_percentage = {{$score->percentage}};

            var profit = (val * profit_percentage) / 100;

            $('.estimate_earning').text(profit);

            // Hide loading overlay after the operation is complete
            $('.loading-overlay').fadeOut();
        }, 1000); // Replace this with your actual asynchronous operation duration
    }

</script>
