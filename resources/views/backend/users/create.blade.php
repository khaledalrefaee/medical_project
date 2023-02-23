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

            <select name="role_id" id="inputStatus" class="form-control custom-select" >
                <option selected="" disabled="" >Role</option>
                @foreach($role as $item)
                <option value="{{$item->id}}">{{$item->name}} </option>
                @endforeach

            </select>
            @error('role_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

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
