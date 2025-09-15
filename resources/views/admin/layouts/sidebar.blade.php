<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item menu-open">
        <a href="{{route('dashboard')}}" class="nav-link">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>





      <li class="nav-item

          {{ (request()->is('admin/withdraw')) ? 'menu-open' : '' }}
          {{ request()->is('admin/pending_withdraw') ? 'menu-open' : '' }}
          {{ request()->is('admin/approved_withdraw') ? 'menu-open' : '' }}
          {{ request()->is('admin/canceled_withdraw') ? 'menu-open' : '' }}

      ">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-edit"></i>
          <p>
            Withdraw
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">




          <li class="nav-item">
            <a href="{{route('withdraw.index')}}" class="nav-link {{ (request()->is('admin/withdraw')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                All Withdraw
              </p>
            </a>
          </li>
    
          <li class="nav-item">
            <a href="{{route('pending_withdraw')}}" class="nav-link {{ (request()->is('admin/pending_withdraw')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Pending Withdraw
              </p>
            </a>
          </li>
    
          <li class="nav-item">
            <a href="{{route('approved_withdraw')}}" class="nav-link {{ (request()->is('admin/approved_withdraw')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Approved Withdraw
              </p>
            </a>
          </li>
    
          <li class="nav-item">
            <a href="{{route('canceled_withdraw')}}" class="nav-link {{ (request()->is('admin/canceled_withdraw')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Canceled Withdraw
              </p>
            </a>
          </li>
    

        </ul>
      </li>



      <hr>



      <li class="nav-item

          {{ (request()->is('admin/user_bets')) ? 'menu-open' : '' }}

      ">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-edit"></i>
          <p>
            User Bets
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">


          <li class="nav-item">
            <a href="{{route('user_bets')}}" class="nav-link {{ (request()->is('admin/user_bets')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                All Bets
              </p>
            </a>
          </li>
    



        </ul>
      </li>

      <hr>

      <li class="nav-item

          {{ (request()->is('admin/deposit')) ? 'menu-open' : '' }}
          {{ request()->is('admin/pending_deposit') ? 'menu-open' : '' }}
          {{ request()->is('admin/approved_deposit') ? 'menu-open' : '' }}
          {{ request()->is('admin/canceled_deposit') ? 'menu-open' : '' }}

      ">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-edit"></i>
          <p>
            Deposit
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">




          <li class="nav-item">
            <a href="{{route('deposit.index')}}" class="nav-link {{ (request()->is('admin/deposit')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                All Deposit
              </p>
            </a>
          </li>
    
          <li class="nav-item">
            <a href="{{route('pending_deposit')}}" class="nav-link {{ (request()->is('admin/pending_deposit')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Pending Deposit
              </p>
            </a>
          </li>
    
          <li class="nav-item">
            <a href="{{route('approved_deposit')}}" class="nav-link {{ (request()->is('admin/approved_deposit')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Approved Deposit
              </p>
            </a>
          </li>
    
          <li class="nav-item">
            <a href="{{route('canceled_deposit')}}" class="nav-link {{ (request()->is('admin/canceled_deposit')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Canceled Deposit
              </p>
            </a>
          </li>
    

        </ul>
      </li>







      <li class="nav-item

          {{ (request()->is('admin/withdraw')) ? 'menu-open' : '' }}
          {{ request()->is('admin/pending_withdraw') ? 'menu-open' : '' }}
          {{ request()->is('admin/approved_withdraw') ? 'menu-open' : '' }}
          {{ request()->is('admin/canceled_withdraw') ? 'menu-open' : '' }}

      ">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-edit"></i>
          <p>
            Withdraw
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">




          <li class="nav-item">
            <a href="{{route('withdraw.index')}}" class="nav-link {{ (request()->is('admin/withdraw')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                All Withdraw
              </p>
            </a>
          </li>
    
          <li class="nav-item">
            <a href="{{route('pending_withdraw')}}" class="nav-link {{ (request()->is('admin/pending_withdraw')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Pending Withdraw
              </p>
            </a>
          </li>
    
          <li class="nav-item">
            <a href="{{route('approved_withdraw')}}" class="nav-link {{ (request()->is('admin/approved_withdraw')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Approved Withdraw
              </p>
            </a>
          </li>
    
          <li class="nav-item">
            <a href="{{route('canceled_withdraw')}}" class="nav-link {{ (request()->is('admin/canceled_withdraw')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Canceled Withdraw
              </p>
            </a>
          </li>
    

        </ul>
      </li>



      <hr>



      <li class="nav-item

          {{ (request()->is('admin/agent')) ? 'menu-open' : '' }}
          {{ request()->is('admin/active_agent') ? 'menu-open' : '' }}
          {{ request()->is('admin/blocked_agent') ? 'menu-open' : '' }}

      ">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-edit"></i>
          <p>
            User
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">


          <li class="nav-item">
            <a href="{{route('agent.index')}}" class="nav-link {{ (request()->is('admin/agent')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                All User
              </p>
            </a>
          </li>
    
          <li class="nav-item">
            <a href="{{route('active_agent')}}" class="nav-link {{ (request()->is('admin/active_agent')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Active User
              </p>
            </a>
          </li>
    
          <li class="nav-item">
            <a href="{{route('blocked_agent')}}" class="nav-link {{ (request()->is('admin/blocked_agent')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Blocked User
              </p>
            </a>
          </li>


        </ul>
      </li>












      <hr> 


      <li class="nav-item

      {{ request()->is('admin/league/create') ? 'menu-open' : '' }}

      {{ request()->is('admin/league') ? 'menu-open' : '' }}

    ">

      <a href="#" class="nav-link">

        <i class="nav-icon fas fa-tree"></i>

        <p>

          League

          <i class="fas fa-angle-left right"></i>

        </p>

      </a>

      <ul class="nav nav-treeview">

        <li class="nav-item {{ request()->is('admin/league/create') ? 'active' : '' }}">

          <a href="{{URL::to('admin/league/create')}}" class="nav-link {{ request()->is('admin/league/create') ? 'active' : '' }}"  style="margin-left: 21px;">

            <i class="far fa-circle nav-icon"></i>

            <p>Add</p>

          </a>

        </li>

        <li class="nav-item {{ request()->is('admin/league') ? 'active' : '' }}">

          <a href="{{URL::to('admin/league')}}" class="nav-link {{ request()->is('admin/league') ? 'active' : '' }}"  style="margin-left: 21px;">

            <i class="far fa-circle nav-icon"></i>

            <p>Manage</p>

          </a>

        </li>



      </ul>

    </li>



          <li class="nav-item

            {{ request()->is('admin/match/create') ? 'menu-open' : '' }}

            {{ request()->is('admin/match') ? 'menu-open' : '' }}

            {{ request()->is('admin/running_match') ? 'menu-open' : '' }}


            {{ request()->is('admin/upcomming_match') ? 'menu-open' : '' }}


            {{ request()->is('admin/completed_match') ? 'menu-open' : '' }}


          ">

            <a href="#" class="nav-link">

              <i class="nav-icon fas fa-tree"></i>

              <p>

                Match

                <i class="fas fa-angle-left right"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item {{ request()->is('admin/match/create') ? 'active' : '' }}">

                <a href="{{URL::to('admin/match/create')}}" class="nav-link {{ request()->is('admin/match/create') ? 'active' : '' }}"  style="margin-left: 21px;">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Add</p>

                </a>

              </li>

              <li class="nav-item {{ request()->is('admin/match') ? 'active' : '' }}">

                <a href="{{URL::to('admin/match')}}" class="nav-link {{ request()->is('admin/match') ? 'active' : '' }}"  style="margin-left: 21px;">

                  <i class="far fa-circle nav-icon"></i>

                  <p>All Match</p>

                </a>

              </li>

              <li class="nav-item {{ request()->is('admin/running_match') ? 'active' : '' }}">

                <a href="{{URL::to('admin/running_match')}}" class="nav-link {{ request()->is('admin/running_match') ? 'active' : '' }}"  style="margin-left: 21px;">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Running Match</p>

                </a>

              </li>

              <li class="nav-item {{ request()->is('admin/upcomming_match') ? 'active' : '' }}">

                <a href="{{URL::to('admin/upcomming_match')}}" class="nav-link {{ request()->is('admin/upcomming_match') ? 'active' : '' }}"  style="margin-left: 21px;">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Upcomming Match</p>

                </a>

              </li>

              <li class="nav-item {{ request()->is('admin/completed_match') ? 'active' : '' }}">

                <a href="{{URL::to('admin/completed_match')}}" class="nav-link {{ request()->is('admin/completed_match') ? 'active' : '' }}"  style="margin-left: 21px;">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Completed Match</p>

                </a>

              </li>

            </ul>

          </li>

      <li class="nav-item

          {{ (request()->is('admin/payment_method')) ? 'menu-open' : '' }}

          {{ request()->is('admin/payment_method') ? 'menu-open' : '' }}

      ">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-edit"></i>
          <p>
            Payment Method
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">


          <li class="nav-item">
            <a href="{{URL::to('admin/payment_method/create')}}" class="nav-link  {{ request()->is('admin/payment_method/create') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Add </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{URL::to('admin/payment_method')}}" class="nav-link  {{ request()->is('admin/payment_method') ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Manage </p>
            </a>
          </li>


        </ul>
      </li>








          <li class="nav-item

            {{ request()->is('admin/slider/create') ? 'menu-open' : '' }}

            {{ request()->is('admin/slider') ? 'menu-open' : '' }}

          ">

            <a href="#" class="nav-link">

              <i class="nav-icon fas fa-tree"></i>

              <p>

                Slider

                <i class="fas fa-angle-left right"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item {{ request()->is('admin/slider/create') ? 'active' : '' }}">

                <a href="{{URL::to('admin/slider/create')}}" class="nav-link {{ request()->is('admin/slider/create') ? 'active' : '' }}"  style="margin-left: 21px;">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Add</p>

                </a>

              </li>

              <li class="nav-item {{ request()->is('admin/slider') ? 'active' : '' }}">

                <a href="{{URL::to('admin/slider')}}" class="nav-link {{ request()->is('admin/slider') ? 'active' : '' }}"  style="margin-left: 21px;">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Manage</p>

                </a>

              </li>



            </ul>

          </li>









<!--       <li class="nav-item">
        <a href="{{route('country.index')}}" class="nav-link {{ (request()->is('admin/country')) ? 'active' : '' }}">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Country
          </p>
        </a>
      </li>
 -->

      <li class="nav-item

          {{ (request()->is('admin/site-setting')) ? 'menu-open' : '' }}

      ">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-edit"></i>
          <p>
            Settings
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('site-setting')}}" class="nav-link {{ (request()->is('admin/site-setting')) ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Website Setting</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="{{route('change-password')}}" class="nav-link">
          <i class="nav-icon fas fa-file"></i>
          <p>Change Password</p>
        </a>
      </li>
    </ul>
  </nav>