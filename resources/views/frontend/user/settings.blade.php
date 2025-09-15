@extends('frontend.layouts.app')

@section('title')
<title>Settings | {{ config('app.name') }} </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('content')

    <main>
        <section class="section-padding-b pt-5">
            <div class="max-w-[600px] mx-auto px-4">
                <a href="#" class="mb-10"><i class="fal fa-angle-left mr-2"></i> Back</a>
                
                <div class="mt-5 space-y-3">
                    <a href="{{ route('set-login-password') }}" class="bg-white text-gray-700 rounded-md flex items-center gap-3 p-3">
                        <span class="w-10 h-10 rounded-full bg-gradient-to-b from-lime-500 to-lime-600 text-gray-100 flex items-center justify-center text-lg"><i class="fas fa-lock-alt"></i></span>
                        <div>
                            <span class="font-bold">Login Password</span>
                            <p class="text-sm text-gray-500">Click to Edit</p>
                        </div>
                    </a>
                    <a href="{{ route('set-transaction-password') }}" class="bg-white text-gray-700 rounded-md flex items-center gap-3 p-3">
                        <span class="w-10 h-10 rounded-full bg-gradient-to-b from-rose-500 to-rose-600 text-gray-100 flex items-center justify-center text-lg"><i class="fas fa-shield-check"></i></span>
                        <div>
                            <span class="font-bold">Transaction Password</span>
                            <p class="text-sm text-gray-500">Click to Edit</p>
                        </div>
                    </a>
                    <!-- <a href="#" class="bg-white text-gray-700 rounded-md flex items-center gap-3 p-3">
                        <span class="w-10 h-10 rounded-full bg-gradient-to-b from-indigo-500 to-indigo-600 text-gray-100 flex items-center justify-center text-lg"><i class="fas fa-globe"></i></span>
                        <div>
                            <span class="font-bold">Language</span>
                            <p class="text-sm text-gray-500">Click to Edit</p>
                        </div>
                    </a> -->
                    <a href="{{ route('logout') }}" class="bg-white text-gray-700 rounded-md flex items-center gap-3 p-3">
                        <span class="w-10 h-10 rounded-full bg-gradient-to-b from-cyan-500 to-cyan-600 text-gray-100 flex items-center justify-center text-lg"><i class="fas fa-sign-out"></i></span>
                        <div>
                            <span class="font-bold">Log Out</span>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </main>


@endsection
