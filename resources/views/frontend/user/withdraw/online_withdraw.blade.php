@extends('frontend.layouts.app')

@section('title')
<title> Withdraw | {{ config('app.name') }}  </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection

@section('content')    

<section class="registration-area">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="registration-wrapper withdraw-wrapper">
              <div class="main-form-wrapper">
                  <h5>Withdraw</h5>

                  @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                  @endif

                  <h6 class="w-balance">Balance: <span>{{ $user->balance ?? '' }} Coins</span></h6>
                  <form action="{{ route('submit-withdraw') }}" method="get">
                  <ul>
                      <li>
                          <strong>Standard: </strong>
                          <p>The first store 500 COINS-Reach the standard 2,000 COINS</p>
                      </li>
                      <li>
                          <strong>Withdraw: </strong>
                          <p>May</p>
                      </li>
                      <li>
                          <strong>Payment methods: </strong>
                          <p>The first store 500 COINS-Reach the standard 2,000 COINS</p>
                      </li>
                      <li>
                          <strong>Payment nickname: </strong>
                          <p>{{ $user->account_holder_name ?? '' }}</p>
                      </li>
                      <li>
                          <strong>Payment account: </strong>
                          <p>{{ $user->account_no ?? '' }}</p>
                          <input type="hidden" value="{{ $user->payment_method_id }}" name="payment_method_id">
                      </li>
                      <li>
                          <strong>Poundage: </strong>
                          <p><span class="withdraw_amount">0</span>-poundage <span class="poundage">0</span>%= after-tax <span class="rest_coin"></span> Coins</p>
                           

                      </li>
                      <li>
                        <strong>Rate: </strong>
                        <p> Rate: <span class="rate">0</span>% . You will get: <span class="real_money"></span> BDT</p>
                    </li>
                      <li>
                          <label for="forAmount">Amount:</label>
                          <input type="number"  id="forAmount" name="amount" class="form-control shadow-none" onkeyup="updateRealMoneyAndPoundage(this.value)" placeholder="{{$site_info->min_withdraw_online ?? 0}}  COINS" autocomplete="off">
                          <sup>*</sup>
                      </li>
                      <li>
                          <label for="forAmount">Trade password: </label>
                           <input type="password" class="shadow-none form-control" name="trade_password" placeholder="Trade Password:" required> 
                           <sup>*</sup>
                      </li>
                  </ul>
              
                <div class="form-group mb-2">
                  <button type="submit">Submit</button>
                </div>
              </form>
              </div>
  
          <!--<div class="withdraw-notes">-->
          <!--    <h4>Notes:</h4>-->
          <!--    <ol type="1">-->
          <!--        <li>Withdrawals have been made this works: 0</li>-->
          <!--        <li>Free widthdrawal this week: 0 - this week's free withdrawal surplus:0</li>-->
          <!--        <li>Weekly widthdrawals exceed 0, Change service fee 5%</li>-->
          <!--    </ol>-->
          <!--</div>-->
  
          </div>
        </div>
      </div>
    </div>
  </section>


  <script src="{{asset('assets/frontend/')}}/js/jquery-3.7.0.min.js"></script>
  <script>

    $( document ).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    var token =  $("input[name=_token]").val();
    function updateRealMoneyAndPoundage(val){

        var payment_method_id = {{ $user->payment_method_id }};
        var datastr = "withdraw_amount=" + val + "&payment_method_id=" + payment_method_id + "&token="+token;
            $.ajax({
            type: "post",
            url: "<?php echo route('get_poundage_real_money');?>",
            data:datastr,
            cache:false,
            beforeSend: function() {
                // setting a timeout
            },
            success:function (data) {

                console.log(data);
                $('.poundage').text(data.poundage);
                $('.withdraw_amount').text(data.withdraw_amount);
                $('.rest_coin').text(data.rest_coin);
                $('.withdraw_amount_input').val(data.rest_coin);
                $('.rate').text(data.rate);
                $('.real_money').text(data.real_money);

            },
            error: function (jqXHR, status, err) {
         
                console.log(err);
            },
            complete: function () {
                // alert("Complete");
            }
        });

    }
  </script>


@stop