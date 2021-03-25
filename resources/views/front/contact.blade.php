@extends('layouts.front')
@section('content')
<section class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <ol class="breadcrumb">
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="section-padding contact-form-section p-t-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <form action="#">
                    <h2>Send us an Email</h2>
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="text" name="" id="" placeholder="Name" class="form-control">
                        </div>
                        <div class="col-lg-6">
                            <input type="text" name="" id="" placeholder="E-mail" class="form-control">
                        </div>
                        <div class="col-lg-6">
                            <input type="text" name="" id="" placeholder="Phone" class="form-control">
                        </div>
                        <div class="col-lg-6">
                            <input type="text" name="" id="" placeholder="Subject" class="form-control">
                        </div>
                        <div class="col-lg-12">
                            <textarea class="form-control" name="" id="" placeholder="Text Content"></textarea>
                        </div>
                    </div>
                    <button class="button button-dark tiny" type="submit">Send</button>
                </form>
            </div>
            <div class="col-lg-6">
                <div class="contact-us-map">
                    <div id="contact-map"></div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('js')
    <script>
        function initMap() {
            directionsDisplay = new google.maps.DirectionsRenderer({
            suppressMarkers: true
            });
                map = new google.maps.Map(document.getElementById('contact-map'), {
                zoom: 18, center: new google.maps.LatLng(50.914429, -1.396621),disableDefaultUI: true,
                zoomControl:true,
                fullscreenControl: true,
            });
        }

        $(document).ready(function () {
            google.load("maps", "3.exp", {
                callback: initMap,
                other_params: 'key=AIzaSyA6GhjR-WmiKCgr71McBioeymDd6_Ti_0s&libraries=places,drawing'
            });
        });
    </script>
@endsection
