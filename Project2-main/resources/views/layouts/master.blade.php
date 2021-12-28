<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Untitle')</title>
    <link rel="icon" href="{{ asset('dist/img/icon.png') }}" type="image/x-ico">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.3/af-2.3.7/b-2.1.1/b-colvis-2.1.1/b-html5-2.1.1/b-print-2.1.1/r-2.2.9/datatables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @section('layout')
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>
                </ul>
            </nav>
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <a href="#" class="brand-link" style="text-decoration: none">
                    <img src="{{ asset('dist/img/icon.png') }}" alt="Logo" class="brand-image img-circle elevation-3"
                        style="opacity: .8">
                    <span class="brand-text font-weight-light">Project 2</span>
                </a>
                <div class="sidebar">
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{ asset('dist/img/user.jpg') }}" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block" style="text-decoration: none">
                                @if (Auth::guard('admin')->user() != null)
                                    {{ Auth::guard('admin')->user()->name }}
                                @endif
                            </a>
                        </div>
                    </div>

                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <li class="nav-header">Quản lý</li>
                            @if (Auth::guard('admin')->user()->level == 1)
                                <li class="nav-item">
                                    <a href="{{ route('admin.tuition.list') }}" class="nav-link">
                                        <i class="fas fa-money-bill-alt nav-icon"></i>
                                        <p>Quản lý học phí</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('admin/tuition/list-class') }}" class="nav-link">
                                        <i class="fas fa-list-alt nav-icon"></i>
                                        <p>Thống kê học phí</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.major.list') }}" class="nav-link">
                                        <i class="fas fa-graduation-cap nav-icon"></i>
                                        <p>Quản lý ngành học</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.class.list') }}" class="nav-link">
                                        <i class="nav-icon fas fa-columns"></i>
                                        <p>Quản lý lớp học</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.student.list') }}" class="nav-link">
                                        <i class="fas fa-user-graduate nav-icon"></i>
                                        <p>Quản lý sinh viên</p>
                                    </a>
                                </li>
                                <li class="nav-header">Tài khoản</li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.list-account') }}" class="nav-link">
                                        <i class="fas fa-users nav-icon"></i>
                                        <p>Quản lý giáo viên</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.logout') }}" class="nav-link">
                                        <i class="fas fa-sign-out-alt nav-icon"></i>
                                        <p>Đăng xuất</p>
                                    </a>
                                </li>
                            @endif
                            @if (Auth::guard('admin')->user()->level != 1)
                                <li class="nav-item">
                                    <a href="{{ route('admin.tuition.list') }}" class="nav-link">
                                        <i class="fas fa-money-bill-alt nav-icon"></i>
                                        <p>Quản lý học phí</p>
                                    </a>
                                </li>
                                <li class="nav-header">Tài khoản</li>
                                <li class="nav-item">
                                    <a href="{{ url('admin/info/' . Auth::guard('admin')->user()->id) }}"
                                        class="nav-link">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>Thông tin tài khoản</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('admin/changepw/' . Auth::guard('admin')->user()->id) }}"
                                        class="nav-link">
                                        <i class="fas fa-unlock-alt nav-icon"></i>
                                        <p>Đổi mật khẩu</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.logout') }}" class="nav-link">
                                        <i class="fas fa-sign-out-alt nav-icon"></i>
                                        <p>Đăng xuất</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </aside>
        @show
        <div class="content-wrapper">
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
        @section('footer')
            <footer class="main-footer">
                <strong>BKD06K11</strong>
            </footer>
        @show
    </div>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('dist/js/pages/dashboard3.js') }}"></script>



    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.11.3/af-2.3.7/b-2.1.1/b-colvis-2.1.1/b-html5-2.1.1/b-print-2.1.1/r-2.2.9/datatables.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            $('#tbl_student').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#tbl_class').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#tbl_major').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#tbl_tuition').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#tbl_invoice').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#tbl_account').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#tbl_statistical').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel','print'
                ]
            });
        });
    </script>
</body>

</html>
