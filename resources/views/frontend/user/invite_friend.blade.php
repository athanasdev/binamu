@extends('frontend.layouts.app')

@section('title')
<title>Invite Friend | {{ config('app.name') }} </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('content')


    <main class="mt-10">
        <section class="section-padding">
            <div class="max-w-[600px] mx-auto px-4">
                <div class="grid grid-cols-2 gap-4">
                    <div class="sm:col-span-2 theme-input-container responsive-table">
                        <div>
                            Your Affiliate Code 
                            <br>
                            <br>


                            <!-- <input type="text" value="{{ $user->refer_code ?? '' }}" id="myInput" class="text-lg font-bold" style="font-size: 42px;" readonly> -->


                            <input type="text" value="{{ URL::to('/') }}/refer-friend/{{ $user->refer_code ?? '' }}" id="myInput" class="text-lg font-bold" style="font-size: 17px;width: 100%;" readonly>


                            <br>
                            <br>

                            <button onclick="myFunction()" style="background: #03a5b7;color: white; padding: 4px 11px;">Copy code</button>


                            <!-- <span class="text-lg font-bold" style="font-size: 42px;">{{ $user->refer_code ?? '' }}</span> -->
                            <br>
                            <br>
                            <p>Copy this code and share with your friend.</p>
                        </div>
                        
                    </div>
               

                </div>
            </div>
        </section>
    </main>






<script>
function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  navigator.clipboard.writeText(copyText.value);
  
  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
</script>

@endsection
