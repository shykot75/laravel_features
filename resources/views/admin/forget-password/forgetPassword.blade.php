<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <title>Laravel Features | Forget Password</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    {{--    Favicon Icon  --}}
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/')}}uploads/logo/laravel.png">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{ asset('/')}}backend/assets/css/vendor.min.css" rel="stylesheet" />
    <link href="{{ asset('/')}}backend/assets/css/default/app.min.css" rel="stylesheet" />

    <link href="{{ asset('/')}}backend/assets/css/font-awesome.min.css" rel="stylesheet" />

</head>
<body class='pace-top'>

<div id="loader" class="app-loader">
    <span class="spinner"></span>
</div>


<div id="app" class="app">

    <main class="login-form my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <h3 class="card-header text-dark-700">Reset Password</h3>
                        <div class="card-body">

                            @if (Session::has('message'))
                                <div class="alert alert-success" style="font-size: 14px;" role="alert">
                                    {{ Session::get('message') }}
                                </div>
                            @endif

                            <blockquote class="text-warning-600" style="font-weight: bold;">Enter the valid email address that you want to receive the reset link. Remember: The Email you are providing must have to registered in our system.</blockquote>

                            <form action="{{ route('forget.password.post') }}" method="POST">
                                @csrf
                                <div class="form-group row pt-3">
                                    <label for="email_address" class="col-md-4 col-form-label text-xl-start">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input type="email" id="email_address" class="form-control mb-2" placeholder="Enter Your Email " name="email" required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="text-danger-600 pt-2">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 offset-md-4 ">
                                    <button type="submit" class="btn btn-primary mt-2">
                                        Send Password Reset Link
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>




    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>

</div>


<script src="{{ asset('/')}}backend/assets/js/vendor.min.js" type="a0616a96a228706fff8d35bc-text/javascript"></script>
<script src="{{ asset('/')}}backend/assets/js/app.min.js" type="a0616a96a228706fff8d35bc-text/javascript"></script>

@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

<script src="{{ asset('/')}}backend/assets/js/demo/login-v2.demo.js" type="a0616a96a228706fff8d35bc-text/javascript"></script>

<script type="a0616a96a228706fff8d35bc-text/javascript">
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','../../../../www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-53034621-1', 'auto');
		ga('send', 'pageview');

	</script>
<script src="{{ asset('/')}}backend/assets/js/rocket-loader.min.js" data-cf-settings="a0616a96a228706fff8d35bc-|49" defer=""></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"714575485f7778b7","version":"2021.12.0","r":1,"token":"4db8c6ef997743fda032d4f73cfeff63","si":100}' crossorigin="anonymous"></script>
</body>


</html>


