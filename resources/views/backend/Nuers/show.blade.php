@extends('backend.index')
@section('content')


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Nurse details {{ $nuer->name }} </h3>
                        </div>
                        <div class="col-md-6">
                                <div class="card-body">
                                    <a href="{{ route('Retreat.nuers') }}" class="btn btn-primary">Retreat</a>
                                </div>

                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Nurse Information</h5>
                                            <p class="card-text"><strong>Phone Nurse:</strong> {{ $nuer->phone }}</p>
                                            <p class="card-text"><strong>Description:</strong> {{ $nuer->description }}</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
