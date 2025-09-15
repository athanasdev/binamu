@extends('frontend.layouts.app')

@section('title')
<title>Edit Wallet | {{ config('app.name') }} </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('content')

    <main>
        <section class="section-padding-b pt-5">
            <div class="max-w-[600px] mx-auto px-4">
                <a href="#" class="mb-10"><i class="fal fa-angle-left mr-2"></i>Edit Wallet</a>
                

                @include('frontend.layouts.flash-message')

                
                <div class="relative text-sm py-8 px-4 mt-10 w-full aspect-[2/1.3] rounded-xl text-gray-300" style="background-image: url({{asset('public/assets/frontend/')}}/dist/img/wallet-back.webp);">

                    <div class="flex items-center justify-end gap-5">

                        <a href="#" class=""><i class="fal fa-pencil mr-1"></i> Update your wallet</a>

                        <!-- <a href="#" class=""><i class="fal fa-trash mr-1"></i> Delete</a> -->
                    </div>


                    <form action="{{ route('update-wallet') }}" method="post">
                        @csrf
                        
                    
                        <div class="mb-10">
                            Wallet Type 
                            <br>

                       

                            <select name="mobile_banking_type" class="input-border border border-gray-400 rounded-md w-full py-2 px-3" id="" style="color: black;padding: 5px 10px;">
                                <option value="">--- নির্বাচন করুন ---</option>

                                <option value="1" @php if ($user->mobile_banking_type == 1) { echo "selected"; } @endphp>বিকাশ ( Perosnal )</option>
                                <option value="2" @php if ($user->mobile_banking_type == 2) { echo "selected"; } @endphp>বিকাশ ( Agent )</option>
                                <option value="3" @php if ($user->mobile_banking_type == 3) { echo "selected"; } @endphp>রকেট ( Perosnal )</option>
                                <option value="4" @php if ($user->mobile_banking_type == 4) { echo "selected"; } @endphp>রকেট ( Agent )</option>
                                <option value="5" @php if ($user->mobile_banking_type == 5) { echo "selected"; } @endphp>নগদ ( Perosnal )</option>
                                <option value="6" @php if ($user->mobile_banking_type == 6) { echo "selected"; } @endphp>নগদ ( Agent )</option>
                                <option value="7" @php if ($user->mobile_banking_type == 7) { echo "selected"; } @endphp>উপায় ( Perosnal )</option>
                                <option value="8" @php if ($user->mobile_banking_type == 8) { echo "selected"; } @endphp>উপায় ( Agent )</option>
                            </select>
                          

                        </div>


                        <div>
                            Account Number <br>
                            <!-- {{ $user->mobile_banking_number ?? '---'  }} -->
                            <input type="text" class="input-border border border-gray-400 rounded-md w-full py-2 px-3" value="{{ $user->mobile_banking_number }}" name="mobile_banking_number" style="color: black;padding: 5px 10px;">
                        </div>

                        <div class="chip rounded-lg overflow-hidden absolute bottom-6 right-6"><button class="">Update</button></div>

                    </form>


                    <!-- <div class="chip rounded-lg overflow-hidden absolute bottom-6 right-6"><img src="{{asset('public/assets/frontend/')}}/dist/img/chip.png" alt="" class="w-[70px]"></div> -->

                </div>
            </div>
        </section>
    </main>


@endsection
