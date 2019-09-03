<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="{{ asset('assets/images/favicon_1.ico') }}">

        <title>@yield('title') - Lara后台管理</title>

        @yield('stylesheet')

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/core.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/components.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/icons.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css') }}" />

        <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>

        <script type="text/javascript">
            var Lara = {
                ImgUploadUrl : "{{ route('admin.upload') }}",
                ImgUploadSwf : "{{ asset('uploader/Uploader.swf') }}"
            };
        </script>

    </head>

    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="{{ route('admin.dashboard.index') }}" class="logo"><i class="icon-magnet icon-c-logo"></i><span>Lara后台管理</span></a>
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="ion-navicon"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>

                            <form role="search" class="navbar-left app-search pull-left hidden-xs">
			                     <input type="text" placeholder="Search..." class="form-control">
			                     <a href=""><i class="fa fa-search"></i></a>
			                </form>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="hidden-xs">
                                    <a href="{{ route('admin.dashboard.profile') }}" class="waves-effect waves-light">{{ Auth::user()->username }}</a>
                                </li>
                                
                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{ Auth::user()->avatar }}" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('admin.dashboard.profile') }}"><i class="ti-user m-r-5"></i> 我的资料</a></li>
                                        <li><a href="{{ route('admin.dashboard.repass') }}"><i class="ti-settings m-r-5"></i> 修改密码</a></li>
                                        <li><a href="{{ route('admin.logout') }}"><i class="ti-power-off m-r-5"></i> 退出登录</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            @foreach($navs as $nav)
                            <li class="has_sub">
                                <a href="javascript:void(0)" class="waves-effect @if(in_array($module, explode('.', $nav->name))) subdrop @endif"><i class="{{ $nav->class_name }}"></i> <span> {{ $nav->alias }} </span> </a>
                                @if($nav->child)
                                <ul class="list-unstyled" @if(in_array($module, explode('.', $nav->name))) style="display: block;" @endif>
                                    @foreach($nav->child as $val)
                                    <li class="@if($route === $val->name) active @endif"><a href="{{ route($val->name) }}">{{ $val->alias }}</a></li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->
            
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        @yield('content')
                    </div> <!-- container -->
                    
                </div> <!-- content -->
                
                <footer class="footer text-right">
                    <span class="">2019 © Lara</span>
                </footer>
                
            </div>

        </div>
        <!-- END wrapper -->

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/detect.js') }}"></script>
        <script src="{{ asset('assets/js/fastclick.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('assets/js/waves.js') }}"></script>
        <script src="{{ asset('assets/js/wow.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.scrollTo.min.js') }}"></script>

        <script src="{{ asset('assets/plugins/peity/jquery.peity.min.js') }}"></script>

        <!-- jQuery  -->
        <script src="{{ asset('assets/plugins/waypoints/lib/jquery.waypoints.js') }}"></script>
        <script src="{{ asset('assets/plugins/counterup/jquery.counterup.min.js') }}"></script>

        <script src="{{ asset('assets/plugins/raphael/raphael-min.js') }}"></script>

        <script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.js') }}"></script>

        <script src="{{ asset('assets/js/jquery.core.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.app.js') }}"></script>

        @yield('script')

    </body>
</html>

