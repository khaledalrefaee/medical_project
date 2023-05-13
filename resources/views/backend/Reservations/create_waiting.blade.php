@extends('backend.index')
@section('content')
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add waiting </h3>
            </div>

            <form id="quickForm" novalidate="novalidate" action="{{route('store.waiting')}}" method="POST" >
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Patient Name :</strong>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"  value="{{ old('name') }}"  placeholder="Enter name Patient">

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
                                        <option value="{{$item->id}}" {{ old('gender_id') == $item->id ? 'selected' : '' }}>{{$item->name}} </option>
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
                                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="exampleInputEmail1" value="{{ old('address') }}"  placeholder="Enter address Patient">
                                @error('address')
                                <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong> Doctor :</strong>
                                <select name="doctor_id" id="inputStatus"  class="form-control @error('doctor_id') is-invalid @enderror" >
                                    <option selected="" disabled="" >Doctor </option>
                                    @foreach($doctor as $item)
                                        <option value="{{$item->id}}" {{ old('doctor_id') == $item->id ? 'selected' : '' }}>{{$item->name}} </option>
                                    @endforeach
                                </select>
                                @error('doctor_id')
                                <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>



                    <div style="display: flex; justify-content: center;">
                        <div style="width: 50%;">
                            <div class="form-group">
                            <strong>birthday :</strong>

                            <input type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday"  value="{{ old('birthday') }}"  placeholder="birthday">

                            @error('birthday')
                            <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                            @enderror
                        </div>
                </div>
                    </div>

                <button type="submit" class="btn btn-primary">GO!</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>


@endsection

