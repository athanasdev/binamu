@extends('frontend.layouts.app')

@section('title')
<title> Home | {{ config('app.name') }}  </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection

@section('content')    


 <!-- start:: Hero section  -->
 <section class="hero-slider-area">
    <div class="container">
        <div class="hero-wrapper">

            @foreach($sliders as $item)
            <div class="hero-item">
                <img src="{{asset($item->image)}}" alt="slider img">
            </div>
            @endforeach

        </div>
    </div>
 </section>
 <!-- end:: Hero section  -->

 <!-- start:: marque  -->
 <div class="container">
    <div class="marquee-area">
        <span><img src="{{asset('assets/frontend/')}}/images/medium-volume.png" alt=""></span>
        <marquee behavior="" direction="">{{ $site_info->marquee ?? '' }}</marquee>
    </div>
 </div>
 <!-- end:: Hero section  -->

 <!-- start:: top icon section  -->
 <section class="top-icon-section">
    <div class="container">
      <div class="top-icon-wrapper">
        <div class="row g-1 g-md-4">
            <div class="col-3">
                <div class="icon-item">
                    <a href="{{ route('recharge') }}">
                    <div class="icon">
                        <img src="{{asset('assets/frontend/')}}/images/rechargeable.png" alt="">
                    </div>
                    <p>Recharge</p>
                    </a>
                </div>
            </div>
            <div class="col-3">
                <div class="icon-item">
                    <a href="{{ route('withdraw') }}">
                    <div class="icon">
                        <img src="{{asset('assets/frontend/')}}/images/cash-withdrawal.png" alt="">
                    </div>
                    <p>Withdraw</p>
                </a>
                </div>
            </div>
            <div class="col-3">
                <div class="icon-item">
                    <a href="{{ $site_info->one_line_service_link ?? '#' }}">
                    <div class="icon">
                        <img src="{{asset('assets/frontend/')}}/images/24-hours.png" alt="">
                    </div>
                    <p>Service</p>
                </a>
                </div>
            </div>
            <div class="col-3">
                <div class="icon-item">
                    <a href="/Youbo2024.apk">
                    <div class="icon">
                        <img src="{{asset('assets/frontend/')}}/images/download.png" alt="/Youbo2024.apk">
                    </div>
                    <p>Download</p>
                </a>
                </div>
            </div>
        </div>
      </div>
    </div>
 </section>
 <!-- end:: top icon section  -->

 <!-- start:: score section  -->
 <section class="score-area">
    <div class="container">
        <div class="row g-2 g-md-4">
            <div class="col-6">
                <a href="{{ route('all-matchs') }}" style=" width: 100%;">

                    <div class="score-item" style="background-image: url('{{asset('assets/frontend/')}}/images/counter-bg.png');">
                        <div class="score-img">
                            <img src="/mesi0912.jpg" alt="">
                        </div>
                        <div class="inverse-score">
                            <p>Invers </p>
                            <p>score</p>
                        </div>
                    </div>

                </a>
            </div>
            <div class="col-6">
                <a href="{{ route('tomorrow-matchs') }}" style=" width: 100%;">
                    <div class="score-item" style="background-image: url('{{asset('assets/frontend/')}}/images/counter-bg.png');">
                        <div class="score-img">
                            <img src="/photo1706871883.jpeg" alt="">
                        </div>
                        <div class="positive-score">
                            <p>Tomorrow</p>
                            <p>Matches</p>
                        </div>

                    </div>
                </a>

            </div>
        </div>
    </div>
 </section>
 <!-- end:: score section  -->

 <!-- start:: sport section  -->


 @foreach($matchs as $item)
    <section class="sport-area">
        <div class="container">
        <a href="{{ route('details', $item->id) }}" class="w-100">
            <div class="sport-wrapper" style="background-image: url('{{asset('assets/frontend/')}}/images/counter-bg.png');">
                <div class="sport-left text-start">
                    <div class="image">
                        <img src="{{asset($item->team_one_logo)}}" alt="">
                    </div>
                    <h5>{{ $item->team_one }}</h5>

                    <?php 
                        $originalDateTime = $item->match_start;
                        $carbonDateTime = Carbon\Carbon::parse($originalDateTime);
                        $formattedDateTime = $carbonDateTime->format('d-m-Y H:i:s');
                    ?>


                    <h6><span><i class="fa-regular fa-clock"></i></span> {{ $formattedDateTime }}</h6>
                </div>
                <div class="sport-vs text-center">
                    <p>Volume</p>
                    <?php

                        $amount = $item->demo_volume;
                        if ($amount && $amount >= 1000) {
                            if ($amount % 1000 === 0) {
                                $formattedAmount = number_format($amount / 1000) . 'k';
                            } else {
                                $formattedAmount = number_format($amount / 1000, 1) . 'k';
                            }
                        } else {
                            $formattedAmount = $amount;
                        }

                    ?>
                    <p>{{ $formattedAmount }}</p>
                    <h4>VS</h4>
                </div>
                <div class="sport-right text-end">
                    <div class="image">
                        <img src="{{asset($item->team_two_logo)}}" alt="">
                    </div>
                    <h5>{{ $item->team_two }}</h5>
                    <h6><span><i class="fa-regular fa-clock"></i></span> {{ $formattedDateTime }}</h6>
                </div>
            </div>
        </a>
        </div>
    </section>
@endforeach

 <!-- end:: sport section  -->










  @stop