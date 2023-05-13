@extends('backend.index')
@section('content')



    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    @can('doctor create')
                        <a href="{{route('create.doctor')}}">   <button type="button" class="btn btn-outline-success">create</button></a>
                    @endcan

                <h6 class="m-0 font-weight-bold text-primary">DoctorTables</h6>
                <input type="text" id="myInput" onkeyup='tableSearch()' placeholder="search">
            </div>

            <div class="card-body d-flex justify-content-between">
                <form action="{{ route('Filter_Clinces') }}" method="POST">
                    {{ csrf_field() }}
                    <select class="selectpicker form-control" data-style="btn-info" name="clinic_id" required onchange="this.form.submit()">
                        <option value="" selected disabled>Search By Clinic</option>
                        @foreach ($clinic as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </form>

                @can('doctor show Delete')
                    <a href="{{ route('show.delete.doctor') }}">
                        <button type="button" class="btn btn btn-outline-danger">show delete</button>
                    </a>
                @endcan
            </div>

            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">
                                        <div class="main-content">
                                            <table id="myTable" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                            <thead>
                                            <tr>
                                                <th >#</th>
                                                <th >name Clinic</th>
                                                <th >name doctor</th>
                                                <th >Actions</th></tr>
                                            </thead>
                                            <tbody>

                                            @if (isset($details))
                                                <?php $doctors = $details; ?>
                                            @else
                                                <?php   $doctors = $doctors; ?>
                                            @endif



                                    @foreach( $doctors as $doctor)

                                                <tr class="odd">
                                                    <td>{{ $loop->index+1 }}</td>
                                                    <td>{{$doctor->clinic->name}}</td>
                                                    <td>{{$doctor->name}}</td>
                                                    <td>
                                                        @can('doctor delete')
                                                            <a href="{{route('delete.doctor', $doctor->id)}}"> &nbsp;<button type="button" class="btn btn btn-outline-danger">delete</button> </a>
                                                        @endcan

                                                        @can('doctor edit')
                                                            <a href="{{route('edit.doctor', $doctor->id)}}"> &nbsp;<button type="button" class="btn btn btn-outline-warning">edit</button> </a>
                                                        @endcan

                                                        @can('doctor show')
                                                            <a href="{{route('show.doctor', $doctor->id)}}">  <button type="button" class="btn btn btn-outline-info">show</button></a>
                                                        @endcan

                                                    </td>

                                                </tr>
                                    @endforeach
                                            </tbody>
                                            <br>


                                        </table>
                                    </div>

                                </div>



                            </div>
                        </div>

                    </div>



@endsection
