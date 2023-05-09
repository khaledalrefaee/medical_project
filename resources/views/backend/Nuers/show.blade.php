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
                            <h3 class="card-title">Nurse details {{$nuer->name}} </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">
                                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                            <thead>
                                            <tr>
                                                <th >phone Nurse</th>
                                                <th >description</th>
                                                <th >Actions</th></tr>
                                            </thead>
                                            <tbody>


                                            <tr class="odd">
                                                <td>{{$nuer->phone}}</td>
                                                <td>{{$nuer->description}}</td>
                                                <td style="">
                                                    <a href="{{route('Retreat.nuers')}}"> <button class="btn btn-primary">Retreat</button></a>

                                                </td>

                                            </tr>


                                            </tbody>

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
