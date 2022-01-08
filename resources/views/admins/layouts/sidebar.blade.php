<style>
.main-drop-bg{
    background: #334e54;
}
</style>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ asset('dist/img/sa-flag-icon.png') }}" alt="{{ config('app.name') }} Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-bold">{{ config('app.name') }}.net</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/cre-star.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a><!-- from auth() -->
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @role('superadministrator')
            <li class="nav-item"><!--DASHBOARD-->
                <a href="{{ route('admin-dashboard') }}" class="main-drop-bg nav-link {{ request()->is('admin-dashboard') ? 'active':'' }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Dashboard</p>
                </a>
            </li><!-- offices -->
            @endrole
            @role('superadministrator')
            <li class="nav-item">
                <a href="{{ route('admin-offices.index') }}" class="main-drop-bg nav-link {{ request()->is('admin-offices*') ? 'active':'' }}">
                    <i class="nav-icon fa fa-building"></i>
                    <p>Offices</p>
                </a>
            </li><!-- resources -->
            @endrole
            @role('superadministrator')
            <li class="nav-item">
                <a href="{{ route('admin-bookings.index') }}" class="main-drop-bg nav-link {{ request()->is('admin-bookings*') ? 'active':'' }}">
                    <i class="nav-icon fa fa-book"></i>
                    <p>Bookings</p>
                </a>
            </li><!-- resources -->
            @endrole
            @role('superadministrator')
            <li class="nav-item {{ request()->is('admin-units*') || request()->is('admin-vessels*') || request()->is('admin-batches*') ? 'menu-open':'' }}">
                <a href="#" class="main-drop-bg nav-link {{ request()->is('admin-vessels*') || request()->is('admin-batches*') || request()->is('admin-units*') ? 'active':'' }}">
                    <i class="fa fa-flag nav-icon"></i>
                    <p>Resources<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin-units.index') }}" class="nav-link {{ request()->is('admin-units*') ? 'active':'' }}">
                            <i class="fa fa-cube nav-icon"></i>
                            <p>Units</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin-vessels.index') }}" class="nav-link {{ request()->is('admin-vessels*') ? 'active':'' }}">
                            <i class="fa fa-ship nav-icon"></i>
                            <p>Vessels</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin-batches.index') }}" class="nav-link {{ request()->is('admin-batches*') ? 'active':'' }}">
                            <i class="fa fa-cubes nav-icon"></i></i>
                            <p>Batches</p>
                        </a>
                    </li>
                </ul>
            </li><!-- trackings -->
            @endrole
            <li class="nav-item {{ request()->is('admin-trackings*') || request()->is('admin-delivered-batches*') || request()->is('admin-global-traffic*') ? 'menu-open':'' }}">
                <a href="#" class="main-drop-bg nav-link {{ request()->is('admin-trackings*') || request()->is('admin-delivered-batches*') || request()->is('admin-global-traffic*') ? 'active':'' }}">
                    <i class="nav-icon fa fa-road"></i>
                    <p>Trackings<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin-trackings.index') }}" class="nav-link {{ request()->is('admin-trackings*') ? 'active':'' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Port Monitoring</p>
                        </a>
                    </li>
                    @role('superadministrator')
                    <li class="nav-item">
                        <a href="{{ route('admin-global-traffic') }}" class="nav-link {{ request()->is('admin-global-traffic*') ? 'active':'' }}">
                            <i class="fa fa-map-signs nav-icon"></i>
                            <p>Global Traffic</p>
                        </a>
                    </li>
                    @endrole
                    <li class="nav-item">
                        <a href="{{ route('admin-delivered-batches') }}" class="nav-link {{ request()->is('admin-delivered-batches*') ? 'active':'' }}">
                            <i class="fa fa-check-circle nav-icon"></i>
                            <p>Delivered Batches</p>
                        </a>
                    </li>
                </ul>
            </li><!-- Ad. settings -->
            @role('superadministrator')
            <li class="nav-item {{ request()->is('admin-pricings*') || request()->is('admin-vessel-routes*') || request()->is('admin-continents*') || request()->is('admin-countries*') || request()->is('admin-cities*') ? 'menu-open':'' }}">
                <a href="#" class="main-drop-bg nav-link {{ request()->is('admin-vessel-routes*') || request()->is('admin-continents*') || request()->is('admin-countries*') || request()->is('admin-cities*') ? 'active':'' }}">
                    <i class="nav-icon fas fa fa-gears"></i>
                    <p>Ad. Settings<i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item {{ request()->is('admin-continents*') || request()->is('admin-countries*') || request()->is('admin-cities*') ? 'menu-open':'' }}">
                        <a href="#" class="nav-link {{ request()->is('admin-continents*') || request()->is('admin-countries*') || request()->is('admin-cities*') ? 'active':'' }}">
                            <i class="fa fa-globe nav-icon"></i>
                            <p>Geography<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('admin-continents') }}" class="nav-link {{ request()->is('admin-continents*') ? 'active':'' }}">
                                    <i class="fa fa-map-pin nav-icon"></i>
                                    <p>Continents</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin-countries') }}" class="nav-link {{ request()->is('admin-countries*') ? 'active':'' }}">
                                    <i class="fa fa-map-pin nav-icon"></i>
                                    <p>Countires</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin-cities') }}" class="nav-link {{ request()->is('admin-cities*') ? 'active':'' }}">
                                    <i class="fa fa-map-pin nav-icon"></i>
                                    <p>Cities</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin-vessel-routes.index') }}" class="nav-link {{ request()->is('admin-vessel-routes*') ? 'active' : '' }}">
                            <i class="fas fa-anchor nav-icon"></i>
                            <p>Vessel Routes</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin-pricings.index') }}" class="nav-link {{ request()->is('pricings*') ? 'active' : '' }}">
                            <i class="fas fa-dollar nav-icon"></i>
                            <p>Pricings</p>
                        </a>
                    </li>
                 </ul>
            </li><!-- users -->
            @endrole
            @role('superadministrator')
            <li class="nav-item {{ request()->is('admin-users*') ? 'menu-open':'' }}">
                <a href="{{ route('admin-users.index') }}" class="main-drop-bg nav-link {{ request()->is('admin-users*') ? 'active':'' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Manage Users</p>
                </a>
            </li><!-- Loggings -->
            @endrole
            @role('superadministrator')
            <li class="nav-item">
                <a href="#" class="main-drop-bg nav-link">
                    <i class="nav-icon fas fa-eye"></i>
                    <p>Loggings Details<i class="fas fa-angle-left right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-user nav-icon"></i>
                            <p>Home Page</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa fa-user nav-icon"></i>
                            <p>Client Logs</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa fa-users nav-icon"></i>
                            <p>Admin Logs</p>
                        </a>
                    </li>
                 </ul>
            </li><!-- Feedback -->
            @endrole
            @role('superadministrator')
            <li class="nav-item">
                <a href="#" class="main-drop-bg nav-link">
                    <i class="nav-icon fa fa-angle-double-left"></i>
                    <p>FeedBack<span class="right badge badge-success">New</span></p>
                </a>
            </li>
            @endrole
        </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>