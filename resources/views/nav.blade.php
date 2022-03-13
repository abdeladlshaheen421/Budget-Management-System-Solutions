<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>nav</title>
    <link rel="shortcut icon" href="{{ asset('/images/icon.jpg') }}" type="image">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <!-- <link rel="stylesheet" href="asset{{'css/nav.css'}}"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- <span class="text-warning  h2 m-1"><i class="fab fa-btc"></i></span><span class="text-info h3 m-1"><b>M</b></span><span class="m-1 text-warning h3 "><b>S</b></span><span class="h3 text-info m-1"><b>S</b></span> -->
</head>

<body dir="{{(App::isLocale('ar') ? 'rtl' : 'ltr')}}">
    <div style="width: 100%; display: flex; clear: both;">
        <div class="nav flex-column  bg-light rounded h-100" id="divid" style="float:left;width:20%;position:fixed;">
            <a class="navbar-brand m-1 rounded " style="opacity:0.25;" onmouseover="this.style.opacity = '1'"
                onmouseout="this.style.opacity = '0.25'" href="{{URL::to('/')}}"><img class="rounded-circle mx-4 "
                    src="{{asset('/images/an5.jpg')}}" style="height:35px;" alt="brand icon" /><span dir="ltr"
                    class="text-center"
                    style="margin-left:24px;color:#000;letter-spacing:10px;font-weight:bold;font-size:26;font-family:"><i
                        class="fab fa-btc"></i>MSS</span></a>
            <a class="nav-link text-dark  h6  my-1  btn-outline-secondary rounded" href="{{URL::to('Dashboard')}}"><i
                    class="fas fa-home mx-4"></i><span style="margin-left:15%;">&nbsp;{{__('messages.Home')}}</span></a>
            <a class="nav-link text-dark  h6  my-1  btn-outline-secondary rounded" href="{{URL::to('plans')}}"><i
                    class="fas fa-file-signature mx-4"></i><span
                    style="margin-left:15%;">&nbsp;{{__('messages.Planning')}}</span></a>
            <a class="nav-link text-dark  h6  my-1  btn-outline-secondary rounded" href="{{URL::to('goal')}}"><i
                    class="fas fa-bullseye mx-4"></i><span
                    style="margin-left:15%;">&nbsp;{{__('messages.Goals')}}</span></a>
            <a class="nav-link text-dark  h6  my-1  btn-outline-secondary rounded" href="{{URL::to('history')}}"><i
                    class="fas fa-history mx-4"></i><span
                    style="margin-left:15%;">&nbsp;{{__('messages.History')}}</span></a>
            <a class="nav-link text-dark  h6  my-1  btn-outline-secondary rounded" href="{{URL::to('creditcard')}}"><i
                    class="fas fa-credit-card mx-4"></i><span
                    style="margin-left:15%;">{{__('messages.Credit card')}}</span></a>
            <a class="nav-link text-dark  h6  my-1  btn-outline-secondary rounded" href="{{URL::to('profile')}}"><i
                    class="fas fa-user-tie mx-4"></i><span
                    style="margin-left:15%;">&nbsp;{{Session::get('user_name')}}</span></a>
            <a class="nav-link text-dark  h6  my-1  btn-outline-secondary rounded" href="{{URL::to('settings')}}"><i
                    class="fas fa-user-cog mx-4"></i><span
                    style="margin-left:15%;">{{__('messages.Settings')}}</span></a>
            <a class="nav-link text-dark  h6  mt-4 btn-outline-danger" href="{{URL::to('logout')}}"><i
                    class="fas fa-sign-out-alt mx-4"></i><span
                    style="margin-left:15%;">{{__('messages.Logout')}}</span></a>

        </div>
        <div class="rounded" id="body" style="float:right;width:80%;">
            @yield('content')
        </div>
    </div>

    <script>
    const noti = [
        "{{__('messages.Welcome to BMSS')}}<br>{{__('messages.if you want to plan, manage, save and spending money , you\'ve come to the right app.')}}",
        "{{__('messages.If you\'re interested in us, let me show you around')}}",
        "{{__('messages.First, consider the strategy.')}}<br>{{__('messages.From here, you will begin creating your financial plan for this month; click create if you want to create it yourself, or set up if you want the program to do it for you.')}}",
        "{{__('messages.then click on the icons as needed')}}",
        "{{__('messages.When you click home, you will be shown drawings containing all of your plan data.')}}", "{{__('messages.you can also share')}}",
        "{{__('messages.From here, you can choose one long-term goal to achieve towards.')}}",
        "{{__('messages.You can also enter how much money you want to save and track it.')}}",
        "{{__('messages.Previous plans can be  found in History.')}}",
        "{{__('messages.The credit card , BMSS, allows the user to enter his card information, Then after the third plan, you must subscribe.')}}",
        "{{__('messages.The user\'s account, from that he can edit his profile.')}}", "{{__('messages.sing, you can modify the program and get help.')}}"
    ];
    var nele = document.getElementById("demo");
    var i = 0;
    var no = document.getElementById("no");
    var arrow = document.getElementById("arrow");
    var arrow = document.getElementById("arrow2");
    var num = 0;
    var mar = 0;
    var n = document.getElementById("next");
    var p = document.getElementById("prev");
    if (n) {
        nele.innerHTML = noti[i];
    }

    function prev() {
        if (i > 0) {
            i--;
            if (i == 4 || i == 3 || i == 7) {} else if (i >= 2) {
                num -= 40;

                if (i == 5) {
                    num -= 10;
                }
                if (i == 6) {
                    num -= 20
                }
                if (i == 8) {
                    num -= 20;
                }
                if (i == 9) {
                    num -= 20;
                }
                if (i == 10) {
                    num -= 20
                }
                if (i == 11) {
                    num -= 20;
                }

                // arrow.style.marginTop = num.toString() + 'px';
                no.style.marginTop = num.toString() + 'px';
            }
            nele.innerHTML = noti[i];
        }
        if (i == noti.length - 2) {
            n.innerHTML = "Next";
        }
    }

    function next() {
        if (i <= noti.length - 1) {

            if (n.innerHTML == "Finish") {
                no.style.display = "none";
                arrow.style.display = "none";
                arrow2.style.display = "none";
                <?php Session()->pull('show_notification'); ?>
            }
            i++;
            if (i == 4 || i == 3 || i == 7) {} else if (i >= 2) {
                num += 40;
                if (i == 5) {
                    num += 10;
                }
                if (i == 6) {
                    num += 20
                }
                if (i == 8) {
                    num += 20;
                }
                if (i == 9) {
                    num += 20;
                }
                if (i == 10) {
                    num += 20
                }
                if (i == 11) {
                    num += 20;
                }
                // arrow.style.marginTop = num.toString() + 'px';
                no.style.marginTop = num.toString() + 'px';
            }
            nele.innerHTML = noti[i];
            if (i == noti.length - 1) {
                n.innerHTML = "Finish";
            }


        }
    }
    </script>


</body>

</html>