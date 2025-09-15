@extends('admin.layouts.app')
@section('title')
<title>{{ config('app.name') }} | Edit Application Form</title>
<meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@section('content')

<link rel="stylesheet" href="{{asset('public/assets/frontend/')}}/dist/css/tailwind.css">


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Application  Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Application  Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- right column -->
                <div class="col-md-12">
                    <!-- general form elements disabled -->
                    <div class="card card-warning">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Edit Application Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              



                                <section class="section-padding" style="background: #0004ff;">
                                    <div class="max-w-[700px] mx-auto px-4">
                                        <h2 class="text-2xl font-semibold text-center mb-5">Edit Application Form</h2>
                                            @include('frontend.layouts.flash-message')
                                        <form action="{{ route('update-form', $data->id) }}" method="post" enctype="multipart/form-data" class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                            @csrf
                                            
                                            <div class="sm:col-span-2 theme-input-container responsive-table">
                                                <label class="text-sm font-semibold mb-1">Name:  <span style="color: red">*</span> </label>
                                                <input type="text" name="name" class="input-border border border-gray-400 rounded-md w-full py-2 px-3" value="{{ $data->name ?? '' }}">
                                            </div>


                                            <div class="theme-input-container">
                                                <label class="text-sm font-semibold mb-1">Father Name <span style="color: red">*</span> </label>
                                                <input type="text" name="father_name" class="input-border border border-gray-400 rounded-md w-full py-2 px-3" value="{{ $data->father_name ?? '' }}">
                                            </div>


                                            <div class="theme-input-container">
                                                <label class="text-sm font-semibold mb-1">Mother Name <span style="color: red">*</span> </label>
                                                <input type="text" name="mother_name" class="input-border border border-gray-400 rounded-md w-full py-2 px-3" value="{{ $data->mother_name ?? '' }}">
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
                                                        <td><input type="text" name="village_present" class="border border-gray-300 px-3 py-1" value="{{ $data->village_present ?? '' }}"></td>
                                                        <td><input type="text" name="village_permanent" class="border border-gray-300 px-3 py-1" value="{{ $data->village_permanent ?? '' }}"></td>
                                                    </tr>



                                                    <tr>
                                                        <td>Post :</td>
                                                        <td><input type="text" name="post_office_present" class="border border-gray-300 px-3 py-1" value="{{ $data->post_office_present ?? '' }}"></td>
                                                        <td><input type="text" name="post_office_permanent" class="border border-gray-300 px-3 py-1" value="{{ $data->post_office_permanent ?? '' }}"></td>
                                                    </tr>


                                                    <tr>
                                                        <td>Upazila :</td>
                                                        <td><input type="text" name="thana_present" class="border border-gray-300 px-3 py-1" value="{{ $data->thana_present ?? '' }}"></td>
                                                        <td><input type="text" name="thana_permanent" class="border border-gray-300 px-3 py-1" value="{{ $data->thana_permanent ?? '' }}"></td>
                                                    </tr>



                                                    <tr>
                                                        <td>Districts:</td>
                                                        <td><input type="text" name="district_present" class="border border-gray-300 px-3 py-1" value="{{ $data->district_present ?? '' }}"></td>
                                                        <td><input type="text" name="district_permanent" class="border border-gray-300 px-3 py-1" value="{{ $data->district_permanent ?? '' }}"></td>
                                                    </tr>


                                                

                                                    

                                                    
                                                </table>
                                            </div>


                                            <div class="theme-input-container">
                                                <label class="text-sm font-semibold mb-1">Nationality <span style="color: red">*</span> :</label>
                                                <input type="text" name="nationality" class="input-border border border-gray-400 rounded-md w-full py-2 px-3" value="{{ $data->nationality ?? '' }}">
                                            </div>

                                            <div class="theme-input-container">
                                                <label class="text-sm font-semibold mb-1">Date of birth ( mm/dd/YYYY ) <span style="color: red">*</span> </label>
                                                <input type="date" name="birth_date" class="input-border border border-gray-400 rounded-md w-full py-2 px-3" value="{{ $data->birth_date ?? '' }}">
                                            </div>

                                            <div class="sm:col-span-2 theme-input-container responsive-table">
                                                <label class="text-sm font-semibold mb-1">National ID/Birth Certificate Number  <span style="color: red">*</span></label>
                                                <input type="text" name="national_id_card_no_or_b_d_c" class="input-border border border-gray-400 rounded-md w-full py-2 px-3" value="{{ $data->national_id_card_no_or_b_d_c ?? '' }}">
                                            </div>

                                            <div class="theme-input-container">
                                                <label class="text-sm font-semibold mb-1">Type of ID <span style="color: red">*</span> </label>
                                                <input type="text" name="type_of_id" class="input-border border border-gray-400 rounded-md w-full py-2 px-3" value="{{ $data->type_of_id ?? '' }}">
                                            </div>

                                            <div class="theme-input-container">
                                                <label class="text-sm font-semibold mb-1">Type of Member <span style="color: red">*</span> </label>
                                                <input type="text" name="type_of_member" class="input-border border border-gray-400 rounded-md w-full py-2 px-3" value="{{ $data->type_of_member ?? '' }}">
                                            </div>


                                            <div class="theme-input-container">
                                                <label class="text-sm font-semibold mb-1">Phone Number</label>
                                                <input type="text" name="mobile_number" class="input-border border border-gray-400 rounded-md w-full py-2 px-3" value="{{ $data->mobile_number ?? '' }}">
                                            </div>

                                            <div class="theme-input-container">
                                                <label class="text-sm font-semibold mb-1">Image:</label>
                                                <input type="file" name="image" class="input-border border border-gray-400 rounded-md w-full py-2 px-3" >

                                                @if($data->image)
                                                    বর্তমান ছবি: <a href="{{ asset($data->image) }}" target="_blank"><img src="{{ asset($data->image) }}" alt="" style="width: 69px;border: 2px solid; padding: 3px;"></a>
                                                @endif

                                            </div>

                                            <div class="theme-input-container">
                                                <label class="text-sm font-semibold mb-1">Class</label>
                                                <input type="text" name="class" class="input-border border border-gray-400 rounded-md w-full py-2 px-3" value="{{ $data->class ?? '' }}">
                                            </div>



                                            <div class="theme-input-container">
                                                <label class="text-sm font-semibold mb-1">Area</label>
                                                <input type="text" name="area" class="input-border border border-gray-400 rounded-md w-full py-2 px-3" value="{{ $data->area ?? '' }}">
                                            </div>






                                            <div class="theme-input-container">
                                                <label class="text-sm font-semibold mb-1">Mobile banking account no  <span style="color: red">*</span> :</label>
                                                <input type="text" name="mobile_banking_number" class="input-border border border-gray-400 rounded-md w-full py-2 px-3" value="{{ $data->mobile_banking_number ?? '' }}">
                                            </div>

                                            <div class="theme-input-container">
                                                <label class="text-sm font-semibold mb-1">Mobile banking type  <span style="color: red">*</span> :</label>

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
                                                <label class="text-sm font-semibold mb-1"> Transaction id <span style="color: red">*</span> :</label>
                                                <input type="text" name="trx" class="input-border border border-gray-400 rounded-md w-full py-2 px-3" value="{{ $data->trx ?? '' }}">
                                            </div>

                                     
                                            
                                            <div class="text-center sm:col-span-2">
                                                <button class="px-6 py-2 w-1/2 max-w-[150px] bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </section>




                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card-header -->

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
