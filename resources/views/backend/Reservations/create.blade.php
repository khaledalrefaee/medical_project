@extends('backend.index')
@section('content')

    <form action="{{route('store.appointment')}}" method="POST">
        @csrf

        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Add Reservation</h3>
            </div>
            <br>
            <div class="card-body">
            <div class="form-row">
                <div class="col">
                <strong>Patient Name :</strong>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">

                        <span class="input-group-text">@</span>
                    </div>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Patient Name" name="name" value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback"  style="color: #8B0000;">
                        {{ $message }}
                    </div>
                    @enderror
                    </div>
                </div>

                <div class="col">
                <strong>Patient Phone :</strong>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                        <span class="input-group-text" >00963</span>
                    </div>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"  value="{{ old('phone') }}"  placeholder="number phone">
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
                        <option selected="" disabled="">time</option>
                        @foreach($times as $time)
                            <option {{ old('time') == $time ? 'selected' : '' }}>{{$time}}</option>
                        @endforeach
                    </select>
                    @error('time')
                <div class="invalid-feedback"  style="color: #8B0000;">{{ $message }}</div>
                    @enderror
                </div>


                <div class="col-md-6 mb-3">
                    <strong>Date:</strong>
                <input type="date" class="form-control @error('date') is-invalid @enderror" name="date"  value="{{ old('date') }}" placeholder="Date">
                @error('date')
                <div class="invalid-feedback"  style="color: #8B0000;">{{ $message }}</div>
                @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Address:</strong>
                    <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="address">
                </div>

                <div class="col-md-6 mb-3">
                    <strong>Birthday:</strong>
                    <input type="date" class="form-control @error('date') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}" placeholder="Birthday">
                    @error('birthday')
                    <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            </div>


                <div style="display: flex; justify-content: center;">
                    <div style="width: 50%;">
                        <div class="form-group">
                            <strong>Doctor:</strong>
                            <select name="doctor_id" id="inputStatus" class="form-control @error('doctor_id') is-invalid @enderror">
                                <option selected disabled>Doctor</option>
                                @foreach($doctor as $item)
                                    <option value="{{ $item->id }}" {{ old('doctor_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('doctor_id')
                            <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <span class="input-group-append">
                 <button type="submit" class="btn btn-info btn-flat">Go!</button>
                  </span>
                </div>
            </div>
        </div>
    </form>



@endsection
