@extends('frontend.layouts.app')

@section('title')
<title> Home | {{ config('app.name') }}  </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection

@section('content')    

    <section class="marquee-section">
        <div class="container">
            <div class="marquee-container">
                <marquee behavior="" direction=""> {{ $site_info->marquee ?? '' }} </marquee>
                <div class="marquee-icon-left">
                    <span class="pe-2"><i class="fa-solid fa-volume-high"></i></span>
                </div>
            </div>
        </div>
    </section>

    <div class="banner-slider-section">
        <div class="container">
            <div class="banner-item-main">

                @foreach($sliders as $item)
                <div class="banner-item">
                    <img src="{{asset($item->image)}}" alt="">
                </div>
                @endforeach

            </div>
        </div>
    </div>
 <!-- start:: top up section -->
    <section class="top-up-section">
        <div class="container">
            <div class="top-up-container d-md-flex justify-content-between w-100">
                <div class="top-up-user-name-left me-4">
                    <div class="top-up-item top-up-item-1" width="100%">
                        <div class="top-up-user-name d-flex">
                            <p class="">Alamin04</p>
                            <span>VIP 0</span>
                        </div>
                        <div>
                            <h5 class="fw-bold mt-2">TK 00.00</h5>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between top-up-user-name-right">
                    <div class="top-up-item top-up-item-right">
                        <img src="{{asset('public/assets/frontend/')}}/images/recharge.png" alt="">
                        <p>রিচার্জ</p>
                    </div>

                    <div class="top-up-item top-up-item-right">
                        <img src="{{asset('public/assets/frontend/')}}/images/taka.png" alt="">
                        <p>টাকা</p>
                    </div>


                    <div class="top-up-item top-up-item-right">
                        <img src="{{asset('public/assets/frontend/')}}/images/vip.png" alt="">
                        <p>VIP</p>
                    </div>

    
                    <div class="top-up-item top-up-item-right">
                        <img src="{{asset('public/assets/frontend/')}}/images/grahok.png" alt="">
                        <p>গ্রাহক</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- end:: top up section -->

    <!-- start:: compitition section -->
        <section class="tab-section">
            <div class="container">
                <div class="tab-container">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                        <li class="nav-item" role="presentation" style="width: 100%;">
                          <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"> <p><span><i class="fa-solid fa-fire"></i></span> Popular Match </p></button>
                        </li>

<!-- 
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"> <p><span><i class="fa-solid fa-gift"></i></span> Activity Hall </p></button>
                        </li> -->

                      </ul>




<!--                       <div class="tab-content tab-body" id="pills-tabContent">


                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            
                            fsdfsd

                        </div>



                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <p style="    text-align: center;">  No Record Found !</p>
                      
                        </div>

                      </div> -->


                            <!-- start:: play card section -->
                            <section class="play-card-section">
                                <div class="container">
                                   <div class="play-card-container">
                                    <div class="row g-4">



                                        @foreach($matchs as $item)
                                        <?php
                                            date_default_timezone_set('Asia/Dhaka');
                                            $today = Carbon\Carbon::now()->format('Y-m-d h:i');
                                            $closing_time =  $item->close_date.' '.$item->close_time;


                                            $startTime = Carbon\Carbon::parse($today);
                                            $endTime = Carbon\Carbon::parse($closing_time);

                                            $totalDuration =  $startTime->diff($endTime)->format('%H:%I:%S');


                                        ?>
                                        <div class="col-lg-6">
                                            <a href="{{ route('all-orders', $item->id) }}" style="width: 100%;color: black;">
        
                                                <div class="play-card-item">
                                                    <div class="row">
                                                        <div class="col-lg-3 col-12 pe-0">
                                                            <div class="porimap justify-content-between">
                                                                <div class="w-100">
                                                                 <p>Amount</p>
                                                                <h4>{{ $item->total_amount }}K</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-9 cart-right-wrapper">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="skor-wrapper d-flex justify-content-between align-content-center">
                                                                        <div class="skor one">
                                                                            <h4>Score {{ $item->score ?? '0-0' }}</h4>
                                                                        </div>
                                                                        <div class="skor-persent two">
                                                                            <h4>@ {{ $item->percentage ?? '0.00' }}%</h4>
                                                                        </div>
                                                                        <div class="skor-time three">
                                                                            <p class="mb-0"> {{ $item->created_at ?? '' }} </p>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="d-flex justify-content-between align-items-center cart-midle-line">
                                                                        <div class="text-start play-type one">
                                                                            <img src="{{asset('public/assets/frontend/')}}/images/footballt_1.png" alt="">
                                                                        </div>
                                                                        <div class="player-country-name two">
                                                                            <h4> {{ $item->team_one ?? '' }} </h4>
                                                                        </div>
                                                                        <div class="player-country-name three">
                                                                            <h4 class="text-info fw-bold text-center">VS</h4>
                                                                        </div>
                                                                        <div class="player-country-name four">
                                                                            <h4> {{ $item->team_two ?? '' }}</h4>
                                                                        </div>
                                                                        <div class="text-end play-type five">
                                                                            <img src="{{asset('public/assets/frontend/')}}/images/footballt_1.png" alt="">
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="d-flex justify-content-between align-items-center friend-distance pt-1">
                                                                        <h4> {{ $item->league ?? '' }} </h4>
                                                                        <p class="mb-0"> Close <span> {{ $totalDuration }} </span></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </a>
                                        </div>
                                        @endforeach



                                    </div>
                                   </div>
                                </div>
                            </section>
                            <!-- end:: play card section -->


                </div>
            </div>
        </section>
    <!-- end:: compitition section -->


@stop