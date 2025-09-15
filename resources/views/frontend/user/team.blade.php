@extends('frontend.layouts.app')

@section('title')
<title>My Team | {{ config('app.name') }} </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('content')

    <main>
        <section class="section-padding-b pt-5">
            <div class="max-w-[600px] mx-auto px-4">
                <a href="#" class="mb-10"><i class="fal fa-angle-left mr-2"></i> Back</a>

                <div class="grid grid-cols-2 gap-3 mt-10 text-center">
                    <div class="sm:col-span-2 theme-input-container responsive-table">
                        <h5 class="font-bold leading-tight mb-3">Total Members</h5>
                        <p>{{ $total_members->count() ?? 0 }}</p>
                    </div>
                    <!-- <div class="bg-white text-gray-700 rounded-md p-3">
                        <h5 class="font-bold leading-tight mb-3">Effective Members</h5>
                        <p>--</p>
                    </div>
                    <div class="bg-white text-gray-700 rounded-md p-3">
                        <h5 class="font-bold leading-tight mb-3">Team Profile</h5>
                        <p>--</p>
                    </div>
                    <div class="bg-white text-gray-700 rounded-md p-3">
                        <h5 class="font-bold leading-tight mb-3">Team Assets</h5>
                        <p>--</p>
                    </div> -->
                </div>

                <h4 class="text-base mt-10 mb-5">Team Members Data</h4>
                <div class="space-y-2">


                    @php $i=1; @endphp
                    @foreach($total_members as $total_member)
                      
                    <div class="bg-white text-gray-600 flex items-center justify-between gap-5 px-4 py-3 rounded-md">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-r from-orange-400 to-orange-300 flex items-center justify-center text-lg text-gray-100">{{$i++}}</div>
                        <div>
                            Name <br>
                            {{ $total_member->candidate_name_en }}
                        </div>
                        <div>
                            Contact Number <br>
                            {{ $total_member->contact_number }}
                        </div>
                        <div>
                            Balance <br>
                            {{ $total_member->balance }}
                        </div>
                       <!--  <div>
                            <a href="#" class="text-sm px-3 py-1 bg-yellow-500 text-gray-100 rounded-full">View</a>
                        </div> -->
                    </div>
                    @endforeach

                   
                </div>
            </div>
        </section>
    </main>


@endsection
