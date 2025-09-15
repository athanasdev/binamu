<!DOCTYPE html>

<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$site_info->site_name ?? ''}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">


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
</head>

<body class="py-3 bg-white">
    <div class="mb-10 text-center">
        <button class="print-pdf px-5 py-2 rounded-md bg-emerald-600 text-gray-100">Print</button>
    </div>
    <div id="pdf-container">
        <div class="pdf-wrapper text-gray-600 w-[740px] h-[950px] mx-auto">
            <div class="text-center mb-4">
                <h2 class="text-2xl font-bold">{!! $site_info->foundation_name ?? '' !!}</h2>
                <div class="text-lg mb-6">
                   {!! $site_info->slogan ?? '' !!} <br>
                   {!! $site_info->address ?? '' !!}
                </div>

                <h2 class="font-bold">Application Form</h2>
            </div>

            <div class="text-sm">
                <div class="grid grid-cols-12 mb-1">
                    <div class="col-span-10 space-y-3">
                        <div class="flex gap-3 items-end">
                            <span>Name: </span> 
                            <span class="border-b border-gray-400 border-dotted w-full max-w-[300px] h-full leading-none mb-1"> {{ $data->name ?? '' }} </span>
                        </div>
                        <div class="flex gap-3 items-end">
                            <span>Father:  </span> 
                            <span class="border-b border-gray-400 border-dotted w-full max-w-[300px] h-full leading-none mb-1"> {{ $data->father_name ?? '' }}</span>
                        </div>
                        <div class="flex gap-3 items-end">
                            <span>Mother: </span> 
                            <span class="border-b border-gray-400 border-dotted w-full max-w-[300px] h-full leading-none mb-1"> {{ $data->mother_name ?? '' }} </span>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <img src="{{asset($data->image)}}" alt="" class="w-full">
                    </div>
                </div>
                <div class="flex gap-x-3 gap-y-1 items-end flex-wrap">
                    <span><b>Permanent Address:</b></span>


                    <span>Village: </span>
                    <span class="border-b border-gray-400 border-dotted w-full max-w-[200px] h-full leading-none mb-1"> {{ $data->village_permanent ?? '' }} </span>


                    <span>Post: </span>
                    <span class="border-b border-gray-400 border-dotted w-full max-w-[200px] h-full leading-none mb-1"> {{ $data->post_office_present ?? '' }} </span>


                    <span>Upazila:   </span>
                    <span class="border-b border-gray-400 border-dotted w-full max-w-[200px] h-full leading-none mb-1">{{ $data->thana_present ?? '' }}</span>


                    <div class="w-full"></div>
                    <span>Districts:   </span>
                    <span class="border-b border-gray-400 border-dotted w-full max-w-[200px] h-full leading-none mb-1">{{ $data->district_present ?? '' }}</span>


                    <span>Nationality:  </span>
                    <span class="border-b border-gray-400 border-dotted w-full max-w-[200px] h-full leading-none mb-1"> {{ $data->nationality ?? '' }}</span>
                </div>

                <div class="flex gap-x-3 gap-y-1 items-end flex-wrap mt-5">
                    <span><b>Present Address:</b> </span>


                    <span>Village: </span>
                    <span class="border-b border-gray-400 border-dotted w-full max-w-[200px] h-full leading-none mb-1"> {{ $data->village_present ?? '' }} </span>


                    <span>Post:   </span>
                    <span class="border-b border-gray-400 border-dotted w-full max-w-[200px] h-full leading-none mb-1">{{ $data->post_office_present ?? '' }}</span>


                    <span>Upazila:  </span>
                    <span class="border-b border-gray-400 border-dotted w-full max-w-[200px] h-full leading-none mb-1">{{ $data->thana_present ?? '' }} </span>


                    <div class="w-full"></div>
                    <span>Districts:  </span>
                    <span class="border-b border-gray-400 border-dotted w-full max-w-[200px] h-full leading-none mb-1"> {{ $data->district_present ?? '' }}</span>

                  
                </div>

                <div class="flex gap-x-3 gap-y-1 items-end flex-wrap mt-5">


                    <span>National ID/Birth Certificate Number: </span>
                    <span class="border-b border-gray-400 border-dotted w-full max-w-[200px] h-full leading-none mb-1">{{ $data->national_id_card_no_or_b_d_c ?? '' }}  </span>



                    <span>Type of ID:  </span>
                    <span class="border-b border-gray-400 border-dotted w-full max-w-[200px] h-full leading-none mb-1">{{ $data->type_of_id ?? '' }} </span>
                    <div class="w-full"></div>



                    <span>Birth Date:  </span>
                    <span class="border-b border-gray-400 border-dotted w-full max-w-[200px] h-full leading-none mb-1">{{ $data->birth_date ?? '' }} </span>



                    <span>Type of Member: </span>
                    <span class="border-b border-gray-400 border-dotted w-full max-w-[200px] h-full leading-none mb-1"> {{ $data->name ?? '' }} </span>
                    <div class="w-full"></div>



                    <span>Phone Number: </span>
                    <span class="border-b border-gray-400 border-dotted w-full max-w-[200px] h-full leading-none mb-1"> {{ $data->type_of_member ?? '' }} </span>



                    <span>Mobile Banking Number: </span>
                    <span class="border-b border-gray-400 border-dotted w-full max-w-[200px] h-full leading-none mb-1">{{ $data->mobile_banking_number ?? '' }}  </span>
                    <div class="w-full"></div>


                    
                    <!-- <span>Mobile Banking Type: {{ $data->mobile_banking_type ?? '' }}  </span>
                    <span class="border-b border-gray-400 border-dotted w-full max-w-[150px] h-full leading-none mb-1"></span> -->

                    <span>Type of Banking: </span>
                    <span class="border-b border-gray-400 border-dotted w-full max-w-[150px] h-full leading-none mb-1"> {{ $data->mobile_banking_type ?? '' }} </span>
                    <div class="w-full"></div>



                    <span>Class: </span>
                    <span class="border-b border-gray-400 border-dotted w-full max-w-[150px] h-full leading-none mb-1"> {{ $data->class ?? '' }} </span>



                    <span>Area: </span>
                    <span class="border-b border-gray-400 border-dotted w-full max-w-[150px] h-full leading-none mb-1">{{ $data->area ?? '' }}  </span>
                    <div class="w-full"></div>



                </div>
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