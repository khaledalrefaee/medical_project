@extends('backend.index')
@section('content')
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Clinic</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="quickForm" novalidate="novalidate" action="{{route('store.clincs')}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <strong>name clinic</strong>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"  value="{{ old('name') }}"  placeholder="Enter name clincs">

                    @error('name')
                    <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <strong>description</strong>
                        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="exampleInputPassword1"  value="{{ old('description') }}"  placeholder="description">

                    @error('description')
                        <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                    @enderror
                    <div class="form-group mb-0">

                    </div>
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

