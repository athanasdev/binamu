@extends('frontend.layouts.app')

@section('title')
<title> Withdraw History | {{ config('app.name') }}  </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection

@section('content')    


<section class="money-blog-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="money-log-table-wrapper">
                  <div class="table-body-wrapper table-responsive">
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

                            @foreach($datas as $item)

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
</section>

@stop