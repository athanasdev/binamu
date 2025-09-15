@extends('frontend.layouts.app')

@section('title')
<title>My Profile | {{ config('app.name') }} </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('content')


    <main class="mt-10">
        <section class="section-padding">
            <div class="max-w-[600px] mx-auto px-4">
                <h2 class="text-2xl font-semibold text-center mb-5">My Profile</h2>

                    <div style="text-align: center;">

                        <a href="{{ route('agent-information-pdf') }}" target="_blank"><button style="background: #00a2ff;padding: 9px 30px; margin-bottom: 10px;">Download PDF</button></a>
                        
                    </div>

                @include('frontend.layouts.flash-message')
                
                <form action="{{route('agent.update',$data->id)}}" method="post" enctype="multipart/form-data" class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @method('patch')
                    @csrf
                    
                    <div class="sm:col-span-2 theme-input-container responsive-table">
                        <label class="text-sm font-semibold mb-1">পদের নাম</label>
                        <input type="text" name="post_name" class="input-border border border-gray-400 rounded-md w-full py-2 px-3" value="{{ $data->post_name ?? '' }}">
                    </div>


                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">বিজ্ঞপ্তি নম্বর:</label>
                        <input type="text" name="notification_no" class="input-border border border-gray-400 rounded-md w-full py-2 px-3"  value="{{ $data->notification_no ?? '' }}">
                    </div>

                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">তারিখ ( mm/dd/YYYY )</label>
                        <input type="date" name="date" class="input-border border border-gray-400 rounded-md w-full py-2 px-3"  value="{{ $data->date ?? '' }}">
                    </div>

                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">প্রাথীর নাম (বাংলা)</label>
                        <input type="text" name="candidate_name_bn" class="input-border border border-gray-400 rounded-md w-full py-2 px-3"  value="{{ $data->candidate_name_bn ?? '' }}">
                    </div>

                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">প্রাথীর নাম (ইংলিশ)</label>
                        <input type="text" name="candidate_name_en" class="input-border border border-gray-400 rounded-md w-full py-2 px-3"  value="{{ $data->candidate_name_en ?? '' }}">
                    </div>

                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">জাতীয় পরিচয় পত্র</label>
                        <input type="text" name="national_id_card_no" class="input-border border border-gray-400 rounded-md w-full py-2 px-3"  value="{{ $data->national_id_card_no ?? '' }}">
                    </div>

                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">জন্ম নিবন্ধন</label>
                        <input type="text" name="birth_certificate" class="input-border border border-gray-400 rounded-md w-full py-2 px-3"  value="{{ $data->birth_certificate ?? '' }}">
                    </div>

                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">জন্ম তারিখ ( mm/dd/YYYY )</label>
                        <input type="date" name="birth_date" class="input-border border border-gray-400 rounded-md w-full py-2 px-3"  value="{{ $data->birth_date ?? '' }}">
                    </div>


                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">বিজ্ঞপ্তিতে উল্লেখিত তারিখে প্রার্থীর বয়স</label>
                        <input type="text" name="age" class="input-border border border-gray-400 rounded-md w-full py-2 px-3"  value="{{ $data->age ?? '' }}">
                    </div> 


                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">জন্ম স্থান (জেলা )</label>
                        <input type="text" name="birth_place_district" class="input-border border border-gray-400 rounded-md w-full py-2 px-3"  value="{{ $data->birth_place_district ?? '' }}">
                    </div>

                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">মাতার নাম</label>
                        <input type="text" name="mother_name" class="input-border border border-gray-400 rounded-md w-full py-2 px-3"  value="{{ $data->mother_name ?? '' }}">
                    </div>

                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">পিতার নাম</label>
                        <input type="text" name="father_name" class="input-border border border-gray-400 rounded-md w-full py-2 px-3"  value="{{ $data->father_name ?? '' }}">
                    </div>

                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">মােবাইল/টেলিফোন নম্বর:</label>
                        <input type="text" name="mobile_number" class="input-border border border-gray-400 rounded-md w-full py-2 px-3"  value="{{ $data->mobile_number ?? '' }}">
                    </div>

                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">যােগাযােগ:</label>
                        <input type="text" name="contact_number" class="input-border border border-gray-400 rounded-md w-full py-2 px-3"  value="{{ $data->contact_number ?? '' }}">
                    </div>

                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">ই-মেইল (যদি থাকে) :</label>
                        <input type="text" name="email" class="input-border border border-gray-400 rounded-md w-full py-2 px-3"  value="{{ $data->email ?? '' }}">
                    </div>

                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">Refer code :</label>
                        <input type="text" name="referral_code" class="input-border border border-gray-400 rounded-md w-full py-2 px-3"  value="{{ $data->referral_code ?? '' }}">
                    </div>

                    <div class="sm:col-span-2 theme-input-container responsive-table">
                        <table class="w-full theme-table table-bordered text-sm min-w-[400px] whitespace-nowrap">
                            
                            <tr>
                                <td>ঠিকানা</td>
                                <td>বর্তমান</td>
                                <td>স্থায়ী</td>
                            </tr>

                            <tr>
                                <td>বাসা ও সড়ক :</td>
                                <td><input type="text" name="house_present" class="border border-gray-300 px-3 py-1" value="{{ $address->house_present ?? '' }}"></td>
                                <td><input type="text" name="house_permanent" class="border border-gray-300 px-3 py-1" value="{{ $address->house_permanent ?? '' }}"></td>
                            </tr>

                            <tr>
                                <td>গ্রাম/পাড়া /মহল্লা :</td>
                                <td><input type="text" name="village_present" class="border border-gray-300 px-3 py-1" value="{{ $address->village_present ?? '' }}"></td>
                                <td><input type="text" name="village_permanent" class="border border-gray-300 px-3 py-1" value="{{ $address->village_permanent ?? '' }}"></td>
                            </tr>

                            <tr>
                                <td>ইউনিয়ন / ওয়ার্ড :</td>
                                <td><input type="text" name="union_present" class="border border-gray-300 px-3 py-1" value="{{ $address->union_present ?? '' }}"></td>
                                <td><input type="text" name="union_permanent" class="border border-gray-300 px-3 py-1" value="{{ $address->union_permanent ?? '' }}"></td>
                            </tr>

                            <tr>
                                <td>ডাকঘর :</td>
                                <td><input type="text" name="post_office_present" class="border border-gray-300 px-3 py-1" value="{{ $address->post_office_present ?? '' }}"></td>
                                <td><input type="text" name="post_office_permanent" class="border border-gray-300 px-3 py-1" value="{{ $address->post_office_permanent ?? '' }}"></td>
                            </tr>

                            <tr>
                                <td>পোস্ট অফিসে নম্বর :</td>
                                <td><input type="text" name="post_office_number_present" class="border border-gray-300 px-3 py-1" value="{{ $address->post_office_number_present ?? '' }}"></td>
                                <td><input type="text" name="post_office_number_permanent" class="border border-gray-300 px-3 py-1" value="{{ $address->post_office_number_permanent ?? '' }}"></td>
                            </tr>

                            <tr>
                                <td>উপজেলা :</td>
                                <td><input type="text" name="thana_present" class="border border-gray-300 px-3 py-1" value="{{ $address->thana_present ?? '' }}"></td>
                                <td><input type="text" name="thana_permanent" class="border border-gray-300 px-3 py-1" value="{{ $address->thana_permanent ?? '' }}"></td>
                            </tr>

                            <tr>
                                <td>জেলা:</td>
                                <td><input type="text" name="district_present" class="border border-gray-300 px-3 py-1" value="{{ $address->district_present ?? '' }}"></td>
                                <td><input type="text" name="district_permanent" class="border border-gray-300 px-3 py-1" value="{{ $address->district_permanent ?? '' }}"></td>
                            </tr>

                        </table>
                    </div>

                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">জাতীয়তা:</label>
                        <input type="text" id="nationality" class="input-border border border-gray-400 rounded-md w-full py-2 px-3"  value="{{ $data->nationality ?? '' }}">
                    </div>

                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">জেন্ডার:</label>

                        <select name="gender" class="input-border border border-gray-400 rounded-md w-full py-2 px-3">
                            <option value="">--- নির্বাচন করুন ---</option>

                            <option value="1" @php if ($data->gender == 1) { echo "selected"; } @endphp>পুরুষ</option>
                            <option value="2" @php if ($data->gender == 2) { echo "selected"; } @endphp>মহিলা</option>
                            <option value="3" @php if ($data->gender == 3) { echo "selected"; } @endphp>অন্যান্য</option>

                        </select>

                    </div>

                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">পেশা:</label>
                        <input type="text" name="occupation" class="input-border border border-gray-400 rounded-md w-full py-2 px-3"  value="{{ $data->occupation ?? '' }}">
                    </div>

                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">ধর্ম:</label>
                        <input type="text" name="religion" class="input-border border border-gray-400 rounded-md w-full py-2 px-3"  value="{{ $data->religion ?? '' }}">
                    </div>

                    <div class="sm:col-span-2 theme-input-container responsive-table">
                        <table class="w-full theme-table table-bordered text-sm min-w-[400px] whitespace-nowrap">
                            <tr>
                                <td>পরীক্ষার নাম</td>
                                <td>বিষয়</td>
                                <td>শিক্ষা প্রতিষ্ঠান</td>
                                <td>পসের সন </td>
                                <td>বোর্ড/বিশ্ববিদ্যালয়</td>
                                <td>গ্রেড/শ্রেণি/বিভাগ</td>
                            </tr>

                            <tr>
                                <td><input type="text" name="exam_name_1" class="border border-gray-300 px-3 py-1" value="{{ $education->exam_name_1 }}"></td>
                                <td><input type="text" name="subject_name_1" class="border border-gray-300 px-3 py-1" value="{{ $education->subject_name_1 }}"></td>
                                <td><input type="text" name="institute_name_1" class="border border-gray-300 px-3 py-1" value="{{ $education->institute_name_1 }}"></td>
                                <td><input type="text" name="passing_year_1" class="border border-gray-300 px-3 py-1" value="{{ $education->passing_year_1 }}"></td>
                                <td><input type="text" name="board_name_1" class="border border-gray-300 px-3 py-1" value="{{ $education->board_name_1 }}"></td>
                                <td><input type="text" name="grade_1" class="border border-gray-300 px-3 py-1" value="{{ $education->grade_1 }}"></td>
                            </tr>

                            <tr>
                                <td><input type="text" name="exam_name_2" class="border border-gray-300 px-3 py-1" value="{{ $education->exam_name_2 }}"></td>
                                <td><input type="text" name="subject_name_2" class="border border-gray-300 px-3 py-1" value="{{ $education->subject_name_2 }}"></td>
                                <td><input type="text" name="institute_name_2" class="border border-gray-300 px-3 py-1" value="{{ $education->institute_name_2 }}"></td>
                                <td><input type="text" name="passing_year_2" class="border border-gray-300 px-3 py-1" value="{{ $education->passing_year_2 }}"></td>
                                <td><input type="text" name="board_name_2" class="border border-gray-300 px-3 py-1" value="{{ $education->board_name_2 }}"></td>
                                <td><input type="text" name="grade_2" class="border border-gray-300 px-3 py-1" value="{{ $education->grade_2 }}"></td>
                            </tr>

                            <tr>
                                <td><input type="text" name="exam_name_3" class="border border-gray-300 px-3 py-1" value="{{ $education->exam_name_3 }}"></td>
                                <td><input type="text" name="subject_name_3" class="border border-gray-300 px-3 py-1" value="{{ $education->subject_name_3 }}"></td>
                                <td><input type="text" name="institute_name_3" class="border border-gray-300 px-3 py-1" value="{{ $education->institute_name_3 }}"></td>
                                <td><input type="text" name="passing_year_3" class="border border-gray-300 px-3 py-1" value="{{ $education->passing_year_3 }}"></td>
                                <td><input type="text" name="board_name_3" class="border border-gray-300 px-3 py-1" value="{{ $education->board_name_3 }}"></td>
                                <td><input type="text" name="grade_3" class="border border-gray-300 px-3 py-1" value="{{ $education->grade_3 }}"></td>
                            </tr>

                            <tr>
                                <td><input type="text" name="exam_name_4" class="border border-gray-300 px-3 py-1" value="{{ $education->exam_name_4 }}"></td>
                                <td><input type="text" name="subject_name_4" class="border border-gray-300 px-3 py-1" value="{{ $education->subject_name_4 }}"></td>
                                <td><input type="text" name="institute_name_4" class="border border-gray-300 px-3 py-1" value="{{ $education->institute_name_4 }}"></td>
                                <td><input type="text" name="passing_year_4" class="border border-gray-300 px-3 py-1" value="{{ $education->passing_year_4 }}"></td>
                                <td><input type="text" name="board_name_4" class="border border-gray-300 px-3 py-1" value="{{ $education->board_name_4 }}"></td>
                                <td><input type="text" name="grade_4" class="border border-gray-300 px-3 py-1" value="{{ $education->grade_4 }}"></td>
                            </tr>

                            <tr>
                                <td><input type="text" name="exam_name_5" class="border border-gray-300 px-3 py-1" value="{{ $education->exam_name_5 }}"></td>
                                <td><input type="text" name="subject_name_5" class="border border-gray-300 px-3 py-1" value="{{ $education->subject_name_5 }}"></td>
                                <td><input type="text" name="institute_name_5" class="border border-gray-300 px-3 py-1" value="{{ $education->institute_name_5 }}"></td>
                                <td><input type="text" name="passing_year_5" class="border border-gray-300 px-3 py-1" value="{{ $education->passing_year_5 }}"></td>
                                <td><input type="text" name="board_name_5" class="border border-gray-300 px-3 py-1" value="{{ $education->board_name_5 }}"></td>
                                <td><input type="text" name="grade_5" class="border border-gray-300 px-3 py-1" value="{{ $education->grade_5 }}"></td>
                            </tr>
                       
                         
                        </table>
                    </div>

                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">অতিরিক্ত যােগ্যতা (যদি থাকে):</label>
                        <input type="text"name="additional_qualifications" class="input-border border border-gray-400 rounded-md w-full py-2 px-3"  value="{{ $data->additional_qualifications ?? '' }}">
                    </div>

                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">অভিজ্ঞতার বিবরণ (প্রযোজ্য ক্ষেত্রে):</label>
                        <input type="text"name="experience" class="input-border border border-gray-400 rounded-md w-full py-2 px-3"  value="{{ $data->experience ?? '' }}">
                    </div>

                    <div class="sm:col-span-2 theme-input-container">
                        <label class="text-sm font-semibold mb-3 block"> কোটা (টিক দিন):</label>
                        <div>
                            <label>
                                <input type="radio" name="qota" value="1" @php if ($data->qota == 1) { echo "checked"; } @endphp> মুক্তিযোদ্ধা/শহীদ মুক্তিযােদ্ধাদের পুত্র-কন্যা/পুত্র-কন্যার পুত্র কন্যা 
                            </label><br>
                            <label>
                                <input type="radio" name="qota" value="2" @php if ($data->qota == 2) { echo "checked"; } @endphp> এতিম/শারীরিক প্রতিবন্ধী 
                            </label><br>
                            <label>
                                <input type="radio" name="qota" value="3" @php if ($data->qota == 3) { echo "checked"; } @endphp> ক্ষুদ্র নৃ-গােষ্ঠী 
                            </label><br>
                            <label>
                                <input type="radio" name="qota" value="4" @php if ($data->qota == 4) { echo "checked"; } @endphp> আনসার ও গ্রাম প্রতিরক্ষা সদস্য 
                            </label><br>
                            <label>
                                <input type="radio" name="qota" value="5" @php if ($data->qota == 5) { echo "checked"; } @endphp> অন্যান্য 
                            </label><br>

                        </div>
                    </div>

                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">মোবাইল ব্যাংকিং একাউন্ট নম্বর :</label>
                        <input type="text" name="mobile_banking_number" class="input-border border border-gray-400 rounded-md w-full py-2 px-3"  value="{{ $data->mobile_banking_number ?? '' }}">
                    </div>

                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">মোবাইল ব্যাংকিং টাইপ :</label>

                        <select name="mobile_banking_type" class="input-border border border-gray-400 rounded-md w-full py-2 px-3" id="">
                            <option value="">--- নির্বাচন করুন ---</option>

                            <option value="1" @php if ($data->mobile_banking_type == 1) { echo "selected"; } @endphp>বিকাশ ( Perosnal )</option>
                            <option value="2" @php if ($data->mobile_banking_type == 2) { echo "selected"; } @endphp>বিকাশ ( Agent )</option>
                            <option value="3" @php if ($data->mobile_banking_type == 3) { echo "selected"; } @endphp>রকেট ( Perosnal )</option>
                            <option value="4" @php if ($data->mobile_banking_type == 4) { echo "selected"; } @endphp>রকেট ( Agent )</option>
                            <option value="5" @php if ($data->mobile_banking_type == 5) { echo "selected"; } @endphp>নগদ ( Perosnal )</option>
                            <option value="6" @php if ($data->mobile_banking_type == 6) { echo "selected"; } @endphp>নগদ ( Agent )</option>
                            <option value="7" @php if ($data->mobile_banking_type == 7) { echo "selected"; } @endphp>উপায় ( Perosnal )</option>
                            <option value="8" @php if ($data->mobile_banking_type == 8) { echo "selected"; } @endphp>উপায় ( Agent )</option>
                        </select>
                    </div>

                    <div class="sm:col-span-2 theme-input-container">
                        <label class="text-sm font-semibold mb-3 block">বিভাগীয় প্রার্থী কিনা (টিক দিন):</label>
                        <div>
                            <label>
                                <input type="radio" name="division_candidate" value="1" @php if ($data->division_candidate == 1) { echo "checked"; } @endphp> হ্যা
                            </label><br>
                            <label>
                                <input type="radio" name="division_candidate" value="2" @php if ($data->division_candidate == 2) { echo "checked"; } @endphp> না
                            </label><br>
                            <label>
                                <input type="radio" name="division_candidate" value="0" @php if ($data->division_candidate == 0) { echo "checked"; } @endphp> প্রযোজ্য না
                            </label><br>
                        </div>
                    </div>

                    <!-- <div class="theme-input-container sm:col-span-2">
                        আমি এ মর্মে অঙ্গীকার করছি যে, ওপরে বর্ণিত তথ্যাবলি সম্পূর্ণ সত্য। অনলাইন পরীক্ষার সময় উল্লিখিত তথ্য প্রমাণের জন্য সকল মূল। রেকর্ডপত্র উপস্থাপন করব। কোন তথ্য অসত্য প্রমাণিত হলে আইনানুগ শাস্তি ভােগ করতে বাধ্য থাকব।
                    </div> -->

                    <!-- <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">তারিখ:</label>
                        <input type="date" id="name" class="input-border border border-gray-400 rounded-md w-full py-2 px-3"  value="{{ $data->post_name ?? '' }}">
                    </div> -->

                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">প্রাথীর সাক্ষর:</label>
                        <input type="text" name="cadidate_signature" class="input-border border border-gray-400 rounded-md w-full py-2 px-3"  value="{{ $data->cadidate_signature ?? '' }}">
                    </div>

                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">প্রাথীর ছবি:</label>
                        <input type="file" name="image" class="input-border border border-gray-400 rounded-md w-full py-2 px-3">

                        @if($data->image)
                            বর্তমান ছবি: <a href="{{ asset($data->image) }}" target="_blank"><img src="{{ asset($data->image) }}" alt="" style="width: 69px;border: 2px solid; padding: 3px;"></a>
                        @endif

                    </div>




                    <div class="text-center sm:col-span-2">
                        <!-- <button class="px-6 py-2 w-1/2 max-w-[150px] bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200">Update</button> -->
                    </div>
                </form>
            </div>
        </section>
    </main>




@endsection
