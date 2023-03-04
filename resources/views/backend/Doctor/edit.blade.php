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
            <form novalidate="novalidate" action="{{route('update.doctor',$doctor->id)}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">name clincs</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"  value="{{$doctor->name}}" class="@error('name') is-invalid @enderror" placeholder="Enter name clincs">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <select name="clinic_id" id="inputStatus"  class="form-control custom-select" >
                        <option selected="" disabled=""  >Clinic</option>
                        @foreach($clinic as $item)
                            <option value="{{$item->id}}" {{$item->id == $doctor->clinic_id ? 'selected' : ""}} >{{$item->name}} </option>
                        @endforeach
                    </select>
                    @error('clinic_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="exampleInputEmail1">email doctor</label>
                        <input type="text" name="email" class="form-control" id="exampleInputEmail1"   value="{{$detail->email }}" class="@error('email') is-invalid @enderror" placeholder="Enter email Doctor">
                    </div>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror



                    <div class="form-group">
                        <label for="exampleInputEmail1">phone doctor</label>
                        <input type="text" name="phone" class="form-control" id="exampleInputEmail1"   value="{{$detail->phone}}" class="@error('phone') is-invalid @enderror" placeholder="Enter phone Doctor">
                    </div>
                    @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror



                    <div class="form-group">
                        <label for="exampleInputEmail1">specialization docter</label>
                        <input type="text" name="specialization" class="form-control" id="exampleInputEmail1"  value="{{$detail->specialization}}" class="@error('specialization') is-invalid @enderror" placeholder="Enter specialization Doctor">
                    </div>
                    @error('specialization')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

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

