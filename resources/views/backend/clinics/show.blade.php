@extends('backend.index')
@section('content')


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Clinic information</h3>
                        </div>

                        <div class="card-body">
                            <a href="{{ route('Retreat.clincs') }}" class="btn btn-primary">Retreat</a>

                            <div class="row">
                                <div class="col-md-12">
                                    @if ($doctors->isEmpty())
                                        <p style="color:red; font-size:20px;">No doctors found for this clinic.</p>
                                    @else
                                        @foreach ($doctors as $doctor)
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $doctor->name }}</h5>
                                                    <p class="card-text">
                                                        <strong>Specialization:</strong> {{ $doctor->detail->specialization }}<br>
                                                        <strong>Phone:</strong> {{ $doctor->detail->phone }}<br>
                                                        <strong>Communication Email:</strong> {{ $doctor->detail->email }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
