@extends('backend.index')
@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Google Maps Example</title>

<body>
<div id="map" style="height: 500px"></div>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDG9moWiWFp4yE6PDUWvUbDUQYRP-8ltRg&callback=initMap"></script>

<!-- Initialize the map with markers for all user locations -->

<script>
    function initMap() {
        var locations =@json($locations);

        // Create the map


        var map = new google.maps.Map(document.getElementById('map'), {

            zoom: 3,
            center: new google.maps.LatLng(37.7749, -122.4194),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        // Create an info window to display location details

        var infowindow = new google.maps.InfoWindow();

        // Add a marker for each location

        var marker, i;

        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i].lat, locations[i].lng),
                map: map
            });

            // Add a click event listener to the marker to display location details

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent('Location ' + i +  '<br>' + 'Username: ' + locations[i].name );
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    }

</script>
</body>
</html>

@endsection
