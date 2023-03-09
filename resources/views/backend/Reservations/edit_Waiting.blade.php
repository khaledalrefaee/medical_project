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
            <form novalidate="novalidate" action="{{route('update.waiting',$waiting->id)}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">name drug </label>
                        <input type="text" name="name" value="{{$waiting->name}}" class="form-control" id="exampleInputEmail1"   class="@error('name') is-invalid @enderror" placeholder="Enter name clincs">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                            <select name="gender_id" id="inputStatus" class="form-control custom-select" >
                                <option selected="" disabled="" >gender </option>
                                @foreach($gender as $item)
                                    <option value="{{$item->id}}" {{$item->id == $waiting->gender_id ? 'selected' : ""}}>{{$item->name}} </option>
                                @endforeach
                            </select>
                            @error('gender_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-group mb-3">

                            <input type="text" class="form-control" name="address" value="{{$waiting->address}}"  class="@error('address') is-invalid @enderror" placeholder="prise medicine">
                        </div>
                        @error('address')
                        <div class="alert alert-danger">{{ $message }}
                            @enderror
                        </div>
                        <div class="input-group mb-3">

                            <input type="date" class="form-control" name="birthday"  value="{{$waiting->birthday}}" class="@error('birthday') is-invalid @enderror" placeholder="birthday">
                        </div>
                        @error('birthday')
                        <div class="alert alert-danger">{{ $message }}
                            @enderror
                        </div>
                        <select name="doctor_id" id="inputStatus" class="form-control custom-select" >
                            <option selected="" disabled="" >doctor</option>
                            @foreach($doctor as $item)
                                <option value="{{$item->id}}" {{$item->id == $waiting->doctor_id ? 'selected' : ""}}> {{$item->name}} </option>
                            @endforeach
                        </select>
                        @error('doctor_id')
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

