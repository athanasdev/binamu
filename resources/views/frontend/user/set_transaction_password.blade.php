@extends('frontend.layouts.app')

@section('title')
<title>Set Transaction Password | {{ config('app.name') }} </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('content')

    <main>
        <section class="section-padding mt-5">
            <div class="max-w-[600px] mx-auto px-4">
                <h2 class="text-2xl font-semibold text-center mb-5">Update Your Transaction Password</h2>
                    @include('frontend.layouts.flash-message')
                <form action="{{ route('update_transaction_password') }}" method="post" enctype="multipart/form-data" class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @csrf
                    
                    <div class="sm:col-span-2 theme-input-container responsive-table">
                        <label class="text-sm font-semibold mb-1">Password</label>
                        <input type="text" name="password" class="input-border border border-gray-400 rounded-md w-full py-2 px-3">

                        <p style="font-size: 12px; margin: 6px 0px;color: gray;">
                            1. Use at least one Capitale Letter <br>
                            2. Use at least one Digit <br>
                            3. Use at least one Small Letter <br>
                            4. Use at least one Special Character
                        </p>

                    </div>
                    
                    <div class="sm:col-span-2 theme-input-container responsive-table">
                        <label class="text-sm font-semibold mb-1">Confirm Password</label>
                        <input type="text" name="password_confirmation" class="input-border border border-gray-400 rounded-md w-full py-2 px-3">
                    </div>


                    <div class="text-center sm:col-span-2">
                        <button class="px-6 py-2 w-1/2 max-w-[150px] bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200">Update</button>
                    </div>
                </form>
            </div>
        </section>
    </main>


@endsection
