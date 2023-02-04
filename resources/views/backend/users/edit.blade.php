@extends('backend.index')
@section('content')


    <form action="{{route('update_user',$user->id)}}" method="POST">
        @csrf

        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Add user</h3>
            </div>
            <br>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username"  value="{{$user->name}}" class="@error('name') is-invalid @enderror" name="name">

                </div>  @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>

                    <input type="email" class="form-control" name="email"  value="{{$user->email}}" class="@error('email') is-invalid @enderror" placeholder="Email">
                </div>
                @error('email')
                <div class="alert alert-danger">{{ $message }}
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">

                    </div>

                    <input type="password" class="form-control" name="password"  value="{{$user->password}}" class="@error('password') is-invalid @enderror" placeholder="password">
                </div>
                @error('password')
                <div class="alert alert-danger">{{ $message }}
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text" >00963</span>
                    </div>
                    <input type="number" class="form-control" name="phone" value="{{$user->phone}}" class="@error('phone') is-invalid @enderror" placeholder="number phone">
                </div>
                @error('phone')
                <div class="alert alert-danger">{{ $message }}
                    @enderror
                </div>

                <select name="gender" id="inputStatus" class="form-control custom-select" value="{{$user->gender}}">
                    <option selected="" disabled=""   >gender</option>

                    <option  value="Male">Male</option>
                    <option  value="female">female</option>

                </select>

                <br>
                <br>

                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="address"  value="{{$user->address}}" class="@error('address') is-invalid @enderror" placeholder="address">

                    @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </div>

                <div class="input-group mb-3">
                    <input type="date" class="form-control" name="age"  value="{{$user->birthday}}" class="@error('birthday') is-invalid @enderror" placeholder="Birthday">
                    @error('abirthday')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-check"></i></span>
                    </div>
                </div>

                <select name="role_id" id="inputStatus" class="form-control custom-select" >
                    <option selected="" disabled="" > Role </option>
                    @foreach($role as $item)
                        <option value="{{$item->id}}">{{$item->name}} </option>
                    @endforeach
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
