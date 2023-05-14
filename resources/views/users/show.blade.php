@extends('backend.index')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show User ID : {{ $user->id}}</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5 class="card-title">Reservations {{ $user->name }}</h5>
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

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $user->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        {{ $user->email }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Address:</strong>
                        {{ $user->address }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Phone:</strong>
                        {{ $user->phone }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Birthday:</strong>
                        {{ $user->birthday }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Gender:</strong>
                        {{$user->gender->name}}

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Roles:</strong>
                        @if (!empty($user->getRoleNames()))
                            @foreach ($user->getRoleNames() as $v)
                                <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="map" style="height: 500px"></div>

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
