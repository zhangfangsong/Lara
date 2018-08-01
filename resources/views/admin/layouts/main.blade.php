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
                        <a href="{{ route('admin.home') }}" class="logo"><i class="icon-magnet icon-c-logo"></i><span>Lara后台管理</span></a>
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
                                    <a href="{{ route('admin.profile') }}" class="waves-effect waves-light">{{ Auth::user()->username }}</a>
                                </li>

                                <li class="dropdown">
                                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="{{ Auth::user()->avatar }}" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ route('admin.profile') }}"><i class="ti-user m-r-5"></i> 我的资料</a></li>
                                        <li><a href="{{ route('admin.repass') }}"><i class="ti-settings m-r-5"></i> 修改密码</a></li>
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
                            <li class="has_sub">
                                <a href="javascript:void(0)" class="waves-effect "><i class="ti-home"></i> <span> 控制台 </span> </a>
                                <ul class="list-unstyled">
                                    <li class="{{ active_class(if_route('admin.home')) }}"><a href="{{ route('admin.home') }}">仪表盘</a></li>
                                    <li class="{{ active_class(if_route('admin.profile')) }}"><a href="{{ route('admin.profile') }}"> 我的资料 </a></li>
                                    <li class="{{ active_class(if_route('admin.repass')) }}"><a href="{{ route('admin.repass') }}"> 修改密码 </a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0)" class="waves-effect"><i class="ti-paint-bucket"></i> <span> 管理 </span> </a>
                                <ul class="list-unstyled">
                                    <li class="{{ active_class(if_route_pattern('admin.article.*')) }}"><a href="{{ route('admin.article.index') }}">文章</a></li>
                                    <li class="{{ active_class(if_route_pattern('admin.category.*')) }}"><a href="{{ route('admin.category.index') }}">分类</a></li>
                                    <li class="{{ active_class(if_route_pattern('admin.user.*')) }}"><a href="{{ route('admin.user.index') }}">用户</a></li>
                                    <li class="{{ active_class(if_route_pattern('admin.role.*')) }}"><a href="{{ route('admin.role.index') }}">角色</a></li>
                                    <li class="{{ active_class(if_route_pattern('admin.node.*')) }}"><a href="{{ route('admin.node.index') }}">节点</a></li>
                                    <li class="{{ active_class(if_route_pattern('admin.comment.*')) }}"><a href="{{ route('admin.comment.index') }}">评论</a></li>
                                    <li class="{{ active_class(if_route_pattern('admin.tag.*')) }}"><a href="{{ route('admin.tag.index') }}">标签</a></li>
                                    <li class="{{ active_class(if_route_pattern('admin.page.*')) }}"><a href="{{ route('admin.page.index') }}">页面</a></li>
                                    <li class="{{ active_class(if_route_pattern('admin.link.*')) }}"><a href="{{ route('admin.link.index') }}">链接</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0)" class="waves-effect"><i class="ti-user"></i><span> 设置 </span></a>
                                <ul class="list-unstyled">
                                    <li class="{{ active_class(if_route_param('tab', 'main')) }}"><a href="{{ route('admin.config', ['main']) }}"> 全局 </a></li>
                                    <li class="{{ active_class(if_route_param('tab', 'upload')) }}"><a href="{{ route('admin.config', ['upload']) }}"> 上传 </a></li>
                                </ul>
                            </li>

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
                    <span class="">2018 © Lara</span>
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

        <script type="text/javascript">
            $(function (){
                $('#sidebar-menu ul.list-unstyled li.active').parent('ul').siblings('a').addClass('subdrop');
                $('#sidebar-menu ul.list-unstyled li.active').parent('ul').css('display', 'block');
            });
        </script>

        @yield('script')

    </body>
</html>

