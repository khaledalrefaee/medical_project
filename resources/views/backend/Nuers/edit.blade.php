@extends('backend.index')
@section('content')
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">update Nuers </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form novalidate="novalidate" action="{{route('update.kk', $nuer->id)}}" method="POST" >
                @csrf

                <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <strong>name nurse</strong>
                        <input type="text"  id="name" name="name" class="form-control form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"    value="{{$nuer->name}}" placeholder="Enter name nurse">
                    @error('name')
                    <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-md-6">
                        <strong>phone:</strong>
                        <div class="input-group">
                            <span class="input-group-text">00963</span>
                        <input type="text" class="form-control form-control @error('phone') is-invalid @enderror"  id="phone" name="phone"    value="{{$nuer->phone}}" placeholder="number phone nurse">
                    @error('phone')
                    <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <strong>description</strong>
                        <input type="text" id="description" name="description" class="form-control form-control @error('description') is-invalid @enderror" value="{{$nuer->description}}" placeholder="description">
                    @error('description')
                    <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                    @enderror
                </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Go!</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
        <!-- /.card -->
    </div>
@endsection

