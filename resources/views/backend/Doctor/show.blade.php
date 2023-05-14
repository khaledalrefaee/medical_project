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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Show Information Doctor {{$doctor->doctor->name}}</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="{{ route('Retreat.doctor') }}" class="btn btn-primary">Retreat</a>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card">
                                                        <div class="card-header d-flex justify-content-between">
                                                            <h5 class="card-title">Reservations {{ $doctor->doctor->name }}</h5>
                                                            <h5 class="card-title">Number of Appointments: {{ $reservation->count() }}</h5>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                @if ($reservation->count() > 0)
                                                                    @foreach ($reservation as $item)
                                                                        <div class="col-md-4">
                                                                            <div class="reservation-item">
                                                                                <div class="card">
                                                                                    <div class="card-body">
                                                                                        <h6 class="card-subtitle">Reservation ID: {{ $item->id }}</h6>
                                                                                        <p class="card-text">
                                                                                        <p class="reservation-details i"> <i class="far fa-calendar-alt"></i> Date: {{ $item->date }}<br>
                                                                                        <p class="reservation-details i"><i class="far fa-clock"></i> Time: {{ $item->time }}<br>
                                                                                        <p class="reservation-details i"><i class="fas fa-user-injured"></i> Name: {{ $item->name }}
                                                                                        </p>
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
                            </div>

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <p><strong>Doctor Email Application:</strong> {{ $doctor->doctor->email }}</p>
                                        <p><strong>Contact Email:</strong> {{ $doctor->email }}</p>
                                        <p><strong>Phone:</strong> {{ $doctor->phone }}</p>
                                        <p><strong>Specialization:</strong> {{ $doctor->specialization }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- /.container-fluid -->

@endsection
