<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>@yield("page_title")</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}" />
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
        <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}" />
        <!-- iCheck -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" />
        <!-- JQVMap -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}" />
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}" />
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}" />
        <!-- Daterange picker -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}" />
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />

        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css">

        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

        <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css">

        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

        @yield('css')

        <link rel="stylesheet" href="{{ asset("assets/dist/css/custom.css") }}" />
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto" style="margin-left: 10px !important;">
                    <li class="nav-item">
                        <a class="nav-link" role="button" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="index3.html" class="brand-link">
                    <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8;" />
                    <span class="brand-text font-weight-light">PLS Machines</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="info">
                            <a href="javascript:;" class="d-block">????????, {{ auth()->user()->first_name . " " . auth()->user()->last_name }}</a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a href="{{ url('/') }}" target="_blank" class="nav-link @if(request()->segment(2) == '') active @endif">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>????????????</p>
                                </a>
                            </li>
                            @if (auth()->user()->is_admin == 1)
                                <li class="nav-item">
                                    <a href="{{ url('admin/settings') }}" class="nav-link @if(request()->segment(2) == 'settings') active @endif">
                                        <i class="nav-icon fa fa-cog"></i>
                                        <p>??????????????????</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('admin/users') }}" class="nav-link @if(request()->segment(2) == 'users') active @endif">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>????????????????????</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('admin/sliders') }}" class="nav-link @if(request()->segment(2) == 'sliders') active @endif">
                                        <i class="nav-icon fas fa-user"></i>
                                        <p>????????????????</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('admin/engineers') }}" class="nav-link @if(request()->segment(2) == 'engineers') active @endif">
                                        <i class="nav-icon fa fa-check-circle"></i>
                                        <p>??????????????????</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('admin/machines-categories') }}" class="nav-link @if(request()->segment(2) == 'machines-categories') active @endif">
                                        <i class="nav-icon fa fa-question"></i>
                                        <p>?????????????? ??????????????????</p>
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a href="{{ url('admin/machines') }}" class="nav-link @if(request()->segment(2) == 'machines') active @endif">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>??????????????????</p>
                                </a>
                            </li>
                            @if (auth()->user()->is_admin == 1)
                                <li class="nav-item">
                                    <a href="{{ url('admin/supplies-categories') }}" class="nav-link @if(request()->segment(2) == 'supplies-categories') active @endif">
                                        <i class="nav-icon fa fa-question"></i>
                                        <p>?????????????? ????????????????????</p>
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a href="{{ url('admin/supplies') }}" class="nav-link @if(request()->segment(2) == 'supplies') active @endif">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>???????????????? ??????????????????</p>
                                </a>
                            </li>
                            @if (auth()->user()->is_admin == 1)
                                <li class="nav-item">
                                    <a href="{{ url('admin/materials-categories') }}" class="nav-link @if(request()->segment(2) == 'materials-categories') active @endif">
                                        <i class="nav-icon fa fa-question"></i>
                                        <p>?????????????? ??????????????</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('admin/types') }}" class="nav-link @if(request()->segment(2) == 'types') active @endif">
                                        <i class="nav-icon fa fa-question"></i>
                                        <p>?????????? ??????????????</p>
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a href="{{ url('admin/materials') }}" class="nav-link @if(request()->segment(2) == 'materials') active @endif">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>???????????? ??????????</p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            @yield("content")

            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block"><b>Version</b> 3.0.5</div>
            </footer>
        </div>
        <!-- ./wrapper -->

        <script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js"></script>

        <!-- jQuery -->
        <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge("uibutton", $.ui.button);
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        
        <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>

        <!-- DataTables -->
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

        @yield("js")

        <!-- AdminLTE App -->
        <script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('assets/dist/js/demo.js') }}"></script>

        @if (session()->has('success_message'))
            <script>
                toastr.options.positionClass = 'toast-bottom-left';
                toastr.success("{{ session()->get('success_message') }}")
            </script>
        @endif

        @if (session()->has('error_message'))
            <script>
                toastr.options.positionClass = 'toast-bottom-left';
                toastr.error("{{ session()->get('error_message') }}")
            </script>
        @endif


    </body>
</html>
