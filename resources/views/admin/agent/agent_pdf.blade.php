<!DOCTYPE html>

<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$site_info->site_name ?? ''}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset($site_image->favicon)}}">
    <!-- Place favicon.ico in the root directory -->

    <!-- fonts (Rubik, Ubuntu) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400&family=Ubuntu:wght@300;400;500;700&display=swap"
        rel="stylesheet">

    <!-- ALL CSS -->
    <link rel="stylesheet" href="{{asset('public/assets/frontend/')}}/dist/css/all.min.css">
    <link rel="stylesheet" href="{{asset('public/assets/frontend/')}}/dist/css/tailwind.css">

    <style>
        .theme-table {
            border-collapse: collapse;
            width: 100%;
        }
        .theme-table,
        .theme-table th,
        .theme-table td {
            border: 1px solid #777;
            line-height: 1.3;
            padding: 2px;
            font-size: 12px;
        }
    </style>
</head>

<body class="py-3 bg-white">
    <div class="mb-10 text-center">
        <button class="print-pdf px-5 py-2 rounded-md bg-emerald-600 text-gray-100">Print</button>
    </div>
    <div id="pdf-container">
        <div class="pdf-wrapper relative text-gray-600 w-[740px] h-[950px] mx-auto">
            <div class="text-center mb-4">
                <h2 class="text-3xl font-bold mb-3">{{$site_info->site_name ?? ''}}</h2>
                <div class="text-xl mb-6">
                    <span class="font-bold">ফেসবুক পেজঃ</span> {{$site_info->facebook ?? ''}} <br>
                    <span class="font-bold">গ্রুপ:</span> Dream-Touch-Foundation-DTF
                </div>

                <h5 class="font-bold text-sm">আবেদন ফরম</h5>
                <h3 class="text-lg">সদস্য ফিঃ {{$data->agent_fee ?? ''}} টাকা</h3>

                <img src="{{asset($data->image)}}" alt="" class="w-full max-w-[120px] absolute top-[90px] right-0" style="height: 120px">
            </div>

            <div class="pt-8">
                <table class="w-full theme-table text-left">
                    <tr>
                        <td class="w-[30px]">১</td>
                        <td colspan="30"><span class="font-bold">পদের নাম: </span> {{ $data->post_name ?? '' }}  </td>
                    </tr>
                    <tr>
                        <td rowspan="2">২</td>
                        <td rowspan="2" colspan="19"><span class="font-bold">বিজ্ঞপ্তি নম্বর:</span> {{ $data->notification_no ?? '' }}</td>
                        <td rowspan="2" colspan="3" class="w-[60px]">তারিখ </td>

                        

                        <td class="text-center">দি</td>
                        <td class="text-center">ন</td>
                        <td class="text-center">মা</td>
                        <td class="text-center">স</td>
                        <td class="text-center">ব</td>
                        <td class="text-center">ৎ</td>
                        <td class="text-center">স</td>
                        <td class="text-center">র</td>

                        
                    </tr>
                    <tr>
                        <td class="text-center" colspan="8">
                            <?php  
                                $date = Carbon\Carbon::parse($data->date)->format('d/m/Y');
                            ?>
                            {{ $date ?? '' }}
                        </td>
                        <!--<td class="text-center"><br></td>
                        <td class="text-center"><br></td>
                        <td class="text-center"><br></td>
                        <td class="text-center"><br></td>
                        <td class="text-center"><br></td>
                        <td class="text-center"><br></td>
                        <td class="text-center"><br></td>
                        <td class="text-center"><br></td> -->
                    </tr>
                    <tr>
                        <td rowspan="2">৩</td>
                        <td rowspan="2" colspan="4" class="w-[40px]"><span class="font-bold">প্রাথীর নাম</span> </td>
                        <td colspan="26"><span class="font-bold">বাংলা:  </span> {{ $data->candidate_name_bn ?? '' }} </td>
                    </tr>
                    <tr>
                        <td colspan="26"><span class="font-bold">ইংলিশ:  </span>  {{ $data->candidate_name_en ?? '' }} </td>
                    </tr>

                    <tr>
                        <td rowspan="2">৪</td>
                        <td colspan="4">জাতীয় পরিচয় পত্র </td>

                        <td colspan="22" class="w-[20px]">
                            {{ $data->national_id_card_no ?? '' }}
                        </td>
                        <!-- <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td> -->
                        <td rowspan="2" colspan="4">যেকোনো একটি </td>
                    </tr>
                    <tr>
                        <td colspan="4">জন্ম নিবন্ধন </td>

                        <td colspan="22" class="w-[20px]">
                            {{ $data->birth_certificate ?? '' }}
                        </td>
                        <!-- <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td>
                        <td class="w-[20px]"></td> -->
                    </tr>

                    <tr>
                        <td rowspan="2">৫</td>
                        <td rowspan="2" colspan="4">জন্ম তারিখ </td>
                        <td colspan="2">দি</td>
                        <td colspan="2">ন</td>
                        <td colspan="2">মা</td>
                        <td colspan="2">স</td>
                        <td colspan="2">ব</td>
                        <td colspan="2">ৎ</td>
                        <td colspan="2">স</td>
                        <td colspan="2">র</td>
                        <td colspan="10" rowspan="2">জন্ম স্থান ( জেলা ) : {{ $data->birth_place_district ?? '' }}</td>
                    </tr>
                    <tr>
                        <td colspan="16" style="text-align: center;">

                            <?php  
                                $birth_date = Carbon\Carbon::parse($data->birth_date)->format('d/m/Y');
                            ?>

                            {{ $birth_date ?? '' }}

                            <br>

                        </td>
                        <!-- <td colspan="2"><br></td>
                        <td colspan="2"><br></td>
                        <td colspan="2"><br></td>
                        <td colspan="2"><br></td>
                        <td colspan="2"><br></td>
                        <td colspan="2"><br></td>
                        <td colspan="2"><br></td>
                        <td colspan="2"><br></td> -->
                    </tr>

                    <tr>
                        <td>7</td>
                        <td colspan="15">বিজ্ঞপ্তিতে উল্লেখিত তারিখে প্রার্থীর বয়স : 


                            <?php  

                                // $age = \Carbon\Carbon::parse($data->birth_date)->diff(\Carbon\Carbon::now())->format('%y years, %m months and %d days');

                                $age = \Carbon\Carbon::parse($data->birth_date)->diff(\Carbon\Carbon::now())->format('%y years, %m months');


                            ?>

                            {{ $age ?? '' }}


                        </td>
                        <td colspan="5"><br></td>
                        <td colspan="5"><br></td>
                        <td colspan="5"><br></td>
                    </tr>

                    <tr>
                        <td>৮</td>
                        <td colspan="30">মাতার নাম: {{ $data->mother_name ?? '' }} </td>
                    </tr>

                    <tr>
                        <td>৯</td>
                        <td colspan="30">পিতার নাম: {{ $data->father_name ?? '' }} </td>
                    </tr>

                    <tr>
                        <td rowspan="8">১০</td>
                        <td colspan="10">ঠিকানা:</td>
                        <td colspan="10">বর্তমান </td>
                        <td colspan="10">স্থায়ী </td>
                    </tr>
                    <tr>
                        <td colspan="10">বাসা ও সড়ক :</td>
                        <td colspan="10"> {{ $address->house_present ?? '' }} <br> </td>
                        <td colspan="10"> {{ $address->house_permanent ?? '' }}  <br> </td>
                    </tr>
                    <tr>
                        <td colspan="10">গ্রাম/পাড়া /মহল্লা :</td>
                        <td colspan="10"> {{ $address->village_present ?? '' }} <br> </td>
                        <td colspan="10"> {{ $address->village_permanent ?? '' }} <br> </td>
                    </tr>
                    <tr>
                        <td colspan="10">ইউনিয়ন / ওয়ার্ড :</td>
                        <td colspan="10"> {{ $address->union_present ?? '' }} <br> </td>
                        <td colspan="10"> {{ $address->union_permanent ?? '' }} <br> </td>
                    </tr>
                    <tr>
                        <td colspan="10">ডাকঘর:</td>
                        <td colspan="10"> {{ $address->post_office_present ?? '' }} <br> </td>
                        <td colspan="10"> {{ $address->post_office_permanent ?? '' }} <br> </td>
                    </tr>
                    <tr>
                        <td colspan="10">পোস্ট অফিসে নম্বর:</td>
                        <td colspan="10"> {{ $address->post_office_number_present ?? '' }} <br> </td>
                        <td colspan="10"> {{ $address->post_office_number_permanent ?? '' }} <br> </td>
                    </tr>
                    <tr>
                        <td colspan="10">উপজেলা:</td>
                        <td colspan="10"> {{ $address->thana_present ?? '' }} <br> </td>
                        <td colspan="10"> {{ $address->thana_permanent ?? '' }} <br> </td>
                    </tr>
                    <tr>
                        <td colspan="10">জেলা:</td>
                        <td colspan="10"> {{ $address->district_present ?? '' }} <br> </td>
                        <td colspan="10"> {{ $address->district_permanent ?? '' }} <br> </td>
                    </tr>

                    <tr>
                        <td>১১</td>
                        <td colspan="10">যােগাযােগ</td>
                        <td colspan="12">মােবাইল/টেলিফোন নম্বর</td>
                        <td colspan="8">ই-মেইল (যদি থাকে)</td>
                    </tr>
                    <tr>
                        <td>১২</td>
                        <td colspan="14">জাতীয়তা : {{ $data->nationality ?? '' }} </td>
                        <td>১৩</td>
                        <td colspan="15">জেন্ডার :  

                            @if($data->gender == 1)

                                পুরুষ

                            @elseif($data->gender == 2)

                                মহিলা

                            @else

                                অন্যান্য

                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>১৪</td>
                        <td colspan="14">ধর্ম  :  {{ $data->religion ?? '' }}  </td>
                        <td>১৫</td>
                        <td colspan="15">পেশা :  {{ $data->occupation ?? '' }}  </td>
                    </tr>

                    <tr>
                        <td rowspan="7">১৬</td>
                        <td colspan="30" class="text-center">শিক্ষাগত যােগ্যতা</td>
                    </tr>
                    <tr>
                        <td colspan="5">পরীক্ষার নাম</td>
                        <td colspan="5">বিষয় </td>
                        <td colspan="5">শিক্ষা প্রতিষ্ঠান</td>
                        <td colspan="5">পসের সন</td>
                        <td colspan="5">বোর্ড/বিশ্ববিদ্যালয় </td>
                        <td colspan="5">গ্রেড/শ্রেণি/বিভাগ </td>
                    </tr>


                    <tr>
                        <td colspan="5"> {{ $education->exam_name_1 ?? '' }} <br></td>
                        <td colspan="5"> {{ $education->subject_name_1 ?? '' }} <br></td>
                        <td colspan="5"> {{ $education->institute_name_1 ?? '' }} <br></td>
                        <td colspan="5"> {{ $education->passing_year_1 ?? '' }} <br></td>
                        <td colspan="5"> {{ $education->board_name_1 ?? '' }} <br></td>
                        <td colspan="5"> {{ $education->grade_1 ?? '' }} <br></td>
                    </tr>
                    
                    <tr>
                        <td colspan="5"> {{ $education->exam_name_2 ?? '' }} <br></td>
                        <td colspan="5"> {{ $education->subject_name_2 ?? '' }} <br></td>
                        <td colspan="5"> {{ $education->institute_name_2 ?? '' }} <br></td>
                        <td colspan="5"> {{ $education->passing_year_2 ?? '' }} <br></td>
                        <td colspan="5"> {{ $education->board_name_2 ?? '' }} <br></td>
                        <td colspan="5"> {{ $education->grade_2 ?? '' }} <br></td>
                    </tr>
                    
                    <tr>
                        <td colspan="5"> {{ $education->exam_name_3 ?? '' }} <br></td>
                        <td colspan="5"> {{ $education->subject_name_3 ?? '' }} <br></td>
                        <td colspan="5"> {{ $education->institute_name_3 ?? '' }} <br></td>
                        <td colspan="5"> {{ $education->passing_year_3 ?? '' }} <br></td>
                        <td colspan="5"> {{ $education->board_name_3 ?? '' }} <br></td>
                        <td colspan="5"> {{ $education->grade_3 ?? '' }} <br></td>
                    </tr>
                    
                    <tr>
                        <td colspan="5"> {{ $education->exam_name_4 ?? '' }} <br></td>
                        <td colspan="5"> {{ $education->subject_name_4 ?? '' }} <br></td>
                        <td colspan="5"> {{ $education->institute_name_4 ?? '' }} <br></td>
                        <td colspan="5"> {{ $education->passing_year_4 ?? '' }} <br></td>
                        <td colspan="5"> {{ $education->board_name_4 ?? '' }} <br></td>
                        <td colspan="5"> {{ $education->grade_4 ?? '' }} <br></td>
                    </tr>
                    
                    <tr>
                        <td colspan="5"> {{ $education->exam_name_5 ?? '' }} <br></td>
                        <td colspan="5"> {{ $education->subject_name_5 ?? '' }} <br></td>
                        <td colspan="5"> {{ $education->institute_name_5 ?? '' }} <br></td>
                        <td colspan="5"> {{ $education->passing_year_5 ?? '' }} <br></td>
                        <td colspan="5"> {{ $education->board_name_5 ?? '' }} <br></td>
                        <td colspan="5"> {{ $education->grade_5 ?? '' }} <br></td>
                    </tr>
               

                    <tr>
                        <td>১৭</td>
                        <td colspan="30">অতিরিক্ত যােগ্যতা (যদি থাকে) : {{ $data->additional_qualifications ?? '' }}</td>
                    </tr>

                    <tr>
                        <td>১৮</td>
                        <td colspan="30">অভিজ্ঞতার বিবরণ (প্রযোজ্য ক্ষেত্রে) : {{ $data->experience ?? '' }}</td>
                    </tr>

                    <tr>
                        <td rowspan="2">১৯</td>
                        <td rowspan="2" colspan="4">কোটা (টিক দিন)</td>
                        <td colspan="14">

                            মুক্তিযোদ্ধা/শহীদ মুক্তিযােদ্ধাদের পুত্র-কন্যা/পুত্র-কন্যার পুত্র কন্যা

                            @if($data->qota == 1)
                                <span style="font-weight: 900; font-size: 15px;"> ✓</span>
                            @endif

                        </td>
                        <td colspan="12">এতিম/শারীরিক প্রতিবন্ধী

                            @if($data->qota == 2)
                                <span style="font-weight: 900; font-size: 15px;"> ✓</span>
                            @endif

                        </td>
                    </tr>
                    <tr>
                        <td colspan="8">ক্ষুদ্র নৃ-গােষ্ঠী

                            @if($data->qota == 3)
                                <span style="font-weight: 900; font-size: 15px;"> ✓</span>
                            @endif

                        </td>
                        <td colspan="10">আনসার ও গ্রাম প্রতিরক্ষা সদস্য

                            @if($data->qota == 4)
                                <span style="font-weight: 900; font-size: 15px;"> ✓</span>
                            @endif

                        </td>
                        <td colspan="8">অন্যান্য (উল্লেখ্য করুন)

                            @if($data->qota == 5)
                                <span style="font-weight: 900; font-size: 15px;"> ✓</span>
                            @endif

                        </td>
                    </tr>

                    <tr>
                        <td>২০</td>
                        <!-- <td colspan="20">চালানব্যাংক ড্রাফট/পে-অর্ডার নম্বর</td> -->
                        <td colspan="20">মোবাইল ব্যাংকিং একাউন্ট নম্বর : {{ $data->mobile_banking_number ?? '' }}</td>
                        <td colspan="2">তারিখ : </td>
                        <td colspan="8">
                             <?php  
                                $date = Carbon\Carbon::parse($data->date)->format('d/m/Y');
                            ?>
                            {{ $date ?? '' }}

                            <br>
                        </td>
<!--                         <td><br></td>
                        <td><br></td>
                        <td><br></td>
                        <td><br></td>
                        <td><br></td>
                        <td><br></td>
                        <td><br></td> -->
                    </tr>

                    <tr>
                        <td><br></td>
                        <!-- <td colspan="30">ব্যাংক ও শাখার নামঃ</td> -->
                        <td colspan="30">মোবাইল ব্যাংকিং টাইপ : 


                            @if($data->mobile_banking_type == 1)

                                <span>বিকাশ ( Perosnal )</span>

                            @elseif($data->mobile_banking_type == 2)

                                <span>বিকাশ ( Agent )</span>

                            @elseif($data->mobile_banking_type == 3)

                                <span>রকেট ( Perosnal )</span>

                            @elseif($data->mobile_banking_type == 4)

                                <span>রকেট ( Agent )</span>

                            @elseif($data->mobile_banking_type == 5)

                                <span>নগদ ( Perosnal )</span>

                            @elseif($data->mobile_banking_type == 6)

                                <span>নগদ ( Agent )</span>

                            @elseif($data->mobile_banking_type == 7)

                                <span>উপায় ( Perosnal )</span>

                            @else

                                <span>উপায় ( Agent )</span>

                            @endif

                        </td>
                    </tr>

                    <tr>
                        <td>২১</td>
                        <td colspan="15">বিভাগীয় প্রার্থী কিনা (টিক দিন)</td>
                        <td colspan="5">হ্যা : 
                            @if($data->division_candidate == 1)
                                <span style="font-weight: 900; font-size: 15px;"> ✓</span>
                            @endif
                        </td>
                        <td colspan="5">না

                            @if($data->division_candidate == 2)
                                <span style="font-weight: 900; font-size: 15px;"> ✓</span>
                            @endif


                        </td>
                        <td colspan="5">প্রযোজ্য না

                            @if($data->division_candidate == 3)
                                <span style="font-weight: 900; font-size: 15px;"> ✓</span>
                            @endif

                        </td>
                    </tr>

                    <tr>
                        <td colspan="31">আমি এ মর্মে অঙ্গীকার করছি যে, ওপরে বর্ণিত তথ্যাবলি সম্পূর্ণ সত্য। অনলাইন পরীক্ষার সময় উল্লিখিত তথ্য প্রমাণের জন্য সকল মূল। রেকর্ডপত্র উপস্থাপন করব। কোন তথ্য অসত্য প্রমাণিত হলে আইনানুগ শাস্তি ভােগ করতে বাধ্য থাকব।
                            <br><br>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">তারিখ</td>
                        <td colspan="8">

                            <?php  
                                $date = Carbon\Carbon::parse($data->date)->format('d/m/Y');
                            ?>
                            {{ $date ?? '' }}

                            <br>
                        </td>
                        <!-- <td><br></td>
                        <td><br></td>
                        <td><br></td>
                        <td><br></td>
                        <td><br></td>
                        <td><br></td>
                        <td><br></td> -->
                        <td colspan="20" class="border-none">প্রাথীর সাক্ষর : {{ $data->cadidate_signature ?? '' }} </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <!-- ALL JS -->
    <script src="{{asset('public/assets/frontend/')}}/dist/js/jquery-3.5.1.min.js"></script>
    <script>
        function printDiv() {
            var printContents = document.getElementById('pdf-container').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
        $('body').on('click', '.print-pdf', function() {
            printDiv('pdf-container');
        });
    </script>
</body>

</html>