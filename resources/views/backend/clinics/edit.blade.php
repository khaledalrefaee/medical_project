@extends('backend.index')
@section('content')
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Clinic</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form novalidate="novalidate" action="{{route('update.Clincs',$clinic->id)}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <strong>name clinic</strong>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"  value="{{$clinic->name}}"  placeholder="Enter name clincs">
                    @error('name')
                        <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <strong>description</strong>
                        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="exampleInputPassword1"  value="{{$clinic->description}}" placeholder="description">

                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Go!</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection

