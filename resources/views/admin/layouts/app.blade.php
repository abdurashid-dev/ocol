<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap Color Picker -->
    {{--    <link rel="stylesheet" href="{{asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">--}}
    {{--  Bootstrap icons  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    {{--    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">--}}
<!-- Select2 -->
    {{--    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css')}}">--}}
    {{--    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">--}}
<!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    {{--    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">--}}
<!-- SweetAlert2 -->
    {{--    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">--}}
<!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    {{--    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    @yield('style')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
{{--    <div class="preloader flex-column justify-content-center align-items-center">--}}
{{--        <img class="animation__shake" src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">--}}
{{--    </div>--}}

<!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        {{Auth::user()->name}}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li>
                            <a class="btn" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a class="brand-link">
            <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Admin Panel</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset('/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">Admin</a>
                </div>
            </div>


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->

                    <li class="nav-item">
                        <a href="{{route('admin.index')}}"
                           class="nav-link @php echo Request::getRequestUri() == '/admin'? 'active':'' @endphp">
                            <i class="nav-icon fs-5 bi bi-menu-app"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.about.index')}}" class="nav-link @php
                            if (Str::substr(Request::getRequestUri(), 0, 12) == '/admin/about') {
                                echo 'active';
                            }
                        @endphp">
                            <i class="nav-icon far fa-address-card"></i>
                            <p>
                                Biz haqimizda sahifasi
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.categories.index')}}" class="nav-link @php
                            if (Str::substr(Request::getRequestUri(), 0, 17) == '/admin/categories') {
                                echo 'active';
                            }
                        @endphp">
                            <i class="nav-icon bi bi-clipboard-plus"></i>
                            <p>
                                Yangiliklar kategoriyalari
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.blogs.index')}}" class="nav-link @php
                            if (Str::substr(Request::getRequestUri(), 0, 12) == '/admin/blogs') {
                                echo 'active';
                            }
                        @endphp">
                            <i class="nav-icon bi bi-newspaper"></i>
                            <p>
                                Yangiliklar
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.links.index')}}" class="nav-link @php
                            if (Str::substr(Request::getRequestUri(), 0, 12) == '/admin/links') {
                                echo 'active';
                            }
                        @endphp">
                            <i class="nav-icon bi bi-link-45deg"></i>
                            <p>
                                Foydali linklar
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.results.index')}}" class="nav-link @php
                            if (Str::substr(Request::getRequestUri(), 0, 14) == '/admin/results') {
                                echo 'active';
                            }
                        @endphp">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Ko'rsatgichlar
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.sliders.index')}}" class="nav-link @php
                            if (Str::substr(Request::getRequestUri(), 0, 14) == '/admin/sliders') {
                                echo 'active';
                            }
                        @endphp">
                            <i class="nav-icon bi bi-sliders"></i>
                            <p>
                                Slayderlar
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.images.index')}}" class="nav-link @php
                            if (Str::substr(Request::getRequestUri(), 0, 13) == '/admin/images') {
                                echo 'active';
                            }
                        @endphp">
                            <i class="nav-icon bi bi-images"></i>
                            <p>
                                Galereya
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.contact.index')}}" class="nav-link @php
                            if (Str::substr(Request::getRequestUri(), 0, 14) == '/admin/contact') {
                                echo 'active';
                            }
                        @endphp">
                            <i class="nav-icon far fa-address-book"></i>
                            <p>
                                Xabarlar
                            </p>
                        </a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a href="{{route('admin.page.index')}}" class="nav-link @php--}}
{{--                            if (Str::substr(Request::getRequestUri(), 0, 14) == '/admin/contact') {--}}
{{--                                echo 'active';--}}
{{--                            }--}}
{{--                        @endphp">--}}
{{--                            <i class="nav-icon fas fa-pager"></i>--}}
{{--                            <p>--}}
{{--                                Sahifalar--}}
{{--                            </p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <li class="nav-item
                        @if(Str::substr(Request::getRequestUri(), 0, 15) == '/admin/settings' ||Str::substr(Request::getRequestUri(), 0, 13) == '/admin/social')
                        menu-open
@endif">
                        <a href="#" class="nav-link @php
                            if (Str::substr(Request::getRequestUri(), 0, 15) == '/admin/settings' ||Str::substr(Request::getRequestUri(), 0, 13) == '/admin/social') {
                                echo 'active';
                            }
                        @endphp">
                            <i class="nav-icon bi bi-gear"></i>
                            <p>
                                Sozlamalar
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.settings.index')}}" class="nav-link @php
                                    if (Str::substr(Request::getRequestUri(), 0, 15) == '/admin/settings') {
                                        echo 'active';
                                    }
                                @endphp">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Matn sozlamalari</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.social.index')}}" class="nav-link @php
                                    if (Str::substr(Request::getRequestUri(), 0, 13) == '/admin/social') {
                                        echo 'active';
                                    }
                                @endphp">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ijtimoiy tarmoqlar</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item mb-3">
                        <a href="{{route('home')}}" class="nav-link">
                            <i class="nav-icon fs-5 bi bi-arrow-left"></i>
                            <p>
                                Back
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper h-auto">
        <!-- Main content -->
        <section class="content pt-3">
            <div class="container-fluid">
                @yield('content')
            </div><!-- /.container-fluid -->
        </section>
    </div>
    <!-- /.content -->


    <footer class="main-footer">
        <strong>Copyright &copy; 2021-{{\Carbon\Carbon::now()->format('Y')}} <a href="https://t.me/abdurashid_coder">iSoft</a>.</strong>
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 0.0.1
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
{{-- color picker --}}
{{--<script src="{{asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>--}}
<!-- ChartJS -->
{{--<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>--}}
<!-- Sparkline -->
{{--<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>--}}
<!-- JQVMap -->
{{--<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>--}}
{{--<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>--}}
<!-- jQuery Knob Chart -->
{{--<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>--}}
<!-- daterangepicker -->
{{--<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>--}}
{{--<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>--}}
<!-- Tempusdominus Bootstrap 4 -->
{{--<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>--}}
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>--}}
{{--<script src="{{ asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>--}}
<!-- SweetAlert2 -->
{{--<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>--}}
<!-- Toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
{{--bootstrap scripts--}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
{{--<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>--}}
@if(session()->has('message'))
    <script>
        toastr.success('{{ session()->get('message') }}');
    </script>
@endif
@yield('script')
</body>
</html>
