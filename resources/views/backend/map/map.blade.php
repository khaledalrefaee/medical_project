<!DOCTYPE html>
<html>
<head>
    <title>Google Maps Example</title>
    <style>
        #map {
            height: 100%;
        }
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<div id="map"></div>
<script>
    function initMap() {
        // Create a new map
        var map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: 37.7749, lng: -122.4194 },
            zoom: 8,
        });

        // Get the user's current location
        navigator.geolocation.getCurrentPosition(function (position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude,
            };

            // Create a new marker for the user's location
            var userMarker = new google.maps.Marker({
                position: pos,
                map: map,
                title: "Your Location",
                icon: "https://maps.google.com/mapfiles/ms/icons/red-dot.png",
            });

            // Fetch the login locations from the API
            fetch("/api/locations")
                .then((response) => response.json())
                .then((locations) => {
                    // Loop through the locations and create a new marker for each one
                    locations.forEach((location) => {
                        var pos = {
                            lat: location.latitude,
                            lng: location.longitude,
                        };

                        var marker = new google.maps.Marker({
                            position: pos,
                            map: map,
                            title: "Login Location",
                            icon: "https://maps.google.com/mapfiles/ms/icons/blue-dot.png",
                        });
                    });
                });
        });
    }
</script>
{{--<script>--}}
{{--    function initMap() {--}}
{{--        var map = new google.maps.Map(document.getElementById('map'), {--}}
{{--            center: {lat: 37.7749, lng: -122.4194},--}}
{{--            zoom: 8--}}
{{--        });--}}

{{--        // Get the user's location--}}
{{--        navigator.geolocation.getCurrentPosition(function(position) {--}}
{{--            var pos = {--}}
{{--                lat: position.coords.latitude,--}}
{{--                lng: position.coords.longitude--}}
{{--            };--}}

{{--            // Add a marker for the user's location--}}
{{--            var marker = new google.maps.Marker({--}}
{{--                position: pos,--}}
{{--                map: map,--}}
{{--                title: 'Your Location'--}}
{{--            });--}}
{{--        });--}}
{{--    }--}}
{{--</script>--}}
{{--<script>--}}
{{--    // Create a new map--}}
{{--    var map = new google.maps.Map(document.getElementById("map"), {--}}
{{--        center: { lat: 37.7749, lng: -122.4194 },--}}
{{--        zoom: 8,--}}
{{--    });--}}

{{--    // Get the user's current location--}}
{{--    navigator.geolocation.getCurrentPosition(function (position) {--}}
{{--        var pos = {--}}
{{--            lat: position.coords.latitude,--}}
{{--            lng: position.coords.longitude,--}}
{{--        };--}}

{{--        // Create a new marker for the user's location--}}
{{--        var userMarker = new google.maps.Marker({--}}
{{--            position: pos,--}}
{{--            map: map,--}}
{{--            title: "Your Location",--}}
{{--            icon: "https://maps.google.com/mapfiles/ms/icons/red-dot.png",--}}
{{--        });--}}

{{--        // Fetch the login locations from the API--}}
{{--        fetch("/api/locations")--}}
{{--            .then((response) => response.json())--}}
{{--            .then((locations) => {--}}
{{--                // Loop through the locations and create a new marker for each one--}}
{{--                locations.forEach((location) => {--}}
{{--                    var pos = {--}}
{{--                        lat: location.latitude,--}}
{{--                        lng: location.longitude,--}}
{{--                    };--}}

{{--                    var marker = new google.maps.Marker({--}}
{{--                        position: pos,--}}
{{--                        map: map,--}}
{{--                        title: "Login Location",--}}
{{--                        icon: "https://maps.google.com/mapfiles/ms/icons/blue-dot.png",--}}
{{--                    });--}}
{{--                });--}}
{{--            });--}}
{{--    });--}}
{{--</script>--}}
{{--<script>--}}
{{--    var map;--}}

{{--    function initMap() {--}}
{{--        // Create a new map--}}
{{--        map = new google.maps.Map(document.getElementById("map"), {--}}
{{--            center: { lat: 37.7749, lng: -122.4194 },--}}
{{--            zoom: 8,--}}
{{--        });--}}

{{--        // Get the user's current location--}}
{{--        navigator.geolocation.getCurrentPosition(function (position) {--}}
{{--            var pos = {--}}
{{--                lat: position.coords.latitude,--}}
{{--                lng: position.coords.longitude,--}}
{{--            };--}}

{{--            // Create a new marker for the user's location--}}
{{--            var marker = new google.maps.Marker({--}}
{{--                position: pos,--}}
{{--                map: map,--}}
{{--                title: "Your Location",--}}
{{--                icon: "https://maps.google.com/mapfiles/ms/icons/red-dot.png",--}}
{{--            });--}}

{{--            // Fetch the login locations from the API--}}
{{--            fetch("/api/locations")--}}
{{--                .then((response) => response.json())--}}
{{--                .then((locations) => {--}}
{{--                    // Loop through the locations and create a new marker for each one--}}
{{--                    locations.forEach((location) => {--}}
{{--                        var pos = {--}}
{{--                            lat: location.latitude,--}}
{{--                            lng: location.longitude,--}}
{{--                        };--}}

{{--                        var marker = new google.maps.Marker({--}}
{{--                            position: pos,--}}
{{--                            map: map,--}}
{{--                            title: "Login Location",--}}
{{--                            icon: "https://maps.google.com/mapfiles/ms/icons/blue-dot.png",--}}
{{--                        });--}}
{{--                    });--}}
{{--                });--}}
{{--        });--}}
{{--    }--}}
{{--</script>--}}
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDG9moWiWFp4yE6PDUWvUbDUQYRP-8ltRg&callback=initMap"></script>

</body>
</html>
