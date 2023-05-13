@extends('backend.index')
@section('content')


    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                @can('Reservations create')
                <a href="{{route('create.appointment')}}"> <button type="button" class="btn btn-outline-success"> Add Appointment </button></a>
                @endcan
                    <h6 class="m-0 font-weight-bold text-primary">Daily Appointments</h6>
                    <input type="text" id="myInput" onkeyup='tableSearch()' placeholder="search">
            </div>
            <div class="table-responsive p-3">
                <table class="table" id="myTable" data-filter-control="true" data-show-search-clear-button="true">                            <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th >name doctor</th>
                                <th >date</th>
                                <th >status</th>
                                <th >Action</th>
                            </tr>
                            </thead>

                            <?php $i = 0; ?>
                            <tbody>
                            <tr>
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
                                           </span>
                                        </td>

                                        <td>

                                                <a href="{{route('delete.appointment',$Reservation->id)}}" class="btn btn-danger" title="Delete Data"> <i title=" Delete"  class="fa fa-trash"></i></a>


                                                <a href="{{route('show.appointment',$Reservation->id)}}" class="btn btn-info" title="show Data"><i class="fa fa-eye"></i> </a>



                                                <a href="{{route('edit.appointment',$Reservation->id)}}" class="btn btn-warning" title="edit Data"> &nbsp;<i class="fa fa-edit"></i> </a>



                                                <a href="{{route('Chnge.Status',$Reservation->id)}}"> <button type="button" class="btn btn-outline-success">completed</button></a>



                                                <a href="{{route('Chnge.Cancelling',$Reservation->id)}}" ><button type="button" class="btn btn-outline-dark">Cancelling</button></a>



                                                <a href="{{route('download.pdf',$Reservation->id)}}" class="btn btn-info"><i class="fas fa-download"></i> Download pdf</a>

                                        </td>

                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                        {{ $Reservations->links('pagination::bootstrap-4') }}

                    </div>
                </div>
            </div>
        </div>
    </div>



    {{--   <!-- Add a script tag to include jQuery -->--}}

{{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}


{{--    <script>--}}
{{--        // Set the interval time in milliseconds--}}
{{--        var intervalTime = 5000;--}}

{{--        // Set the interval function--}}
{{--        setInterval(function() {--}}
{{--            // Perform an AJAX request--}}
{{--            $.ajax({--}}
{{--                url: '/Reservations',--}}
{{--                type: 'GET',--}}
{{--                success: function(data) {--}}
{{--                    // Update the content of the target element--}}
{{--                    $('#target-element').html(data);--}}
{{--                }--}}
{{--            });--}}
{{--        }, intervalTime);--}}
{{--    </script>--}}

@endsection



