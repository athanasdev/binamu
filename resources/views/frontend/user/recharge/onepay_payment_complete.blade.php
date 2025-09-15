
<!DOCTYPE html>
<html lang="en">
    <!-- Include Head -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <meta name="description" content="TRADIND APP">
    <meta name="keywords" content="bootstrap, wallet, banking, trading, mobile, html, responsive" />

    <meta name="csrf-token" content="RtzgdcNhHLHIlJIXHvAISr7Ea0zWdKsdxWGvnBHl">
    <link rel="shortcut icon" type="image/png" href="https://onepay.7-10.xyz/asset/theme3/images/icon/icon.jpg">
    <title>
                    FIX TRADING-
                Order Success
    </title>

    <link href="https://onepay.7-10.xyz/asset/theme3/frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom Css Start-->
    
    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/onepay_success.css">
    
    <!-- Custom Css End-->

    <!-- Material icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<body>
        <!-- App Capsule -->
    <div id="appCapsule">
        <div class="container">

            <div style="text-align: center">
                <img src="{{asset('assets/frontend/')}}/images/c_p_logo.png" style="width: 100px">
            </div>
            <br>

            <h2 class="mb-4 text-center fw-bold">
                অর্ডার পর্যালোচনা করা হচ্ছে, এবং পর্যালোচনা 30 মিনিটের মধ্যে সম্পন্ন হবে বলে আশা করা হচ্ছে
            </h2>
            <div class="mt-3 mb-3 px-3">
                <h6 class="small-font-lg text-start fw-bold">
                    অর্ডার নাম্বার: <span style="font-weight: 900"> {{ $order->order_id }}</span>
                </h6>
                <h6 class="small-font-lg text-start fw-bold">
                    অর্ডারের পরিমাণ: <span style="font-weight: 900">{{ $order->amount_coin }}  </span>
                </h6>
                <h6 class="small-font-lg text-start fw-bold">
                    প্রকৃত অর্থপ্রদানের পরিমাণ: <span style="font-weight: 900">{{ $order->amount_taka }} taka</span>
                </h6>
            </div>
            <a href="{{ url('/') }}" class="btn btn-lg btn-dark w-100 fw-bold">হোম পেইজে ফিরে যান</a>
        </div>
    </div>
    <!-- Include Script -->



    <!-- ========= Custom JS Files Start =========  -->
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Splide -->
    <!-- Base Js File -->
    <!-- Sweet Alert 2.0 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Owl carousel 2.3.4 -->
    <script src="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/owl.carousel.min.js"></script>

</body>
