function haversine_distance(mk1, mk2) {
    var R = 6371.0710; // Radius of the Earth in kilometers
    // var R = 3958.8; // Radius of the Earth in miles
    var rlat1 = mk1.position.lat() * (Math.PI/180); // Convert degrees to radians
    var rlat2 = mk2.position.lat() * (Math.PI/180); // Convert degrees to radians
    var difflat = rlat2-rlat1; // Radian difference (latitudes)
    var difflon = (mk2.position.lng()-mk1.position.lng()) * (Math.PI/180); // Radian difference (longitudes)

    var d = 2 * R * Math.asin(Math.sqrt(Math.sin(difflat/2)*Math.sin(difflat/2)+Math.cos(rlat1)*Math.cos(rlat2)*Math.sin(difflon/2)*Math.sin(difflon/2)));
    return d;
}
var smarker = null;
var emarker = null;
var stopmarker = null;
var distance = null;
var map;

var directionDisplay;
// var directionsService = new google.maps.DirectionsService();
var gmarkers = [];
var map = null;
var startLocation = null;
var endLocation = null;
var waypts = null;

var latlon1 = null;
var latlon2 = null;

function initMap() {
    directionsDisplay = new google.maps.DirectionsRenderer({
    suppressMarkers: true
    });
        map = new google.maps.Map(document.getElementById('ride-map'), {
        zoom: 12, center: new google.maps.LatLng(50.909698, -1.404351),disableDefaultUI: true,
        zoomControl:true,
        fullscreenControl: true,
    });

    directionsDisplay = new google.maps.DirectionsRenderer({
        suppressMarkers: true
        });
            contact_map = new google.maps.Map(document.getElementById('contact-map'), {
            zoom: 16, center: new google.maps.LatLng(50.914432, -1.3988099),disableDefaultUI: true,
            zoomControl:true,
            fullscreenControl: true,
        });

    var spoint = document.getElementById('spoint');
    var autocomplete = new google.maps.places.Autocomplete(spoint,{componentRestrictions:{country:["uk"]}});
    var epoint = document.getElementById('epoint');
    var autocomplete1 = new google.maps.places.Autocomplete(epoint,{componentRestrictions:{country:["uk"]}});

    spoint.addEventListener('change', function() {
        $('#slat').val('');$('#slon').val('');
    });
    epoint.addEventListener('change', function() {
        $('#elat').val('');$('#elon').val('');
    });

    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        var place = autocomplete.getPlace();
        var lat = place.geometry.location.lat();
        var lon = place.geometry.location.lng();
        $('#slat').val(lat);$('#slon').val(lon);
        latlon1 = new google.maps.LatLng(lat,lon);
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

    google.maps.event.addListener(autocomplete1, 'place_changed', function() {
        var place = autocomplete1.getPlace();
        var lat = place.geometry.location.lat();
        var lon = place.geometry.location.lng();
        $('#elat').val(lat);$('#elon').val(lon);
        latlon2 = new google.maps.LatLng(lat,lon);
        printMarker(latlon2 , emarker , 2);

        if(latlon1 != null && latlon2 != null){
            showDirections(latlon1 , latlon2);
            fitMap(latlon2);
            distance = haversine_distance(smarker, emarker);
            // console.log(distance);
            $('#distance').val(distance);
            // calcRoute();
        }

    });

    directionsDisplay.setMap(map);
}

function calcRoute() {
    var request = {
        origin: "Bicknacre",
        destination: "Bicknacre",
        waypoints: [{
            location: new google.maps.LatLng($('#slat').val(),new google.maps.LatLng($('#slon').val())),
            stopover: false
        }, {
            location: new google.maps.LatLng($('#elat').val(),new google.maps.LatLng($('#elon').val())),
            stopover: false
        }],

        optimizeWaypoints: true,
        travelMode: google.maps.DirectionsTravelMode.DRIVING
    };
    var directionsService = new google.maps.DirectionsService();
    directionsService.route(request, function(response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
            var route = response.routes[0];
            var bounds = new google.maps.LatLngBounds();
            var route = response.routes[0];
            startLocation = new Object();
            endLocation = new Object();
            var polyline = new google.maps.Polyline({
                path: [],
                strokeColor: '#FF0000',
                strokeWeight: 3
            });
            var legs = response.routes[0].legs;
            for (i = 0; i < legs.length; i++) {
                if (i == 0) {
                    startLocation.latlng = legs[i].start_location;
                    startLocation.address = legs[i].start_address;
                } else {
                    waypts[i] = new Object();
                    waypts[i].latlng = legs[i].start_location;
                    waypts[i].address = legs[i].start_address;
                }
                endLocation.latlng = legs[i].end_location;
                console.log("[" + i + "] " + endLocation.latlng.toUrlValue(6));
                endLocation.address = legs[i].end_address;
                var steps = legs[i].steps;
                for (j = 0; j < steps.length; j++) {
                    var nextSegment = steps[j].path;
                    for (k = 0; k < nextSegment.length; k++) {
                        polyline.getPath().push(nextSegment[k]);
                        bounds.extend(nextSegment[k]);
                    }
                }
            }
            var waypoints = polyline.GetPointsAtDistance(5000);
            for (var i = 0; i < waypoints.length; i++) {
                createMarker(waypoints[i], "" + (i + 1), (i + 1) * 5 + " km");
            }
        } else {
            alert("directions response " + status);
        }
    });
}

function printMarker(latlon, marker, cno = 1) {
    if(marker != null) {
        marker.setMap(null);
    }
    if(smarker)
        smarker.setMap(null);
    if(emarker)
        emarker.setMap(null);

    marker = new google.maps.Marker({
        position: latlon,
        map: map
    });
    if(cno == 1) {
        smarker = marker;
    } else {
        emarker = marker;
    }
}

var directionsDisplay;

function showDirections(start , end) {
    if(directionsDisplay)
        directionsDisplay.setMap(null);
    var request = {
        origin: start,
        destination: end,
        travelMode: google.maps.TravelMode.DRIVING
    };
    var directionsService = new google.maps.DirectionsService;
    directionsDisplay = new google.maps.DirectionsRenderer;
    directionsService.route(request, function(response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
            directionsDisplay.setMap(map);
            calculateDistance(start, end);
        } else {
            alert("Oops, something went wrong! Please enter the right address.");
        }
    });
}

function fitMap(latlon) {
    var latlngbounds = new google.maps.LatLngBounds();
    latlngbounds.extend(latlon);
    map.fitBounds(latlngbounds);
    var listener = google.maps.event.addListener(map, "idle", function() {
        if (map.getZoom() > 10) map.setZoom(10);
        google.maps.event.removeListener(listener);
    });
}

function calculateDistance(origin, destination) {
    var service = new google.maps.DistanceMatrixService();
    service.getDistanceMatrix({
        origins: [origin],
        destinations: [destination],
        travelMode: 'DRIVING',
        unitSystem: google.maps.UnitSystem.IMPERIAL,
    }, callback);

    function callback(response, status) {
        if (status == 'OK') {
            var origins = response.originAddresses;
            var destinations = response.destinationAddresses;

            for (var i = 0; i < origins.length; i++) {
                var results = response.rows[i].elements;
                console.log(results);
                for (var j = 0; j < results.length; j++) {
                    var element = results[j];
                    if (element.distance.value <= miles_limit) {
                        var fare = base_fare;
                        $(".distance-error .error strong").html("For Short Trips Please Call on this number +44 23 8022 2555");
                    } else {
                        var init_fare = (element.distance.value * rate) / 1609;
                        var fare = parseInt(init_fare) + parseInt(base_fare);
                        $(".distance-error .error strong").html("");
                    }
                    duration_text = element.duration.text;
                    distance_text = element.distance.text;
                    $("#fare").val(Math.ceil(fare));
                    $('#results').html('<h4>£ '+Math.ceil(fare)+'.00</h4>');
                }
            }
        }
    }
}
