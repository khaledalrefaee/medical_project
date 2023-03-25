@extends('backend.index')
@section('content')

    <form action="{{route('store_user')}}" method="POST">
        @csrf

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Add user</h3>
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
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                </div>

             <input type="email" class="form-control" name="email"  value="{{ old('email') }}" class="@error('email') is-invalid @enderror" placeholder="Email">
            </div>
                @error('email')
                <div class="alert alert-danger">{{ $message }}
                @enderror
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">

                </div>

                <input type="password" class="form-control" name="password"  value="{{ old('password') }}" class="@error('password') is-invalid @enderror" placeholder="password">
            </div>
                @error('password')
                <div class="alert alert-danger">{{ $message }}
                @enderror
            </div>

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

            <select name="gender_id" id="inputStatus" class="form-control custom-select" >
                <option selected="" disabled="" >gender </option>
                @foreach($gender as $item)
                    <option value="{{$item->id}}">{{$item->name}} </option>
                @endforeach

            </select>
            @error('gender_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror


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
            <div class="form-group" id="simple-date3">
                <label for="decadeView">Decade View</label>
                <div class="input-group date">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                    </div>
                    <input type="text" class="form-control" value="01/06/2020" id="decadeView">
                </div>
            </div>
            <br>
            <br>


            <div class="input-group input-group-sm">

                <span class="input-group-append">
                 <button type="submit" class="btn btn-info btn-flat">Go!</button>
                  </span>
            </div>
        </div>
    </div>
    </form>
    <script src="{{asset('vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <!-- Bootstrap Touchspin -->
    <script src="{{asset('vendor/bootstrap-touchspin/js/jquery.bootstrap-touchspin.js')}}"></script>
    <!-- ClockPicker -->
    <script src="{{asset('vendor/clock-picker/clockpicker.js')}}"></script>
    <!-- RuangAdmin Javascript -->
    <script src="{{asset('js/ruang-admin.min.js')}}"></script>
    <!-- Javascript for this page -->
    <script>
        $(document).ready(function () {


            $('.select2-single').select2();

            // Select2 Single  with Placeholder
            $('.select2-single-placeholder').select2({
                placeholder: "Select a Province",
                allowClear: true
            });

            // Select2 Multiple
            $('.select2-multiple').select2();

            // Bootstrap Date Picker
            $('#simple-date1 .input-group.date').datepicker({
                format: 'dd/mm/yyyy',
                todayBtn: 'linked',
                todayHighlight: true,
                autoclose: true,
            });

            $('#simple-date2 .input-group.date').datepicker({
                startView: 1,
                format: 'dd/mm/yyyy',
                autoclose: true,
                todayHighlight: true,
                todayBtn: 'linked',
            });

            $('#simple-date3 .input-group.date').datepicker({
                startView: 2,
                format: 'dd/mm/yyyy',
                autoclose: true,
                todayHighlight: true,
                todayBtn: 'linked',
            });

            $('#simple-date4 .input-daterange').datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true,
                todayHighlight: true,
                todayBtn: 'linked',
            });

            // TouchSpin

            $('#touchSpin1').TouchSpin({
                min: 0,
                max: 100,
                boostat: 5,
                maxboostedstep: 10,
                initval: 0
            });

            $('#touchSpin2').TouchSpin({
                min:0,
                max: 100,
                decimals: 2,
                step: 0.1,
                postfix: '%',
                initval: 0,
                boostat: 5,
                maxboostedstep: 10
            });

            $('#touchSpin3').TouchSpin({
                min: 0,
                max: 100,
                initval: 0,
                boostat: 5,
                maxboostedstep: 10,
                verticalbuttons: true,
            });

            $('#clockPicker1').clockpicker({
                donetext: 'Done'
            });

            $('#clockPicker2').clockpicker({
                autoclose: true
            });

            let input = $('#clockPicker3').clockpicker({
                autoclose: true,
                'default': 'now',
                placement: 'top',
                align: 'left',
            });

            $('#check-minutes').click(function(e){
                e.stopPropagation();
                input.clockpicker('show').clockpicker('toggleView', 'minutes');
            });

        });
    </script>

@endsection
