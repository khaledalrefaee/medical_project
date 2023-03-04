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
                                    </div>

                                            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                            <thead>
                                            <tr>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">#</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">name</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">name docrtoer</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="">status</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="">Actions</th></tr>
                                            </thead>
                                            <tbody>

                                            <?php $i = 0; ?>

                                            @foreach($appointmentSchedule as $Reservation)
                                                <tr class="odd">
                                                    <?php $i++; ?>
                                                    </td>
                                                    <td>{{ $i }}</td>
                                                        <td>{{$Reservation->name}}  </td>
                                                    <td>{{$Reservation->doctor->name}} </td>
                                                    <td style="">{{$Reservation->status}}</td>

                                                    @foreach($waitingSchedule as $item)
                                                    <?php $i++; ?>
                                                    </td>
                                                    <td>{{ $i }}</td>
                                                    <td>{{$item->name}}  </td>
                                                    <td>{{$item->doctor->name}} </td>


                                                        <a href=""> &nbsp;<button type="button" class="btn btn btn-outline-danger">delete</button> </a>
                                                        <a href=""> &nbsp;<button type="button" class="btn btn btn-outline-warning">edit</button> </a>
                                                        <a href="">  <button type="button" class="btn btn btn-outline-info">show</button></a>
                                                    </td>

                                                </tr>

                                            @endforeach
                                            @endforeach

                                            </tbody>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                Launch demo modal
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ...
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <a href="{{route('')}}" ><button type="button" class="btn btn-primary">waiting date</button></a>
                                                            <button type="button" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>



@endsection


