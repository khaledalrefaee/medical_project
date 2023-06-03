@extends('backend.index')
@section('content')

    <form action="{{route('update.appointment',$Reservation->id)}}" method="POST">
        @csrf

        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Add Reservation</h3>
            </div>
            <br>


            <div class="form-row">
                <div class="col">
                    <strong>Patient Name:</strong>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Patient Name" value="{{$Reservation->name}}"  >
                        @error('name')
                        <div class="invalid-feedback" style="color: #8B0000;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </div>
                <div class="col">
                    <strong>Patient Phone :</strong>

                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text">00963</span>
                        </div>
                        <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$Reservation->phone}}" placeholder="number phone">
                        @error('phone')
                        <div class="invalid-feedback" style="color: #8B0000;">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>


            <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="inputTime"><strong>Hour:</strong></label>
                        <select name="time" id="inputTime" class="form-control @error('time') is-invalid @enderror">
                            <option >{{$Reservation->time}}</option>
                            @foreach($times as $time)
                                <option>{{$time}}</option>
                            @endforeach
                        </select>
                        @error('time')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="inputDate"><strong>Date:</strong></label>
                        <input type="date" class="form-control @error('date') is-invalid @enderror" id="inputDate" name="date" value="{{$Reservation->date}}" placeholder="Date">
                        @error('date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <strong>Address : </strong>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="address" value="{{$Reservation->address}}" class="@error('address') is-invalid @enderror" placeholder="Address">
                        </div>
                    </div>
                    <div class="col">
                        <strong>Birthday : </strong>
                        <div class="input-group mb-3">
                            <input type="date" class="form-control @error('birthday') is-invalid @enderror" id="inputDate" name="birthday" value="{{$Reservation->birthday}}"  placeholder="Birthday">
                            @error('birthday')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <strong>Doctor : </strong>
                        <select name="doctor_id" id="inputStatus" class="form-control custom-select" >
                            <option selected="" disabled="" >Doctor </option>
                            @foreach($doctor as $itme)
                                <option value="{{$itme->id}}" {{$itme->id == $Reservation->doctor_id ? 'selected' : ""}}>{{$itme->name}} </option>
                            @endforeach
                        </select>
                        @error('doctor_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <strong>total : </strong>
                        <div class="input-group mb-3">
                            <span class="input-group-text">SYP</span>
                            <input type="text" name="total"  class="form-control @error('total') is-invalid @enderror" aria-label="Amount (to the nearest dollar)" value="{{$Reservation->total}}">
                            <span class="input-group-text">.00</span>
                            @error('total')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                    </div>
                </div>

                <div class="mb-3">
                    <label  for="exampleFormControlTextarea1" class="form-label" ><strong> Diagnosis </strong></label>
                    <textarea  class="form-control"  name="diagnosis" id="exampleFormControlTextarea1" value="{{$Reservation->date}}"  rows="3">{{$Reservation->diagnosis}}</textarea>
                </div>



                <div class="input-group input-group-sm">

                <span class="input-group-append">
                 <button type="submit" class="btn btn-info btn-flat">Go!</button>
                  </span>
                </div>
            </div>
        </div>
    </form>

@endsection
