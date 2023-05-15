@extends('backend.index')
@section('content')


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Appointment Details</h3>
        </div>

        <div class="card-body">
            <a href="{{ route('Retreat.appointment') }}" class="btn btn-primary">Retreat</a>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <strong>Email User:</strong> {{ $Reservation->user->email }}
                </div>
                <div class="col-md-6">
                    <strong>Name:</strong> {{ $Reservation->name }}
                </div>
                <div class="col-md-6">
                    <strong>Time:</strong> {{ $Reservation->date }} | {{ $Reservation->time }}
                </div>
                <div class="col-md-6">
                    <strong>Phone:</strong> {{ $Reservation->phone }}
                </div>
                <div class="col-md-6">
                    <strong>Address:</strong> {{ $Reservation->address }}
                </div>
                <div class="col-md-6">
                    <strong>Birthday:</strong> {{ $Reservation->birthday }}
                </div>
                <div class="col-md-6">
                    <strong>Status:</strong>
                    <span class="badge
                    @if($Reservation->status === 'completed') badge-success
                    @elseif($Reservation->status === 'Cancelling') badge-danger
                    @elseif($Reservation->status === 'Pending') badge-warning
                    @else badge-secondary
                    @endif">
                    @if($Reservation->status === 'completed')
                            Completed
                        @elseif($Reservation->status === 'Cancelling')
                            Cancelling
                        @elseif($Reservation->status === 'Pending')
                            Pending
                        @endif
                </span>
                </div>
                <div class="col-md-6">
                    <strong>Total:</strong> {{ $Reservation->total }}
                </div>

                <div class="text-center mb-3">
                    <strong>Diagnosis:</strong> {{ $Reservation->diagnosis }}
                </div>
            </div>
        </div>
    </div>

@endsection
