<header class="theme-1">
    <section class="header__upper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-12">
                    <div class="header__upper--left justify-content-start">
                        <div class="logo">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('theme/images/site-logo.png') }}" width="160px" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-12 m-auto">
                    <div class="header__upper--right justify-content-end">
                        <nav class="navigation">
                            <ul>
                                <li class="@routeis('home') active @endrouteis">
                                    <a class="" href="{{ route('home') }}"><i class="fas fa-home"></i>Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="@routeis('private.tours') active @endrouteis">
                                    <a class="" href="{{ route('private.tours') }}"><i class="fas fa-exclamation-circle"></i>Private Tours</a>
                                </li>
                                <li class="@routeis('everyday.taxi') active @endrouteis">
                                    <a class="" href="{{ route('everyday.taxi') }}"><i class="fas fa-exclamation-circle"></i>EveryDay Taxi</a>
                                </li>
                                <li class="@routeis('airport.transport') active @endrouteis">
                                    <a class="" href="{{ route('airport.transport') }}"><i class="fas fa-taxi"></i>Airport Transport</a>
                                </li>
                                <li class="@routeis('cruise.transport') active @endrouteis">
                                    <a class="" href="{{ route('cruise.transport') }}"><i class="fas fa-taxi"></i>Cruise Transport</a>
                                </li>
                                <li class="@routeis('faq') active @endrouteis">
                                    <a class="" href="{{ route('faq') }}"><i class="fas fa-cube"></i>FAQs</a>
                                </li>
                                <li class="@routeis('contact') active @endrouteis">
                                    <a class="" href="{{ route('contact') }}"><i class="fas fa-map-marker-alt"></i>Contact</a>
                                </li>
                            </ul>
                        </nav>
                        <a href="{{ route('get.quote') }}" class="button button-dark small">Get a quote</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="header__lower">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-xl navbar-light">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item @routeis('home') active @endrouteis">
                                    <a class="nav-link" href="{{ route('home') }}"><i class="fas fa-home"></i>Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item @routeis('private.tours') active @endrouteis">
                                    <a class="nav-link" href="{{ route('private.tours') }}"><i class="fas fa-exclamation-circle"></i>Private Tours</a>
                                </li>
                                <li class="nav-item @routeis('everyday.taxi') active @endrouteis">
                                    <a class="nav-link" href="{{ route('everyday.taxi') }}"><i class="fas fa-exclamation-circle"></i>EveryDay Taxi</a>
                                </li>
                                <li class="nav-item @routeis('airport.transport') active @endrouteis">
                                    <a class="nav-link" href="{{ route('airport.transport') }}"><i class="fas fa-taxi"></i>Airport Transport</a>
                                </li>
                                <li class="nav-item @routeis('cruise.transport') active @endrouteis">
                                    <a class="nav-link" href="{{ route('cruise.transport') }}"><i class="fas fa-taxi"></i>Cruise Transport</a>
                                </li>
                                <li class="nav-item @routeis('faq') active @endrouteis">
                                    <a class="nav-link" href="{{ route('faq') }}"><i class="fas fa-cube"></i>FAQs</a>
                                </li>
                                <li class="nav-item @routeis('contact') active @endrouteis">
                                    <a class="nav-link" href="{{ route('contact') }}"><i class="fas fa-map-marker-alt"></i>Contact</a>
                                </li>
                            </ul>
                            <div class="my-2 my-lg-0">
                                <a href="sign-up.html" class="button button-light big">+44 23 8022 2555</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </section>
</header>
