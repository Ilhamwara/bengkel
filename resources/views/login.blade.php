<!DOCTYPE html>
<html lang="en">
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Apilkasi Keuangan KANCAB || ASABRI</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{asset('recources/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('recources/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('recources/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('recources/global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('recources/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('recources/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('recources/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('recources/global/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{asset('recources/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('recources/pages/css/login-5.min.css')}}" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN : LOGIN PAGE 5-1 -->
        <div class="user-login-5">
            <div class="row bs-reset">
                <div class="col-md-6 bs-reset hidden-sm hidden-xs">
                    <div class="">
                        <img class="login-logo text-center" src="{{asset('recources/pages/img/login/Logo_Asabri.png')}}"> 
                    </div>
                </div>
                <div class="col-md-6 login-container bs-reset">
                    <div class="login-content">
                        {{-- <h1>Login System</h1> --}}
                        <h1 class="text-center">Selamat datang di</h1>
                        <h3 class="text-center" style="color: #666;"><b>Aplikasi Keuangan KANCAB</b></h3>
                        <form action="{{url('post-login')}}" class="login-form" method="post">
                        {{csrf_field()}}
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                <span>Enter any username and password. </span>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="email" autocomplete="off" placeholder="Email" name="email" required/> 
                                </div>
                                <div class="col-xs-6">
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="Password" name="password" required/> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button class="btn blue" type="submit">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="login-footer">
                        <div class="row bs-reset">
                            <div class="col-xs-12 bs-reset">
                                <div class="login-copyright text-right">
                                    <p>Copyright &copy; ASABRI {{date('Y')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{asset('recources/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('recources/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('recources/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('recources/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('recources/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('recources/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('recources/global/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('recources/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>        
        <script src="{{asset('recources/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('recources/global/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('recources/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('recources/global/plugins/backstretch/jquery.backstretch.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('recources/global/scripts/app.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('recources/pages/scripts/login-5.min.js')}}" type="text/javascript"></script>
    </body>

</html>