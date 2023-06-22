<div class="vertical-menu">
    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Dashboards</li>

                <li class="{{ request()->is('admin/dashboard*') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards">Dashboard</span>
                    </a>
                </li>

                <li class="menu-title" key="t-menu">Websitess</li>

                <li class="{{ request()->is('admin/websites*') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.websites') }}" class="waves-effect {{ request()->is('admin/websites*') ? 'active' : '' }}">
                        <i class="bx bx-news"></i>
                        <span key="t-dashboards">Websites</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
