<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">POS HOLIS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('dashboard-general-dashboard') ? 'active' : '' }}'>
                        <a class="nav-link" href="{{ url('dashboard') }}">General Dashboard</a>
                    </li>

                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Users</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ route('user.index') }}">All Users</a>
                    </li>

                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Management</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{ route('option.index') }}">All Options</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('category.index') }}">All Categories</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('type.index') }}">All Types</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('question.index') }}">All Question</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('schedule.index') }}">All Schedule</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('typeoption.index') }}">Type Options</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route('typequestion.index') }}">Type Questions</a>
                    </li>




                </ul>
            </li>
    </aside>
</div>
