<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong
                                            class="font-bold">{{Auth::user()->username}}</strong>
                             </span>
                                {{--<span class="text-muted text-xs block">Art Director <b class="caret"></b></span> --}}
                            </span>
                    </a>
                    {{--<ul class="dropdown-menu animated fadeInRight m-t-xs">--}}
                        {{--<li><a href="{{url('logout')}}">Logout</a></li>--}}
                    {{--</ul>--}}
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>

            <li class="{{url()->current() == url('projects/create') ? 'active' : ''}}">
                <a href="{{url('projects/create')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Create New Project</span></a>
                @if(url()->current() == url('projects/create'))
                    <ul class="nav nav-second-level collapse in">
                        <li><a href="#r1">Project</a></li>
                        <li><a href="#r2">Buyer</a></li>
                        <li><a href="#r3">Supplier</a></li>
                        <li><a href="#r4">Sales Confirmation</a></li>
                        <li><a href="#r5">Contract</a></li>
                        <li><a href="#r6">Proforma Invoice</a></li>
                        <li><a href="#r7">Import Permit</a></li>
                        <li><a href="#r8">LC</a></li>
                        <li><a href="#r9">Shipment</a></li>
                        <li><a href="#r10">NN Documents</a></li>
                        <li><a href="#r11">Payment</a></li>
                        <li><a href="#r12">Controller</a></li>
                        <li><a href="#r13">Short/Gain Weight Claim</a></li>
                        <li><a href="#r14">Quality Claim</a></li>
                        <li><a href="#r15">Debit Note</a></li>
                        <li><a href="#r16">Carrying Charge</a></li>
                        <li><a href="#r17">LC Amendment Charge</a></li>
                        <li><a href="#r18">Remarks</a></li>
                    </ul>
                @endif
            </li>


            @if(url()->current() == url('report') || url()->current() == url('/') || url()->current() == url('dashboard'))
                <li class="active">
            @else
                <li class="">
                    @endif
                    <a href="{{url('report')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Reports</span>
                    </a>
                </li>
                @if(strpos(url()->current(),'edit'))
                    <li class="active">
                        <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Edit Project</span></a>
                        <ul class="nav nav-second-level collapse in">
                            <li><a href="#r1">Project</a></li>
                            <li><a href="#r2">Buyer</a></li>
                            <li><a href="#r3">Supplier</a></li>
                            <li><a href="#r4">Sales Confirmation</a></li>
                            <li><a href="#r5">Contract</a></li>
                            <li><a href="#r6">Proforma Invoice</a></li>
                            <li><a href="#r7">Import Permit</a></li>
                            <li><a href="#r8">LC</a></li>
                            <li><a href="#r9">Shipment</a></li>
                            <li><a href="#r10">NN Documents</a></li>
                            <li><a href="#r11">Payment</a></li>
                            <li><a href="#r12">Controller</a></li>
                            <li><a href="#r13">Short/Gain Weight Claim</a></li>
                            <li><a href="#r14">Quality Claim</a></li>
                            <li><a href="#r15">Debit Note</a></li>
                            <li><a href="#r16">Carrying Charge</a></li>
                            <li><a href="#r17">LC Amendment Charge</a></li>
                            <li><a href="#r18">Remarks</a></li>
                        </ul>
                    </li>
                @endif
                @if (\Auth::user()->role == "admin")

                    <li class="{{url()->current() == url('register') ? 'active' : ''}}">
                        <a href="{{url('register')}}"><i class="fa fa-th-large"></i> <span
                                    class="nav-label">Create New User</span>
                        </a>
                    </li>
                    <li class="{{url()->current() == url('user_list') ? 'active' : ''}}">
                        <a href="{{url('user_list')}}"><i class="fa fa-th-large"></i> <span
                                    class="nav-label">Users List</span>
                        </a>
                    </li>
                @endif
        </ul>
    </div>
</nav>