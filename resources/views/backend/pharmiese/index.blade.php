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
                            <div class="container-fluid">



                            </div>
                        </div>
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                        <thead>
                                        <tr>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">name</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"> Pries</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">description</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="">Actions</th></tr>
                                        </thead>
                                        <tbody>

                                        @foreach($phamiese as $phamies)
                                            <tr class="odd">
                                                <td>{{$phamies->name}}</td>
                                                <td>{{$phamies->prise}}</td>
                                                <td>{{$phamies->description}}</td>
                                                <td style="">
                                                    @can('pharmese-delete')
                                                    <a href="{{route('delete.pharmese',$phamies->id)}}"> &nbsp;<button type="button" class="btn btn btn-outline-danger">delete</button> </a>
                                                    @endcan

                                                    @can('pharmese-edit')
                                                    <a href="{{route('edit.pharmese',$phamies->id)}}"> <button type="button" class="btn btn btn-outline-warning">edit</button> </a>
                                                    &nbsp;@endcan
                                                </td>

                                            </tr>

                                        @endforeach
                                        </tbody>
                                        <tfoot>

                                        </tfoot>
                                        <br>
                                        <div></div>

                                        @can('pharmese-create')
                                        <a href="{{route('create.pharmese')}}">   <button type="button" class="btn btn btn-primary">create</button></a>
                                        @endcan
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
