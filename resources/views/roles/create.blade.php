
@extends('backend.index')
@section('content')

    <style>
        .checkbox-label {
            display: inline-block;
            margin-right: 10px;
            font-size: 16px;
            line-height: 24px;
            color: #333;
        }

        .checkbox-input {
            display: inline-block;
            width: 18px;
            height: 18px;
            margin-right: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            vertical-align: middle;
        }

        .checkbox-input:checked {
            background-color: #007bff;
            border-color: #007bff;
        }

        .checkbox-input:checked:after {
            content: '\2713';
            display: block;
            color: #fff;
            font-size: 14px;
            line-height: 18px;
            text-align: center;
        }

        .checkbox-text {
            display: inline-block;
            vertical-align: middle;
        }
    </style>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Role</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
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


{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permission:</strong>
            <br/>
            <div>
                @foreach($permission as $value)
                    <label class="checkbox-label">
                        <input type="checkbox" name="permission[]" value="{{ $value->id }}" class="checkbox-input">
                        <span class="checkbox-text">{{ $value->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}


@endsection
