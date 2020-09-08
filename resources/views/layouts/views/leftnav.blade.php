@include('layouts.views.topnav')
<aside class="main-sidebar sidebar-light-primary elevation-2">
    <a href="index3.html" class="brand-link">
    <span class="brand-text font-weight-light ml-3">{{Auth::user()->name}}</span>
    </a>
    <div class="sidebar">
        <nav class="mt-3">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                <a href="{{ url('/home') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                    Dashboard
                    </p>
                </a>
                </li>

                <li class="nav-item">
                <a href="{{ url('admin/profile') }}" class="nav-link">
                <i class="nav-icon fas fa-image"></i>
                    <p>
                    Profile
                    </p>
                </a>
                </li>
                <li class="nav-header">Account</li>
                <li class="nav-item">
                <a href="{{ url('/messenger') }}" class="nav-link">
                    <i class="fas fa-message nav-icon"></i>
                    <p>Messages</p>
                </a>
                </li>
                <!-- <li class="nav-item">
                <a href="{{ url('admin/faculty') }}" class="nav-link">
                    <i class="fas fa-user nav-icon"></i>
                    <p>Faculty Management</p>
                </a>
                </li>
                <li class="nav-header">Curriculum</li>
                <li class="nav-item">
                <a href="{{ url('admin/course') }}" class="nav-link">
                    <i class="nav-icon fas fa-graduation-cap"></i>
                    <p>
                    Course Management
                    </p>
                </a>
                </li>
                <li class="nav-item">
                <a href="{{ url('admin/subject') }}" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                    Subject Management
                    </p>
                </a>
                </li>
                <li class="nav-header">Others</li>
                <li class="nav-item">
                <a href="{{ url('admin/schedule') }}" class="nav-link">
                    <i class="nav-icon fas fa-calendar-alt"></i>
                    <p>
                    Schedule Management
                    </p>
                </a>
                </li>
                <li class="nav-item">
                <a href="{{ url('admin/report') }}" class="nav-link">
                    <i class="nav-icon fas fa-print"></i>
                    <p>
                    Report Management
                    </p>
                </a>
                </li>
                <li class="nav-item">
                <a href="{{ url('admin/setting') }}" class="nav-link">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>
                    System Setting
                    </p>
                </a>
                </li> -->
            </ul>
        </nav>
    </div>
</aside>