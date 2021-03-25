@extends('layouts.front')
@section('content')
<section class="hero-area" style="background-image: url({{ asset('theme/images/home/bg.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hero-area-slider owl-carousel">
                    <div class="single-slider-item">
                        <div class="text-center">
                            <h1>Private Tours</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding contact-form-section">
    <div class="container">
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
                    <h2 class="mb-3">Contact Us</h2>
                    <h5 class="mb-4">+44 23 8022 2555</h5>
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
                    <button class="button button-dark tiny" type="submit">Send</button>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="section-padding our-service-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section-title">Private Tours</h2>
                <div class="about-us-text">
                    {!! setting('private_tours') !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
