@extends('backend.index')
@section('content')


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Waiting Details</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <strong>Name:</strong> {{ $waiting->name }}
                                </div>
                                <div class="col-md-6">
                                    <strong>Address:</strong> {{ $waiting->address }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <strong>Birthday:</strong> {{ $waiting->birthday }}
                                </div>
                                <div class="col-md-6">
                                    <strong>Gender:</strong> {{ $waiting->gender->name }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <strong>Doctor Name:</strong> {{ $waiting->doctor->name }}
                                </div>
                                <div class="col-md-6">
                                    <strong>Action:</strong>
                                    <a href="{{ route('Retreat.waitin') }}" class="btn btn-primary">Retreat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
