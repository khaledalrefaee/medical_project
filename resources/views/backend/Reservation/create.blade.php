@extends('backend.index')
@section('content')

    <form action="" method="POST">
        @csrf

        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Add Reservation</h3>
            </div>
            <br>


            <div class="card-body">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username"  value="{{ old('name') }}" class="@error('name') is-invalid @enderror" name="name">

                </div>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror






                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text" >00963</span>
                    </div>
                    <input type="number" class="form-control" name="phone"  value="{{ old('phone') }}" class="@error('phone') is-invalid @enderror" placeholder="number phone">
                </div>
                @error('phone')
                <div class="alert alert-danger">{{ $message }}
                    @enderror
                </div>




                <select name="time" id="inputStatus" class="form-control custom-select" >
                    <option selected="" disabled="" >time </option>
                    @foreach($times as $time)
                        <option >{{$time}} </option>
                    @endforeach

                </select>
                @error('time')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
<br>
                <input type="date" class="form-control" name="date"  value="{{ old('date') }}" class="@error('date') is-invalid @enderror" placeholder="Date">



                <br>
                <br>

                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="address"  value="{{ old('address') }}" class="@error('address') is-invalid @enderror" placeholder="address">

                    @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>

                <div class="input-group mb-3">
                    <input type="date" class="form-control" name="birthday"  value="{{ old('birthday') }}" class="@error('birthday') is-invalid @enderror" placeholder="Birthday">
                    @error('birthday')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-check"></i></span>
                    </div>
                </div>




                <br>
                <br>


                <div class="input-group input-group-sm">

                <span class="input-group-append">
                 <button type="submit" class="btn btn-info btn-flat">Go!</button>
                  </span>
                </div>



                <!-- /input-group -->
            </div>
            <!-- /.card-body -->
        </div>
    </form>
@endsection
