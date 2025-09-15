@extends('frontend.layouts.app')

@section('title')
<title>Profite Report | {{ config('app.name') }} </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('content')



    <main>
        <section class="section-padding-b pt-5">
            <div class="max-w-[600px] mx-auto px-4">
                <a href="#" class="mb-10"><i class="fal fa-angle-left mr-2"></i>Profite Report</a>

                <div class="responsive-table text-sm mt-10">
                    <table class="w-full theme-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Balance ( BDT )</th>
                                <th>Assets ( BDT )</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($forms as $form)
                            <?php
                                $currentDateTime = $form->created_at;
                                $newDateTime = date('h:i A', strtotime($currentDateTime));
                            ?>
                            <tr>
                                <td>DTF-{{$form->id}}</td>
                                <td>{{$form->form_fee ?? ''}} /-</td>
                                <td>{{$form->agent_bonus ?? ''}} /-</td>
                                <td>{{ $newDateTime }}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>




@endsection
