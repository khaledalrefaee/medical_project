@extends('backend.index')
@section('content')



    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">


            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <h3 class="card-title">DataTable </h3>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">


                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row">
                                    <div class="col-sm-12 col-md-6"></div>

                                </div>

                                    <div class="col-sm-12">

                                        <input type="text" id="myInput" onkeyup='tableSearch()' placeholder="Name">

                                        <table id="myTable" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                          @can('user employee create')
                                            <a href="{{route('create_user')}}"> <button class="btn btn-primary">create User</button></a>
                                            @endcan
                                                <thead>
                                            <tr>
                                                <th >#</th>
                                                <th >name</th>
                                                <th >email</th>
                                                <th >phone</th>
                                                <th >status</th>
                                              <th >Actions</th>
                                            </tr>
                                                </thead>
                                              <tbody>

                                            <?php $i = 0; ?>

                                            @foreach($Users as $user)
                                                <tr class="odd">
                                                    <?php $i++; ?>

                                                    <td>{{ $i }}</td>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td >{{$user->phone}}</td>
                                                        <td > <label class="badge badge-success">{{ $user->status }}</label></td>

                                                        <td>
                                                                @can('user employee delete')
                                                                <a href="{{route('delet_user',$user->id)}}"> &nbsp;<button type="button" class="btn btn btn-outline-danger">delete</button> </a>
                                                                @endcan

                                                                @can('user employee edit')
                                                                <a href="{{route('edit_user',$user->id)}}"> &nbsp;<button type="button" class="btn btn btn-outline-warning">edit</button> </a>
                                                                @endcan

                                                                 <a href="{{route('show_user',$user->id)}}">  <button type="button" class="btn btn btn-outline-info">Show </button></a>

                                                    </td>

                                                </tr>

                                            @endforeach

                                            </tbody>

                                        </table>



                                        {{$Users ->links('pagination::bootstrap-4')}}


                        </div>
                    </div>



                </div>

            </div>
        </div>
            </div>
        </div>

    </section>




@endsection



