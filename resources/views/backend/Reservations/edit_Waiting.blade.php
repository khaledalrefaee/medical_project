@extends('backend.index')
@section('content')
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Update Waiting</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form novalidate="novalidate" action="{{route('update.waiting',$waiting->id)}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Patient Name :</strong>
                        <input type="text" name="name" value="{{$waiting->name}}" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"    placeholder="Enter name clincs">
                            @error('name')
                            <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                        <strong>Patient gender :</strong>

                                        <select name="gender_id" id="inputStatus" class="form-control @error('gender_id') is-invalid @enderror" >
                                <option selected="" disabled="" >gender </option>
                                @foreach($gender as $item)
                                    <option value="{{$item->id}}" {{$item->id == $waiting->gender_id ? 'selected' : ""}}>{{$item->name}} </option>
                                @endforeach
                            </select>
                            @error('gender_id')
                                        <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                            @enderror
                                    </div>
                                </div>
                            </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <strong>Patient address :</strong>

                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{$waiting->address}}"  placeholder="prise medicine">
                            @error('address')
                            <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                                @enderror
                        </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <strong>Patient birthday :</strong>

                            <input type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday"  value="{{$waiting->birthday}}"  placeholder="birthday">

                        @error('birthday')
                        <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                            @enderror
                        </div>
                        </div>
                </div>

                    <div style="display: flex; justify-content: center;">
                        <div style="width: 50%;">
                            <div class="form-group">
                        <strong>Doctor :</strong>
                        <select name="doctor_id" id="inputStatus" class="form-control custom-select" >
                            <option selected="" disabled="" >doctor</option>
                            @foreach($doctor as $item)
                                <option value="{{$item->id}}" {{$item->id == $waiting->doctor_id ? 'selected' : ""}}> {{$item->name}} </option>
                            @endforeach
                        </select>
                        @error('doctor_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                            </div>
                    </div>
                </div>
                    <button type="submit" class="btn btn-primary">Go!</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection

