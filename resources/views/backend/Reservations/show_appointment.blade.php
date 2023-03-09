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
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">email User</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">name</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">time</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">phone</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">address</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">birthday</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">diagnosis</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">status</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Action</th>



                                            </thead>
                                            <tbody>


                                            <tr class="odd">
                                                <td>{{$Reservation->user->email}}</td>
                                                <td>{{$Reservation->name}}</td>
                                                <td>{{$Reservation->date}} | {{$Reservation->time}}</td>
                                                <td>{{$Reservation->phone}}</td>
                                                <td>{{$Reservation->address}}</td>
                                                <td>{{$Reservation->birthday}}</td>
                                                <td>{{$Reservation->diagnosis}}</td>
                                                <td><span class="badge
                                                                                    @if($Reservation->status === 'completed') badge-success
                                                                                    @elseif($Reservation->status === 'Cancelling') badge-danger
                                                                                    @elseif($Reservation->status === 'Pending') badge-warning
                                                                                    @else badge-secondary
                                                                                     @endif">
                                                                                    @if($Reservation->status === 'completed')
                                                                                     completed
                                                                                    @elseif($Reservation->status === 'Cancelling')
                                                                                    Cancelling
                                                                                    @elseif($Reservation->status === 'Pending')
                                                                                    Pending
                                                                                    @endif</td>
                                                <td style="">
                                                    <a href="{{route('Retreat.appointment')}}"> <button class="btn btn-primary">Retreat</button></a>&nbsp;



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
