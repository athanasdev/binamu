
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css'>



    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/onepay_style_two.css">
    <style>
        body{
                touch-action: manipulation;
            }
    </style>
    <style>
        .btn-group.confirm-btn {
            width: unset;
        }
        .btn-primary:hover {
            color: #fff;
            background-color: #5370e5 !important;
            border-color: #5370e5 !important;
        }
        input:focus-visible {
            border: 1px solid #707070;
            outline: none;
        }
        .pay_details_banner h3 {
            margin-bottom: 0;
        }
        p.any_issue {
            margin: 0;
            font-size: 11px;
            line-height: 30px;
            min-height: 30px;
        }
        .b.card-body {
            padding-bottom: 0;
        }
        .card.sec-card {
            margin-top: 5px;
        }
        p.details_star {
            line-height: 20px;
        }
        a.btn.btn-primary.con_btn {
            font-size: 12px;
        }
        a.btn.btn-light.c_btn {
            font-size: 12px;
        }
        .btn-group.confirm-btn {
            position: fixed;
            bottom: 0;
            width: 100%;
            left: 0;
        }
        h4.pay_step {
            font-size: 12px;
            font-weight: 600;
        }
        input.copy_pay_number {
            font-weight: unset;
        }
        .btn-group.confirm-btn {
            position: fixed;
            bottom: 10px;
            width: 95%;
            left: 0;
        }
        h4.pay_step {
            font-size: 12px;
        }
    </style>
    <style>
        section.number_popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #00000061;
            z-index: -1;
            opacity: 0;
            transition: .4s;
        }
        .number_popUp_container {
            position: absolute;
            width: 250px;
            height: 200px;
            background: #fff;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 20px;
        }
        button.btn_p {
            border: none;
            background: #466ef2;
            padding: 6px 11px;
            border-radius: 5px;
            color: #fff;
            font-size: 14px;
        }
        p.p_pera {
            margin: 10px 11px;
            font-size: 13px;
            text-align: center;
            line-height: 23px;
        }
        button.btn_p.btn_p_can {
            background: transparent;
            border: 2px solid #466ef2;
            color: #466ef2;
        }
    </style>
</head>
<body>
<section>
    <h3 class="pay_details_header">
        পেমেন্ট তথ্য
        <a href="" class="go_back_to_details"> <i class="fa fa-angle-left" aria-hidden="true"></i> </a>
    </h3>
</section>

<section>
    <form action="{{ route('payment-confirm') }}" method="post">
        @csrf



    <div class="container" style="padding-left:6px;padding-right:6px">
        <div class="row m-0 p-0">
            <div class="col-12 my-2">
                <div class="pay_details_banner text-center">
                    <img src="{{asset('assets/frontend/')}}/images/pay_logo.png">
                    <h3 class="text-uppercase">ONE PAY</h3>
                    <div class="details_timer">
                        <img src="{{asset('assets/frontend/')}}/images/timer.png" alt="">
                        <span id="timer"></span>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <p class="any_issue" style="display: block" onclick="change_number()"> অ্যাকাউন্ট ত্রুটি, স্যুইচ করতে ক্লিক করুন >> </p>
            </div>
        </div>

        <div class="row m-0 p-0">
            <div class="col-12">
                <h4 class="pay_step">
                    স্টেপ ১.কপি {{ $payment_method->name }} ইনফরমেশন
                </h4>
            </div>
        </div>

        <div class="row m-0 p-0">
            <div class="col-12">
                <div class="card-body b border-bottom-radius">
                    <div class="d-flex justify-content-between part-1">
                        <div>
                            <h3 class="b_acc">{{ $payment_method->name }}</h3>
                        </div>
                        <div>
                            <div class="input-group">
                               
                         <input type="text" style="text-align:right;" class="copy_pay_number" readonly value="{{ $payment_method->number }}">
                       
                       <div class="input-group-btn copy">
                                    <button class="btn btn-default"
                                            type="submit"
                                            id="copyNumber" >
                                        <img src="{{asset('assets/frontend/')}}/images/copy-number.png" alt="">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between part-2" >
                        <div >
                            পরিমাণ
                        </div>
                        <div >
                            {{$total_taka ?? '0' }} TK
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row m-0 p-0">
            <div class="col-12">
                <div class="card sec-card ">
                    <div class="t card-body p-0 border-bottom-radius">
                        <h4 class="pay_step mt-0">
                            ধাপ 2. {{ $payment_method->name }} ট্রান্সফারের মাধ্যমে আপনি যে পরিমাণ রিচার্জ করতে চান তা আমাদের কাছে ট্রান্সফার করুন।
                        </h4>
                        <p class="details_star"><span style="color: red; font-size: 20px">*</span> অর্থপ্রদানের পরে অনুগ্রহ করে আপনার [লেনদেন আইডি] অনুলিপি
                            <br>
                            করুন
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row m-0 p-0">
            <div class="col-12">
                <div class="card sec-card mb-5 pb-4">
                    <div class="t card-body p-0 border-bottom-radius">
                        <h4 class="pay_step mt-0">
                            ধাপ 3। রিচার্জ সম্পূর্ণ করতে অনুগ্রহ করে লেনদেন আইডি লিখুন
                        </h4>
                        
                            @if($payment_method->demo_trx_image)
                            <div class="text-center">
                                <img src="{{asset($payment_method->demo_trx_image ?? '')}}" alt="" style="width: 200px !important;">
                            </div>
                            @endif
                        
                        <div class="row ">


                            <input type="hidden" value="{{$payment_method_id}}" name="payment_method_id">
                            <input type="hidden" value="{{$account_number}}" name="sender_account_no">
                            <input type="hidden" value="{{$amount}}" name="amount_coin">
                            <input type="hidden" value="{{$order_id}}" name="order_id">
                            <input type="hidden" value="onepay" name="type">

                               <div class="col-12 text-center">
                                <input type="text"
                                       placeholder="{{ $payment_method->trx_id_length }}-সংখ্যার লেনদেন আইডি"
                                       class="transaction_id"
                                       name="trx_id"
                                >
                                <div class="required" style="display:none">
                                    <span style="    color: red;
    font-size: 11px;
    text-align: left;
    display: block;
    margin-left: 17px;">ডিপোজিট সম্পূর্ণ করতে অনুগ্রহ করে সম্পূর্ণ লেনদেন আইডি লিখুন</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-2 m-0 p-0">
            <div class="col-12 text-center final_btn">
                <div class="btn-group confirm-btn">
                    <a href="javascript:void(0)" onclick="cancele_order()" type="button" class="btn btn-light c_btn">আদেশ বাতিল</a>
                    {{-- <a type="submit" class="btn btn-primary con_btn">পেমেন্ট নিশ্চিত করুন</a> --}}

                    <button type="submit"  class="btn btn-primary con_btn">পেমেন্ট নিশ্চিত করুন</button>
                </div>
            </div>
        </div>
    </div>
</form>
</section>

<section class="delete_order">
    <div class="delete_container">
        <div class="delete_header">
            <h4>বাতিল করার কারণ নির্বাচন করুন</h4>
            <div class="close_button" onclick="close_can()"><img src="{{asset('assets/frontend/')}}/images/close.png"> </div>
        </div>
        <div class="delete_body">
            <div class="reason">
                <ul>
                    <li onclick="descShow()">
                        <input type="radio" checked name="reasons" id="reasons1">
                        <label for="reasons1">পেমেন্ট অ্যাকাউন্ট নম্বর ভুল এবং টাকা স্থানান্তর করতে পারে না</label>
                    </li>
                    <li onclick="descShow()">
                        <input type="radio" name="reasons" id="reasons2">
                        <label for="reasons2">আমি আর টাকা দিতে চাই না</label>
                    </li>
                    <li onclick="desc()">
                        <input type="radio" name="reasons" id="reasons3">
                        <label for="reasons3">অন্যান্য</label>
                    </li>
                </ul>

                <div class="type_reason" style="display: none">
                    <textarea placeholder="আপনার কারণ লিখুন" name="" id="" cols="30" rows="4"></textarea>
                </div>

            </div>
            <div class="desc">
                <p style="color: #f19b4f; font-size: 13px;font-weight: 400">
                    <span>
                        <img style="width: 18px" src="{{asset('assets/frontend/')}}/images/qu.png">
                    </span>
                    <span>
                        অর্ডার বাতিল করার পর পেমেন্ট বন্ধ হয়ে যাবে। ক্ষতিকারক বাতিলকরণ এমন একটি কাজ যা প্ল্যাটফর্মের স্বাভাবিক অপারেশন অর্ডারকে ব্যাহত করে। গুরুতর ক্ষেত্রে, অ্যাকাউন্ট হিমায়িত করা হবে।
                    </span>
                </p>
            </div>

            <div class="delete_footer">
                <a href="{{ route('cencal') }}" class="deleteBtn">বাতিল করতে ঠিক আছে</a>
            </div>
        </div>
    </div>
</section>

<section class="number_popup">
    <div class="number_popUp_container">
        <div class="text-center">
            <img style="width: 55px;margin-top: 8px;" src="{{asset('assets/frontend/')}}/images/tri.png">
        </div>

        <div>
            <p class="p_pera">বর্তমান রিসিভিং অ্যাকাউন্ট অস্বাভাবিক এবং পেমেন্ট করতে পারে না? আমার কি প্রাপক পরিবর্তন করতে হবে?</p>
        </div>

        <div class="mt-3 d-flex justify-content-between mx-4">
            <button class="btn_p" onclick="confirm_change()" type="button">নিশ্চিত</button>
            <button class="btn_p btn_p_can" onclick="can_btn()" type="button">বাতিল করুন</button>
        </div>
    </div>
</section>

<input type="hidden" name="_token" value="kMnRKT5eo5YGnghL2fgyUdXPYpBaBAgXUYp0sBZu">

<input type="hidden" name="oid" value="S934391953976582783">
<input type="hidden" name="amount" value="500">
<input type="hidden" name="acc_acount" value="01622210012">
<input type="hidden" name="pay_method" value="nagad">
<meta name="csrf-token" content="kMnRKT5eo5YGnghL2fgyUdXPYpBaBAgXUYp0sBZu">
<script>
    var clock = document.getElementById('timer');

    var hours = 0;
    if (sessionStorage.getItem('hours')){
        hours = sessionStorage.getItem('hours');
    }
    clock.setAttribute('data-hours', hours);

    var minutes = 15;
    if (sessionStorage.getItem('minutes')){
        minutes = sessionStorage.getItem('minutes');
    }
    clock.setAttribute('data-minutes', minutes);

    var seconds = 0;
    if (sessionStorage.getItem('seconds')){
        seconds = sessionStorage.getItem('seconds');
    }
    clock.setAttribute('data-seconds', seconds);
</script>
<script>
    let data = sessionStorage.getItem('any_issue');
    if (data){
        document.querySelector('.any_issue').style.display = 'none';
    }


    function desc()
    {
        document.querySelector('.delete_container ').style.height = '76%'
        document.querySelector('.type_reason').style.display = 'block';
    }
    function descShow()
    {
        document.querySelector('.delete_container ').style.height = '60%'
        document.querySelector('.type_reason').style.display = 'none';
    }

    function cancele_order(){
        document.querySelector('.delete_order ').style.opacity = '1'
        document.querySelector('.delete_order ').style.zIndex = '1'
        document.querySelector('.delete_container ').style.bottom = '0%'
    }

    function close_can()
    {
        document.querySelector('.delete_order ').style.opacity = '0'
        document.querySelector('.delete_order ').style.zIndex = '-1'
        document.querySelector('.delete_container ').style.bottom = '-100%'
    }
</script>

<script>
    //Window load get number



    window.addEventListener('load', function() {
          number();
    })


    function change_number(){
        document.querySelector('.number_popup').style.zIndex = '1';
        document.querySelector('.number_popup').style.opacity = '1';
    }

    function confirm_change(){
        
        localStorage.removeItem("number");
        
        number();
        sessionStorage.setItem('any_issue', 'display_block');
        document.querySelector('.any_issue').style.display = 'none';
        document.querySelector('.number_popup').style.zIndex = '-1';
        document.querySelector('.number_popup').style.opacity = '0';
    }

    function can_btn(){
        document.querySelector('.number_popup').style.zIndex = '-1';
        document.querySelector('.number_popup').style.opacity = '0';
    }
</script>

<script>
    const oneSec = 1000,
        container = document.getElementById('timer');

    let dataHours 	= container.getAttribute('data-hours'),
        dataMinutes = container.getAttribute('data-minutes'),
        dataSeconds = container.getAttribute('data-seconds'),
        timerEnd 		= container.getAttribute('data-timer-end'),
        timerOnEndMsg = "data-timer-end";

    if (dataHours == '' || dataHours == null || dataHours == NaN) {
        dataHours = "0";
    }
    if (dataMinutes == '' || dataMinutes == null || dataMinutes == NaN) {
        dataMinutes = "0";
    }
    if (dataSeconds == '' || dataSeconds == null || dataSeconds == NaN) {
        dataSeconds = "0";
    }

    let hoursSpan = document.createElement('span'),
        minutesSpan = document.createElement('span'),
        secondsSpan = document.createElement('span'),
        separator1 = document.createElement('span'),
        separator2 = document.createElement('span'),
        separatorValue = ":",
        max = 15,
        s = parseInt(dataSeconds) > max ? max : parseInt(dataSeconds),
        m = parseInt(dataMinutes) > max ? max : parseInt(dataMinutes),
        h = parseInt(dataHours);

    secondsSpan.classList.add('time');
    minutesSpan.classList.add('time');
    hoursSpan.classList.add('time');
    separator1.classList.add('separator');
    separator1.textContent = separatorValue;
    separator2.classList.add('separator');
    separator2.textContent = separatorValue;

    checkValue = (value)=>{
        if (value < 10) {
            return "0" + value;
        } else {
            return value;
        }
    }

    hoursSpan.textContent = checkValue(dataHours);

    var minutes = checkValue(dataMinutes)
    if (minutes.length > 2){
        minutes = minutes.slice(1, minutes.length);
    }
    minutesSpan.textContent = minutes;
    secondsSpan.textContent = checkValue(dataSeconds);

    timer = (sv,mv,hv)=>{

        s = parseInt(sv);
        m = parseInt(mv);
        h = parseInt(hv);

        if (s > 0) {
            return s -= 1;
        } else {
            s = max;
            if (m > 0) {
                return m -= 1;
            } else {
                m = max;
                if (h > 0) {
                    return h -= 1;
                }
            }
        }
    }

    finished = ()=>{
        max = 0;
        let timerEnd = container.getAttribute(timerOnEndMsg);
        container.setAttribute(timerOnEndMsg, 'true');
        if (timerEnd == '' || timerEnd == null) {
            sessionStorage.clear()
            window.location.href = 'https://checkout-bdt.onepey.news/cencal'
        } else {
            container.textContent = timerEnd;
        }
    }

    counter = setInterval(()=>{

        if (h == 0 && m == 0 && s == 0) {
            clearInterval(counter, finished());
        }

        if (s >= 0) {
            timer(s,m,h);
            sessionStorage.setItem('seconds', checkValue(s))
            sessionStorage.setItem('minutes', checkValue(m))
            sessionStorage.setItem('hours', checkValue(h))

            hoursSpan.textContent = checkValue(h);
            minutesSpan.textContent = checkValue(m);
            secondsSpan.textContent = checkValue(s);
        }
    }, oneSec);

    // let children = [hoursSpan, separator1, minutesSpan, separator2, secondsSpan];
    let children = [minutesSpan, separator2, secondsSpan];

    for (child of children) {
        container.appendChild(child);
    }

</script>
<script src="{{asset('assets/frontend/')}}/js/onepay_toast.js"></script>
<script>



    function clipBoard(text) {
        const body = document.body;
        const input = document.createElement("input");
        body.append(input);
        input.style.opacity = 0;
        input.value = text.replaceAll(' ', '');
        input.select();
        input.setSelectionRange(0, input.value.length);
        document.execCommand("Copy");
        input.blur();
        input.remove();
        message("সফলভাবে আনুলিপি করুন")
    }

    $(document).on('click','#copyNumber',function() {
        clipBoard($(".copy_pay_number").val())
    })
</script>
</body>
</html>
