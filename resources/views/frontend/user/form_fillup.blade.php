@extends('frontend.layouts.app')

@section('title')
<title>Form Fill Up | {{ config('app.name') }} </title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('content')

    <main>
        <section class="section-padding">
            <div class="max-w-[600px] mx-auto px-4">
                <h2 class="text-2xl font-semibold text-center mb-5">Application Form</h2>
                    @include('frontend.layouts.flash-message')
                <form action="{{ route('submit_form') }}" method="post" enctype="multipart/form-data" class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    @csrf
                    
                    <div class="sm:col-span-2 theme-input-container responsive-table">
                        <label class="text-sm font-semibold mb-1">Name:  <span style="color: red">*</span> </label>
                        <input type="text" name="name" class="input-border border border-gray-400 rounded-md w-full py-2 px-3">
                    </div>


                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">Father Name <span style="color: red">*</span> </label>
                        <input type="text" name="father_name" class="input-border border border-gray-400 rounded-md w-full py-2 px-3">
                    </div>


                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">Mother Name <span style="color: red">*</span> </label>
                        <input type="text" name="mother_name" class="input-border border border-gray-400 rounded-md w-full py-2 px-3">
                    </div>


                    <div class="sm:col-span-2 theme-input-container responsive-table">
                        <table class="w-full theme-table table-bordered text-sm min-w-[400px] whitespace-nowrap">
                            
                            <tr>
                                <td>Address</td>
                                <td>Present</td>
                                <td>Permanent</td>
                            </tr>

                            <tr>
                                <td>Village :</td>
                                <td><input type="text" name="village_present" class="border border-gray-300 px-3 py-1"></td>
                                <td><input type="text" name="village_permanent" class="border border-gray-300 px-3 py-1"></td>
                            </tr>



                            <tr>
                                <td>Post :</td>
                                <td><input type="text" name="post_office_present" class="border border-gray-300 px-3 py-1"></td>
                                <td><input type="text" name="post_office_permanent" class="border border-gray-300 px-3 py-1"></td>
                            </tr>


                            <tr>
                                <td>Upazila :</td>
                                <td><input type="text" name="thana_present" class="border border-gray-300 px-3 py-1"></td>
                                <td><input type="text" name="thana_permanent" class="border border-gray-300 px-3 py-1"></td>
                            </tr>



                            <tr>
                                <td>Districts:</td>
                                <td><input type="text" name="district_present" class="border border-gray-300 px-3 py-1"></td>
                                <td><input type="text" name="district_permanent" class="border border-gray-300 px-3 py-1"></td>
                            </tr>


                        

                            

                            
                        </table>
                    </div>


                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">Nationality <span style="color: red">*</span> :</label>
                        <input type="text" name="nationality" class="input-border border border-gray-400 rounded-md w-full py-2 px-3">
                    </div>

                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">Date of birth ( mm/dd/YYYY ) <span style="color: red">*</span> </label>
                        <input type="date" name="birth_date" class="input-border border border-gray-400 rounded-md w-full py-2 px-3">
                    </div>

                    <div class="sm:col-span-2 theme-input-container responsive-table">
                        <label class="text-sm font-semibold mb-1">National ID/Birth Certificate Number  <span style="color: red">*</span></label>
                        <input type="text" name="national_id_card_no_or_b_d_c" class="input-border border border-gray-400 rounded-md w-full py-2 px-3">
                    </div>

                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">Type of ID <span style="color: red">*</span> </label>
                        <input type="text" name="type_of_id" class="input-border border border-gray-400 rounded-md w-full py-2 px-3">
                    </div>

                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">Type of Member <span style="color: red">*</span> </label>
                        <input type="text" name="type_of_member" class="input-border border border-gray-400 rounded-md w-full py-2 px-3">
                    </div>


                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">Phone Number</label>
                        <input type="text" name="mobile_number" class="input-border border border-gray-400 rounded-md w-full py-2 px-3">
                    </div>

                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">Image:</label>
                        <input type="file" name="image" class="input-border border border-gray-400 rounded-md w-full py-2 px-3" >
                    </div>

                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">Class</label>
                        <input type="text" name="class" class="input-border border border-gray-400 rounded-md w-full py-2 px-3">
                    </div>



                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">Area</label>
                        <input type="text" name="area" class="input-border border border-gray-400 rounded-md w-full py-2 px-3">
                    </div>






                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">Mobile banking account no  <span style="color: red">*</span> :</label>
                        <input type="text" name="mobile_banking_number" class="input-border border border-gray-400 rounded-md w-full py-2 px-3">
                    </div>

                    <div class="theme-input-container">
                        <label class="text-sm font-semibold mb-1">Mobile banking type  <span style="color: red">*</span> :</label>

                        <select name="mobile_banking_type" class="input-border border border-gray-400 rounded-md w-full py-2 px-3" id="">
                            <option value="">--- নির্বাচন করুন ---</option>

                            <option value="1">বিকাশ ( Perosnal )</option>
                            <option value="2">বিকাশ ( Agent )</option>
                            <option value="3">রকেট ( Perosnal )</option>
                            <option value="4">রকেট ( Agent )</option>
                            <option value="5">নগদ ( Perosnal )</option>
                            <option value="6">নগদ ( Agent )</option>
                            <option value="7">উপায় ( Perosnal )</option>
                            <option value="8">উপায় ( Agent )</option>
                        </select>
                    </div>

                    <div class="sm:col-span-2 theme-input-container">
                        <label class="text-sm font-semibold mb-1"> Transaction id <span style="color: red">*</span> :</label>
                        <input type="text" name="trx" class="input-border border border-gray-400 rounded-md w-full py-2 px-3" required>
                    </div>

             
                    
                    <div class="text-center sm:col-span-2">
                        <button class="px-6 py-2 w-1/2 max-w-[150px] bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200">Submit</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

@endsection
