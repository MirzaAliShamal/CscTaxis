<div class="sidebar" data-color="rose" data-background-color="black" data-image="{{ asset('admin_theme') }}/assets/img/sidebar-3.jpg">
    <div class="logo">
        <a href="{{ route('home') }}" target="_blank" class="simple-text logo-mini"><img src="{{ asset('favicon.png') }}" width="25px" alt=""></a>
        <a href="{{ route('home') }}" target="_blank" class="simple-text logo-normal">
            <img src="{{ asset('theme/images/site-logo.png') }}" class="img-fluid" width="100px" alt="">
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{ asset('default.png') }}" />
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample" class="username">
                    <span>{{ auth()->user()->name }} <b class="caret"></b></span>
                </a>
                <div class="collapse @routeis('admin.profile') show @endrouteis" id="collapseExample">
                    <ul class="nav">
                        <li class="nav-item @routeis('admin.profile') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.profile') }}">
                                <span class="sidebar-mini"> EP </span>
                                <span class="sidebar-normal"> Edit Profile </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item @routeis('admin.dashboard') active @endrouteis">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li>
            {{-- Terminals --}}
            <li class="nav-item @routeis('admin.terminal.*') active @endrouteis">
                <a class="nav-link" data-toggle="collapse" href="#terminal">
                    <i class="material-icons">category</i><p> Terminals<b class="caret"></b></p>
                </a>
                <div class="collapse @routeis('admin.terminal.*') show @endrouteis" id="terminal">
                    <ul class="nav">
                        <li class="nav-item @routeis('admin.terminal.list') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.terminal.list') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal"> Terminal List </span>
                            </a>
                        </li>
                        <li class="nav-item @routeis('admin.terminal.add') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.terminal.add') }}">
                                <span class="sidebar-mini"> <i class="material-icons">add</i> </span>
                                <span class="sidebar-normal"> Add Terminal </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- Booking --}}
            <li class="nav-item @routeis('admin.booking.*') active @endrouteis">
                <a class="nav-link" href="{{ route('admin.booking.list') }}">
                    <i class="material-icons">toc</i>
                    <p> Bookings </p>
                </a>
            </li>
            {{-- Transaction --}}
            <li class="nav-item @routeis('admin.transaction.*') active @endrouteis">
                <a class="nav-link" href="{{ route('admin.transaction') }}">
                    <i class="material-icons">euro_symbol</i>
                    <p> Transactions </p>
                </a>
            </li>
            {{-- FAQs --}}
            <li class="nav-item @routeis('admin.faq.*') active @endrouteis">
                <a class="nav-link" data-toggle="collapse" href="#faq">
                    <i class="material-icons">live_help</i><p> FAQs<b class="caret"></b></p>
                </a>
                <div class="collapse @routeis('admin.faq.*') show @endrouteis" id="faq">
                    <ul class="nav">
                        <li class="nav-item @routeis('admin.faq.list') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.faq.list') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal"> FAQ List </span>
                            </a>
                        </li>
                        <li class="nav-item @routeis('admin.faq.add') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.faq.add') }}">
                                <span class="sidebar-mini"> <i class="material-icons">add</i> </span>
                                <span class="sidebar-normal"> Add FAQ </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            {{-- CMS --}}
            <li class="nav-item @routeis('admin.cms.*') active @endrouteis">
                <a class="nav-link" data-toggle="collapse" href="#cms">
                    <i class="material-icons">live_help</i><p> CMS<b class="caret"></b></p>
                </a>
                <div class="collapse @routeis('admin.cms.*') show @endrouteis" id="cms">
                    <ul class="nav">
                        <li class="nav-item @routeis('admin.cms.home.page') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.cms.home.page') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal"> Home Page </span>
                            </a>
                        </li>
                        <li class="nav-item @routeis('admin.cms.private.tours') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.cms.private.tours') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal"> Private Tours </span>
                            </a>
                        </li>
                        <li class="nav-item @routeis('admin.cms.everyday.taxi') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.cms.everyday.taxi') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal"> Everyday Taxi </span>
                            </a>
                        </li>
                        <li class="nav-item @routeis('admin.cms.airport.transport') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.cms.airport.transport') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal"> Airport Transport </span>
                            </a>
                        </li>
                        <li class="nav-item @routeis('admin.cms.cruise.transport') active @endrouteis">
                            <a class="nav-link" href="{{ route('admin.cms.cruise.transport') }}">
                                <span class="sidebar-mini"> <i class="material-icons">list</i> </span>
                                <span class="sidebar-normal"> Cruise Transport </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item @routeis('admin.enquiries') active @endrouteis">
                <a class="nav-link" href="{{ route('admin.enquiries') }}">
                    <i class="material-icons">dashboard</i>
                    <p> Contact Enquiries </p>
                </a>
            </li>
            {{-- Logout --}}
            <li class="nav-item">
                <a class="nav-link" href="javascript:;" onclick="document.getElementById('logout-form').submit()">
                    <form id="logout-form" class="d-none" method="post" action="{{ route('logout') }}">@csrf</form>
                    <i class="material-icons">logout</i>
                    <p> Logout </p>
                </a>
            </li>
        </ul>
    </div>
</div>
