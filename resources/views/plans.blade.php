<title>planning</title>
<link rel="shortcut icon" href="{{ asset('/images/icon.jpg') }}" type="image">
<style>
.plan {
    letter-spacing: 3px;
    color: #fff;
    background-color: #A593D0;
    border-radius: 30px;
    margin: 40px 80px;
    border: 2px solid #fff;
    outline: 2px solid #A9A8AB;
    transition: ease-out all 1s;
}

.plan:hover {
    color: #fff;
    background-color: #A593D0;
    border: 6px solid #A9A8AB;
    outline: 6px solid #fff;
    transform: scale(1.5);
}

.para p {
    width: 220px;
    margin: 3px auto;
    display: inline-block;
    width: 80px;
}

.para p label {
    font-weight: bold;
    font-style: italic;
    font-family: monospace;
    font-size: 22px;
    color: #fff;
    margin: 0px 10px;
    text-transform: capitalize;
}

.para {
    border: 2px solid #fff;
    outline: 2px solid #123;
    border-top-left-radius: 250px;
    border-bottom-right-radius: 250px;
    border-top-right-radius: 50px;
    border-bottom-left-radius: 50px;
}

.forma label {
    font-weight: bold;
}

.forma input[type=number],
.forma p {
    display: inline-block;
    width: 200px;
    text-align: center;
}

.disp {
    display: none;
}

i {
    font-size: 22px;
}
</style>

<body style="background:#DCDCDE;">
    @extends('nav')

    @section('content')

    <div class=" bg-light shadow"
        style="width:70%;height:230px;margin:200px 35%;margin-bottom:80px;border-radius:50px;">
        @if($message = Session::get("message"))
        <p class="text-center text-white padge bg-danger h3 w-75 mx-auto">{{$message}}</p>
        @endif
        <div class="text-center">
            <button class=" plan w-25 h-50 h3" style="margin-top:50px;" onmouseout="hide()" onmouseover="dispcon1()"
                data-bs-toggle="modal" data-bs-target="#modal1">{{__('messages.SetUp')}}</button>
            <button class="  plan w-25 h-50 h3" style="margin-top:50px;" onmouseout="hide()" onmouseover="dispcon2()"
                data-bs-toggle="modal" data-bs-target="#modal2">{{__('messages.Create')}}</button>
        </div>
        <p class="text-center  mt-4" style="font-weight:bold;" id="s"> </p>
    </div>
    <!-- model1-->
    <form method="get" action="{{route('setup.plan')}}" id="setparent">
    <div class="modal fade" id="modal1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h1 class="modal-title w-100 text-center" id="staticBackdropLabel"><span
                            class="badge bg-secondary">{{__('messages.SetUp a Plan')}}</span></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center bg-secondary para">
          <div>
          <i class="fas fa-home text-white  mx-3" ></i>
          <input  type="checkbox" onChange="changebtn1()" name="setplan[]" id="home" value="home">
          <p >
            <label  for="home">{{__('messages.home')}}</label>
          </p>
          </div>
          <div>
          <i class="fas fa-utensils text-white mx-3"></i>
          <input  type="checkbox" onChange="changebtn1()" name="setplan[]" id="food" value="food">
          <p >
            <label for="food">{{__('messages.food')}}</label>
          </p>
          </div>
          <div>
          <i class="fas fa-fighter-jet text-white mx-3" style="transform:rotate(-90deg);"></i>
          <input  type="checkbox" onChange="changebtn1()" name="setplan[]" id="transportation" value="transportation">
          <p >
            <label for="transportation" >{{__('messages.transportation')}}</label>
          </p>
          </div>
          <div>
          <i class="fas fa-file-invoice-dollar text-white mx-3"></i>
          <input  type="checkbox" onChange="changebtn1()" name="setplan[]" id="bills" value="bills">
          <p>
            <label for="bills">{{__('messages.bills')}}</label>
          </p>
          </div>
          <div>
          <i class="fas fa-user-graduate text-white mx-3"></i>
          <input type="checkbox" onChange="changebtn1()" name="setplan[]" id="education" value="education">
          <p>
            <label for="education">{{__('messages.education')}}</label>
          </p>
          </div>
          <div>
          <i class="fas fa-gamepad text-white mx-3"></i>
          <input type="checkbox" onChange="changebtn1()" name="setplan[]" id="entertainment" value="entertainment">
          <p>
          <label for="entertainment">{{__('messages.entertainment')}}</label>
          </p>
          </div>
          <div>
          <i class="fas fa-notes-medical text-white mx-3"></i>
          <input type="checkbox" onChange="changebtn1()" name="setplan[]" id="health" value="health">
          <p>
            <label for="health">{{__('messages.health')}}</label>
          </p>
          </div>
          <div>
          <i class="fas fa-piggy-bank text-white mx-3"></i>
          <input type="checkbox" onChange="changebtn1()" name="setplan[]" id="reserve" value="reserve">
          <p>
            
            <label for="reserve">{{__('messages.reserve')}}</label>
          </p>
          </div>
          <div>
          <i class="far fa-question-circle text-white mx-3"></i>
          <input type="checkbox" onChange="changebtn1()" name="setplan[]" id="others" value="others">
          <p>
            <label for="others">{{__('messages.others')}}</label>
          </p>
          </div>
      </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary w-25 mx-auto"
                        style="font-weight:bold;font-size:22px;" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="btnset" class="btn btn-primary w-25 mx-auto" style="font-weight:bold;font-size:22px;"
                         disabled>{{__('messages.SetUp')}}</button>
                </div>
            </div>
        </div>
    </div>
</form>
    <!-- model2-->
    <div class="modal fade " id="modal2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title w-100 text-center" id="staticBackdropLabel"><span class="text-dark">{{__('messages.Create a')}}
                    {{__('messages.New Plan')}}</span></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center bg-secondary para">
                    <div>
                        <i class="fas fa-home text-white  mx-3"></i>
                        <input type="checkbox" onChange="changebtn()" name="plan" id="home" value="home">
                        <p>
                            <label for="home">{{__('messages.home')}}</label>
                        </p>
                    </div>
                    <div>
                        <i class="fas fa-utensils text-white mx-3"></i>
                        <input type="checkbox" onChange="changebtn()" name="plan" id="food" value="food">
                        <p>
                            <label for="food">{{__('messages.food')}}</label>
                        </p>
                    </div>
                    <div>
                        <i class="fas fa-fighter-jet text-white mx-3" style="transform:rotate(-90deg);"></i>
                        <input type="checkbox" onChange="changebtn()" name="plan" id="transportation"
                            value="transportation">
                        <p>
                            <label for="transportation">{{__('messages.transportation')}}</label>
                        </p>
                    </div>
                    <div>
                        <i class="fas fa-file-invoice-dollar text-white mx-3"></i>
                        <input type="checkbox" onChange="changebtn()" name="plan" id="bills" value="bills">
                        <p>
                            <label for="bills">{{__('messages.bills')}}</label>
                        </p>
                    </div>
                    <div>
                        <i class="fas fa-user-graduate text-white mx-3"></i>
                        <input type="checkbox" onChange="changebtn()" name="plan" id="education" value="education">
                        <p>
                            <label for="education">{{__('messages.education')}}</label>
                        </p>
                    </div>
                    <div>
                        <i class="fas fa-gamepad text-white mx-3"></i>
                        <input type="checkbox" onChange="changebtn1()" name="plan" id="entertainment"
                            value="entertainment">
                        <p>
                            <label for="entertainment">{{__('messages.entertainment')}}</label>
                        </p>
                    </div>
                    <div>
                        <i class="fas fa-notes-medical text-white mx-3"></i>
                        <input type="checkbox" onChange="changebtn()" name="plan" id="health" value="health">
                        <p>
                            <label for="health">{{__('messages.health')}}</label>
                        </p>
                    </div>
                    <div>
                        <i class="fas fa-piggy-bank text-white mx-3"></i>
                        <input type="checkbox" onChange="changebtn()" name="plan" id="reserve" value="reserve">
                        <p>

                            <label for="reserve">{{__('messages.reserve')}}</label>
                        </p>
                    </div>
                    <div>
                        <i class="far fa-question-circle text-white mx-3"></i>
                        <input type="checkbox" onChange="changebtn()" name="plan" id="others" value="others">
                        <p>
                            <label for="others">{{__('messages.others')}}</label>
                        </p>
                    </div>
                </div>
                <div class="modal-footer w-100 text-center">
                    <button type="button" class="btn btn-secondary w-25 mx-auto"
                        style="font-weight:bold;font-size:22px;" data-bs-dismiss="modal">{{__('messages.Close')}}</button>
                    <button disabled type="button"
                        style="background:#ccc;font-weight:bold;color:#fff;font-weight:bold;font-size:22px;" id="nx"
                        class=" btn w-25 mx-auto" data-bs-toggle="modal" data-bs-target="#modal3"
                        onclick="getch()">{{__('messages.Next')}}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- model 3 -->
    <form method="get" action="{{route('create.plan')}}">
        <div class="modal fade" id="modal3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header w-100 mx-auto">
                        <h2 class="modal-title" id="staticBackdropLabel"><span class=" ">{{__('messages.Enter the amount of money you')}}
                        {{__('messages.spent')}}</span></h2>
                        <a class="btn-close" href="{{URL::to('plans')}}"></a>
                    </div>
                    <div class="modal-body forma">
                        <div class="disp" id="homes">
                            <p><label for="home">{{__('messages.home')}}</label></p>
                            <input class="form-control w-25" type="number" name="home" id="home" min='0' value="0">
                        </div>
                        <div class="disp" id="foods">
                            <p><label for="food">{{__('messages.food')}}</label></p>
                            <input class="form-control w-25" type="number" name="food" id="food" min='0' value="0">
                        </div>
                        <div class="disp" id="transportations">
                            <p><label for="transportation">{{__('messages.transportation')}}</label></p>
                            <input class="form-control w-25" type="number" name="transportation" id="transportation"
                                min='0' value="0">
                        </div>
                        <div class="disp" id="billss">
                            <p><label for="bills">{{__('messages.bills')}}</label></p>
                            <input class="form-control w-25" type="number" name="bills" id="bills" min='0' value="0">
                        </div>
                        <div class="disp" id="educations">
                            <p><label for="education">{{__('messages.education')}}</label></p>
                            <input class="form-control w-25" type="number" name="education" id="education" min='0'
                                value="0">
                        </div>
                        <div class="disp" id="entertainments">
                            <p><label for="entertainment">{{__('messages.entertainment')}}</label></p>
                            <input class="form-control w-25" type="number" name="entertainment" id="entertainment"
                                min='0' value="0">
                        </div>
                        <div class="disp" id="healths">
                            <p><label for="health">{{__('messages.health')}}</label></p>
                            <input class="form-control w-25" type="number" name="health" id="health" min='0' value="0">
                        </div>
                        <div class="disp" id="reserves">
                            <p><label for="reserve">{{__('messages.reserve')}}</label></p>
                            <input class="form-control w-25" type="number" name="reserve" id="reserve" min='0'
                                value="0">
                        </div>
                        <div class="disp" id="otherss">
                            <p><label for="others">{{__('messages.others')}}</label></p>
                            <input class="form-control w-25" type="number" name="others" id="others" min='0' value="0">
                        </div>
                    </div>
                    <div class="modal-footer w-100 text-center">
                        <input type="submit" id="create" class="btn btn-success w-50 mx-auto" value="{{__('messages.Add Plan')}}"
                            style="font-weight:bold;font-size:22px;">
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endsection
    <script>
    var array = [];

    function getch() {
        var checkboxes = document.querySelectorAll('input[name=plan]:checked');
        for (var i = 0; i < checkboxes.length; i++) {
            array.push(checkboxes[i].value);
        }
        for (var i = 0; i < array.length; i++) {
            var inp = document.getElementById(array[i] + 's');
            inp.style.display = "block";
        }

    }

    function hide() {
        var sp = document.getElementById('s');
        sp.innerHTML = "";
    }

    function dispcon1() {
        var sp = document.getElementById('s');
        sp.innerHTML =
            "{{__('messages.Set up BMSS: You can specify what you want to spend your money on,')}}<br>{{__('messages.and the program will divide your salary accordingly.')}}";
    }

    function dispcon2() {
        var sp = document.getElementById('s');
        sp.innerHTML = "{{__('messages.Create a plan: You can select and record the basic expenses based on your needs.')}}";
    }

    function changebtn() {
        var checkboxes = document.querySelectorAll('input[name=plan]:checked');
        var cplan = document.getElementById('nx');
        if (checkboxes.length == 0) {
            cplan.disabled = true;
        } else {
            cplan.disabled = false;
            cplan.style.backgroundColor = "#3B76EB";
        }}
        function changebtn1() {
          var selected = new Array();
        var parent = document.getElementById("setparent");
        var checkboxes = parent.getElementsByTagName("input");
        var cplan = document.getElementById('btnset');
        for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
                selected.push(checkboxes[i].value);
            }}
        if (selected.length == 0) {
            cplan.disabled = true;
        } else {
            cplan.disabled = false;
            cplan.style.backgroundColor = "#3B76EB";
        }
    }
    </script>
</body>