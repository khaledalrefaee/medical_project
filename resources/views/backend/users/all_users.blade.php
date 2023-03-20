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


                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><table class="row"><div class="col-sm-12">


                                        <table id="myTable" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                          @can('user employee create')
                                            <a href="{{route('create_user')}}"> <button class="btn btn-primary">create User</button></a>
                                            @endcan
                                                <thead>
                                            <tr>
                                                <th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" /></th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">#</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">name</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">email</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="">phone</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="">status</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="">Actions</th></tr>
                                            </thead>
                                            <tbody>

                                            <?php $i = 0; ?>

                                            @foreach($Users as $user)
                                                <tr class="odd">
                                                    <?php $i++; ?>
                                                        <td> <input type="checkbox"   value="{{$user->id }}" class="box1" id="checkbox">
                                                        </td>
                                                    <td>{{ $i }}</td>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td style="">{{$user->phone}}</td>
                                                        <td > <label class="badge badge-success">{{ $user->status }}</label></td>

                                                        <td style="">
                                                                 @can('user employee delete')
                                                                <a href="{{route('delet_user',$user->id)}}"> &nbsp;<button type="button" class="btn btn btn-outline-danger">delete</button> </a>
                                                                @endcan

                                                                @can('user employee edit')
                                                                    <a href="{{route('edit_user',$user->id)}}"> &nbsp;<button type="button" class="btn btn btn-outline-warning">edit</button> </a>
                                                                @endcan

                                                                @can('user employee show')
                                                                <a href="{{url('/user/show',$user->id)}}">  <button type="button" class="btn btn btn-outline-info">show</button></a>
                                                                @endcan
                                                    </td>

                                                </tr>

                                            @endforeach

                                            </tbody>

                                        </table>



                                        {{$Users ->links('pagination::bootstrap-4')}}


                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>



    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection



