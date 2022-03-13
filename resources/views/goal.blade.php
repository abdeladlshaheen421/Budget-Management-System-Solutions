
<title>Goals</title>
<link rel="shortcut icon" href="{{ asset('/images/icon.jpg') }}" type="image">

<style>
body {
    background-color: #fff;
    background-image:url("{{ asset('/images/goal.jfif') }}");
    background-position: <?php if (App::isLocale('ar')) echo "left";else echo "right";?> bottom;
    background-size: 80% 300px;
    background-repeat: no-repeat;

}

.text1{ font-size: 400%;
        color:#114d81;
        text-shadow: 2px 2px 4px #d5eef2;
        padding-right: 15%;
        padding-left: 15%;}
.addform{
    text-align:center;
    margin:30px auto;
    height:100px;
    width: 100%;
}
.Butten1-hover {
    width: 80px;
    font-size: 16px;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
    margin:20px;
    height: 30px;
    text-align:center;
    border: none;
    background-size: 300% 100%;
    border-radius: 50px;
    -moz-transition: all .4s ease-in-out;
    -o-transition: all .4s ease-in-out;
    -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out;
    position: relative; }
     .Butten1-hover:hover {
    background-position: 100% 0;
    -moz-transition: all .4s ease-in-out;
    -o-transition: all .4s ease-in-out;
    -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out;}
     .Butten1-hover:focus {
    outline: none;}
  .Butten1-hover.bn24 {
    background-image: linear-gradient(
      to right,
      #c73e3e,
      #f9daa3,
      #114d81, 
      #d5eef2

    );
    box-shadow: 0 4px 15px 0 #a6482c; }
  .Butten1-hover.bn20 {
        background-image: linear-gradient(
          to right,
     #c73e3e,
      #f9daa3,
      #114d81, 
      #d5eef2
        );
        width: 120px;
    box-shadow: 0 4px 15px 0 #b9005d;}
    .box1{background: #d5eef2 ;
    width: 35%;
    border-radius: 8px ;
    border:#d5eef2; 
     padding-top: 10px;}
.box3{background: #d5eef2;
    width: 50%;
    padding-top: 10px;
        border-radius: 8px ;
       border:#d5eef2; }
       .text2{font-size: 110%; 
    color:#c73e3e;
    font-weight: bold;}
.text3{ color:#c73e3e;}
.tip {
        position: relative;
        display: inline-block; }
      .tip .tiptext {
        visibility: hidden;
        width: 120px;
        background-color: #d5eef2 ;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px 0;
        position: absolute;
        z-index: 1;
        top: -40px;
        left: 110%; }
      .tip .tiptext::after {
        content: "";
        position: absolute;
        top: 80%;
        right: 100%;
        margin-top: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: transparent #d5eef2 transparent transparent; }
      .tip:hover .tiptext {
        visibility: visible;}
</style>

<body>
    @extends('nav')
    @section('content')
    
    <div class="container overflow-auto " style="width:80%;clear:both;margin:50px 35%;margin-bottom:250px;">
        <h1 class="text-center text1">Goals</h1>
        <form method="get" action="{{ route('add.goal') }}">
            <table class="addform" >
                <tr>
                    <th>
                        <label class="text2" for="gname">{{__('messages.Goal Name :')}}</label>
                    </th>
                    <th>
                        <label class="text2"  for="goal">{{__('messages.Goal :')}}</label>
                    </th>
                    <th>
                        <label class="text2 tip" for="sav">{{__('messages.Saving :')}}<span class="tiptext">{{__('messages.monthly saving for goal')}} </span></label>
                    </th>
                    <th rowspan="3"><input class="Butten1-hover bn24" type="submit" value="{{__('messages.Add')}}" ></th>
                </tr>
                <tr>
                    <td>@error('name')
                        <span class="error-msg" >{{ $message }}</span>
                    @enderror</td>
                    <td>@error('goal')
                        <span class="error-msg" >{{ $message }}</span>
                    @enderror</td>
                    <td>@error('savings')
                        <span class="error-msg" >{{ $message }}</span>
                    @enderror</td>
                </tr>
                <tr>
                    <td>
                        <input class="mx-auto box3" style="background:#d5eef2;" value="{{old('name')}}" type="text" id="gname" name="name">
                    </td>
                    <td>
                        <input class="mx-auto box1" style="background:#d5eef2;" value="{{old('goal')}}" type="text" id="goal" name="goal">
                    </td>
                    <td>
                        <input class="mx-auto box1 "style="background:#d5eef2;" value="{{old('savings')}}" type="text" id="sav" name="savings">
                    </td>
                </tr>

            </table>
        </form>

            @foreach($goals as $goal)
            <p class="text2 mx-auto" style="width:70%;">{{$goal->name}}</p>
            <div class="progress w-75 mx-auto">
                <div class="progress-bar progress-bar-striped active bg-primary" role="progressbar"
                aria-valuenow="{{(($goal->goal)/($goal->goal+$goal->savings))*100}}" aria-valuemin="0" aria-valuemax="100" style="width:{{(($goal->goal)/($goal->goal+$goal->savings))*100}}%">
                <!-- {{round((($goal->goal)/($goal->goal+$goal->savings))*100)}}% -->{{$goal->goal}}
                </div>
                <div class="progress-bar progress-bar-striped active bg-success " role="progressbar"
                aria-valuenow="{{(($goal->savings)/($goal->goal+$goal->savings))*100}}" aria-valuemin="0" aria-valuemax="100" style="width:{{(($goal->savings)/($goal->goal+$goal->savings))*100}}%">
                <!-- {{round((($goal->savings)/($goal->goal+$goal->savings))*100)}}% -->{{$goal->savings}}
                </div>
            </div>
            <div class="mx-auto my-2 font-weight-bold" style="width:70%;">
            <form method="get" action="{{route('del.goal')}}">
                <input type="text" value="{{$goal->id}}" name="delete" id="delete" style="display:none;">
                <input class="btn btn-danger" type="submit" value="{{__('messages.Delete')}}" >
            </form>
            </div>
            
            @endforeach
            <div class="w-100 text-center">
            <button class="Butten1-hover bn20" type="submit" name="delete" data-bs-toggle="modal" data-bs-target="#exampleModal">{{__('messages.Delete All')}}  </button>
            </div>
            <div class="modal" id="exampleModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h2 class=" mx-auto "><span class="bg-danger badge" style="letter-spacing:4px;">{{__('messages.Alert!!!')}}</span></h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="h4">{{__('messages.Are you Sure you Want to Delete all ?')}}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('messages.Close')}}</button>
                    <form class="h5" method="get" action="{{route('deleteall')}}">
                    <input class="btn btn-danger " type="submit" value="{{__('messages.Delete All')}}">
                    </form>
                </div>
                </div>
            </div>
            </div>
    </div>


    @endsection
</body>