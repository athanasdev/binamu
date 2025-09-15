@extends('frontend.layouts.app')

@section('title')
<title> All Forms | {{ config('app.name') }} </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('content')



    <main>
        <section class="section-padding-b pt-5">
            <div class="max-w-[600px] mx-auto px-4">

                <h2 class="text-2xl font-semibold text-center mb-3 mt-5">All Application Forms</h2>

                <div class="responsive-table text-sm mt-10">
                    <table class="w-full theme-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>NID</th>
                                <th>Mobile</th>
                                <th>PDF</th>
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
                                <td>{{$form->name ?? ''}}</td>
                                <td>{{$form->national_id_card_no_or_b_d_c ?? ''}}</td>
                                <td>{{$form->mobile_number ?? ''}}</td>
                                <td><a href="{{ route('my-form-pdf', $form->id) }}" target="_blank"><button style=" background: #00a2ff;padding: 4px 10px;color: white;">Download PDF</button></a></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>




@endsection
