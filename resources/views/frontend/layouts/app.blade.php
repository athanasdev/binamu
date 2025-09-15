<!DOCTYPE html>
<html lang="en">
<head>

    <?php  
        $site_image = App\Models\SiteImage::first();
    ?>


    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    @yield('title')

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset($site_image->favicon)}}">



    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/slick.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/style.css">
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/responsive.css">

	<link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


</head>
<body>







    @include('frontend.layouts.header')

    @yield('content')

    @include('frontend.layouts.footer')












    <script src="{{asset('assets/frontend/')}}/js/jquery-3.7.0.min.js"></script>
    <script src="{{asset('assets/frontend/')}}/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/frontend/')}}/js/slick.min.js"></script>
    <script src="{{asset('assets/frontend/')}}/js/script.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        @if(Session::has('success'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.success("{{ session('success') }}");
        @endif
      
        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.error("{{ session('error') }}");
        @endif
      
        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.info("{{ session('info') }}");
        @endif
      
        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.warning("{{ session('warning') }}");
        @endif
      </script>




</body>
</html>    