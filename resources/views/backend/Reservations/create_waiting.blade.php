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
            <form id="quickForm" novalidate="novalidate" action="{{route('store.waiting')}}" method="POST" >
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">name medicine</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"  value="{{ old('name') }}" class="@error('name') is-invalid @enderror" placeholder="Enter name medicine">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <select name="gender_id" id="inputStatus" class="form-control custom-select" >
                        <option selected="" disabled="" >gender </option>
                        @foreach($gender as $item)
                            <option value="{{$item->id}}">{{$item->name}} </option>
                        @endforeach
                    </select>
                    @error('gender_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="input-group mb-3">

                        <input type="text" class="form-control" name="address"  value="{{ old('address') }}" class="@error('address') is-invalid @enderror" placeholder="prise medicine">
                    </div>
                    @error('address')
                    <div class="alert alert-danger">{{ $message }}
                        @enderror
                    </div>
                    <div class="input-group mb-3">

                        <input type="date" class="form-control" name="birthday"  value="{{ old('birthday') }}" class="@error('birthday') is-invalid @enderror" placeholder="birthday">
                    </div>
                    @error('birthday')
                    <div class="alert alert-danger">{{ $message }}
                        @enderror
                    </div>


                <select name="doctor_id" id="inputStatus" class="form-control custom-select" >
                    <option selected="" disabled="" >Clice</option>
                    @foreach($doctor as $item)
                        <option value="{{$item->id}}">{{$item->name}} </option>
                    @endforeach
                </select>

                <hr>


                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">GO!</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>


@endsection

