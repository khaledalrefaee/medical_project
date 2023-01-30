@extends('backend.index')
@section('content')

    <form action="{{route('store_user')}}" method="POST">
        @csrf

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Add user</h3>
        </div>
        <div class="card-body">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                </div>
                <input type="text" class="form-control" placeholder="Username"  value="{{ old('name') }}" class="@error('name') is-invalid @enderror" name="name">

            </div>  @error('name')
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

            <select name="gender" id="inputStatus" class="form-control custom-select" >
                <option selected="" disabled=""  value="{{ old('gender') }}" class="@error('gender') is-invalid @enderror">gender</option>

                <option >Male</option>
                <option >female</option>
                @error('gender')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </select>

            <br>
            <br>

            <div class="input-group mb-3">
                <input type="text" class="form-control" name="address"  value="{{ old('address') }}" class="@error('address') is-invalid @enderror" placeholder="address">
                @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-check"></i></span>
                </div>
            </div>

            <div class="input-group mb-3">
                <input type="date" class="form-control" name="age"  value="{{ old('age') }}" class="@error('age') is-invalid @enderror" placeholder="Birthday">
                @error('age')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-check"></i></span>
                </div>
            </div>

            <select name="role_name" id="inputStatus" class="form-control custom-select">
                <option selected="" disabled=""  value="{{ old('role_name') }}" class="@error('role_name') is-invalid @enderror">Role</option>
                @error('role_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <option >Admin</option>
                <option >Receptionist</option>
                <option >User</option>
            </select>

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
