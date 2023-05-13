@extends('backend.index')
@section('content')
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit  Information Doctor </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form novalidate="novalidate" action="{{route('update.doctor',$doctor->id)}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <strong>Name Doctor</strong>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"" id="exampleInputEmail1"  value="{{$doctor->name}}"  placeholder="Enter name Doctor">
                    </div>
                    @error('name')
                    <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <strong>Doctor email application </strong>
                        <input type="text" name="email_1" class="form-control @error('email') is-invalid @enderror"" id="exampleInputEmail1"  value="{{$doctor->email}}"  placeholder="Enter email Doctor">
                    </div>

                    @error('email')
                    <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <strong>password doctor</strong>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputEmail1"  value="{{ old('password') }}"  placeholder="Enter password Doctor">
                    </div>

                    @error('password')
                    <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                    @enderror

                    <strong>His Clinic:</strong>
                    <select name="clinic_id" id="inputStatus"  class="form-control @error('clinic_id') is-invalid @enderror" >
                        <option selected="" disabled=""  >Clinic</option>
                        @foreach($clinic as $item)
                            <option value="{{$item->id}}" {{$item->id == $doctor->clinic_id ? 'selected' : ""}} >{{$item->name}} </option>
                        @endforeach
                    </select>
                    @error('clinic_id')
                    <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <strong>email doctor</strong>
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"" id="exampleInputEmail1"   value="{{$detail->email}}"  placeholder="Enter email Doctor">
                    </div>
                    @error('email')
                    <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                    @enderror



                    <div class="form-group">
                        <strong>phone doctor</strong>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"" id="exampleInputEmail1"   value="{{$detail->phone}}"  placeholder="Enter phone Doctor">
                    </div>
                    @error('phone')
                    <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                    @enderror



                    <div class="form-group">
                        <strong>specialization docter</strong>
                        <input type="text" name="specialization @error('specialization') is-invalid @enderror"" class="form-control" id="exampleInputEmail1"  value="{{$detail->specialization}}"  placeholder="Enter specialization Doctor">
                    </div>
                    @error('specialization')
                    <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
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

