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
                    <div style="display: flex;">
                        <div style="width: 50%; margin-right: 10px;">
                            <div class="form-group">
                                <strong>Name Doctor:</strong>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"" id="exampleInputEmail1"  value="{{$doctor->name}}"  placeholder="Enter name Doctor">

                    @error('name')
                    <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                    @enderror
                        </div>
                    </div>
                    <div style="width: 50%; margin-left: 10px;">
                        <div class="form-group">
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
                        </div>
                    </div>
                </div>
                    <div style="display: flex;">
                        <div style="width: 50%; margin-right: 10px;">
                            <div class="form-group">
                                <strong>Doctor email application</strong>
                        <input type="text" name="email_1" class="form-control @error('email_1') is-invalid @enderror" id="exampleInputEmail1"  value="{{$doctor->email}}"  placeholder="Enter email Doctor">
                    @error('email_1')
                    <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                    @enderror
                            </div>
                        </div>
                        <div style="width: 50%; margin-left: 10px;">
                            <div class="form-group">
                                <strong>password doctor</strong>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputEmail1"  value="{{ old('password') }}"  placeholder="Enter password Doctor">
                            @error('password')
                            <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                    </div>


                    <div style="display: flex;">
                        <div style="width: 50%; margin-right: 10px;">
                            <div class="form-group">
                                <strong>Doctor's email to contact</strong>
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"" id="exampleInputEmail1"   value="{{$detail->email}}"  placeholder="Enter email Doctor">
                            @error('email')
                            <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div style="width: 50%; margin-left: 10px;">
                            <div class="form-group">
                                <strong>phone Doctor:</strong>
                                <div class="input-group-append">
                                    <span class="input-group-text">00963</span>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"" id="exampleInputEmail1"   value="{{$detail->phone}}"  placeholder="Enter phone Doctor">
                                @error('phone')
                                <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                        </div>
                    </div>


                    <div style="display: flex; justify-content: center;">
                        <div style="width: 50%;">
                            <div class="form-group">
                                <strong>specialization doctor</strong>
                        <input type="text" name="specialization @error('specialization') is-invalid @enderror"" class="form-control" id="exampleInputEmail1"  value="{{$detail->specialization}}"  placeholder="Enter specialization Doctor">
                                @error('specialization')
                                <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Go!</button>
                </div>
            </form>
        </div>

    </div>
@endsection

