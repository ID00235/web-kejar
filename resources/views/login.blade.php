<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login WEB Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-themes.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body style="background-image:url('images/login.jpg')">
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Add your site or application content here -->
    <div class="container" style="padding-top:5%;">
        <div class="col-md-12 col-xs-12">
            <center>
               <form action="{{URL::to('login/submitlogin')}}" method="post" name="Login_Form" class="one-edge-shadow form-signin">
                <div class="ribbon-wrapper ribbon-er">
                    <p>&nbsp;</p>
                    <img src="{{asset('images/ppid-front.png')}}" class="img img-responsive" height="40px;">
                </div>
                <hr>
            	<br>
                @if($errors->has('login'))
                <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{$errors->first('login')}}
                </div>
                @endif
                @if(isset($google_error))
                <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{$google_error}}
                </div>
                @endif
                 {{csrf_field()}}
                <div class="form-group @if($errors->has('username')) has-error @endif">
                    @if($errors->has('username')) <small class="text-danger">{{$errors->first('username')}}</small> @endif
                    <input type="text" class="form-control" required name="username" placeholder="Username" autofocus="" value="{{ old('username') }}" />
                </div>
                <div class="form-group">
                    @if($errors->has('password')) <small class="text-danger">{{$errors->first('password')}}</small> @endif
                    <input type="password" class="form-control" required name="password" placeholder="Password" />
                </div>
                
                <button class="btn btn-lg btn-primary btn-block" name="Submit" value="Login" type="Submit">Login</button>
                <a href="{{url('')}}"class="btn btn-sm btn-warning btn-block" name="Submit" value="Login" type="Submit">Ke Beranda Website</a>
               
                
            </form> 
            </center>            
        </div>     
    </div>
    <script src="{{asset('js/vendor/jquery-1.12.0.min.js')}}"></script>
    <script src="{{asset('js/plugins.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    
</body>

</html>
