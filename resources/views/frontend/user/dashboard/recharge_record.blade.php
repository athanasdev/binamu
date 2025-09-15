@extends('frontend.layouts.app')

@section('title')
<title> Recharge History | {{ config('app.name') }}  </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection

@section('content')    


<section class="money-blog-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="money-log-table-wrapper">
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

                            @foreach($datas as $item)
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
            </div>
        </div>
    </div>
</section>

@stop