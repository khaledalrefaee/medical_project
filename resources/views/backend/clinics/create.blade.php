@extends('backend.index')
@section('content')
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Quick Example <small>jQuery Validation</small></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="quickForm" novalidate="novalidate" action="{{route('store.clincs')}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">name clincs</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"  value="{{ old('name') }}" class="@error('name') is-invalid @enderror" placeholder="Enter name clincs">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleInputPassword1">description</label>
                        <input type="text" name="description" class="form-control" id="exampleInputPassword1"  value="{{ old('description') }}" class="@error('description') is-invalid @enderror" placeholder="description">
                    </div>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
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

