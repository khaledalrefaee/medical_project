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

                        <div class="card-body">
                            <a href="{{route('Retreat.clincs')}}"> <button class="btn btn-primary">Retreat</button></a>

                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">
                                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                            <thead>

                                            @if ($doctors->isEmpty())
                                                <p>No doctors found for this clinic.</p>
                                            @else
                                            <tr>
                                                <th >name doctor</th>
                                                <th >specialization</th>
                                                <th >phone doctor</th>
                                                <th >email doctor</th>
                                            </tr>
                                            </thead>
                                            <tbody>


                                                <tr>


                                                    @foreach ($clinic->doctor as $doctor)
                                                    <td>{{ $doctor->name }}</td>
                                                    <td>{{ $doctor->detail->specialization }}</td>
                                                        <td>{{ $doctor->detail->phone }}</td>
                                                        <td>{{ $doctor->detail->email }}</td>
                                                </tr>
                                                    @endforeach


                                            </tbody>
                                            <tfoot>

                                            </tfoot>
                                            <br>
                                            <div></div>


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
    @endif
@endsection
