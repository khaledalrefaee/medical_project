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
                            @foreach($waitings as $waiting)
                                <tr >
                                    <?php $i++; ?>

                                    <td>{{ $i }}</td>
                                    <td>{{$waiting->name}}  </td>
                                    <td>{{$waiting->doctor->name}} </td>
                                    <td> {{$waiting->created_at}}</td>
                                        <td><span class="badge
                                                                                    @if($waiting->status === 'completed') badge-success
                                                                                    @elseif($waiting->status === 'Cancelling') badge-danger
                                                                                    @elseif($waiting->status === 'waiting') badge-warning
                                                                                    @else badge-secondary
                                                                                    @endif">

                                                                                    @if($waiting->status === 'completed')
                                                    completed
                                                @elseif($waiting->status === 'Cancelling')
                                                    Cancelling
                                                @elseif($waiting->status === 'waiting')
                                                    waiting
                                                @endif
                                                                 </span></td>
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

                                            <a href="{{route('Change.Status.waiting',$waiting->id)}}"> <button type="button" class="btn btn-outline-success">completed</button></a>

                                            <a href="{{route('Change.Cancelling.waiting',$waiting->id)}}" ><button type="button" class="btn btn-outline-dark">Cancelling</button></a>
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
                                           </span>
                                        </td>

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

                                    </tr>
                            @endforeach
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


    <script>
        // تحديث الصفحة كل 5 ثوانٍ
        setInterval(function() {
            location.reload();
        }, 15000); // 5000 ميلي ثانية تعادل 5 ثوانٍ
    </script>

@endsection



