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
                    <div class="team-listsa">

                        <p style="text-align: center;
                        font-size: 23px;
                        font-weight: 700;
                        padding-top: 10px;
                        background: #d9d9d9;
                        padding-bottom: 10px;"> My subordinate list </p>

                        <ul>
                            @php $i = 1; @endphp
                            @foreach($my_refers as $item)
                            <li class="" style="padding: 17px;
                            border-bottom: 1px solid #c7c7c7;">
                               <span> {{ $i++ }}. </span>
                                <a href="#" style="    font-size: 18px; color: black;">{{ $item->name }}</a>
                                <span style="color: blue">Join Date: {{ Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</span>
                            </li>
                            @endforeach
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




@stop