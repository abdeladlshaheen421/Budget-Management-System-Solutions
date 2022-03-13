<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignIn</title>
    <link rel="shortcut icon" href="{{ asset('/images/icon.jpg') }}" type="image">
    <link rel="stylesheet" href="{{ asset('css/signin.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

</head>
<body style="background-color: #AD91DA">
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<div><a href="{{URL::to('/')}}"><img class="rounded-circle" src="{{asset('/images/an5.jpg')}}" style="height:40px;width:40px;margin-left:130px;" alt="brand icon"/></a><span class="text-center " style="margin-left:24px;color:#000;letter-spacing:10px;font-weight:bold;font-size:22;height:100%;padding-bottom:6px;"><i class="fab fa-btc"></i>MSS</span></div>
				<br>
				<h2 class="text-center">{{__('messages.Welcome Back')}}</h2>
				@if($message = Session::get("fail"))
					<h4 class="text-center text-danger">{{$message}}</h3>
				@endif
			</div>
			<br>
			<div class="card-body">
				<form method="post" action="{{ route('login.account') }}">
					@csrf
					@error('email')
                        <span class="error-msg" >{{ $message }}</span>
                    	@enderror
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text" style="height:50px;"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="{{__('messages.username')}} {{__('messages.or')}} {{__('messages.email')}}" name="email" style="height:50px;" value="{{old('email')}}">

					</div>
					<br>
					@error('password')
                        <span class="error-msg" >{{ $message }}</span>
                    @enderror
					<div class="input-group form-group" >
						<div class="input-group-prepend">
							<span class="input-group-text" style="height:50px;"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="{{__('messages.password')}}" name="password" style="height:50px;">

					</div>

					<div class="form-group">
						<input type="submit" value="{{__('messages.Login')}}" class="btn font-weight-bold login_btn">
					</div>
				</form>
				<div class="d-flex justify-content-center links">
				{{__("messages.Don't have an account?")}}<a href="{{URL::to('agree')}}">{{__('messages.Sign Up')}}</a>
				</div>
			</div>

		</div>
	</div>
	<div class="right"><img src="{{ asset('/images/new.jpg') }}" alt="background"></div>
</div>


</body>
</html>