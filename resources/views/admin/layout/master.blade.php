<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    {{--    Favicon Icon  --}}
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/')}}uploads/logo/laravel.png">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{ asset('/')}}backend/assets/css/vendor.min.css" rel="stylesheet" />
    <link href="{{ asset('/')}}backend/assets/css/default/app.min.css" rel="stylesheet" />

    <link href="{{ asset('/')}}backend/assets/css/font-awesome.min.css" rel="stylesheet" />


    <link href="{{ asset('/')}}backend/assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
    <link href="{{ asset('/')}}backend/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet" />
{{--    <link href="{{ asset('/')}}backend/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />--}}



</head>
<body>

<div id="loader" class="app-loader">
    <span class="spinner"></span>
</div>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        @php
            Alert::toast($error, 'error')
        @endphp
    @endforeach
@endif


<div id="app" class="app app-header-fixed app-sidebar-fixed ">

    <div id="header" class="app-header">

        <div class="navbar-header">
            <a href="{{ route('dashboard') }}" class="navbar-brand"><span class=""></span> <b class="mx-2 text-red-500">Laravel</b> Featues </a>
            <button type="button" class="navbar-mobile-toggler" data-toggle="app-sidebar-mobile">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>


        <div class="navbar-nav">
            <div class="navbar-item navbar-form">
                <form action="#" method="POST" name="search">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter keyword" />
                        <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="navbar-item dropdown">
                <a href="#" data-bs-toggle="dropdown" class="navbar-link dropdown-toggle icon">
                    <i class="fa fa-bell"></i>
                    <span class="badge">5</span>
                </a>
                <div class="dropdown-menu media-list dropdown-menu-end">
                    <div class="dropdown-header">NOTIFICATIONS (5)</div>

                    <a href="javascript:;" class="dropdown-item media">
                        <div class="media-left">
                            <img src="{{ asset('/')}}backend/assets/img/user/user-1.jpg" class="media-object" alt="" />
                            <i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
                        </div>
                        <div class="media-body">
                            <h6 class="media-heading">John Smith</h6>
                            <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                            <div class="text-muted fs-10px">25 minutes ago</div>
                        </div>
                    </a>

                    <div class="dropdown-footer text-center">
                        <a href="javascript:;" class="text-decoration-none">View more</a>
                    </div>
                </div>
            </div>
            <div class="navbar-item navbar-user dropdown">
                <a href="#" class="navbar-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                    <img src="{{ Auth::user()->image == null ? url('uploads/no_image.jpg') : asset(Auth::user()->image)  }}" alt="profile image" />
                    <span>
                        <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                        <b class="caret"></b>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end me-1">
                    <a href="{{ route('profile', Auth::user()->id) }}" class="dropdown-item">Edit Profile</a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('password', Auth::user()->id) }}" class="dropdown-item">Change Password</a>
                    <div class="dropdown-divider"></div>
                    <a href="" onclick="event.preventDefault(); document.getElementById('admin-logout').submit();" class="dropdown-item">Log Out</a>
                    <form action="{{ route('admin.logout') }}" method="POST" id="admin-logout">
                        @csrf
                    </form>
                </div>
            </div>
        </div>

    </div>


    <div id="sidebar" class="app-sidebar">

        <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">

            <div class="menu">
                <div class="menu-profile">
                    <a href="javascript:;" class="menu-profile-link" data-toggle="app-sidebar-profile" data-target="#appSidebarProfileMenu">
                        <div class="menu-profile-cover with-shadow"></div>
                        <div class="menu-profile-image">
                            <img src="{{ Auth::user()->image == null ? url('uploads/no_image.jpg') : asset(Auth::user()->image)  }}" alt="" />
                        </div>
                        <div class="menu-profile-info">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    {{ Auth::user()->name }}
                                </div>
                                <div class="menu-caret ms-auto"></div>
                            </div>
                            <small>Back End developer</small>
                        </div>
                    </a>
                </div>
                <div id="appSidebarProfileMenu" class="collapse">
                    <div class="menu-item pt-5px">
                        <a href="javascript:;" class="menu-link">
                            <div class="menu-icon"><i class="fa fa-cog"></i></div>
                            <div class="menu-text">Settings</div>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a href="javascript:;" class="menu-link">
                            <div class="menu-icon"><i class="fa fa-pencil-alt"></i></div>
                            <div class="menu-text"> Send Feedback</div>
                        </a>
                    </div>
                    <div class="menu-item pb-5px">
                        <a href="javascript:;" class="menu-link">
                            <div class="menu-icon"><i class="fa fa-question-circle"></i></div>
                            <div class="menu-text"> Helps</div>
                        </a>
                    </div>
                    <div class="menu-divider m-0"></div>
                </div>
                <div class="menu-header">Navigation</div>
                <div class="menu-item has-sub active">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon">
                            <i class="fa fa-sitemap"></i>
                        </div>
                        <div class="menu-text">Dashboard</div>
                        <div class="menu-caret"></div>
                    </a>
                    <div class="menu-submenu">
                        <div class="menu-item active">
                            <a href="index.html" class="menu-link"><div class="menu-text">Dashboard v1</div></a>
                        </div>
                        <div class="menu-item">
                            <a href="index_v2.html" class="menu-link"><div class="menu-text">Dashboard v2</div></a>
                        </div>
                        <div class="menu-item">
                            <a href="index_v3.html" class="menu-link"><div class="menu-text">Dashboard v3</div></a>
                        </div>
                    </div>
                </div>
                <div class="menu-item has-sub">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon">
                            <i class="fa fa-hdd"></i>
                        </div>
                        <div class="menu-text">Email</div>
                        <div class="menu-badge">10</div>
                    </a>
                    <div class="menu-submenu">
                        <div class="menu-item">
                            <a href="email_inbox.html" class="menu-link">
                                <div class="menu-text">Inbox</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="email_compose.html" class="menu-link">
                                <div class="menu-text">Compose</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="email_detail.html" class="menu-link">
                                <div class="menu-text">Detail</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="menu-item">
                    <a href="widget.html" class="menu-link">
                        <div class="menu-icon">
                            <i class="fab fa-simplybuilt"></i>
                        </div>
                        <div class="menu-text">Widgets <span class="menu-label">NEW</span></div>
                    </a>
                </div>


                <div class="menu-item has-sub">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon">
                            <i class="fa fa-table"></i>
                        </div>
                        <div class="menu-text">Tables</div>
                        <div class="menu-caret"></div>
                    </a>
                    <div class="menu-submenu">
                        <div class="menu-item">
                            <a href="table_basic.html" class="menu-link">
                                <div class="menu-text">Basic Tables</div>
                            </a>
                        </div>
                        <div class="menu-item has-sub">
                            <a href="javascript:;" class="menu-link">
                                <div class="menu-text">Managed Tables</div>
                                <div class="menu-caret"></div>
                            </a>
                            <div class="menu-submenu">
                                <div class="menu-item">
                                    <a href="table_manage.html" class="menu-link">
                                        <div class="menu-text">Default</div>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a href="table_manage_buttons.html" class="menu-link">
                                        <div class="menu-text">Buttons</div>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a href="table_manage_colreorder.html" class="menu-link">
                                        <div class="menu-text">ColReorder</div>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a href="table_manage_fixed_columns.html" class="menu-link">
                                        <div class="menu-text">Fixed Column</div>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a href="table_manage_fixed_header.html" class="menu-link">
                                        <div class="menu-text">Fixed Header</div>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a href="table_manage_keytable.html" class="menu-link">
                                        <div class="menu-text">KeyTable</div>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a href="table_manage_responsive.html" class="menu-link">
                                        <div class="menu-text">Responsive</div>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a href="table_manage_rowreorder.html" class="menu-link">
                                        <div class="menu-text">RowReorder</div>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a href="table_manage_scroller.html" class="menu-link">
                                        <div class="menu-text">Scroller</div>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a href="table_manage_select.html" class="menu-link">
                                        <div class="menu-text">Select</div>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a href="table_manage_combine.html" class="menu-link">
                                        <div class="menu-text">Extension Combination</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="menu-item has-sub">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon">
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="menu-text">Front End <span class="menu-label">NEW</span></div>
                        <div class="menu-caret"></div>
                    </a>
                    <div class="menu-submenu">
                        <div class="menu-item">
                            <a href="https://seantheme.com/color-admin/frontend/one-page-parallax/index.html" target="_blank" class="menu-link">
                                <div class="menu-text">One Page Parallax</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="https://seantheme.com/color-admin/frontend/blog/index.html" target="_blank" class="menu-link">
                                <div class="menu-text">Blog</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="https://seantheme.com/color-admin/frontend/forum/index.html" target="_blank" class="menu-link">
                                <div class="menu-text">Forum</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="https://seantheme.com/color-admin/frontend/e-commerce/index.html" target="_blank" class="menu-link">
                                <div class="menu-text">E-Commerce</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="https://seantheme.com/color-admin/frontend/corporate/index.html" target="_blank" class="menu-link">
                                <div class="menu-text">Corporate <i class="fa fa-paper-plane text-theme"></i></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="menu-item has-sub">
                    <a href="javascript:;" class="menu-link">
                        <div class="menu-icon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="menu-text">Email Template</div>
                        <div class="menu-caret"></div>
                    </a>
                    <div class="menu-submenu">
                        <div class="menu-item">
                            <a href="email_system.html" class="menu-link">
                                <div class="menu-text">System Template</div>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a href="email_newsletter.html" class="menu-link">
                                <div class="menu-text">Newsletter Template</div>
                            </a>
                        </div>
                    </div>
                </div>





                <div class="menu-item d-flex">
                    <a href="javascript:;" class="app-sidebar-minify-btn ms-auto" data-toggle="app-sidebar-minify"><i class="fa fa-angle-double-left"></i></a>
                </div>

            </div>

        </div>

    </div>
    <div class="app-sidebar-bg"></div>
    <div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a></div>


    <div id="content" class="app-content">

       @yield('admin-content')

    </div>





    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>

</div>


<script src="{{ asset('/')}}backend/assets/js/vendor.min.js" type="9c13ede09614428406f7f52d-text/javascript"></script>
<script src="{{ asset('/')}}backend/assets/js/app.min.js" type="9c13ede09614428406f7f52d-text/javascript"></script>


{{--<script src="{{ asset('/')}}backend/assets/plugins/gritter/js/jquery.gritter.js" type="9c13ede09614428406f7f52d-text/javascript"></script>--}}
<script src="{{ asset('/')}}backend/assets/plugins/flot/source/jquery.canvaswrapper.js" type="9c13ede09614428406f7f52d-text/javascript"></script>
<script src="{{ asset('/')}}backend/assets/plugins/flot/source/jquery.colorhelpers.js" type="9c13ede09614428406f7f52d-text/javascript"></script>
<script src="{{ asset('/')}}backend/assets/plugins/flot/source/jquery.flot.js" type="9c13ede09614428406f7f52d-text/javascript"></script>
<script src="{{ asset('/')}}backend/assets/plugins/flot/source/jquery.flot.saturated.js" type="9c13ede09614428406f7f52d-text/javascript"></script>
<script src="{{ asset('/')}}backend/assets/plugins/flot/source/jquery.flot.browser.js" type="9c13ede09614428406f7f52d-text/javascript"></script>
<script src="{{ asset('/')}}backend/assets/plugins/flot/source/jquery.flot.drawSeries.js" type="9c13ede09614428406f7f52d-text/javascript"></script>
<script src="{{ asset('/')}}backend/assets/plugins/flot/source/jquery.flot.uiConstants.js" type="9c13ede09614428406f7f52d-text/javascript"></script>
<script src="{{ asset('/')}}backend/assets/plugins/flot/source/jquery.flot.time.js" type="9c13ede09614428406f7f52d-text/javascript"></script>
<script src="{{ asset('/')}}backend/assets/plugins/flot/source/jquery.flot.resize.js" type="9c13ede09614428406f7f52d-text/javascript"></script>
<script src="{{ asset('/')}}backend/assets/plugins/flot/source/jquery.flot.pie.js" type="9c13ede09614428406f7f52d-text/javascript"></script>
<script src="{{ asset('/')}}backend/assets/plugins/flot/source/jquery.flot.crosshair.js" type="9c13ede09614428406f7f52d-text/javascript"></script>
<script src="{{ asset('/')}}backend/assets/plugins/flot/source/jquery.flot.categories.js" type="9c13ede09614428406f7f52d-text/javascript"></script>
<script src="{{ asset('/')}}backend/assets/plugins/flot/source/jquery.flot.navigate.js" type="9c13ede09614428406f7f52d-text/javascript"></script>
<script src="{{ asset('/')}}backend/assets/plugins/flot/source/jquery.flot.touchNavigate.js" type="9c13ede09614428406f7f52d-text/javascript"></script>
<script src="{{ asset('/')}}backend/assets/plugins/flot/source/jquery.flot.hover.js" type="9c13ede09614428406f7f52d-text/javascript"></script>
<script src="{{ asset('/')}}backend/assets/plugins/flot/source/jquery.flot.touch.js" type="9c13ede09614428406f7f52d-text/javascript"></script>
<script src="{{ asset('/')}}backend/assets/plugins/flot/source/jquery.flot.selection.js" type="9c13ede09614428406f7f52d-text/javascript"></script>
<script src="{{ asset('/')}}backend/assets/plugins/flot/source/jquery.flot.symbol.js" type="9c13ede09614428406f7f52d-text/javascript"></script>
<script src="{{ asset('/')}}backend/assets/plugins/flot/source/jquery.flot.legend.js" type="9c13ede09614428406f7f52d-text/javascript"></script>
<script src="{{ asset('/')}}backend/assets/plugins/jquery-sparkline/jquery.sparkline.min.js" type="9c13ede09614428406f7f52d-text/javascript"></script>
<script src="{{ asset('/')}}backend/assets/plugins/jvectormap-next/jquery-jvectormap.min.js" type="9c13ede09614428406f7f52d-text/javascript"></script>
<script src="{{ asset('/')}}backend/assets/plugins/jvectormap-next/jquery-jvectormap-world-mill.js" type="9c13ede09614428406f7f52d-text/javascript"></script>
<script src="{{ asset('/')}}backend/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js" type="9c13ede09614428406f7f52d-text/javascript"></script>
<script src="{{ asset('/')}}backend/assets/js/demo/dashboard.js" type="9c13ede09614428406f7f52d-text/javascript"></script>

@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])


<script type="9c13ede09614428406f7f52d-text/javascript">
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','../../../../www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-53034621-1', 'auto');
		ga('send', 'pageview');

</script>



<script src="{{ asset('/')}}backend/assets/js/rocket-loader.min.js" data-cf-settings="9c13ede09614428406f7f52d-|49" defer=""></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"7145748af9cc78c1","version":"2021.12.0","r":1,"token":"4db8c6ef997743fda032d4f73cfeff63","si":100}' crossorigin="anonymous"></script>


</body>


</html>
