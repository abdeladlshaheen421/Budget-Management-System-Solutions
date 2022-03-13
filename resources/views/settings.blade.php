<head>
    <title>Settings</title>
    <link rel="stylesheet" href="{{ asset('css/setting.css') }}">
</head>

<body>
    @extends('nav')
    @section('content')
    <div class="container rounded w-100  shadow " style="margin-left:25%;margin-right:25%;height:600px;;background:#ebeaea;">
        <div class="left w-50 " style="color:rgb(75, 75, 90);border-radius:120px;">

            <form method="get" action="{{ route('change.lang') }}">
                <div style="width:200%;margin-right:0px;margin-left-20px;">

                    <div class="card overflow-hidden" style="border:0;">
                        <h4 class="font-weight-bold py-3 mb-4"
                            style="font-family: \'Crimson Pro\', serif; font-size: 30px;background:#ebeaea;">
                            <img src="{{ asset('/images/sett.png') }}" style="width:20%;margin-top:4%;" alt="">
                            {{__('messages.Setting')}}
                        </h4>
                        <div class="row no-gutters row-bordered row-border-light">
                            <div class="col-md-3 pt-0">
                                <div class="list-group list-group-flush account-settings-links">
                                    <a class="list-group-item list-group-item-action active" data-toggle="list"
                                        href="#account-general">{{__('messages.Setting')}}</a>
                                    <a class="list-group-item list-group-item-action" data-toggle="list"
                                        href="#account-change-password">{{__('messages.Help')}}</a>
                                </div>
                            </div>
                            <!--ترتيب الصفحة -->
                            <div class="col-md-9">
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="account-general">
                                        <hr class="border-light m-0">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label class="form-label" for="inputContact3">{{__('messages.Langauge')}}</label>
                                                <div class="col-sm-5">
                                                    <select name="lang" class="form-control">
                                                        <option disabled> {{__('messages.Select Langauge')}}</option>
                                                        <option value="ar">{{__('messages.Arabic')}}</option>
                                                        <option value="en">{{__('messages.English')}}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="account-change-password">
                                        <div class="card-body pb-2">
                                            <p style="font-size: 25px;"><strong>{{__('messages.Support')}}</strong></p>
                                            <p style="font-family:\'Crimson Pro\', serif; font-size: 20px;"> {{__('messages.Contact the Technical Support Team.')}}</p>
                                            <a href="mailto:App.BMSS@gmail.com"><img
                                                    src="{{ asset('/images/email.png') }}" style="width:6%;" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-1  w-100 text-center">
                            <input class="text-center rounded w-25"
                                style="color: hsla(0, 0%, 100%, 0.671);background-color: rgb(92, 92, 133);margin-bottom:5px;font-weight:bold;"
                                value="{{__('messages.Save Changes')}}" type="submit">
                            <!--class="btn btn-primary"-->
                        </div>
                    </div>

                </div>

            </form>

        </div>
    </div>

    
    @endsection
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
 
</body>