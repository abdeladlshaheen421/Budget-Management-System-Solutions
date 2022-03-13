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
    <link rel="stylesheet" href="{{asset('/css/welcome.css')}}">
    <style>
       
         video{
              width:400px;
              height:200px;
              margin-left:120px;
              display:none;
         }
         .c2 a {
              margin:0;
              display:inline;
              letter-spacing:0;
              background-color:#fff;
              color:#000;
              padding:10px;
              border:1px groove #ccc;
              font-family:"Times New Roman";
              font-size:16px;
              
         }
         .c2 a:hover{
          background-color:#e6e6e6;
          outline:1px solid #000;
         }
      
    </style>

</head>
<body>
   <div class="parent " dir="{{(App::isLocale('ar') ? 'rtl' : 'ltr')}}" >
       <div class="c1"  >
       <div class="left"><img class="rounded-circle" src="{{asset('/images/an5.jpg')}}" style="height:40px;width:40px;margin-left:5px;margin-top:5px;;margin-right:5px;" alt="brand icon"/><span class="text-center " style="margin-left:24px;color:#000;letter-spacing:10px;font-weight:bold;font-size:22;height:100%;padding-bottom:6px;" dir="ltr"><i class="fab fa-btc " ></i>MSS</span></div>

            <h2 class="text-dark text-center" id="head2">{{__('messages.Your financial future is')}} <span class="new">{{__('messages.in your hands')}} </span></h2>
            <h4 class=" mx-auto">{{__('messages.Welcome to')}} <br> <span>{{__('messages.budget management system solution')[0]}}</span>{{__('messages.udget')}}<span> {{__('messages.budget management system solution')[7]}}</span>{{__('messages.anagement')}}  <span>{{__('messages.budget management system solution')[18]}}</span>{{__('messages.ystem')}}  <span>{{__('messages.budget management system solution')[25]}}</span>{{__('messages.olution')}}</h4>
            <a class=" mx-auto" type="submit"  href="{{URL::to('signin')}}">{{__('messages.Get Started')}}</a>
            <div class=" text-center"><button  id="vbtn" onclick="enableAutoplay()" type="button" style="width:30px;height:20px;background-color:white;border-top-right-radius:80px;border-bottom-right-radius:80px;border:0;"><i class="fas fa-play"></i></button><span id="sp"><b>{{__('messages.Thank to Social Development Bank')}}</b> </span></div>
            <p class="w-50 mx-auto text-center" style="margin-left:180px;" id="hide"><b>{{__('messages.From here you can watch an awareness video that motivates you to manage your money')}}</b></p>
            <video class="mx-auto" id="myVideo" controls  >  <source src="{{asset('/video.mp4')}}" type="video/mp4">
</video>

       </div>
       <div class="c2">
               <div class="w-100 " dir="{{(App::isLocale('ar') ? 'ltr' : 'rtl')}}">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                         <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">{{ $properties['native'] }}</a>
                    @endforeach
               </div>
            <img class="m-4 p-1 mb-0 mt-0 " src="{{asset('/images/aaaa.gif')}}" style="height: 550px;" alt="">
      </div>
   </div>
   <script>
        var x = document.getElementById("myVideo");
        var sp = document.getElementById("sp");
        var hide = document.getElementById("hide");
        var v = document.getElementById("vbtn");
          function enableAutoplay() { 
          hide.style.display="none";
          x.style.display="block";
          v.style.display="none";
          x.autoplay = true;
          x.load();
          } 
   </script>
</body>
</html>