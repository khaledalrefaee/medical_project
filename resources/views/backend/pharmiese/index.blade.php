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
                            <div class="container-fluid">
                            </div>
                        </div>
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <input type="text" id="myInput" onkeyup='tableSearch()' placeholder="Name">

                                </div>
                                <div class="col-sm-12 col-md-6">

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table" id="myTable" data-filter-control="true" data-show-search-clear-button="true">
                                        <thead>
                                        <tr>
                                            <th >name</th>
                                            <th > Pries</th>
                                            <th >description</th>
                                            <th >Actions</th>
                                        </tr>

                                        </thead>
                                        <tbody>

                                        @foreach($phamiese as $phamies)
                                            <tr class="odd">
                                                <td>{{$phamies->name}}</td>
                                                <td>{{$phamies->prise}}</td>
                                                <td>{{$phamies->description}}</td>
                                                <td>

                                                    @can('pharmacy delete')
                                                    <a href="{{route('delete.pharmese',$phamies->id)}}"> <button type="button" class="btn btn btn-outline-danger">delete</button> </a>
                                                    @endcan

                                                    @can('pharmacy edit')
                                                    <a href="{{route('edit.pharmese',$phamies->id)}}"> <button type="button" class="btn btn btn-outline-warning">edit</button> </a>
                                                    @endcan
                                                </td>

                                            </tr>

                                        @endforeach
                                        </tbody>
                                        <tfoot>

                                        </tfoot>
                                        <br>
                                        <div></div>

                                        @can('pharmacy create')
                                        <a href="{{route('create.pharmese')}}">   <button type="button" class="btn btn btn-primary">create</button></a>
                                        @endcan
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
