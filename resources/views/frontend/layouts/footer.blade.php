
<?php
    $user = Auth::user();
    $site_info = App\Models\SiteInfo::first();
?>





<footer>
    <div class="container">
        <div class="footer-wrapper">
            <div class="footer-item">
                <a href="{{ URL::to('/') }}">
                    <span><i class="fa-solid fa-house"></i></span>
                    <p>Home</p>
                </a>
            </div>
            <div class="footer-item">
                <a href="{{ route('transaction') }}">
                    <span><i class="fa-solid fa-money-bill-transfer"></i></span>
                    <p>Transaction</p>
                </a>    
            </div>
            <div class="footer-item">
                <a href="{{ route('my-team') }}">
                    <span><i class="fa-solid fa-user-group"></i></span>
                    <p>My Team</p>
                </a>
            </div>
            @if($user)
                <div class="footer-item">

                    
                    <a href="{{ route('my_profile') }}">
                        <span><i class="fa-solid fa-user"></i></span>
                        <p>My Profile</p>
                    </a>




                </div>
                @else
                <div class="footer-item">
                <a href="{{ route('login') }}">
                        <span><i class="fa-solid fa-user"></i></span>
                    <p>Log in</p>
                    </a>
                </div>
            @endif
        </div>
    </div>

    
 </footer>
 

