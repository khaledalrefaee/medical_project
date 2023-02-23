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
            <form id="quickForm" novalidate="novalidate" action="{{route('update.details', $detail->id)}}" method="POST">
                @csrf
                <div class="card-body">


                    <div class="input-group mb-3">
                        <select name="doctor_id" id="inputStatus" class="form-control custom-select" >
                            <option selected="" disabled="" > Docter </option>
                            @foreach($Docter as $item)
                                <option value="{{$item->id}}">{{$item->name}} </option>
                            @endforeach
                        </select>

                        @error('doctor_id')
                        <div class="alert alert-danger" >{{ $message }}</div>
                        @enderror
    
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>

                        <input type="email" class="form-control" name="email"   class="@error('email') is-invalid @enderror" placeholder="Email" value="{{$detail->email}}">
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}
                            @enderror
                    </div>
                   
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text" >00963</span>
                        </div>
                        <input type="number" class="form-control" name="phone"   value="{{$detail->phone}}" class="@error('phone') is-invalid @enderror" placeholder="number phone">
                    </div>

                    @error('phone')
                    <div class="alert alert-danger">{{ $message }}
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">specialization</label>
                        <input type="text" name="specialization"  value="{{$detail->specialization}}"   class="form-control" id="exampleInputPassword1"  value="{{ old('specialization') }}" class="@error('specialization') is-invalid @enderror" placeholder="specialization">
                    </div>
                    @error('specialization')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    
                    <div class="form-group mb-0">

                    </div>

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

