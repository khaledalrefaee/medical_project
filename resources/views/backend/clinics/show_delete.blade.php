@extends('backend.index')
@section('content')


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Deleted clinics</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">
                                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                            <thead>
                                            <tr>
                                                <th >name</th>
                                                <th >description</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($clinics as $clinic)
                                                    <tr class="odd">
                                                    <td>{{$clinic->name}}</td>
                                                    <td>{{$clinic->description}}</td>
                                            @endforeach


                                            </tr>


                                            </tbody>
                                            <tfoot>

                                            </tfoot>
                                            <br>

                                            <a href="{{route('all.Clincs')}}">   <button type="button" class="btn btn btn-primary">back</button></a>

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
