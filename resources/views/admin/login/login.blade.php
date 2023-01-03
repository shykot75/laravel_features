<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <title>Laravel Features | Login Page</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    {{--    Favicon Icon  --}}
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/')}}uploads/logo/laravel.png">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{ asset('/')}}backend/assets/css/vendor.min.css" rel="stylesheet" />
    <link href="{{ asset('/')}}backend/assets/css/default/app.min.css" rel="stylesheet" />

    <link href="{{ asset('/')}}backend/assets/css/font-awesome.min.css" rel="stylesheet" />

{{--    <script type="text/javascript"> window.history.forward(); function noBack() { window.history.forward(); } </script>--}}

</head>
<body class='pace-top' >
{{--<body  onload="noBack();" onpageshow="if (event.persisted) noBack();" onunload="">--}}

<div id="loader" class="app-loader">
    <span class="spinner"></span>
</div>


<div id="app" class="app">

    <div class="login login-v2 fw-bold">

        <div class="login-cover">
            <div class="login-cover-img" style="background-image: url({{ asset('/')}}backend/assets/img/login-bg/laravel-bg-1.jpg)" data-id="login-cover-image"></div>
            <div class="login-cover-bg"></div>
        </div>


        <div class="login-container">

            <div class="login-header">
                <div class="brand">
                    <div class="d-flex align-items-center">
                        <img style=" margin-right: 5px;" src="{{asset('/')}}uploads/logo/laravel.png" height="36px" width="36px" alt="" ><b class="mx-2">Laravel </b> Features
                    </div>
                    <small>Develop By Shykot Hasan Shourav</small>

                </div>
                <div class="icon">
                    <i class="fa fa-lock"></i>
                </div>
            </div>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    @php
                        Alert::toast($error, 'error')
                    @endphp
                @endforeach
            @endif


            <div class="login-content">
                <form action="{{ route('post.login') }}" method="POST">
                    @csrf
                    <div class="form-floating mb-20px">
                        <input type="email" name="email" class="form-control fs-13px h-45px border-0" placeholder="Email Address" id="emailAddress" />
                        <label for="emailAddress" class="d-flex align-items-center text-gray-600 fs-13px">Email Address</label>
                    </div>
                    <div class="form-floating mb-20px">
                        <input type="password" name="password" class="form-control fs-13px h-45px border-0" placeholder="Password" />
                        <label for="emailAddress" class="d-flex align-items-center text-gray-600 fs-13px">Password</label>
                    </div>
                    <div class="form-check mb-20px">
                        <input class="form-check-input border-0" type="checkbox" value="1" id="rememberMe" />
                        <label class="form-check-label fs-13px text-gray-500" for="rememberMe">
                            Remember Me
                        </label>
                        <a href="{{ route('forget.password.get') }}" class="mx-3 float-end">Forget Password?</a>
                    </div>
                    <div class="mb-20px">
                        <button type="submit" class="btn btn-outline-danger d-block w-100 h-45px btn-lg">Log In</button>
                    </div>
                    <div class="text-blue-500">
{{--                        <a href="">Forget Password?</a>--}}
                    </div>
                </form>
            </div>

        </div>

    </div>


    <div class="login-bg-list clearfix">
        <div class="login-bg-list-item active"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="{{ asset('/')}}backend/assets/img/login-bg/laravel-bg-1.jpg" style="background-image: url({{ asset('/')}}backend/assets/img/login-bg/laravel-bg-1.jpg)"></a></div>
        <div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="{{ asset('/')}}backend/assets/img/login-bg/login-bg-17.jpg" style="background-image: url({{ asset('/')}}backend/assets/img/login-bg/login-bg-17.jpg)"></a></div>
        <div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="{{ asset('/')}}backend/assets/img/login-bg/login-bg-16.jpg" style="background-image: url({{ asset('/')}}backend/assets/img/login-bg/login-bg-16.jpg)"></a></div>
        <div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="{{ asset('/')}}backend/assets/img/login-bg/login-bg-15.jpg" style="background-image: url({{ asset('/')}}backend/assets/img/login-bg/login-bg-15.jpg)"></a></div>
        <div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="{{ asset('/')}}backend/assets/img/login-bg/login-bg-14.jpg" style="background-image: url({{ asset('/')}}backend/assets/img/login-bg/login-bg-14.jpg)"></a></div>
        <div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="{{ asset('/')}}backend/assets/img/login-bg/login-bg-13.jpg" style="background-image: url({{ asset('/')}}backend/assets/img/login-bg/login-bg-13.jpg)"></a></div>
        <div class="login-bg-list-item"><a href="javascript:;" class="login-bg-list-link" data-toggle="login-change-bg" data-img="{{ asset('/')}}backend/assets/img/login-bg/login-bg-12.jpg" style="background-image: url({{ asset('/')}}backend/assets/img/login-bg/login-bg-12.jpg)"></a></div>
    </div>




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
