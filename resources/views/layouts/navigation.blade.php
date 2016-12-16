<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong
                                            class="font-bold">David Williams</strong>
                             </span> <span class="text-muted text-xs block">Art Director <b
                                            class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="#">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>

            <li class="{{url()->current() == url('projects/create') ? 'active' : ''}}">
                <a href="{{url('projects/create')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Create New Project</span></a>
            </li>
            <li class="{{url()->current() == url('report') ? 'active' : ''}}">
                <a href="{{url('report')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Reports</span>
                </a>
            </li>

        </ul>

    </div>
</nav>