@extends('layouts.front')
@section('content')
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <ol class="breadcrumb">
                    <li><a href="ride-with-cabgo.html">Thankyou</a></li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="section-padding our-service-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <img src="{{ asset('theme/images/icon/service-icon-2.png') }}" class="img-fluid" alt="">
                <h2 class="mt-3">Thank Your for the booking</h2>
            </div>
        </div>
    </div>
</section>
{{ session()->forget('booking_done') }}
@endsection
