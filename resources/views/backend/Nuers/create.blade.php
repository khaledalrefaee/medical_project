@extends('backend.index')
@section('content')
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Nurse</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form  action="{{route('store.nuers')}}" method="POST">
                @csrf
                <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <strong>name nurse</strong>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"  value="{{ old('name') }}"  placeholder="Enter name Nurse">
                        @error('name')
                        <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <strong>phone:</strong>
                        <div class="input-group">
                            <span class="input-group-text">00963</span>
                            <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone"  value="{{ old('phone') }}"  placeholder="number phone">
                            @error('phone')
                            <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                        <strong>description</strong>
                        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="exampleInputPassword1"  value="{{ old('description') }}"  placeholder="description">

                    @error('description')
                <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                    @enderror
                    </div>

                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">GO!</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection

