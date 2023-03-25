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

                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <input type="text" id="myInput" onkeyup='tableSearch()' placeholder="Name">

                            <h6 class="m-0 font-weight-bold text-primary">NurseTables</h6>
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

                                                        @can('clinic delete')
                                                        <a href="{{route('delete.Clincs'  , $clinic->id)}}"> &nbsp;<button type="button" class="btn btn btn-outline-danger">delete</button> </a>
                                                        @endcan

                                                        @can('clinic edit')
                                                            <a href="{{route('edit.Clincs', $clinic->id)}}"> &nbsp;<button type="button" class="btn btn btn-outline-warning">edit</button> </a>
                                                        @endcan

                                                        @can('clinic show')
                                                        <a href="{{route('show.clincs' , $clinic->id)}}">  <button type="button" class="btn btn btn-outline-info">show</button></a>
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
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->


    </section>
{{--    <script type="application/javascript">--}}
{{--        function tableSearch() {--}}
{{--            let input, filter, table, tr, td, txtValue;--}}

{{--            //Intialising Variables--}}
{{--            input = document.getElementById("myInput");--}}
{{--            filter = input.value.toUpperCase();--}}
{{--            table = document.getElementById("myTable");--}}
{{--            tr = table.getElementsByTagName("tr");--}}

{{--            for (let i = 0; i < tr.length; i++) {--}}
{{--                td = tr[i].getElementsByTagName("td")[0];--}}
{{--                if (td) {--}}
{{--                    txtValue = td.textContent || td.innerText;--}}
{{--                    if (txtValue.toUpperCase().indexOf(filter) > -1) {--}}
{{--                        tr[i].style.display = "";--}}
{{--                    } else {--}}
{{--                        tr[i].style.display = "none";--}}
{{--                    }--}}
{{--                }--}}
{{--            }--}}

{{--        }--}}
{{--    </script>--}}

@endsection
