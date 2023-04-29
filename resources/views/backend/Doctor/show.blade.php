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
                            <h3 class="card-title">Show Information Doctor</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">
                                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                            <thead>
                                            <tr>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">name Doctor</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Doctor email application</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Contact email</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">phone</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">specialization</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Actions</th>


                                            </thead>
                                            <tbody>


                                            <tr class="odd">

                                                <td>{{$doctor->doctor->name}}</td>
                                                <td>{{$doctor->doctor->email}}</td>
                                                <td>{{$doctor->email}}</td>
                                                <td>{{$doctor->phone}}</td>

                                                <td>{{$doctor->specialization}}</td>
                                                <td style="">
                                                    <a href="{{route('Retreat.doctor')}}"> <button class="btn btn-primary">Retreat</button></a>


                                                    &nbsp;
                                                </td>

                                            </tr>


                                            </tbody>
                                            <tfoot>

                                            </tfoot>



                                        </table>

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
