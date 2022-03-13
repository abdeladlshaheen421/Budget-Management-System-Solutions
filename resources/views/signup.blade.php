<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="shortcut icon" href="{{ asset('/images/icon.jpg') }}" type="image">
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


</head>
<body style="background-color:#DCEEF0;">
        <div class="container rounded">
	
        <div class="left bg-white"><a href="{{URL::to('/')}}"><img class="rounded-circle" src="{{asset('/images/an5.jpg')}}" style="height:40px;width:40px;margin-left:5px;margin-top:5px;" alt="brand icon"/></a><span class="text-center " style="margin-left:24px;color:#000;letter-spacing:10px;font-weight:bold;font-size:22;height:100%;padding-bottom:6px;"><i class="fab fa-btc"></i>MSS</span></div>
		
        <div class="card border-0">

			<div class="card-header bg-white border-0">
            <h3 style="font-family:'Times-New-Roman';font-weight:bold;margin-bottom:0;">{{__('messages.SignUp')}}</h3>
				@if($message = Session::get("success"))
					<h3 class="text-center text-success">{{$message}}</h3>
				@endif
			</div>
			<div class="card-body " >
				<form method="post" class="m-0" action="{{ route('create.account') }}">
				@csrf
                <div class="row col-12">
                    <div class="col-6">
					@error('name')
                        <span class="error-msg" >{{ $message }}</span>
                    @enderror
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="{{__('messages.Enter your name')}}" name="name" value="{{ old('name') }}">
						
					</div>
					@error('email')
                        <span class="error-msg" >{{ $message }}</span>
                    @enderror
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-envelope-square"></i></span>
						</div>
						<input type="email" class="form-control" placeholder="{{__('messages.Enter your Email')}}" name="email" value="{{ old('email') }}">
					</div>
					@error('password')
                        <span class="error-msg" >{{ $message }}</span>
                    @enderror
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-lock"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="{{__('messages.Enter your password')}}" name="password" >
					</div>
					@error('age')
                        <span class="error-msg" >{{ $message }}</span>
                    @enderror
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user-edit"></i></span>
						</div>
						<input type="number" class="form-control" name="age" placeholder="{{__('messages.Enter your age')}}" min=18 value="{{ old('age') }}">
					</div>
					@error('salary')
                        <span class="error-msg" >{{ $message }}</span>
                    @enderror
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
						</div>
						<input type="text" class="form-control" name="salary" placeholder="{{__('messages.Enter your salary')}}" value="{{ old('salary') }}">
					</div>

                    </div>
                    <div class="col-6">
					@error('country')
                        <span class="error-msg" >{{ $message }}</span>
                    @enderror
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-globe-asia"></i></span>
						</div>
						<select name="country" class="form-control" >
                            <option selected disabled>{{__('messages.Choose your country')}}</option>
                            <option value="Kuwait" @if (old('country') == "Kuwait") {{ 'selected' }} @endif>Kuwait</option>
                            <option value="Jordan" @if (old('country') == "Jordan") {{ 'selected' }} @endif>Jordan</option>
                            <option value="Bahrain" @if (old('country') == "Bahrain") {{ 'selected' }} @endif>Bahrain</option>
                            <option value="Saudi Arabia" @if (old('country') == "Saudi Arabia") {{ 'selected' }} @endif>Saudi Arabia</option>
                            <option value="United Arab Emirates" @if (old('country') == "United Arab Emirates") {{ 'selected' }} @endif>United Arab Emirates</option>
                            <option value="Egypt" @if (old('country') == "Egypt") {{ 'selected' }} @endif>Egypt</option>
                    </select>
					</div>
					@error('gender')
                        <span class="error-msg" >{{ $message }}</span>
                    @enderror
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
						</div>
						<select name="gender" class="form-control" >
                            <option selected disabled>{{__('messages.Choose your gender')}}</option>
                            <option value="male" @if (old('gender') == "male") {{ 'selected' }} @endif>Male</option>
                            <option value="female" @if (old('gender') == "female") {{ 'selected' }} @endif>Female</option>
                    </select>
					</div>
					@error('maritalstatus')
                        <span class="error-msg" >{{ $message }}</span>
                    @enderror
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-users"></i></span>
						</div>
						<select name="maritalstatus" class="form-control" >
                            <option selected disabled>{{__('messages.Choose your Marital Status')}}</option>
                            <option value="single" @if (old('maritalstatus') == "single") {{ 'selected' }} @endif>Single</option>
                            <option value="married" @if (old('maritalstatus') == "married") {{ 'selected' }} @endif>Married</option>
                    </select>
					</div>

                        <div class="input-group form-group chkv">
                            <div class="form-check form-switch">
                            <input class="form-check-input"  type="checkbox" id="flexSwitchCheckChecked" onclick="disp()" checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked">{{__('messages.Do you have additional income?')}}</label>
                            
                        </div>
                    </div>
                    <div class="input-group form-group" id="add">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-plus-square"></i></span>
						</div>
						<input type='text' class="form-control"  placeholder="{{__('messages.Enter additional income')}}" name='additionalincome' value="{{ old('additionalincome') }}"> 
					</div>

               
                    </div>

                    <div class="form-group col-12">
						<input type="submit" value="{{__('messages.SignUp')}}" class="btn font-weight-bold login_btn">
					</div>
                </div>
				</form>
				<div class="d-flex justify-content-center links text-dark ">
                {{__('messages.Do you have an account?')}}<a href="{{URL::to('signin')}}">{{__('messages.Sign in')}}</a>
				</div>
			</div>
			
		</div>
	
</div>
           
        
    
    <script> 
    function disp(){
        var x=document.getElementById('flexSwitchCheckChecked');
        if (x.checked == true){
            document.getElementById('add').style.display = "";
        }
        else{
            document.getElementById('add').style.display = "none";
        }
    }
    </script>  
</body>
</html>