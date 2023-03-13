@extends('backend.index')
@section('content')



    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"/>


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
                            <h3 class="card-title">DataTable for Doctor</h3>
                        </div>


                        <!-- /.card-header -->


                        <div class="card-body">
                            <form action="{{ route('Filter_Clinces') }}" method="POST">
                                {{ csrf_field() }}
                                <select class="selectpicker" data-style="btn-info" name="clinic_id" required
                                        onchange="this.form.submit()">
                                    <option value="" selected disabled>Search By Clinces</option>
                                    @foreach ($clinic as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </form>
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">
                                        <div class="main-content">
                                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                            <thead>
                                            <tr>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">#</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">name Clinic</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">name doctoer</th>

                                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="">Actions</th></tr>
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





                                                    <td style="">

                                                        @can('doctor-delete')
                                                        <a href="{{route('delete.doctor', $doctor->id)}}"> &nbsp;<button type="button" class="btn btn btn-outline-danger">delete</button> </a>
                                                        @endcan

                                                        @can('doctor-edit')
                                                        <a href="{{route('edit.doctor', $doctor->id)}}"> &nbsp;<button type="button" class="btn btn btn-outline-warning">edit</button> </a>
                                                            @endcan
{{--                                                            @can('doctor-show')--}}
                                                                <a href="{{route('show.doctor', $doctor->id)}}">  <button type="button" class="btn btn btn-outline-info">show</button></a>
{{--                                                        &nbsp;@endcan--}}
                                                    </td>
                                                    @endforeach
                                                </tr>


                                            </tbody>
                                            <tfoot>

                                            </tfoot>
                                            <br>
                                            <div></div>
                                            @can('doctor-create')

                                            <a href="{{route('create.doctor')}}">   <button type="button" class="btn btn btn-primary">create</button></a>
                                            @endcan
                                        </table>
                                    </div>

                                </div>



                            </div>
                        </div>

                    </div>


@endsection
