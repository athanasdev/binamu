@extends('frontend.layouts.app')

@section('title')
<title> My Team | {{ config('app.name') }}  </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection

@section('content')    

<section class="my-profile-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="my-profile-wrapper">
                    <div class="profile-top" style="background-image: url('{{asset('assets/frontend/')}}/images/counter-bg.png');">
                        <div class="profile-id">
                            <h5><span style="color: yellow;">My Referral Code:</span> {{ $user->own_refer_code }}</h5>
                            <h5><span style="color: yellow;">Share url:</span>  <span id="share_url">{{ URL::to('/') }}/refer-friend/{{ $user->own_refer_code }}</span> &nbsp;&nbsp;  <a href="#" class="copy_url" style="    background: red; padding: 6px;border-radius: 5px;"><i class="fa-solid fa-copy" style="font-size: 20px; color: white;font-weight: bold;"></i></a> </h5>
                        </div>
                        <div class="team-board">
                            <div class="team">
                                <h3>{{ $total_commission ?? '0' }} Coins</h3>
                                <p>The total commission</p>
                            </div>
                            <div class="team">
                                <h3>{{ $today_commision ?? '' }}</h3>
                                <p>To return the commission</p>
                            </div>
                            <div class="team">
                                <h3>{{ count($my_refers) }}</h3>
                                <p>Team size</p>
                            </div>
                        </div>
                    </div>
                    <div class="team-list">
                        <ul>
                            <li class="">
                                <img src="{{asset('assets/frontend/')}}/images/man.png" alt="">
                                <a href="{{ route('subordinate-list') }}">The Subordinate list <p>{{ count($my_refers) }}</p></a>
                            </li>
                            <li>
                                <img src="{{asset('assets/frontend/')}}/images/membership.png" alt="">
                                <a href="{{ route('new-register-list') }}">New Register <p>{{ $today_registration ?? 0 }}</p></a>
                            </li>
                            <li>
                                <img src="{{asset('assets/frontend/')}}/images/atm-card.png" alt="">
                                <a href="#">Recharge Today (Amount/People) <p>{{$total_recharge}}/{{ count($today_recharge) }}</p></a>
                            </li>
                            <li>
                                <img src="{{asset('assets/frontend/')}}/images/money-back-guarantee.png" alt="">
                                <a href="#">Withdraw Today (Amount/People) <p>{{$total_withdraw}}/{{ count($today_withdraw) }}</p></a>
                            </li>
                            <li>
                                <img src="{{asset('assets/frontend/')}}/images/card-payment.png" alt="">
                                <a href="#">Total Transactions Today(Amount/People) <p>{{ $total_trx_amount ?? 0 }}/{{ $total_trx_person ?? 0 }}</p></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        var copyUrlButton = document.querySelector('.copy_url');
        var shareUrlSpan = document.querySelector('#share_url');
    
        copyUrlButton.addEventListener('click', function () {
            // Create a range and a selection object
            var range = document.createRange();
            var selection = window.getSelection();
    
            // Select the text content of the share_url span
            range.selectNodeContents(shareUrlSpan);
            selection.removeAllRanges();
            selection.addRange(range);
    
            // Execute the 'copy' command
            document.execCommand('copy');
    
            // Deselect the text
            selection.removeAllRanges();
    
            // You can add a visual indication that the copy was successful here
            alert('URL copied to clipboard!');
        });
    });
    </script>

@stop