@extends('frontend.layouts.app')

@section('title')
<title> Match | {{ config('app.name') }}  </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection

@section('content')    


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

<section class="sport-details-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
               <div class="sport-details-wrapper">
                <div class="sport-wrapper primary-formate" style="background-image: url('assets/images/counter-bg.png');">
                    <div class="sport-left text-start">
                        <div class="image">
                            <img src="{{asset($match->team_one_logo)}}" alt="">
                        </div>
                        <h5>{{ $match->team_one }}</h5>
                        <h6><span><i class="fa-regular fa-clock"></i></span> {{ $formattedDateTime }}</h6>
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
                        <h6><span><i class="fa-regular fa-clock"></i></span> {{ $formattedDateTime }}</h6>
                    </div>
                </div>
                <div class="volume ps-3">
                    <p style="color:green"><strong>Volume:</strong> <span>{{ $formattedAmount }}</span> </p>
                </div>
                <div class="sport-details-tab-wrapper">
                    <div class="">
                        <ul class="nav nav-pills mb-1 sport-details-tab" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="pills-fulltime-tab" data-bs-toggle="pill" data-bs-target="#pills-fulltime" type="button" role="tab" aria-controls="pills-fulltime" aria-selected="true">Full Time</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="pills-halftime-tab" data-bs-toggle="pill" data-bs-target="#pills-halftime" type="button" role="tab" aria-controls="pills-halftime" aria-selected="false">Half Time</button>
                            </li>
                          </ul>
                          <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-fulltime" role="tabpanel" aria-labelledby="pills-fulltime-tab">
                                <div class="sport-details">
                                    <ul>

                                        @foreach($full_time_scores as $item)
                                        <li>
                                            <span>{{ $item->demo_score }}</span>
                                            

                                            @if($item->is_profitable == 1)
                                            <button type="button" class="btn" onclick="getBetPopup({{$item->id}})" data-bs-toggle="modal" data-bs-target="#bedModal" style="background: #f51212">
                                                100% Profitable
                                            </button>   
                                            @endif   

                                            <span>{{ $item->percentage }}%</span>
                                        </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-halftime" role="tabpanel" aria-labelledby="pills-halftime-tab">
                                <div class="sport-details">
                                    <ul>
                                        @foreach($first_half_time_scores as $item)
                                        <li>
                                            <span>{{ $item->demo_score }}</span>
                                            

                                            @if($item->is_profitable == 1)
                                            <button type="button" class="btn" onclick="getBetPopup({{$item->id}})" data-bs-toggle="modal" data-bs-target="#bedModal" style="background: #f51212">
                                                100% Profitable
                                            </button>   
                                            @endif   

                                            <span>{{ $item->percentage }}%</span>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div> 
                            </div>
                            
                          </div>
                    </div>
                </div>
               </div>
            </div>
        </div>
    </div>
 </section>

<!-- Modal -->
<div class="modal fade" id="bedModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">

    </div>
  </div>


<script>
    function getBetPopup(val){

        var datastr = "demo_score_id=" + val;

        $.ajax({
            type: "get",
            url: "<?php echo route('get_bet_popup'); ?>",
            data: datastr,
            cache: false,
            beforeSend: function() {
                // setting a timeout
            },
            success: function(data) {
                $('.modal-dialog').html(data)
            },
            error: function(jqXHR, status, err) {
                alert(status);
                console.log(err);
            },
            complete: function() {
                // alert("Complete");
            }
        });
    }
</script>

@stop