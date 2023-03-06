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
            <form id="quickForm" novalidate="novalidate" action="{{route('store.pharmese')}}" method="POST" >
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">name medicine</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"  value="{{ old('name') }}" class="@error('name') is-invalid @enderror" placeholder="Enter name medicine">
                    </div>
                  @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="input-group mb-3">

                        <input type="text" class="form-control" name="prise"  value="{{ old('prise') }}" class="@error('prise') is-invalid @enderror" placeholder="prise medicine">
                    </div>
                   @error('prise')
                    <div class="alert alert-danger">{{ $message }}
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">description</label>
                        <input type="text" name="description" class="form-control" id="exampleInputPassword1"  value="{{ old('description') }}" class="@error('description') is-invalid @enderror" placeholder="description medicine">
                    </div>
                    @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">GO!</button>
                        </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection

