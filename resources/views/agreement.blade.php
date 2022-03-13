<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Budget management system solution">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to BMSS</title>
    <link rel="shortcut icon" href="{{ asset('/images/icon.jpg') }}" type="image">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" ></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <style>
        #cancel:hover{
            background-color:#4C79E1;
        }
    </style>
</head>
<body style="background-color:#B9B2CA;font-family:'Times New Roman';" >
    <div class="bg-light mx-auto my-1" style="height:600px;border-radius:30px;width:55%;overflow-y:scroll;" dir="{{(App::isLocale('ar') ? 'rtl' : 'ltr')}}">
        <div style="margin-right:80px;">
        <h1 class="text-center "><i class="fab fa-readme"></i></h1>
        <h3 class="text-center">{{__('messages.BMSS')}}  <br> {{__('messages.Terms and conditions')}}</h3>
        <p style="margin-left:60%;font-weight:bold;">{{__('messages.Effective as of November 28, 2020')}}</p>
        <p style="margin-left:5%;text-indent:15px;word-spacing:2px;font-family:'Times New Roman';width:90%;border-radius:10px;padding:5px;">{{__('messages.Please read these terms and conditions of use carefully before accessing, using, or obtaining any materials, information, products, or services. By accessing, the BMSS application, mobile or tablet application, or any other future. You agree to be bound by these terms and conditions and our Privacy Policy. If you don’t accept all these Terms, then you may not use our application. In these Terms “we”, “us”, “our” or “BMSS” refers to BMSS Database, and “you” or “your” refers to you as the user of our application.')}}</p>
        <h4 style="margin-left:5%;">{{__('messages.Our Services')}} </h4>
        <ul style="margin-left:10%;">
            <li ><span style="font-weight:bold;">{{__('messages.Our mission is to manage and provide your income.')}}</span>
                <ul>
                    <li>{{__('messages.the BMSS application intended for users who needs to budget management and how-to exploitation it in useful tool.')}}</li>
                    <li>{{__('messages.The user has the arbitration clause and waiver of his right to create and change the plan.')}}</li>
                    <li>{{__('messages.The BMSS application allow the user to create plan or set the program to create a plan to manage his budget.')}}</li>
                </ul>
            </li>
            <li><span style="font-weight:bold;">{{__('messages.Our application provides the user with feedback.')}} </span>
            <br>{{__('messages.To helps him to achieve long terms goals.')}} <br>{{__('messages.Database, BMSS')}}<br>{{__('messages.Database stores user information.')}}<br>{{__('messages.Your conduct with our application')}}<br>{{__('messages.As a condition of your use of our application, you agree that:')}} 

                <ul >
                    <li>{{__('messages.You are an individual person more than 20 years old')}}</li>
                    <li>{{__('messages.To have a source of income. (salary)')}}</li>
                    <li>{{__('messages.the information entered must be correct.')}}</li>
                </ul>
            </li>
        </ul>
        <input type="checkbox" name="agree" id="agree" style="margin-left:120px;" onclick="change()" ><label for="agree" style="margin-left:15px;color:red;"><b>{{__('messages.I agree to the terms and conditions and the privacy policy')}}</b></label>
        <div class="mb-2 "style="margin-left:35%;margin-top:10px;margin-right:60px;">
        <a class="btn  w-25" id="ag" href="" style="background-color:#ccc;color:#000;border:1px solid #000;" onclick="mess()" >{{__('messages.SignUp')}}</a>
        <a class="btn btn-secondary w-25"style="margin-left:20px;"  onclick="cancel()" id="cancel">{{__('messages.Cancel')}}</a>
        </div>
        </div>
    </div>
    
    <script>
        var coun=0;
        function change(){
            var ch = document.getElementById("agree");
            var ag = document.getElementById("ag");
            if(ch.checked){
                ag.style.backgroundColor="#2D64B8";
                ag.style.color="#fff";
                ag.style.border="1px solid #fff";
                ag.href="{{URL::to('signup')}}";
            }
            else{
                ag.style.backgroundColor="#ccc";
                ag.style.color="#000";
                ag.style.border="1px solid #000";
                ag.href="";
            }
        }
        var canc= document.getElementById("cancel");
        function mess(){
            var ch = document.getElementById("agree");
            var sign = document.getElementById("ag");
            if(!ch.checked){
            alert(<?php echo json_encode(__('messages.please check agreement box')); ?>);
            }
      
        }
        function cancel(){
            var cancel=window.confirm(<?php echo json_encode(__('messages.are you sure ?')); ?>);
            if(cancel){
                canc.href="{{URL::to('signin')}}";
            }
            else{
                canc.href="";
            }
        }
    </script>
</body>