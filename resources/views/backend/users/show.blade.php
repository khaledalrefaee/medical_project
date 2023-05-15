@extends('backend.index')
@section('content')

<head>
    <style>
        .container {
            margin-top: 30px;
        }

        .card {
            border: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #f8f9fa;
            padding: 15px;
            border-bottom: 1px solid #e9ecef;
        }

        .card-title {
            margin-bottom: 0;
            font-size: 20px;
            color: #333;
        }

        .card-body {
            padding: 20px;
        }

        .list-group {
            margin-bottom: 0;
        }

        .list-group-item {
            border: none;
            padding: 15px;
            background-color: #fff;
            border-radius: 5px;
            margin-bottom: 10px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .no-reservations {
            text-align: center;
            margin-top: 20px;
            font-style: italic;
            color: #8B0000;
        }

        .reservation-item {
            display: flex;
            flex-direction: column;
        }

        .reservation-id {
            font-size: 16px;
            color: #333;
            margin-bottom: 5px;
        }

        .reservation-details {
            margin-left: 20px;
            color: #777;
        }

        .reservation-details i {
            margin-right: 5px;
            color: #8B0000;
        }


    </style>
</head>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">User Information: {{$user->name}}</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" value="{{ $user->email }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="address" value="{{ $user->address }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" class="form-control" id="phone" value="{{ $user->phone }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="birthday">Birthday:</label>
                        <input type="text" class="form-control" id="birthday" value="{{ $user->birthday }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender:</label>
                        <input type="text" class="form-control" id="gender" value="{{ $user->gender->name ?? 'N/A' }}" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title">Reservations</h5>
                    <h5 class="card-title">Number of Appointments: {{ $reservation->count() }}</h5>
                </div>
                <div class="card-body">
                    @if ($reservation->count() > 0)
                        <div class="row">
                            @foreach ($reservation as $item)
                                <div class="col-md-4">
                                    <div class="reservation-item">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-subtitle">Reservation ID: {{ $item->id }}</h6>
                                                <p class="card-text">
                                                <p class="reservation-details i"> <i class="far fa-calendar-alt"></i> Date: {{ $item->date }}<br>
                                                <p class="reservation-details i"> <i class="far fa-clock"></i> Time: {{ $item->time }}<br>
                                                <p class="reservation-details i"> <i class="fas fa-stethoscope"></i> Doctor: {{ $item->doctor->name }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="no-reservations">No reservations found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
                                    <div id="map" style="height: 500px"></div>







    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDG9moWiWFp4yE6PDUWvUbDUQYRP-8ltRg&libraries=places&callback=initMap" async defer></script>

    <script>
        function initMap() {
            var location = { lat: {{$user->latitude}}, lng: {{$user->longitude}} }; // example location
            var map = new google.maps.Map(document.getElementById('map'), {
                center: location,
                zoom: 20
            });

            var marker = new google.maps.Marker({
                position: location,
                map: map,
                draggable: false, // disable marker dragging
                icon: {
                    url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png"
                }
            });
        }
    </script>

@endsection
