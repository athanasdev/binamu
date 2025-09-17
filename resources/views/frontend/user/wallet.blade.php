@extends('frontend.layouts.app')

@section('title')
<title>Wallet | {{ config('app.name') }} </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('content')

    <main>
        <section class="section-padding-b pt-5">
            <div class="max-w-[600px] mx-auto px-4">
                <a href="#" class="mb-10"><i class="fal fa-angle-left mr-2"></i> Wallet</a>
                
                <div class="relative text-sm py-8 px-4 mt-10 w-full aspect-[2/1.3] rounded-xl text-gray-300" style="background-image: url({{asset('assets/frontend/')}}/dist/img/wallet-back.webp);">

                    <div class="flex items-center justify-end gap-5">

                        <a href="{{ route('edit-wallet') }}" class=""><i class="fal fa-pencil mr-1"></i> Edit</a>

                        <!-- <a href="#" class=""><i class="fal fa-trash mr-1"></i> Delete</a> -->
                    </div>

                    <div class="mb-10">
                        Wallet Type <br>

                            @if($user->mobile_banking_type == 1)

                                <span>বিকাশ ( Perosnal )</span>

                            @elseif($user->mobile_banking_type == 2)

                                <span>বিকাশ ( Agent )</span>

                            @elseif($user->mobile_banking_type == 3)

                                <span>রকেট ( Perosnal )</span>

                            @elseif($user->mobile_banking_type == 4)

                                <span>রকেট ( Agent )</span>

                            @elseif($user->mobile_banking_type == 5)

                                <span>নগদ ( Perosnal )</span>

                            @elseif($user->mobile_banking_type == 6)

                                <span>নগদ ( Agent )</span>

                            @elseif($user->mobile_banking_type == 7)

                                <span>উপায় ( Perosnal )</span>

                            @else
                            
                                <span>উপায় ( Agent )</span>

                            @endif

                    </div>
                    <div>
                        Account Number <br>
                        {{ $user->mobile_banking_number ?? '---'  }}
                    </div>
                    <div class="chip rounded-lg overflow-hidden absolute bottom-6 right-6"><img src="{{asset('assets/frontend/')}}/dist/img/chip.png" alt="" class="w-[70px]"></div>
                </div>
            </div>
        </section>
    </main>


@endsection
