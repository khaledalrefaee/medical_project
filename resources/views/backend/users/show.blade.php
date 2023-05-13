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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> User Information {{$user->name}} </h3>
                    </div>


                        <div class="card-body">
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">
                                        <a href="{{url('Retreat')}}"> <button class="btn btn-primary">Retreat</button></a>
<br>
                                        <br>
                                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">

                                            <thead>
                                            <tr>
                                                <th >email</th>
                                                <th >phone</th>
                                                <th >gender</th>
                                                <th >address</th>
                                                <th >age</th>
                                               </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd">

                                                    <td>{{$user->email}}</td>
                                                    <td style="">{{$user->phone}}</td>
                                                    <td style="">{{$user->gender->name ?? 'nono'}}</td>
                                                    <td style="">{{$user->address}}</td>
                                                    <td style="">{{$user->birthday}}</td>

                                                </tr>
                                                <input type="hidden" name="latitude" id="latitude" value="{{$user->latitude}}">
                                                <input type="hidden" name="longitude" id="longitude" value="{{$user->longitude}}">
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-8 offset-md-2">
                                                <div class="card">
                                                    <div class="card-header d-flex justify-content-between">
                                                        <h5 class="card-title">Reservations {{$user->name}}</h5>
                                                        <h5 class="card-title">Number of appointments: {{ $reservation->count() }}</h5>
                                                    </div>
                                                        <div class="card-body">
                                                        <div class="row">
                                                            @if ($reservation->count() > 0)
                                                                @foreach ($reservation as $item)
                                                                    <div class="col-md-4">

                                                                        <div class="reservation-item">
                                                                            <div class="list-group-item">

                                                                                <span class="reservation-id">Reservation ID: {{ $item->id }}</span>
                                                                                <div class="reservation-details">
                                                                                    <span class="reservation-date"><i class="far fa-calendar-alt"></i> Date: {{ $item->date }}</span>
                                                                                    <span class="reservation-time"><i class="far fa-clock"></i> Time: {{ $item->time }}</span>
                                                                                    <span class="reservation-details"><i class="fas fa-stethoscope"></i> Doctor: {{ $item->doctor->name }}</span>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            @else
                                                                <div class="col-md-12">
                                                                    <p class="no-reservations">No reservations found.</p>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                    </div>









    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDG9moWiWFp4yE6PDUWvUbDUQYRP-8ltRg&libraries=places&callback=initMap" async defer></script>

    <script>
        function initMap() {
            var location = { lat: {{$user->latitude}}, lng: {{$user->longitude}} }; // example location
            var map = new google.maps.Map(document.getElementById('map'), {
                center: location,
                zoom: 18
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
