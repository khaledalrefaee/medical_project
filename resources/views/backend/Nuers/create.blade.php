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
            <form id="quickForm" novalidate="novalidate" action="{{route('store.nuers')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <strong>name nurse</strong>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"  value="{{ old('name') }}" class="@error('name') is-invalid @enderror" placeholder="Enter name clincs">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                        <div class="form-group">
                            <div class="input-group-append">
                                <strong>phone:</strong>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">00963 </span>
                        <input type="number" class="form-control" name="phone"  value="{{ old('phone') }}" class="@error('phone') is-invalid @enderror" placeholder="number phone">
                    </div>
                    @error('phone')
                    <div class="alert alert-danger">{{ $message }}
                        @enderror
                    </br>

                    <div class="form-group">
                        <strong>description</strong>
                        <input type="text" name="description" class="form-control" id="exampleInputPassword1"  value="{{ old('description') }}" class="@error('description') is-invalid @enderror" placeholder="description">
                    </div>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
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

