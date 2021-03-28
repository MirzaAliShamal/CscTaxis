<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Cheap Southampton Taxi &#8211; Book Your Ride Now</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png"> -->

        <!-- <link rel="manifest" href="site.webmanifest"> -->
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="{{ asset('theme/plugins/OwlCarousel/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">
        <link rel="stylesheet" href="{{ asset('theme/css/style.css?v1.2') }}">
        <style>
            .from-group {
                margin-bottom: 30px;
            }
            .bootstrap-timepicker-widget table td input{
                width: 35px;
            }
            .bootstrap-timepicker-widget input {
                border-radius: 0px;
            }
            .pickup-block input:read-only,
            .return-block input:read-only {
                background-color: #ffffff;
                cursor: pointer;
            }
            .card-help {
                -webkit-box-shadow: 0px 0px 57px -43px rgba(0,0,0,0.75);
                -moz-box-shadow: 0px 0px 57px -43px rgba(0,0,0,0.75);
                box-shadow: 0px 0px 57px -43px rgba(0,0,0,0.75);
                border: 0px;
            }
            .bg-site-dark {
                background: #3D3E3E !important;
                color: #fff !important;
                padding-top: 20px;
                padding-bottom: 20px;
                font-weight: normal;
            }
            .bg-site-dark h5 {
                font-weight: normal;
            }
            .bg-site-dark h5:hover, .bg-site-dark h5:focus {
                text-decoration: none !important;
                color: #FFD84A !important;
                color: var(--site-color) !important;
                cursor: pointer;
            }
            .whatsapp-float{
            	position:fixed;
            	display:inline-block;
            	width:60px;
            	height:60px;
            	line-height:60px;
            	bottom:30px;
            	right:30px;
            	background-color:#25d366;
            	color:#FFF;
            	border-radius:50px;
            	text-align:center;
                font-size:30px;
            	box-shadow: 2px 2px 3px #999;
                z-index:100;
            }
            .whatsapp-float:hover{
                color: #FFF;
            }
            
            .my-float{
            	/*margin-top:16px;*/
            }
            .bg-2 {
                background-color: #e7e7e7;
            }
        </style>
        @yield('css')
    </head>
    <body class="theme-1">

        @include('front.components.header')

        @yield('content')

        @include('front.components.footer')
        
        <a href="https://api.whatsapp.com/send?phone=+447476921237&text=Hello" class="whatsapp-float" target="_blank">
            <i class="fab fa-whatsapp my-float"></i>
        </a>

        <!-- jQuery -->
        <script src="{{ asset('theme/plugins/common/common.min.js') }}"></script>
        <script src="{{ asset('theme/plugins/OwlCarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('theme/plugins/counterup/waypoints.min.js') }}"></script>
        <script src="{{ asset('theme/plugins/counterup/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('theme/plugins/gmap3/gmap3.min.js') }}"></script>
        <script src="https://www.google.com/jsapi"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/datejs/1.0/date.min.js"></script>
        <!-- custom scripts -->
        <script src="{{ asset('theme/js/scripts.js') }}"></script>

        <script>
            var base_fare = <?php echo setting('base_fare'); ?>;
            var rate = <?php echo setting('fare_rate'); ?>;
            var miles_limit = (<?php echo setting('miles_limit'); ?> * 1609);


            $('.datepicker').datepicker({
                startDate: new Date(),
                autoclose: true,
            });
            $('#pickup_time').timepicker({
                defaultTime: moment().add(1,'hour').format('HH:mm'),
                minuteStep: 1,
                showMeridian: false,
                icons: {
                    up: 'fa fa-chevron-up',
                    down: 'fa fa-chevron-down'
                }
            });

            $('#return_time').timepicker({
                defaultTime: moment().add(2,'hour').format('HH:mm'),
                minuteStep: 1,
                showMeridian: false,
                icons: {
                    up: 'fa fa-chevron-up',
                    down: 'fa fa-chevron-down'
                }
            });
        </script>

        @yield('js')
    </body>
</html>
