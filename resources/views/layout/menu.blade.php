<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('adminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">Alexander Pierce</a>
        </div>
    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ url('/admin/dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
            </li>
            <li class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ url('/admin/product') }}" class="nav-link ">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>Product</p>
                </a>
            </li>
            </li>
            <li class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ url('/') }}/activity" class="nav-link ">
                    <i class="nav-icon fas fa-solid fa-list"></i>
                    <p>Activity</p>
                </a>
            </li>
            </li>
            <li class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ url('/') }}/style" class="nav-link ">
                    <i class="nav-icon fas fa-solid fa-snowflake"></i>
                    <p>Style</p>
                </a>
            </li>
            </li>
            <li class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ url('/') }}/color" class="nav-link ">
                    <i class="nav-icon fas fa-solid fa-palette"></i>
                    <p>Color</p>
                </a>
            </li>
            </li>
            <li class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ url('/') }}/size" class="nav-link ">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                        stroke="currentColor" class="nav-icon">
                        <path strokeLinecap="round" strokeLinejoin="round"
                            d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15" />
                    </svg>

                    <p>Size</p>
                </a>
            </li>
            </li>

            <li class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ url('/') }}/campaign" class="nav-link ">
                    <i class="nav-icon fa fa-eject" aria-hidden="true"></i>
                    <p>Campaign</p>
                </a>
            </li>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>