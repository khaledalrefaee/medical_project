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
            <form novalidate="novalidate" action="{{route('update.pharmese',$phamies->id)}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">name drug </label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"  value="{{$phamies->name}}" class="@error('name') is-invalid @enderror" placeholder="Enter name clincs">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                        <input type="text" class="form-control" name="prise"  value="{{$phamies->prise}}" class="@error('prise') is-invalid @enderror" placeholder="prise">
                    </div>
                    @error('phone')
                    <div class="alert alert-danger">{{ $message }}
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">description</label>
                        <input type="text" name="description" class="form-control" id="exampleInputPassword1"  value="{{$phamies->description}}" class="@error('description') is-invalid @enderror" placeholder="description">
                    </div>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Go!</button>
                        </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection

