
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment Page</title>
    <meta charset="utf-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css'>


    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('assets/frontend/')}}/css/onepay_style.css">


    <style>
        body {
            touch-action: manipulation;
        }
    </style>
    <style>
        .select2-container .select2-selection--single {
            height: 55px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 32px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 6px;
            right: 9px;
        }

        span.select2-dropdown.select2-dropdown--below {
            margin-top: 8px;
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: transparent;
            color: #000;
        }

        .select2-dropdown {
            border-radius: 12px !important;
            box-shadow: none;
            border: 1px solid #000 !important;
        }

        a:hover {
            text-decoration: none;
        }

        .one_pay_order_id p {
            font-weight: 500;
        }

        .one_pay_order_id p span:last-child {
            font-size: 14px;
            font-weight: 400;
        }

        .header {
            height: 45px;
            line-height: 47px;
        }

        input.write_account:focus-visible {
            border: 1px solid #707070;
            outline: none;
        }

        .select2-results__option {
            padding: 6px;
            user-select: none;
            -webkit-user-select: none;
            margin: 10px 11px;
        }

        .amount-banner {
            height: 140px;
        }

        label.write_account_label {
            min-height: 48px;
            line-height: 48px;
            font-size: 13px;
        }

        a {
            text-decoration: none;
        }

        input.write_account {
            height: 35px;
        }

        h3.one_pay_logo img {
            width: 32px;
            height: 32px;
            float: left;
            margin-top: 10px;
            margin-right: 5px;
        }

        .select2-results__option[aria-selected] {
            cursor: pointer;
            font-size: 15px;
            font-weight: 700;
        }

        label.write_account_label {
            font-size: 14px;
        }

        .select2-container--default .select2-selection--single {
            border: 2px solid #000000cf !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 27px;
        }
        
        img.selec_img {
            width: 20px;
            margin-right: 20px;
            margin-left: 10px;
        }

    </style>
</head>
<body>
<section class="pay-timer-section">
    <div class="timer-container">
        <div class="header">
            <div class="header-logo">
                <h3 class="one_pay_logo">
                    <img src="{{asset('assets/frontend/')}}/images/pay_logo.png">
                    <span>One Pay</span>
                </h3>
            </div>
            <div class="header-timer">
                <h3 class="one_pay_timer" id="timer">





                </h3>
            </div>
        </div>
        <div class="amount-banner" style="background-image: url({{asset('assets/frontend/')}}/images/bg.png);">
            <div class="one_pay_order_id">
                <p>
                    <span>অর্ডার আইডি:</span>
                    <span id="order_id">{{ $order_id }}</span>
                </p>
            </div>
            <div class="one_pay_tk">
                <h3>{{ $amount ?? '0' }} Coins</h3>
            </div>
        </div>
        <div class="account-area">
            <form action="{{ route('onepay/quartetSystem') }}" method="get">
                @csrf
                <div class="account_selector">
                    <label for="" class="write_account_label">আপনার অ্যাকাউন্ট</label>
                    <input type="text" class="write_account" name="account_number" placeholder="016xxxxx345"
                        oninput="checkInsertMobileNumber(this)">


                        <input type="hidden" name="amount" value="{{ $amount }}">
                        <input type="hidden" name="order_id" value="{{ $order_id }}">
                </div>
                <div class="account_selector_option ">
                    <label for="" class="write_account_label">পেমেন্ট চ্যানেল</label>
                    <select name='payment_method_id' class="form-control" required>
                        <option value="">আপনার পেমেন্ট চ্যানেল নির্বাচন করুন</option> 

                        @foreach($methods as $item)
                            <option value='{{ $item->id }}' data-src="{{ asset($item->logo) }}">{{ $item->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="go_payment">

                    <button type="submit"  class="go_payment_btn " disabled style="display: block;
                    padding: 13px 0;
                    text-align: center;
                    font-weight: bold;
                    color: #fff;
                    position: relative;
                    height: 53px;
                    background: #a79f9f;
                    box-shadow: 0 3px 6px rgba(180,184,204,.5);
                    opacity: 1;
                    border-radius: 12px;
                    margin-top: 26px;width: 100%; border: 0;">
                        পেমেন্ট যান
                        <img src="{{asset('assets/frontend/')}}/images/btn-arrow.png" alt="" style="position: absolute;
                        width: 12px;
                        height: 12px;
                        top: 50%;
                        transform: translateY(-50%);
                        right: 12px;">

                    </button>

                
                </div>
            </form>

        </div>
    </div>
</section>

<input type="hidden" name="csrf_token" value="">
<meta name="csrf-token" content=""/>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="{{asset('assets/frontend/')}}/js/onepay_toast.js"></script>

<script>
    var clock = document.getElementById('timer');

    var hour = 0;
    if (sessionStorage.getItem('hour')){
         hour = sessionStorage.getItem('hour');
    }
    clock.setAttribute('data-hours', hour);

    var minute = 5;
    if (sessionStorage.getItem('minute')){
        minute = sessionStorage.getItem('minute');
    }
    clock.setAttribute('data-minutes', minute);

    var second = 0;
    if (sessionStorage.getItem('second')){
        second = sessionStorage.getItem('second');
    }
    clock.setAttribute('data-seconds', second);
</script>

<script>
    function checkInsertMobileNumber(_this) {
        var value = _this.value;
        var go_btn = document.querySelector('.go_payment_btn');
        if (value.length < 11) {
            go_btn.style.background = '#413737a1'
            // go_btn.setAttribute('href', 'javascript:void(0)');

        } else {
            go_btn.style.background = '#000'
            $(".go_payment_btn").removeAttr("disabled");
            go_btn.setAttribute('onclick', 'go_payment_with_data()');
        }
    }

    function formatState(state) {
        if (!state.id) {
            return state.text;
        }
        var $state = $(
            '<span><img class="selec_img" src="' + $(state.element).attr('data-src') + '" class="img-flag" /> ' + state.text + '</span>'
        );
        return $state;
    };
    $('select').select2({
        minimumResultsForSearch: Infinity,
        templateResult: formatState,
        templateSelection: formatState
    });
</script>

<script>
    const oneSec = 1000,
        container = document.getElementById('timer');

    let dataHours = container.getAttribute('data-hours'),
        dataMinutes = container.getAttribute('data-minutes'),
        dataSeconds = container.getAttribute('data-seconds'),
        timerEnd = container.getAttribute('data-timer-end'),
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
        max = 59,
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

    checkValue = (value) => {
        if (value < 10) {
            return "0" + value;
        } else {
            return value;
        }
    }

    // hoursSpan.textContent = checkValue(dataHours);
    // minutesSpan.textContent = checkValue(dataMinutes);
    // secondsSpan.textContent = checkValue(dataSeconds);

    hoursSpan.textContent = checkValue(dataHours);

    var minutes = checkValue(dataMinutes)
    if (minutes.length > 2){
        minutes = minutes.slice(1, minutes.length);
    }
    minutesSpan.textContent = minutes;
    
    var seconds = checkValue(dataSeconds)
    if (seconds.length > 2){
        seconds = seconds.slice(1, seconds.length);
    }
    secondsSpan.textContent = seconds;

    timer = (sv, mv, hv) => {

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

    finished = () => {
        max = 0;
        let timerEnd = container.getAttribute(timerOnEndMsg);
        container.setAttribute(timerOnEndMsg, 'true');
        if (timerEnd == '' || timerEnd == null) {
            sessionStorage.clear()
            window.location.href = 'http://localhost/my_project/sport_invest/user/cencal'
        } else {
            container.textContent = timerEnd;
        }
    }

    counter = setInterval(() => {

        if (h == 0 && m == 0 && s == 0) {
            clearInterval(counter, finished());
        }

        if (s >= 0) {
            timer(s, m, h);

            sessionStorage.setItem('second', checkValue(s))
            sessionStorage.setItem('minute', checkValue(m))
            sessionStorage.setItem('hour', checkValue(h))

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
    sessionStorage.setItem('any_issue', 'display_block');
</script>
</body>
</html>
