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
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">date</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">status</th>

                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="">Actions</th></tr>
                                            </thead>
                                            <tbody>

                                            <?php $i = 0; ?>

                                            @foreach($waitings as $waiting)
                                                <tr class="odd">
                                                    <?php $i++; ?>
                                                    </td>
                                                    <td>{{ $i }}</td>
                                                    <td>{{$waiting->name}}  </td>
                                                    <td>{{$waiting->doctor->name}} </td>
                                                    <td> </td>
                                                    <td> <span class="badge badge-pill badge-warning">wating</span></td>
                                                        <td>
                                                             @can('waiting-delete')
                                                            <a href="{{route('delete.wating',$waiting->id)}}" class="btn btn-danger" title="Delete Data"> &nbsp;<i title=" Delete"  class="fa fa-trash"></i></i></a>
                                                            @endcan

                                                            @can('waiting-show')
                                                            <a href="{{route('show.waitin',$waiting->id)}}" class="btn btn-info" title="show Data">  <i class="fa fa-eye"></i></i></a>
                                                            @endcan

                                                            @can('waiting-edit')
                                                            <a href="{{route('edit.waitin',$waiting->id)}}" class="btn btn-warning" title="edit Data"> &nbsp;<i class="fa fa-edit"></i> </a>
                                                            @endcan
                                                    </td>
                                                    @endforeach
                                                </tr>




                                                @foreach($Reservations as $Reservation)
                                                    <tr class="odd">
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
                                                            @can('Reservations-delete')
                                                            <a href="{{route('delete.appointment',$Reservation->id)}}" class="btn btn-danger" title="Delete Data"> <i title=" Delete"  class="fa fa-trash"></i></a>
                                                            @endcan


                                                                <a href="{{route('show.appointment',$Reservation->id)}}" class="btn btn-info" title="show Data"><i class="fa fa-eye"></i> </a>


                                                                @can('Reservations-edit')
                                                            <a href="{{route('edit.appointment',$Reservation->id)}}" class="btn btn-warning" title="edit Data"> &nbsp;<i class="fa fa-edit"></i></i> </a>
                                                                @endcan

                                                                @can('Reservations-completed')
                                                           <a href="{{route('Chnge.Status',$Reservation->id)}}"> <button type="button" class="btn btn-outline-success">completed</button></a>
                                                                @endcan

                                                                @can('Reservations-Cancelling')
                                                                    <a href="{{route('Chnge.Cancelling',$Reservation->id)}}" ><button type="button" class="btn btn-outline-light">Cancelling</button></a>
                                                                @endcan

                                                                @can('Reservations-Download')
                                                                    <a href="{{route('download.pdf',$Reservation->id)}}" class="btn btn-info"><i class="fas fa-download"></i> Download pdf</a>
                                                                @endcan
                                                        </td>
                                                        @endforeach
                                                    </tr>




                                            </tbody>



                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                Add a request
                                            </button>


                                            <!-- Modal -->
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
                                                            ...
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            @can('waiting-create')
                                                            <a href="{{route('create.waiting')}}" ><button type="button" class="btn btn-primary">waiting date</button></a>
                                                            @endcan

                                                            @can('Reservations-create')
                                                            <a href="{{route('create.appointment')}}"> <button type="button" class="btn btn-primary"> Reservation date</button></a>
                                                            @endcan
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </table>



{{--                                    Reservations--}}
{{--                                {{$Reservations ->links('pagination::bootstrap-4')}}--}}
{{--                                    waitings--}}
{{--                                {{$waitings ->links('pagination::bootstrap-4')}}--}}

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



