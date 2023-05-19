@extends('backend.index')
@section('content')


    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            @can('Add a request')
                <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#exampleModal">
                        Add a request
                    </button>
                @endcan
                <h6 class="m-0 font-weight-bold text-primary">All appointments</h6>
                <input type="text" id="myInput" onkeyup='tableSearch()' placeholder="Name">
            </div>
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">
                        <div class="main-content">
                                            <table id="myTable" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>name</th>
                                                <th >name doctor</th>
                                                <th >date</th>
                                                <th >status</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php $i = 0; ?>

                                            @foreach($waitings as $waiting)
                                                <tr >
                                                      <?php $i++; ?>

                                                    <td>{{ $i }}</td>
                                                    <td>{{$waiting->name}}  </td>
                                                    <td>{{$waiting->doctor->name}} </td>
                                                    <td> {{$waiting->created_at}}</td>
                                                    <td> <span class="badge badge-pill badge-warning">waiting</span></td>
                                                        <td>
                                                            @can('waiting delete')
                                                            <a href="{{route('delete.wating',$waiting->id)}}" class="btn btn-danger" title="Delete Data"> &nbsp;<i title=" Delete"  class="fa fa-trash"></i></a>
                                                            @endcan
                                                            @can('waiting show')
                                                            <a href="{{route('show.waitin',$waiting->id)}}" class="btn btn-info" title="show Data">  <i class="fa fa-eye"></i></a>
                                                            @endcan
                                                            @can('waiting edit')
                                                            <a href="{{route('edit.waitin',$waiting->id)}}" class="btn btn-warning" title="edit Data"> &nbsp;<i class="fa fa-edit"></i> </a>
                                                            @endcan
                                                        </td>
                                                    @endforeach
                                                </tr>


                                                @foreach($Reservations as $Reservation)
                                                    <tr>
                                                        <?php $i++; ?>

                                                        <td>{{ $i }}</td>
                                                        <td>{{$Reservation->name}}  </td>
                                                            <td>{{$Reservation->doctor->name}} </td>
                                                        <td>{{$Reservation->date}} | {{$Reservation->time}}</td>

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
                                                                                    @endif
                                                                 </span></td>
                                                        <td>
                                                                @can('Reservations delete')
                                                                <a href="{{route('delete.appointment',$Reservation->id)}}" class="btn btn-danger" title="Delete Data"> <i title=" Delete"  class="fa fa-trash"></i></a>
                                                                @endcan
                                                                @can('Reservations show')
                                                                <a href="{{route('show.appointment',$Reservation->id)}}" class="btn btn-info" title="show Data"><i class="fa fa-eye"></i> </a>
                                                                @endcan

                                                                @can('Reservations edit')
                                                                <a href="{{route('edit.appointment',$Reservation->id)}}" class="btn btn-warning" title="edit Data"> &nbsp;<i class="fa fa-edit"></i> </a>
                                                                @endcan

                                                                @can('Reservations completed')
                                                                 <a href="{{route('Chnge.Status',$Reservation->id)}}"> <button type="button" class="btn btn-outline-success">completed</button></a>
                                                                @endcan

                                                                @can('Reservations Cancelling')
                                                                <a href="{{route('Chnge.Cancelling',$Reservation->id)}}" ><button type="button" class="btn btn-outline-dark">Cancelling</button></a>
                                                                @endcan

                                                                @can('Reservations Download')

                                                                <a href="{{route('download.pdf',$Reservation->id)}}" class="btn btn-info"><i class="fas fa-download"></i> Download pdf</a>
                                                                @endcan
                                                        </td>
                                                        @endforeach
                                                </tr>
                                      </tbody>
                              </table>
                            <br>
                            {{ $Reservations->links('pagination::bootstrap-4') }}
                            {{ $waitings->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> appointment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                        @can('waiting create')
                            <a href="{{route('create.waiting')}}" ><button type="button" class="btn btn-outline-warning">waiting date</button></a>
                        @endcan

                        @can('Reservations create')
                            <a href="{{route('create.appointment')}}"> <button type="button" class="btn btn-outline-success"> Reservation date</button></a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>


   {{--   <!-- Add a script tag to include jQuery -->--}}

{{--   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}


{{--        <script>--}}
{{--            // Set the interval time in milliseconds--}}
{{--            var intervalTime = 5000;--}}

{{--            // Set the interval function--}}
{{--            setInterval(function() {--}}
{{--                // Perform an AJAX request--}}
{{--                $.ajax({--}}
{{--                    url: '/Reservations',--}}
{{--                    type: 'GET',--}}
{{--                    success: function(data) {--}}
{{--                        // Update the content of the target element--}}
{{--                        $('#target-element').html(data);--}}
{{--                    }--}}
{{--                });--}}
{{--            }, intervalTime);--}}
{{--        </script>--}}

@endsection



