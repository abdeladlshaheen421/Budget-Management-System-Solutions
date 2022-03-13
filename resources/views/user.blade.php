<title>profile</title>
@extends('nav')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MyAccount </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="w-100" style="display:flex;clear:both;margin-left:25%;margin-right:25%;">
        <div class="w-50" style="float:left;color:blue;border-radius:120px;">
            <div style="height:600px;width:200%;">
                <div class=" light-style flex-grow-1 ">
                    <div class="card overflow-hidden" style="background-color:#cee7ee;">
                        <h4 class="font-weight-bold py-1 mb-4"
                            style="color: rgb(45, 45, 153);font-family: \'Crimson Pro\', serif; font-size: 30px;">
                            <img class=" m-1 p-1 " src="{{asset('/images/personal.jpg')}}"
                                style="width:15%;margin-top:10%;" alt=""> {{__('messages.MyAccount')}}
                        </h4>
                        <div class="row no-gutters row-bordered row-border-light bg-light">
                            <div class="col-md-3 pt-0">
                                <div id="list-example" class="list-group">
                                    <a class="list-group-item list-group-item-action active" data-toggle="list"
                                        href="#account-general">{{__('messages.Informaion')}}</a>
                                    <a class="list-group-item list-group-item-action" data-toggle="list"
                                        href="#account-change-password">{{__('messages.Change password')}}</a>
                                    <button class="list-group-item list-group-item-action" data-bs-toggle="modal"
                                        data-bs-target="#modadelete"
                                        href="#delete-account">{{__('messages.Delete account')}}</button>



                                </div>
                            </div>

                            <!--ترتيب الصفحة -->
                            <div class="col-md-9 scrollspy-example" data-spy="scroll" data-target="#list-example"
                                data-offset="0" style="z-index:1;">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="account-general">
                                        <hr class="border-light m-0">
                                        <form method="POST" action="{{ route('user.update') }}">
                                            @csrf
                                            @method('post')
                                            <div class="form-group w-50">
                                                @error('name')
                                                <span class="error-msg">{{ $message }}</span>
                                                @enderror
                                                <label class="form-label">{{__('messages.Name')}}</label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="name" class="form-control"
                                                        value="{{ $user->name }}" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group w-50">
                                                @error('email')
                                                <span class="error-msg">{{ $message }}</span>
                                                @enderror
                                                <label class="form-label">{{__('messages.E-mail')}}</label>
                                                <div class="col-sm-6">
                                                    <input type="text" name="email" class="form-control"
                                                        value="{{ $user->email }}" disabled>
                                                </div>
                                            </div>

                                            <div class="form-group w-50">
                                                @error('salary')
                                                <span class="error-msg">{{ $message }}</span>
                                                @enderror
                                                <label class="form-label">{{__('messages.income')}}</label>
                                                <div class="col-sm-6">
                                                    <input type="number" name="salary" class="form-control"
                                                        value="{{ $user->salary }}">
                                                </div>

                                                You have addition income
                                                <div class="col-sm-6 w-50">
                                                    <input type="checkbox" id="abc" onclick="checkMe()"
                                                        @if($user->additional_income) checked @endif/>
                                                    <p id="msg" @if(!$user->additional_income) style="display:none"
                                                        @endif>
                                                        <label class="form-label">{{__('messages.income')}}</label>
                                                        <input type="number" name="additional_income"
                                                            class="form-control" value="{{ $user->additional_income }}">
                                                    </p>
                                                </div>
                                                <div class="text-right m-3">
                                                    <button type="submit"
                                                        class="btn btn-primary">{{__('messages.Save Changes')}}
                                                    </button>
                                                </div>
                                            </div>
                                    </div>
                                    </form>
                                    <div class="tab-pane fade" id="account-change-password">
                                        <div class="card-body pb-2">
                                        </div>
                                        <form class=" w-50" style="float:left" method="post"
                                            action="{{route('change.pass')}}">
                                            @csrf

                                            @method('post')
                                            <div class="form-group">
                                                @if($message = Session::get("failed"))
                                                <h3 class="text-center text-success">{{$message}}</h3>
                                                @endif
                                            </div>
                                            <!--تغيير كلمة المرور-->
                                            <div class="form-group  w-100">
                                                <label class="form-label">{{__('messages.Current password')}}</label>
                                                <div class="col-sm-5">
                                                    <input name="oldpass" type="password" class="form-control ">
                                                </div>
                                            </div>
                                            <div class="form-group  w-100">
                                                <label class="form-label">{{__('messages.New password')}}</label>
                                                <div class="col-sm-5">
                                                    <input name="pass" type="password" class="form-control ">
                                                </div>
                                            </div>
                                            <div class="form-group w-100">
                                                <label class="form-label">{{__('messages.Repeat new password')}}</label>
                                                <div class="col-sm-5">
                                                    <input name="spass" type="password" class="form-control ">
                                                </div>
                                            </div>

                                            <div class="text-right m-3">
                                                <button type="submit"
                                                    class="btn btn-primary">{{__('messages.Save Changes')}}
                                                </button>
                                            </div>
                                        </form>
                                        <div class="col-md-6" style="float:right;z-index:4;">
                                            <p class="mb-2">{{__('messages.Password requirements')}}</p>
                                            <p class="small text-muted mb-2">
                                                {{__('messages.To create a new password, you have to')}}
                                                {{__('messages.meet all of the following requirements:')}}</p>
                                            <ul class="small text-muted pl-4 mb-0">
                                                <li>{{__('messages.Must contain at least 8 character.')}}</li>
                                                <li>{{__('messages.Must contain a mixture of both uppercase and lowercase letters.')}}
                                                </li>
                                                <li>{{__('messages.Must contain a mixture of letters and numbers.')}}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modadelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center text-danger">
                    <h1>you want to delete account ?</h1>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary w-25 mx-auto"
                        style="font-weight:bold;font-size:22px;" data-bs-dismiss="modal">Close</button>

                    <a type="submit" href="{{URL::to('deleteAccount')}}" class="btn btn-primary w-25 mx-auto" style="font-weight:bold;font-size:22px;"
                         >{{__('messages.Delete')}}</a>
                </div>
            </div>
        </div>
    </div>



</body>

<script type="text/javascript">
function checkMe() {
    var cb = document.getElementById("abc");
    var text = document.getElementById("msg");
    if (cb.checked == true) {
        text.style.display = "block";
    } else {
        text.style.display = "none";
    }
}
</script>
</body>

</html>


@endsection