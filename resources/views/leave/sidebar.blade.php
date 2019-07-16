<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="{{route('leave-management')}}">
            <h4 style="color:black;">LEAVE MANAGEMENT</h4>
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="@yield('leave-list') has-sub">
                    <a href="{{route('leave-management')}}">
                        <i class="fas fa-tachometer-alt"></i>Leave List</a>
                </li>
                <li class="@yield('leave-type') has-sub">
                    <a href="#">
                        <!--route('leave-type') -->
                        <i class="fas fa-list-ul"></i>Leave Type</a>
                </li>
                <li class="@yield('leave-department') has-sub">
                    <a href="{{route('department.view')}}">
                        <!--route('department')-->
                        <i class="fas fa-sitemap"></i>Department</a>
                </li>
                <li class="@yield('leave-staff') has-sub">
                    <a href="{{route('staff.view')}}">
                        <i class="fas fa-user"></i>Staff</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
