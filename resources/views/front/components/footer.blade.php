<footer class="footer-section theme-1">

    <section class="footer-nav-section p-4 theme-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-6 text-center">
                    <div class="footer-brand">
                        <a href="{{ route('home') }}"><img src="{{ asset('theme/images/site-logo.png') }}" width="180px" alt="Logo"></a>
                    </div>
                    <div class="contact-form-section">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="private-tours-grid">
                                            <img src="{{ asset('theme/images/dummy600x400.png') }}" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="private-tours-grid">
                                            <img src="{{ asset('theme/images/dummy600x400.png') }}" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="private-tours-grid">
                                            <img src="{{ asset('theme/images/dummy600x400.png') }}" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="private-tours-grid">
                                            <img src="{{ asset('theme/images/dummy600x400.png') }}" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <form action="{{ route('contact.save') }}" method="POST">
                                    @csrf
                                    <h2 class="mb-3 text-white text-left">Contact Us</h2>
                                    <h5 class="mb-4 text-white text-left">+44 23 8022 2555</h5>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input type="text" name="name" id="name" placeholder="Name" class="form-control" required>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" name="email" id="email" placeholder="E-mail" class="form-control" required>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" name="phone" id="phone" placeholder="Phone" class="form-control" required>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" name="subject" id="subject" placeholder="Subject" class="form-control" required>
                                        </div>
                                        <div class="col-lg-12">
                                            <textarea class="form-control" name="message" id="message" placeholder="Message" required></textarea>
                                        </div>
                                    </div>
                                    <button class="button button-light text-white tiny" type="submit">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="copyright-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>&copy; Copyright 2021 by Csc Taxis. All Right Reserved.</p>
                </div>
            </div>
        </div>
    </section>
</footer>
