<?php  
$user = Auth::user();
$site_image = App\Models\SiteImage::first();
?>

<header>
    <div class="container">
        <div class="header-wrapper">
            <div class="logo">
                <a href="{{ URL::to('/') }}"><img src="{{ asset($site_image->logo) }}" alt="" style="    width: 50px;"></a>
            </div>
            <div class="menu-icon">
                <div>
                    <button class="open-btn">
                        <span><i class="fa-solid fa-bars"></i></span>
                    </button>
                </div>
                <div class="main-menu">
                    <div class="my-profile-wrapper">
                        <button class="close-btn">
                            <span><i class="fa-solid fa-xmark"></i></span>
                        </button>



                        <div class="profile-top" style="background-image: url('{{asset('assets/frontend/')}}/images/counter-bg.png'); text-align: center">


                            @if($user)

                            <div class="profile-id">
                                <h5>{{ $user->phone ?? '' }}</h5>
                                <h6>ID: {{ $user->unique_id ?? '' }}</h6>
                            </div>
                            <div class="">
                                <h3 class="mb-1" style="color:rgb(2, 254, 2)"><span>Balance: </span>  {{ $user->balance ?? '0' }} Coins</h3>
                                <h3><span>Transaction</span> {{ $user->transaction_balance ?? '0' }} Coins</h3>
                            </div>

                            @else

                            <a href="{{ URL::to('/') }}"><img src="{{ asset($site_image->logo) }}" alt="" style="    width: 68px;"></a>

                            @endif





                        </div>


                        <div class="profile-menu">
                            <ul>

                                @if($user)
                                    
                                    <li><a href="{{ route('recharge') }}">Recharge</a></li>
                                    <li><a href="{{ route('withdraw') }}">Withdraw</a></li>
                                    <li><a href="{{ route('recharge-record') }}">Recharge records</a></li>
                                    <li><a href="{{ route('withdraw-record') }}">Withdraw records</a></li>
                                    <li><a href="{{ route('money-log') }}">Money log</a></li>
                                    <li><a href="{{ route('personal-data') }}">Personal data</a></li>

                                @endif



                                <li><a href=" Telegram'#' }}">Online service</a></li>
                                <li><a href="{{ route('about-us') }}">About us</a></li>
                            </ul>


                            <br>

                            
                            @if($user)
                            
                            <a href="{{ route('logout') }}" style="width: 100%"><button class="" type="submit">Logout</button></a>

                            @else

                            <a href="{{ route('login') }}" style="width: 100%"><button class="" type="submit">Login</button></a>

                            @endif



                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="body-overlay"></div>
</header>