@extends('layouts.front')
@section('content')
<section class="hero-area" style="background-image: url({{ asset('theme/images/home/bg-cruise.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="hero-area-slider owl-carousel">
                    <div class="single-slider-item">
                        <div class="text-center">
                            <h1>Cruise Tarnsfer Service</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding our-vehicles-section">
    <div class="container">
        <form action="{{ route('book') }}" class="form-booking" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="fare" id="fare" value="">
            <div class="booking-form">
                <div class="row">
                    <div class="col-12 text-center">
                        <h3 class="mb-5">Get a Quote</h3>
                    </div>
                    <div class="col-lg-12 d-none">
                        <div class="ride-map-area">
                            <div id="ride-map"></div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="distance-error">
                            <span class="error">
                                <strong></strong>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-0">
                            <div class="destination">
                                <label for="">From</label>
                                <i class="fas fa-map-marker-alt"></i>
                                <input type="text" name="from_location" placeholder="Select Desgination" id="spoint" value="" class="form-control validate" autocomplete="off">
                                <input type="hidden" id="slat" name="slat" checkHide="true" required="">
                                <input type="hidden" id="slon" name="slon" checkHide="true" required="">
                            </div>

                            <span class="error">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="dropdown position-relative">
                            <p>Choose <a href="javascript:;" class="dropdown-link" data-target="airport-pickup">airport <i class="fas fa-chevron-down" style="font-size: 10px;"></i></a> or <a href="javascript:;" class="dropdown-link" data-target="cruise-pickup">cruise <i class="fas fa-chevron-down" style="font-size: 10px;"></i></a> terminal</p>
                            <div class="menu-dropdown pickup" id="airport-pickup">
                                <ul>
                                    @foreach (airportTerminal() as $item)
                                        <li data-lat="{{ $item->lat }}" data-long="{{ $item->long }}" data-type="1">{{ $item->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="menu-dropdown pickup" id="cruise-pickup">
                                <ul>
                                    @foreach (cruiseTerminal() as $item)
                                        <li data-lat="{{ $item->lat }}" data-long="{{ $item->long }}" data-type="2">{{ $item->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="extra-fields airport-extra" style="display: none;">
                            <div class="form-group">
                                <label for="flight_no">Flight Number</label>
                                <input type="text" class="form-control" name="flight_no" id="flight_no" autocomplete="off">
                                <span class="error">
                                    <strong></strong>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="arrival_from">Arrival From</label>
                                <input type="text" class="form-control" name="arrival_from" id="arrival_from" autocomplete="off">
                                <span class="error">
                                    <strong></strong>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="airline">Airline</label>
                                <input type="text" class="form-control" name="airline" id="airline" autocomplete="off">
                                <span class="error">
                                    <strong></strong>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="meeting_point">Meeting Point</label>
                                <select name="meeting_point" id="meeting_point" class="form-control">
                                    <option value="" selected>Select an option</option>
                                    <option value="at arrivals with a name board">at arrivals with a name board</option>
                                </select>
                                <span class="error">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>

                        <div class="form-group extra-fields cruise-extra" style="display: none;">
                            <label for="ship_name">Ship Name</label>
                            <input type="text" class="form-control" name="ship_name" id="ship_name" value="" autocomplete="off">
                            <span class="error">
                                <strong></strong>
                            </span>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group mb-0">
                            <div class="destination">
                                <label for="">Where to?</label>
                                <i class="fas fa-map-marker-alt"></i>
                                <input type="text" name="to_location" placeholder="Select Desgination" id="epoint" class="form-control validate" autocomplete="off">
                                <input type="hidden" id="elat" name="elat" checkHide="true" required="">
                                <input type="hidden" id="elon" name="elon" checkHide="true" required="">
                            </div>

                            <span class="error">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="dropdown position-relative">
                            <p>Choose <a href="javascript:;" class="dropdown-link" data-target="airport-destination">airport <i class="fas fa-chevron-down" style="font-size: 10px;"></i></a> or <a href="javascript:;" class="dropdown-link" data-target="cruise-destination">cruise <i class="fas fa-chevron-down" style="font-size: 10px;"></i></a> terminal</p>
                            <div class="menu-dropdown dropoff" id="airport-destination">
                                <ul>
                                    @foreach (airportTerminal() as $item)
                                        <li data-lat="{{ $item->lat }}" data-long="{{ $item->long }}">{{ $item->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="menu-dropdown dropoff" id="cruise-destination">
                                <ul>
                                    @foreach (cruiseTerminal() as $item)
                                        <li data-lat="{{ $item->lat }}" data-long="{{ $item->long }}">{{ $item->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                        <h2>Direction</h2>
                        <label for="direction">Select direction</label>
                        <div class="form-group mb-4">
                            <div class="direction-options mb-0">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="direction" id="direction-oneway" value="1" checked>
                                    <label class="form-check-label" for="direction-oneway"><i class="fas fa-long-arrow-alt-right"></i> One Way</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="direction" id="direction-twoway" value="2">
                                    <label class="form-check-label" for="direction-twoway"><i class="fas fa-exchange-alt"></i> Two Way</label>
                                </div>
                            </div>
                            <div>
                                <span class="error">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                        <h2>Date</h2>
                        <div class="date-error">
                            <span class="error">
                                <strong></strong>
                            </span>
                        </div>
                        <div class="pickup-block">
                            <label for="date-time">Pickup Date & Time</label>
                            <div class="form-group row">
                                <div class="col-6">
                                    <input type="text" class="form-control datepicker" id="pickup_date" name="pickup_date" value="{{ now()->format('m/d/Y') }}" autocomplete="off" readonly>
                                    <span class="error">
                                        <strong></strong>
                                    </span>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control timepicker" id="pickup_time" name="pickup_time" autocomplete="off" readonly>
                                    <span class="error">
                                        <strong></strong>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="return-block" style="display: none;">
                            <label for="date-time">Return Date & Time</label>
                            <div class="form-group row">
                                <div class="col-6">
                                    <input type="text" class="form-control datepicker" id="return_date" name="return_date" value="{{ now()->format('m/d/Y') }}" autocomplete="off" readonly>
                                    <span class="error">
                                        <strong></strong>
                                    </span>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control timepicker" id="return_time" name="return_time" autocomplete="off" readonly>
                                    <span class="error">
                                        <strong></strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12">

                        <div class="select-car-wrapper mb-5">
                            <h2>Services</h2>
                            <div class="selected-car">
                                <div class="form-group">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="alto" name="vehicle_type" value="Saloon">
                                        <label class="custom-control-label" for="alto">Saloon <small>(4 people + 2 large cases + 2 small cases)</small></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="luxury" name="vehicle_type" value="Estate">
                                        <label class="custom-control-label" for="luxury">Estate <small>(4 people + 2 large cases + 4 small cases)</small></label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" id="tourist" name="vehicle_type" value="6 Seater">
                                        <label class="custom-control-label" for="tourist">6 Seater <small>(6 people + 4 large cases + 8 small cases)</small></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h2>Car Capacity</h2>
                        <div class="row">
                            <div class="col-4">
                                <div class="car-capacity">
                                    <div class="form-group">
                                        <label for="passenger">Passengers</label>
                                        <input type="text" id="passengers" class="form-control validate" name="passengers" autocomplete="off">
                                        <span class="error">
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="car-capacity">
                                    <div class="form-group">
                                        <label for="large_cases">Large Cases</label>
                                        <input type="text" id="large_cases" class="form-control validate" name="large_cases" autocomplete="off">
                                        <span class="error">
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="car-capacity">
                                    <div class="form-group">
                                        <label for="small_cases">Small Cases</label>
                                        <input type="text" id="small_cases" class="form-control validate" name="small_cases" autocomplete="off">
                                        <span class="error">
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="payment-options-wrapper">
                            <h2>Payment Method</h2>
                            <label for="payment">Select Any One</label>
                            <div class="form-group mb-4">
                                <div class="payment-options mb-0">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="payment_method" id="cash-pay" value="1">
                                        <label class="form-check-label" for="cash-pay">Cash in Car</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="payment_method" id="banking-pay" value="2">
                                        <label class="form-check-label" for="banking-pay">Card in Car</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="payment_method" id="card-pay" value="3">
                                        <label class="form-check-label" for="card-pay">Pay Online(Stripe)</label>
                                    </div>
                                </div>

                                <div>
                                    <span class="error">
                                        <strong></strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h2>Contact</h2>
                        <div class="contact">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input type="text" id="phone" class="form-control validate" name="phone" autocomplete="off">
                                        <span class="error">
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" class="form-control validate" name="name" autocomplete="off">
                                        <span class="error">
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" class="form-control validate" name="email" autocomplete="off">
                                        <span class="error">
                                            <strong></strong>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="instruction">Any Instruction</label>
                            <textarea name="instruction" id="instruction" class="form-control" rows="5"></textarea>
                            <span class="error">
                                <strong></strong>
                            </span>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h2>Estimated Fare Amount</h2>
                        <div class="form-group">
                            <div id="results"></div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <button type="button" class="button button-dark tiny book-now">Book Now</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<section class="section-padding our-service-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section-title">Cruise Transport Service</h2>
                <div class="about-us-text">
                    {!! setting('cruise_transport') !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
    <script src="{{ asset('theme/js/map-script.js?v1.1') }}"></script>
    <script>
        function validateFields() {
            $(".validate").each(function (index, element) {
                if( $(this).val() == ""){
                    $(this).closest('.form-group').removeClass('valid');
                    $(this).closest('.form-group').addClass('in-valid');
                    $(this).closest('.form-group').find('.error strong').html('Please Fill out this field!');
                } else {
                    $(this).closest('.form-group').removeClass('in-valid');
                    $(this).closest('.form-group').addClass('valid');
                    $(this).closest('.form-group').find('.error strong').html('');
                }
            });

            if (!$("[name='direction']").is(':checked')) {
                $("[name='direction']").closest('.form-group').removeClass('valid');
                $("[name='direction']").closest('.form-group').addClass('in-valid');
                $("[name='direction']").closest('.form-group').find('.error strong').html('Please Select Any!');
            } else {
                $("[name='direction']").closest('.form-group').removeClass('in-valid');
                $("[name='direction']").closest('.form-group').addClass('valid');
                $("[name='direction']").closest('.form-group').find('.error strong').html('');
            }

            if (!$("[name='vehicle_type']").is(':checked')) {
                $("[name='vehicle_type']").closest('.form-group').removeClass('valid');
                $("[name='vehicle_type']").closest('.form-group').addClass('in-valid');
                $("[name='vehicle_type']").closest('.form-group').find('.error strong').html('Please Select Any!');
            } else {
                $("[name='vehicle_type']").closest('.form-group').removeClass('in-valid');
                $("[name='vehicle_type']").closest('.form-group').addClass('valid');
                $("[name='vehicle_type']").closest('.form-group').find('.error strong').html('');
            }

            if (!$("[name='payment_method']").is(':checked')) {
                $("[name='payment_method']").closest('.form-group').removeClass('valid');
                $("[name='payment_method']").closest('.form-group').addClass('in-valid');
                $("[name='payment_method']").closest('.form-group').find('.error strong').html('Please Select Any!');
            } else {
                $("[name='payment_method']").closest('.form-group').removeClass('in-valid');
                $("[name='payment_method']").closest('.form-group').addClass('valid');
                $("[name='payment_method']").closest('.form-group').find('.error strong').html('');
            }
        }

        let nowTime = moment().format('HH:mm');

        function currDate() {
            var date = new Date();
            var newDate = date.toString('MM/dd/yyyy');
            return newDate;
        }

        function timeDiff(date, start, end) {
            var str0 = currDate()+" "+ start;
            var str1 = date+" "+ end;
            var diff = (Date.parse(str1) - Date.parse(str0))/1000/60;
            return diff;
        }

        function check1HourGap(date, time) {
            $diff = timeDiff(date, nowTime, time);
            console.log($diff);

            if ($diff < 60) {
                $("#pickup_time").closest('div').find('.error strong').html("Only 1 hour gap allowed from current time, If you need urgent then call us at +44 23 8022 2555");
            } else {
                $("#pickup_time").closest('div').find('.error strong').html("");
            }
        }

        function checkPickReturnGap() {
            $startDate = $("#pickup_date").val();
            $startTime = $("#pickup_time").val();

            $endDate = $("#return_date").val();
            $endTime = $("#return_time").val();

            $str1 = new Date($startDate+" "+$startTime);
            $str2 = new Date($endDate+" "+$endTime);

            console.log($str1);
            console.log($str2);

            $difference = $str2 > $str1;

            if(!$difference) {
                $(".date-error").find('.error strong').html('Pick Date should be lesser than return date!');
            } else {
                $(".date-error").find('.error strong').html("");
            }

            // alert($difference);
        }

        $(document).ready(function () {
            google.load("maps", "3.exp", {
                callback: initMap,
                other_params: 'key=AIzaSyA6GhjR-WmiKCgr71McBioeymDd6_Ti_0s&libraries=places,drawing'
            });

            $("#check").change(function (e) {
                e.preventDefault();

                $val = $(this).val();
                $lat = $(this).find(':selected').data('lat');
                $long = $(this).find(':selected').data('long');

                $("#spoint").val($val);

                latlon1 = new google.maps.LatLng($lat,$long);
                printMarker(latlon1 , smarker);
                gmarkers.push(printMarker(latlon1 , smarker));

                if(latlon1 != null && latlon2 != null){
                    showDirections(latlon1 , latlon2);
                    fitMap(latlon1);
                    distance = haversine_distance(smarker, emarker);
                    // console.log(distance);
                    $('#distance').val(distance);
                    // calcRoute();
                }
            });

            $("[name='direction']").change(function (e) {
                e.preventDefault();
                $val = $(this).val();
                if ($val == 1) {
                    $(".return-block").slideUp();
                } else {
                    $(".return-block").slideDown();
                }
            });

            $("[name='vehicle_type']").change(function (e) {
                e.preventDefault();
                $val = $(this).val();

                if ($val === "Saloon") {
                    $("#passengers").val("4");
                    $("#large_cases").val("2");
                    $("#small_cases").val("2");
                } else if ($val === "Estate"){
                    $("#passengers").val("4");
                    $("#large_cases").val("2");
                    $("#small_cases").val("4");
                } else {
                    $("#passengers").val("6");
                    $("#large_cases").val("4");
                    $("#small_cases").val("8");
                }
            });

            $('#pickup_time').timepicker().on('changeTime.timepicker', function(e) {
                $elm = $(this);
                $time = $elm.val();
                $date = $("#pickup_date").val();
                check1HourGap($date, $time);

                if ($("[name='direction']:checked").val() == "2") {
                    checkPickReturnGap();
                }
            });

            $('#return_time').timepicker().on('changeTime.timepicker', function(e) {
                $elm = $(this);
                $time = $elm.val();
                $date = $("#return_date").val();
                checkPickReturnGap();
                check1HourGap($date, $time);
            });

            $('#pickup_date').datepicker().on('changeDate', function(e) {
                $elm = $(this);
                $date = $elm.val();
                $time = $("#pickup_time").val();
                check1HourGap($date, $time);

                if ($("[name='direction']:checked").val() == "2") {
                    checkPickReturnGap();
                }
            });

            $(".dropdown-link").click(function (e) {
                e.preventDefault();
                $id = $(this).data('target');
                $(".menu-dropdown").fadeOut();

                $("#"+$id).fadeIn();
            });

            $(document).click(function(){
                $(".menu-dropdown").fadeOut();
            });
            $(".dropdown").click(function(e){
                e.stopPropagation();
            });

            $(".pickup ul li").click(function (e) {
                e.preventDefault();
                $(".menu-dropdown").fadeOut();
                $elm = $(this);
                $(".extra-fields").hide();

                if ($elm.data('type') == "1") {
                    $(".airport-extra").show();
                    $(".cruise-extra").find("#ship_name").removeClass("validate");
                    $(".airport-extra").find("#meeting_point").addClass("validate");
                } else {
                    $(".cruise-extra").show();
                    $(".cruise-extra").find("#ship_name").addClass("validate");
                    $(".airport-extra").find("#meeting_point").removeClass("validate");
                }

                $val = $elm.text();
                $lat = $elm.data('lat');
                $long = $elm.data('long');

                $("#spoint").val($val);
                $("#slat").val($lat);
                $("#slon").val($long);

                latlon1 = new google.maps.LatLng($lat,$long);
                printMarker(latlon1 , smarker);
                gmarkers.push(printMarker(latlon1 , smarker));

                if(latlon1 != null && latlon2 != null){
                    showDirections(latlon1 , latlon2);
                    fitMap(latlon1);
                    distance = haversine_distance(smarker, emarker);
                    $('#distance').val(distance);
                }
            });

            $(".dropoff ul li").click(function (e) {
                e.preventDefault();
                $(".menu-dropdown").fadeOut();

                $elm = $(this);

                $val = $elm.text();
                $lat = $elm.data('lat');
                $long = $elm.data('long');

                $("#epoint").val($val);
                $("#elat").val($lat);
                $("#elat").val($long);

                latlon2 = new google.maps.LatLng($lat, $long);
                printMarker(latlon2 , emarker , 2);

                if(latlon1 != null && latlon2 != null){
                    showDirections(latlon1 , latlon2);
                    fitMap(latlon2);
                    distance = haversine_distance(smarker, emarker);
                    $('#distance').val(distance);
                }
            });

            $(".book-now").click(function (e) {
                e.preventDefault();
                validateFields();
                if ($(".in-valid").length == 0) {
                    $(".form-booking").submit();
                }
            });
        });
    </script>
@endsection
