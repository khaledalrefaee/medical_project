@extends('backend.index')
@section('content')


    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                @can('clinic create')
                    <a href="{{route('create.clincs')}}">   <button type="button" class="btn btn-outline-success">create</button></a>
                @endcan


                <h6 class="m-0 font-weight-bold text-primary">ClinicsTables</h6>
                <input type="text" id="myInput" onkeyup='tableSearch()' placeholder="search">
            </div>
                        <!-- /.card-header -->
            <div class="table-responsive p-3">
                <table class="table" id="myTable" data-filter-control="true" data-show-search-clear-button="true">
                    <tr>
                        <th>Name</th>
                        <th>description</th>
                        <th>Actions </th>
                    </tr>
                    <tbody>
                    <tr>
                        @foreach($clinics as $clinic)
                            <td>{{$clinic->name}}</td>
                            <td>{{$clinic->description}}</td>
                            <td>
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

                                            @can('clinic show Delete')
                                            <a href="{{route('show.delete.Clincs')}}">   <button type="button" class="btn btn btn-outline-danger">show delete</button></a>
                                            @endcan
                                            <br>
                    <br>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





@endsection
