@extends('backend.index')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit New User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


{!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Phone:</strong>
            <div class="input-group">
                <span class="input-group-text">00963</span>
                {!! Form::text('phone', null, array('placeholder' => 'Phone','class' => 'form-control')) !!}
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>Password:</strong>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
        </div>
    </div>
</div>



<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <strong>address:</strong>
            {!! Form::text('address', null, array('placeholder' => 'address','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
        <strong>birthday:</strong>
        <input type="date" class="form-control" name="birthday"  value="{{$user->birthday}}"  class="@error('birthday') is-invalid @enderror" placeholder="Birthday">
    </div>
    </div>
</div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Gender:</strong>
                    <select name="gender_id" id="inputStatus" class="form-control custom-select">
                        <option selected disabled>Gender</option>
                        @foreach($gender as $item)
                            <option value="{{$item->id}}" {{$item->id == $user->gender_id ? 'selected' : ''}}>{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Account Status:</strong>
                    <select name="status" id="inputStatus" class="form-control custom-select">
                        <option disabled selected>Select status</option>
                        <option value="active" {{$user->status === 'active' ? 'selected' : ''}}>Active</option>
                        <option value="not active" {{$user->status === 'not active' ? 'selected' : ''}}>Not Active</option>
                    </select>
                </div>
            </div>
        </div>


<div class="col-xs-12 col-sm-6 col-md-4">
    <div class="form-group">
        <strong>Role:</strong>
        {!! Form::select('role_name[]', $roles, $userRole, array('class' => 'form-control', 'multiple')) !!}
    </div>
</div>


<div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}


<p class="text-center text-primary"></p>
@endsection
