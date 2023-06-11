@extends('backend.index')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users Management</h2>
            <br>
        </div>

        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <div class="pull-right">
                    <a class="btn btn-outline-success" href="{{ route('users.create') }}"> Create New User</a>
                    </div>
                    <h6 class="m-0 font-weight-bold text-primary">All UsersTables</h6>
                    <input type="text" id="myInput" onkeyup='tableSearch()' placeholder="search">
                </div>
            </div>



@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table id="myTable" class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Roles</th>
        <th>status</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($data as $key => $user)
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                        <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                @endif
            </td>
           <td >
                  <span class="badge
                    @if($user->status === 'active')  badge-success
                      @elseif($user->status === 'not active')  badge-danger
                        @endif">

                        @if($user->status === 'active')
                          active
                        @elseif($user->status === 'not active')
                          not active
                      @endif
                   </span>
           </td>
            <td>
                <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
</table>

            {{ $data->links('pagination::bootstrap-4') }}



<p class="text-center text-primary"></p>
@endsection
