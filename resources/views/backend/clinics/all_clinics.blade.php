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
                            <h3 class="card-title">DataTable Clinic</h3>
                        </div>

                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <input type="text" id="myInput" onkeyup='tableSearch()' placeholder="Name">

                            <h6 class="m-0 font-weight-bold text-primary">ClinicTables</h6>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">
                                        <table class="table" id="myTable" data-filter-control="true" data-show-search-clear-button="true">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>description</th>
                                                <th>Actions </th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <tr>
                                            @foreach($clinics as $clinic)

                                                    <td>{{$clinic->name}}</td>

                                                    <td>{{$clinic->description}}</td>


                                                    <td >



                                                        @can('clinic edit')
                                                            <a href="{{route('edit.Clincs', $clinic->id)}}"> <button type="button" class="btn btn btn-outline-warning">edit</button> </a>
                                                        @endcan

                                                        @can('clinic show')
                                                        <a href="{{route('show.clincs' , $clinic->id)}}">  <button type="button" class="btn btn btn-outline-info">show</button> </a>
                                                        @endcan

                                                        @can('clinic delete')
                                                        <a href="{{route('delete.Clinics' , $clinic->id)}}">  <button type="button" class="btn btn btn-outline-danger">Delete</button> </a>
                                                        @endcan

                                                    </td>


                                            </tr>
                                            @endforeach

                                            </tbody>

                                            <br>

                                            @can('clinic create')
                                            <a href="{{route('create.clincs')}}">   <button type="button" class="btn btn btn-primary">create</button></a>
                                            @endcan

                                            @can('clinic show Delete')
                                            <a href="{{route('show.delete.Clincs')}}">   <button type="button" class="btn btn btn-outline-danger">show delete</button></a>
                                            @endcan

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection
