@extends('backend.index')
@section('content')


    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                <h6 class="m-0 font-weight-bold text-primary">Deleted appointments</h6>
                <input type="text" id="myInput" onkeyup='tableSearch()' placeholder="search">
            </div>
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">
                        <div class="main-content">
                                        <table id="myTable" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                            <thead>
                                            <tr>
                                                <th >name Doctor</th>
                                                <th >name patient</th>
                                                <th >date</th>
                                                <th >phone</th>
                                                <th >address</th>
                                                <th >birthday</th>
                                                <th >status</th>
                                                <th >Cansel</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="odd">
                                                @foreach($Reservations as $Reservation)
                                                    <td>{{ $Reservation->doctor->name }}</td>
                                                <td>{{$Reservation->name}}</td>
                                                <td>{{$Reservation->date}} | {{$Reservation->time}}</td>
                                                <td>{{$Reservation->phone}}</td>
                                                <td>{{$Reservation->address}}</td>
                                                <td>{{$Reservation->birthday}}</td>
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

                                                <td>{{$Reservation->deleted_at}}</td>


                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
                        <!-- /.container-fluid -->
    </section>
@endsection
