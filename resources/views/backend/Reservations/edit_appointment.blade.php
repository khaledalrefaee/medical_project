@extends('backend.index')
@section('content')

    <form action="{{route('update.appointment',$Reservation->id)}}" method="POST">
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
                    <input type="text" class="form-control" placeholder="Username"  value="{{$Reservation->name}}" class="@error('name') is-invalid @enderror" name="name">

                </div>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text" >00963</span>
                    </div>
                    <input type="number" class="form-control" name="phone"  value="{{$Reservation->phone}}" class="@error('phone') is-invalid @enderror" placeholder="number phone">
                </div>
                @error('phone')
                <div class="alert alert-danger">{{ $message }}
                    @enderror
                </div>




                <select name="time" id="inputStatus" class="form-control custom-select" >
                    <option selected="" disabled="" >time </option>
                    @foreach($times as $time)
                    <option {{ $Reservation->time ? 'selected' : ""}} >{{$time}} </option>
                    @endforeach

                </select>
                @error('time')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
                <input type="date" class="form-control" name="date"  value="{{$Reservation->date}}" class="@error('date') is-invalid @enderror" placeholder="Date">
                @error('date')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <br>
                <br>

                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="address"  value="{{$Reservation->address}}" class="@error('address') is-invalid @enderror" placeholder="address">

                    @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>

                <div class="input-group mb-3">
                    <input type="date" class="form-control" name="birthday"  value="{{$Reservation->birthday}}" class="@error('birthday') is-invalid @enderror" placeholder="Birthday">
                    @error('birthday')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-check"></i></span>
                    </div>
                </div>
                <select name="doctor_id" id="inputStatus" class="form-control custom-select" >
                    <option selected="" disabled="" >Doctoer </option>
                    @foreach($doctor as $itme)
                        <option value="{{$itme->id}}" {{$itme->id == $Reservation->doctor_id ? 'selected' : ""}}>{{$itme->name}} </option>
                    @endforeach

                </select>
                @error('doctor_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                    <textarea class="form-control" name="diagnosis" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="input-group input-group-sm">

                <span class="input-group-append">
                 <button type="submit" class="btn btn-info btn-flat">Go!</button>
                  </span>
                </div>
            </div>
        </div>
    </form>
    <br>
    <br>





    <!-- /input-group -->
    </div>
    <!-- /.card-body -->
    </div>
    </form>
@endsection
