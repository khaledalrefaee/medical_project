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
            <form novalidate="novalidate" action="{{route('update.nuers',$nuer->id)}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">name nuers</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"  value="{{$nuer->name}}" class="@error('name') is-invalid @enderror" placeholder="Enter name clincs">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text" >00963</span>
                        </div>
                        <input type="number" class="form-control" name="phone"  value="{{$nuer->phone}}" class="@error('phone') is-invalid @enderror" placeholder="number phone">
                    </div>
                    @error('phone')
                    <div class="alert alert-danger">{{ $message }}
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">description</label>
                        <input type="text" name="description" class="form-control" id="exampleInputPassword1"  value="{{$nuer->description}}" class="@error('description') is-invalid @enderror" placeholder="description">
                    </div>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="exampleInputFile">image nuer</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input  type="file" id="image" name="image"  value="{{ old('image') }}" class="@error('image') is-invalid @enderror">
                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="input-group-append">

                                </div>
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

