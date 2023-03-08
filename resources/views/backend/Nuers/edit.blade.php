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
                    <div class="form-group">
                        <label for="exampleInputEmail1">name nurse</label>
                        <input type="text"  id="name" name="name" class="form-control" id="exampleInputEmail1"  class="form-control @error('name') is-invalid @enderror"  value="{{$nuer->name}}" placeholder="Enter name nurse">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text" >00963</span>
                        </div>
                        <input type="text" class="form-control"  id="phone" name="phone"   class="form-control @error('phone') is-invalid @enderror" value="{{$nuer->phone}}" placeholder="number phone nurse">
                    </div>
                    @error('phone')
                    <div class="alert alert-danger">{{ $message }}
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">description</label>
                        <input type="text" id="description" name="description" class="form-control"   class="form-control @error('description') is-invalid @enderror" value="{{$nuer->description}}" placeholder="description">
                    </div>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
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

