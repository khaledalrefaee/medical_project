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
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password:</strong>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <div class="input-group-append">
                <span class="input-group-text" >00963</span>

                <strong>phone:</strong>
                {!! Form::text('phone', null, array('placeholder' => 'phone','class' => 'form-control')) !!}
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>address:</strong>
            {!! Form::text('address', null, array('placeholder' => 'address','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="input-group mb-3">
        <input type="date" class="form-control" name="birthday"  value="{{$user->birthday}}"  class="@error('birthday') is-invalid @enderror" placeholder="Birthday">

        <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-check"></i></span>
        </div>
    </div>
    <select name="gender_id" id="inputStatus" class="form-control custom-select" >
        <option selected="" disabled="" >gender </option>
        @foreach($gender as $item)
            <option value="{{$item->id}} "{{$item->id == $user->gender_id ? 'selected' : ""}}>{{$item->name}} </option>
        @endforeach

    </select>
    <br>

    <select name="status" id="inputStatus" class="form-control custom-select" >
        <option selected="" disabled="" >status </option>
            <option value="active">active </option>
            <option value="not active">not active </option>
    </select>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Role:</strong>
            {!! Form::select('role_name[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection
