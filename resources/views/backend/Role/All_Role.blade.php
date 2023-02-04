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
                            <h3 class="card-title">DataTable with minimal features &amp; hover style</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">
                                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                            <thead>
                                            <tr>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">name</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="">Actions</th></tr>
                                            </thead>
                                            <tbody>

                                            @foreach($roles as $role)
                                                <tr class="odd">
                                                    <td>{{$role->name}}</td>



                                                    <td style="">


                                                        <a href="{{route('delete.role'  , $role->id)}}"> &nbsp;<button type="button" class="btn btn btn-outline-danger">delete</button> </a>
                                                        <a href="{{route('edit.role', $role->id)}}"> &nbsp;<button type="button" class="btn btn btn-outline-warning">edit</button> </a>
                                                        <a href="{{route('show.role' , $role->id)}}">  <button type="button" class="btn btn btn-outline-info">show</button></a>
                                                        &nbsp;
                                                    </td>

                                                </tr>

                                            @endforeach
                                            </tbody>
                                            <tfoot>

                                            </tfoot>
                                            <br>
                                            <div></div>
                                            <a href="{{route('create.role')}}">   <button type="button" class="btn btn btn-primary">create</button></a>

                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->


                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
    </section>
@endsection
