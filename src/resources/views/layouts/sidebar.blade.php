<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="{{ route('admin.dashboard') }}" class="d-block">
                    <img src="/admin-panel//img/03_AP_R@2x.png" alt="">
                    Admin Panel
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            @lang('admin-panel::sidebar.dashboard')
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            @lang('admin-panel::sidebar.users')
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.users') }}" class="nav-link">
                                @lang('admin-panel::sidebar.users')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.roles') }}" class="nav-link">
                                @lang('admin-panel::sidebar.roles')
                            </a>
                        </li>
                    </ul>
                </li>
                <x-admin-panel::menu />
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
