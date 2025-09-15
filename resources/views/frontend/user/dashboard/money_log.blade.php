@extends('frontend.layouts.app')

@section('title')
<title> Money Log | {{ config('app.name') }}  </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection

@section('content')    

<section class="money-blog-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="money-log-table-wrapper">
                    <ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="pills-money-tab" data-bs-toggle="pill" data-bs-target="#pills-money" type="button" role="tab" aria-controls="pills-money" aria-selected="true">MoneyLog</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="pills-recharge-tab" data-bs-toggle="pill" data-bs-target="#pills-recharge" type="button" role="tab" aria-controls="pills-recharge" aria-selected="false">Recharge</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="pills-withdraw-tab" data-bs-toggle="pill" data-bs-target="#pills-withdraw" type="button" role="tab" aria-controls="pills-withdraw" aria-selected="false">withdraw</button>
                        </li>
                      </ul>
                      <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-money" role="tabpanel" aria-labelledby="pills-money-tab">
                            <div class="table-body-wrapper">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">Time</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Describe</th>
                                      </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($logs as $item)
                                        <tr>
                                        <td> {{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }} </td>
                                        <td>{{ $item->type }}</td>
                                        <td>{{ $item->decription }}</td>
                                      </tr>
                                    @endforeach
                                 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-recharge" role="tabpanel" aria-labelledby="pills-recharge-tab">
                            <div class="table-body-wrapper">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">Time</th>
                                        <th scope="col">Method</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Status</th>
                                      </tr>
                                    </thead>
                                    <tbody>
            
                                        @foreach($recharges as $item)
                                            <tr>
                                                <td> {{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }} </td>
                                                <td> {{ $item->payment_method->name ?? '' }}</td>
                                                <td> {{ $item->amount_coin ?? '' }} Coins </td>
                                                <td>
                                                    @if($item->status == 1)
            
                                                        <span> Approved </span>
            
                                                    @else
            
                                                        <span> Pending </span>
            
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-withdraw" role="tabpanel" aria-labelledby="pills-withdraw-tab">
                            <div class="table-body-wrapper">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">Time</th>
                                        <th scope="col">Method</th>
                                        <th scope="col">Acount Number</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Status</th>
                                      </tr>
                                    </thead>
                                    <tbody>
            
                                        @foreach($withdraws as $item)
            
                                            <?php
                                                $currentDateTime = $item->created_at;
                                                $newDateTime = date('h:i A', strtotime($currentDateTime));
            
                                                $payment_method = App\Models\PaymentMethod::where('id', $item->payment_method)->first();
            
                                            ?>
            
                                            <tr>
                                                <td>{{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }} {{ $newDateTime }} </td>
                                                <td> {{ $payment_method->name ?? '' }}</td>
                                                <td> {{ $item->account_number ?? '' }}</td>
                                                <td> {{ $item->amount ?? '' }} Coins </td>
                                                <td>
            
                                                    @if($item->status == 1)
            
                                                        <span>Approved</span>
            
                                                    @elseif($item->status == 2)
            
                                                        <span>Cancle</span>
            
                                                    @else
            
                                                        <span>Pending</span>
            
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop