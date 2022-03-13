<head><title>payment</title></head>
<body style="background-color:#DCDCDE;">
@extends('nav')
@section('content')
<div class="container rounded bg-light w-75 shadow" style="display:flex;clear:both;background-color:#fff;height:500px;margin-top:70px;margin-left:35%;margin-right:35%;"  >
    <div class="left w-50" style="float:left;color:blue;border-radius:120px;">
        <img src="{{asset('/images/cre3.jpg')}}" class="rounded" style="margin-left:10px;margin-top:140px;height:200px;width:350px;border-radius:120px;" class="rounded" alt="credit-card">
    </div>
    <div class="right w-50">
        <form action="{{ route('add.credit') }}" method="post">
            @csrf
            @if($message = Session::get("success"))
					<h3 class="text-center text-success">{{$message}}</h3>
				@endif
            <h2 class="text-dark my-4">{{__('messages.Payment Details')}}</h2>
            <label class="opacity-75">{{__('messages.Name On Card')}}</label>
            @error('holdername')
                        <span class="error-msg text-danger d-block" >{{ $message }}</span>
             @enderror
            <input type="text" class="form-control border-0 border-bottom w-75" placeholder="{{__('messages.holder name')}}" name="holdername" value="{{old('holdername')}}">
            <br>
            <label class="opacity-75">{{__('messages.Card Number')}}</label>
            <br>
            @error('cardnumber')
                        <span class="error-msg text-danger d-block" >{{ $message }}</span>
                    @enderror
            <input type="text"  class="form-control w-75 d-inline border-0 border-bottom " name="cardnumber" placeholder="0000 0000 0000 0000" value="{{old('cc-number')}}">
            <i class="fab fa-cc-visa" style="color:#959599;font-size:25px;"></i>
            
           <br>
           <div style="display:flex;clear:both;width:100%;align:center">
            <div class="d-inline " style="float:left;width:150px;">
            <label class="opacity-75 d-block" style="margin-top:20px;">{{__('messages.Valid Through')}}</label>
            @error('expiredate')
                        <span class="error-msg text-danger   d-block " style="font-size:14px;">{{ $message }}</span>
                    
            @enderror
            <input type="text" class="form-control w-75 d-inline border-0 border-bottom d-block" name="expiredate" placeholder="00/00" value="{{old('expiredate')}}">
            </div>
            <div class="d-inline " style="float:right">
            <label class="opacity-75 d-block" style="margin-left:120px;margin-top:20px;">{{__('messages.CVV')}}</label>
            @error('cvv')
                        <span class="error-msg text-danger d-block" style="font-size:14px;" >{{ $message }}</span>
                        
            @enderror
            <input type="text" class="form-control w-50 d-block border-0 border-bottom" style="margin-left:120px;" name="cvv" placeholder="123" value="{{old('cvv')}}">
            </div>
            </div>
            <button class="btn btn-lg  d-block my-5 mx-2 w-75" type="submit" style="background-color:#6E6E6F;color:#fff;">{{__('messages.Add credit')}}</button>

        </form>
    </div>
</div>
@endsection
</body>