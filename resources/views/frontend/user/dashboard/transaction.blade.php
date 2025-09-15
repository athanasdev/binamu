@extends('frontend.layouts.app')

@section('title')
<title> Transactions | {{ config('app.name') }}  </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection

@section('content')    

<section class="transaction-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="transaction-wrapper">
                    <div class="accordion" id="accordionExample">
                        

                        @foreach($transactions as $item)
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="heading{{$item->id}}">
                            <button class="accordion-button shadow-none  align-items-start" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$item->id}}" aria-expanded="true" aria-controls="collapse{{$item->id}}">
                                <div class="w-75">
                                  <h5>{{ $item->team_one ?? '' }} VS {{ $item->team_two ?? '' }} </h5>
                                    <p>Transation Time</p>
                                    <p>{{ $item->created_at ?? '' }}</p>
                                </div>
                                <div class="w-50">
                                    <h5>Amount: <span style="color:yellow">{{ $item->amount ?? '' }}</span> Coins</h5>
                                </div>
                            </button>
                          </h2>
                          <div id="collapse{{$item->id}}" class="accordion-collapse collapse show" aria-labelledby="heading{{$item->id}}" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <ul>
                              <li>The start time: {{ Carbon\Carbon::parse($item->match_start ?? '') }}</li>
                              <li>
                                Transation type: 
                                @if($item->part == 1)
                                    First Half
                                @else
                                    Full time
                                @endif
                                </li>
                              <li>Transation score : {{ $item->score }}</li>
                              <li>Profit odds: {{ $item->profit_odds }}%</li>
                              <li>Estimated profit: {{ $item->estimate_profit }}</li>
                              <li>Match results: {{ $item->match_result }}</li>
                              <li>Profit results: {{ $item->profit_result }}</li>
                            </ul>
                            </div>
                          </div>
                        </div>
                        @endforeach
                     
                      </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop