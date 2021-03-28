<header class="theme-1">
    <section class="header__upper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-3 col-md-3 col-sm-3 col-3">
                    <div class="mobile-nav">
                        <nav class="navbar navbar-expand-xl navbar-light">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item @routeis('home') active @endrouteis">
                                        <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item @routeis('private.tours') active @endrouteis">
                                        <a class="nav-link" href="{{ route('private.tours') }}">Private Tours</a>
                                    </li>
                                    <li class="nav-item @routeis('everyday.taxi') active @endrouteis">
                                        <a class="nav-link" href="{{ route('everyday.taxi') }}">EveryDay Taxi</a>
                                    </li>
                                    <li class="nav-item @routeis('airport.transport') active @endrouteis">
                                        <a class="nav-link" href="{{ route('airport.transport') }}">Airport Transport</a>
                                    </li>
                                    <li class="nav-item @routeis('cruise.transport') active @endrouteis">
                                        <a class="nav-link" href="{{ route('cruise.transport') }}">Cruise Transport</a>
                                    </li>
                                    <li class="nav-item @routeis('faq') active @endrouteis">
                                        <a class="nav-link" href="{{ route('faq') }}">FAQs</a>
                                    </li>
                                    <li class="nav-item @routeis('contact') active @endrouteis">
                                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-6 col-sm-6 col-6">
                    <div class="header__upper--left justify-content-start">
                        <div class="logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('theme/images/site-logo.png') }}" width="160px" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-12 m-auto d-none d-xl-block">
                    <div class="header__upper--right justify-content-end">
                        <nav class="navigation">
                            <ul>
                                <li>
                                    <a href=""><h5>+44 23 8022 2555</h5></a>
                                </li>
                                <li class="@routeis('home') active @endrouteis">
                                    <a class="" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="@routeis('private.tours') active @endrouteis">
                                    <a class="" href="{{ route('private.tours') }}">Private Tours</a>
                                </li>
                                <li class="@routeis('everyday.taxi') active @endrouteis">
                                    <a class="" href="{{ route('everyday.taxi') }}">EveryDay Taxi</a>
                                </li>
                                <li class="@routeis('airport.transport') active @endrouteis">
                                    <a class="" href="{{ route('airport.transport') }}">Airport Transport</a>
                                </li>
                                <li class="@routeis('cruise.transport') active @endrouteis">
                                    <a class="" href="{{ route('cruise.transport') }}">Cruise Transport</a>
                                </li>
                                <li class="@routeis('faq') active @endrouteis">
                                    <a class="" href="{{ route('faq') }}">FAQs</a>
                                </li>
                                <li class="@routeis('contact') active @endrouteis">
                                    <a class="" href="{{ route('contact') }}">Contact</a>
                                </li>
                            </ul>
                        </nav>
                        <a href="{{ route('get.quote') }}" class="button button-dark small">Get a quote</a>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-3 col-md-3 col-sm-3 col-3 m-auto">
                    <!--<div class="mobile-nav text-right">-->
                    <!--    <a href=""><p class="header-number">+44 23 8022 2555</p></a>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
    </section>
</header>
