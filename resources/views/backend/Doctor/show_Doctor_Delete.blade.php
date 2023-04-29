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
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">name Doctor</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Doctor email application </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">name Clinic</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">specialization Doctor</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">phone Doctor</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">email Doctor</th>



                                            </thead>
                                            <tbody>

                                            @foreach( $deletedDetails as $detail)

                                                <tr class="odd">

                                                    <td>{{ $detail->name }}</td>
                                                    <td>{{ $detail->email }}</td>
                                                    <td> {{$detail->clinic->name }}</td>
                                                    <td>{{$detail->detail->specialization}}</td>
                                                    <td>{{$detail->detail->phone}}</td>
                                                    <td>{{$detail->detail->email}}</td>

                                                    @endforeach

                                            </tr>


                                            </tbody>

                                            <tfoot>

                                            </tfoot>
                                            <a href="{{route('all_doctor')}}">   <button type="button" class="btn btn btn-primary">Back</button></a>



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

@endsection
