@extends('frontend.layouts.app')

@section('title')
<title> All Matchs | {{ config('app.name') }}  </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection

@section('content')    


 <!-- start:: sport section  -->

 <br>

 @foreach($matches as $item)
    
    @php 
        $tomorrow = Carbon\Carbon::tomorrow();
        $formattedTomorrow = Carbon\Carbon::parse($tomorrow)->format('Y-m-d');

        $match_date_format = Carbon\Carbon::parse($item->match_start)->format('Y-m-d');

    @endphp

    @if($formattedTomorrow == $match_date_format)

    <section class="sport-area ">
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
                        if ($amount >= 1000) {
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

    @endif


@endforeach

 <!-- end:: sport section  -->






  @stop