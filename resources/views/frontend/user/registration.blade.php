@extends('frontend.layouts.app')

@section('title')
<title>Registration | {{ config('app.name') }} </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('content')
<div style="background: #0080ff;" 
<link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.19/css/intlTelInput.css"/>


<style>
    .iti.iti--allow-dropdown.iti--separate-dial-code{
        width: 100%;
    }
</style>


<section class="registration-area">
    <div class="bg-img">
        <img src="{{asset('public/assets/frontend/')}}/images/reg-bg.jpg" alt="">
        <div class="img-overlay"></div>
    </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="registration-wrapper">
            <div class="main-form-wrapper">
                <h5>Registration</h5>


                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


                <form action="{{ route('submit_registration') }}" method="post">
                    @csrf


              <div class="form-group mb-2">
                <input
                 type="text" name="name" class="form-control" placeholder="Real Name" required>
              </div>
              <div class="form-group mb-2">
                <input type="number" name="phone" class="form-control" placeholder="Phone Number" id="phone" required>
              </div>



              <div class="form-group mb-2">
                <input type="password" name="password"  class="form-control" placeholder="Password" required>
              </div>
              <div class="form-group mb-2">
                <input type="password" name="password_confirmation"  class="form-control" placeholder="Confirm assword" required>
              </div>


              <div class="form-group mb-2">
                <input type="password" name="trade_password"  class="form-control" placeholder="Trade Password" required>
              </div>

              <div class="form-group mb-2">
                <input type="password" name="trade_password_confirmation"  class="form-control" placeholder="Confirm Trade assword" required>
              </div>


              <div class="mb-3 text-start login-form-label">
                {{-- <label for="">Refer code </label> --}}

                @if(isset($refer_code))
                    <input autocomplete="off" name="refer_by" value="{{ $refer_code ?? '' }}" type="text" class="form-control" placeholder="Refer Code" readonly="">
                @else
                    <input autocomplete="off" name="refer_by" type="text" class="form-control" placeholder="Refer Code">

                @endif
              </div>

              <div class="form-group mb-2">
                <button type="submit">Registration</button>
              </div>
            </form>
            <div class="footer">
                <a href="#">Contact Service</a>

                <span style="color: white">Already have an account ? <a href="{{ route('login') }}">Login</a> </span>
            </div>
            </div>

           

        </div>
      </div>
    </div>
  </div>
</section>

<script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
        separateDialCode: true,
        preferredCountries: ["bd", "in", "pk", "no"]
    });
</script>

@endsection
