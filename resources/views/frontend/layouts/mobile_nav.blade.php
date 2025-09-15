    <div class="mobile-nav">
        <ul class="space-y-2">
            <li>
                <a href="{{ URL::to('/') }}" class="px-3 py-1 flex items-center justify-between rounded-md hover:bg-slate-600">
                    <span>
                        <i class="fas fa-home text-base mr-1"></i> Home
                    </span>
                    <i class="fal fa-angle-right"></i>
                </a>
            </li>


<!--             <li>
                <a href="#" class="px-3 py-1 flex items-center justify-between rounded-md hover:bg-slate-600">
                    <span>
                        <i class="fas fa-graduation-cap text-base mr-1"></i> Navice
                    </span>
                    <i class="fal fa-angle-right"></i>
                </a>
            </li> -->

            
            
            @if(Auth::user())
            <li>
                <a href="{{ route('withdraw') }}" class="px-3 py-1 flex items-center justify-between rounded-md hover:bg-slate-600">
                    <span>
                        <i class="fas fa-hand-holding-usd text-base mr-1"></i> Withdraw
                    </span>
                    <i class="fal fa-angle-right"></i>
                </a>
            </li>
            

            <li>
                <a href="{{ route('withdraw-history') }}" class="px-3 py-1 flex items-center justify-between rounded-md hover:bg-slate-600">
                    <span>
                        <i class="fas fa-hand-holding-usd text-base mr-1"></i> Withdraw History
                    </span>
                    <i class="fal fa-angle-right"></i>
                </a>
            </li>


            <li>
                <a href="{{ route('wallet') }}" class="px-3 py-1 flex items-center justify-between rounded-md hover:bg-slate-600">
                    <span>
                        <i class="fab fa-google-wallet text-base mr-1"></i> Wallet
                    </span>
                    <i class="fal fa-angle-right"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('profite-report') }}" class="px-3 py-1 flex items-center justify-between rounded-md hover:bg-slate-600">
                    <span>
                        <i class="fas fa-hands-usd text-base mr-1"></i> Profit Report
                    </span>
                    <i class="fal fa-angle-right"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('team') }}" class="px-3 py-1 flex items-center justify-between rounded-md hover:bg-slate-600">
                    <span>
                        <i class="fas fa-users text-base mr-1"></i> Team
                    </span>
                    <i class="fal fa-angle-right"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('user.dashboard') }}" class="px-3 py-1 flex items-center justify-between rounded-md hover:bg-slate-600">
                    <span>
                        <i class="fas fa-user text-base mr-1"></i> Account
                    </span>
                    <i class="fal fa-angle-right"></i>
                </a>
            </li>            
            
            
            <li>
                <a href="{{ route('settings') }}" class="px-3 py-1 flex items-center justify-between rounded-md hover:bg-slate-600">
                    <span>
                        <i class="fas fa-cog text-base mr-1"></i> Settings
                    </span>
                    <i class="fal fa-angle-right"></i>
                </a>
            </li>            
            
            <li>
                <a href="{{ route('logout') }}" class="px-3 py-1 flex items-center justify-between rounded-md hover:bg-slate-600">
                    <span>
                        <i class="fas fa-sign-out text-base mr-1"></i> Logout
                    </span>
                    <i class="fal fa-angle-right"></i>
                </a>
            </li>            
            
            @else
            
            
            <li>
                <a href="{{ route('login') }}" class="px-3 py-1 flex items-center justify-between rounded-md hover:bg-slate-600">
                    <span>
                        <i class="fas fa-hand-holding-usd text-base mr-1"></i> Login
                    </span>
                    <i class="fal fa-angle-right"></i>
                </a>
            </li>            
            
            <li>
                <a href="{{ route('registration') }}" class="px-3 py-1 flex items-center justify-between rounded-md hover:bg-slate-600">
                    <span>
                        <i class="fas fa-hand-holding-usd text-base mr-1"></i> Registration
                    </span>
                    <i class="fal fa-angle-right"></i>
                </a>
            </li>
            
            @endif


            
<!--             <li>
                <a href="#" class="px-3 py-1 flex items-center justify-between rounded-md hover:bg-slate-600">
                    <span>
                        <i class="fas fa-info-circle text-base mr-1"></i> Help
                    </span>
                    <i class="fal fa-angle-right"></i>
                </a>
            </li> -->



        </ul>
    </div>