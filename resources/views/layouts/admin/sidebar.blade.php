<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('adminDashboard') }}" class="brand-link navbar-primary">
        @if(!empty(config('app.name')))
        <img src="{{ asset('admin/img/common/'.config('app.logo_icon')) }}" alt="{{ config('app.name') }}"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        @else
        <img src="{{ asset('admin/img/default/logo_icon.png') }}" alt="{{ config('app.name') }}"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        @endif
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admin/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('adminProfile') }}" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="{{ route('adminDashboard') }}" class="nav-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview {{ (request()->is('admin/profile*')) ? 'menu-open' : '' }}">
                    <a href="{{ route('adminProfile') }}" class="nav-link {{ (request()->is('admin/profile*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            My Account
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('adminProfile') }}" class="nav-link {{ (request()->is('admin/profile')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('adminUpdatePassword') }}" class="nav-link {{ (request()->is('admin/profile/password/update')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Change Password</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ (request()->is('admin/settings*')) ? 'menu-open' : '' }}">
                    <a href="{{ route('adminProfile') }}" class="nav-link {{ (request()->is('admin/settings*')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('generalSettings') }}" class="nav-link {{ (request()->is('admin/settings/general')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>General Setting</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('headerSettings') }}" class="nav-link {{ (request()->is('admin/settings/header')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Header Setting</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('footerSettings') }}" class="nav-link {{ (request()->is('admin/settings/footer')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Footer Setting</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>