@extends('frontend.layouts.app')

@section('title')
<title>Login | {{ config('app.name') }} </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('content')

    <!-- start::registration form -->
    <section class="registration-area">
        <div class="bg-img">
            <img src="{{asset('assets/frontend/')}}/images/reg-bg.jpg" alt="">
            <div class="img-overlay"></div>
        </div>
<div style="background: #0080ff;" 
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="registration-wrapper">

                        <div class="main-form-wrapper">
                            <h5>Login</h5>

                            @include('frontend.layouts.flash-message')

                            <form action="{{ route('submit_login') }}" method="post">

                                @csrf

                                <div class="form-group mb-2">
                                    <input type="text" name="email"  class="form-control" placeholder="Email" required>
                                </div>
                                <div class="form-group mb-2">
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>

                                <div class="form-group mb-2">
                                    <button>Login</button>
                                </div>
                            </form>
                            <div class="footer">
                                {{-- <a href="#">Contact Service</a> --}}
                                
                                <span style="color: white">Are you new here ? <a href="{{ route('registration') }}">signup</a> </span>

                            </div>
                        </div>

                       <div class="main-form-wrapper">
                            <h5></h5>

                            @include('frontend.layouts.flash-message')



                            <form action="" method="post">

                                @csrf

                                <div class="form-group mb-2">
                                   
                                </div>
                                <div class="form-group mb-2">
                                    
                                </div>

                                <div class="form-group mb-2">
                                   
                                </div>
                            </form>
                            <div class="footer">
                                <a href="#"></a>
                                
                                <span style="color: white"></a> </span>
 
                       <div class="main-form-wrapper">
                            <h5></h5>

                            @include('frontend.layouts.flash-message')



                            <form action="" method="post">

                                @csrf

                                <div class="form-group mb-2">
                                   
                                </div>
                                <div class="form-group mb-2">
                                    
                                </div>

                                <div class="form-group mb-2">
                                   
                                </div>
                            </form>
                            <div class="footer">
                                <a href="#"></a>
                                
                                <span style="color: white"></a> </span>
  
                       <div class="main-form-wrapper">
                            <h5></h5>

                            @include('frontend.layouts.flash-message')



                            <form action="" method="post">

                                @csrf

                                <div class="form-group mb-2">
                                   
                                </div>
                                <div class="form-group mb-2">
                                    
                                </div>

                                <div class="form-group mb-2">
                                   
                                </div>
                            </form>
                            <div class="footer">
                                <a href="#"></a>
                                
                                <span style="color: white"></a> </span>
                             

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end::registration form -->

@endsection
