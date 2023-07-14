@include('layout.header')

<body class="sidebar-mini">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{asset('adminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">

        </div>

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
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo   -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('adminLTE/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Hill View Mini Barns</span>
            </a>

            <!-- Sidebar -->

            @include("layout.menu");

            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        @yield('main');


        <!-- /.content-wrapper --> 
       

        <footer class="main-footer">
            <strong>Copyright © 2014-2021 <a href="https://adminlte.io">Hill View Mini Barns</a>.</strong>
            All rights reserved.
        </footer>


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark" style="top: 57px; height: 250px; display: block;">
            <!-- Control sidebar content goes here -->
            <div class="p-3 control-sidebar-content os-host os-theme-light os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition os-host-scrollbar-vertical-hidden"
                style="">
                <div class="os-resize-observer-host observed">
                    <div class="os-resize-observer" style="left: 0px; right: auto;">
                    </div>
                </div>
                <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
                    <div class="os-resize-observer">
                    </div>
                </div>
                <div class="os-content-glue" style="margin: -16px; height: 500px; width: 249px;">
                </div>
                <div class="os-padding">
                    <div class="os-viewport os-viewport-native-scrollbars-invisible" style="">
                        <div class="os-content" style="padding: 16px; height: auto; width: 100%;">
                            <h5>Shed3d</h5>
                            <hr class="mb-2">
                            <div class="mb-4">


                                <ul class="nav  nav-sidebar flex-column" data-widget="treeview" role="menu"
                                    data-accordion="false">
                                    <li class="nav-item nav">
                                        <a href="{{ url('/') }}/admin/change-password" class="nav-link">
                                            <i class="nav-icon fas fa-regular fa-key"></i>
                                            <p>Change Password</p>
                                        </a>
                                    </li>
                                    <li class="nav-item nav ">
                                        <a href="./index.html" class="nav-link">
                                            <i class="nav-icon fas fa-regular fa-sun"></i>
                                            <p>Setting</p>
                                        </a>
                                    </li>

                                    <li class="nav-item nav">
                                        <a href="{{ url('/') }}/admin/logout" class="nav-link">
                                            <i class="nav-icon fas fa-solid fa-power-off"></i>
                                            <p>Logout</p>
                                        </a>
                                    </li>
                                </ul>
                                <div class="os-scrollbar-handle" style="transform: translate(0px); height: 100%;">
                                </div>
                            </div>
                        </div>
                        <div class="os-scrollbar-corner">
                        </div>
                    </div>
        </aside>
        <div id="sidebar-overlay"></div>
    </div>

    @include('layout.footer')




