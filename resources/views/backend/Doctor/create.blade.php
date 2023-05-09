@extends('backend.index')
@section('content')
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create Doctor</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="quickForm" novalidate="novalidate" action="{{route('store.doctor')}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <strong>name doctor</strong>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"  value="{{ old('name') }}" class="@error('name') is-invalid @enderror" placeholder="Enter name Doctor">
                    </div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <strong>Doctor email application </strong>
                        <input type="text" name="email_1" class="form-control" id="exampleInputEmail1"  value="{{ old('email') }}" class="@error('email') is-invalid @enderror" placeholder="Enter email Doctor">
                    </div>

                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <strong>password doctor</strong>
                        <input type="password" name="password" class="form-control" id="exampleInputEmail1"  value="{{ old('password') }}" class="@error('password') is-invalid @enderror" placeholder="Enter password Doctor">
                    </div>

                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <strong>His Clinic:</strong>
                    <select name="clinic_id" id="inputStatus" class="form-control custom-select" >
                        <option selected="" disabled="" >Clinic</option>
                        @foreach($clinic as $item)
                            <option value="{{$item->id}}"{{ old('clinic_id') == $item->id ? 'selected' : '' }}>{{$item->name}} </option>
                        @endforeach
                    </select>
                    @error('clinic_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
              <br>
                    <br>

                        <div class="form-group">
                            <strong>Doctor's email to contact</strong>
                            <input type="text" name="email" class="form-control" id="exampleInputEmail1"  value="{{ old('email') }}" class="@error('email') is-invalid @enderror" placeholder="Enter email Doctor">
                        </div>
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                            <div class="form-group">
                                    <strong>phone Doctor:</strong>
                                    <div class="input-group-append">
                                    <span class="input-group-text" >00963</span>
                                <input type="text" name="phone" class="form-control" id="exampleInputEmail1"  value="{{ old('phone') }}" class="@error('phone') is-invalid @enderror" placeholder="Enter phone Doctor">
                            </div>
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            </div>
                                <div class="form-group">
                                    <strong>specialization doctor</strong>
                                    <input type="text" name="specialization" class="form-control" id="exampleInputEmail1"  value="{{ old('specialization') }}" class="@error('specialization') is-invalid @enderror" placeholder="Enter specialization Doctor">
                                </div>
                                @error('specialization')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror



                    </div>

                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">GO!</button>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection

