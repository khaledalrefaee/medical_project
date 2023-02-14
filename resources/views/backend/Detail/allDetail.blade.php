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

                        <form action="{{route('Filter_Doctoer')}}" method="POST">
                            @csrf
                            <select class="selectpicker" data-style="btn-info" name="doctor_id" required
                                    onchange="this.form.submit()">
                                <option value="" selected disabled>Search By Doctoer</option>
                                @foreach ($Doctoers as $Doctoer)
                                    <option value="{{ $Doctoer->id }}">{{ $Doctoer->name }}</option>
                                @endforeach
                            </select>
                        </form>
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                                        <thead>
                                        <tr>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">name Doctoer</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">specialization</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">phone</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">email</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="">Actions</th></tr>
                                        </thead>
                                        <tbody>

                                            @if (isset($details))

                                            <?php $details = $details; ?>
                                        @else

                                            <?php   $details = $details; ?>
                                        @endif




                                        @foreach($details as $detail)
                                            <tr class="odd">
                                                <td>{{$detail->doctor->name}}</td>
                                                <td>{{$detail->specialization}}</td>
                                                <td>{{$detail->phone}}</td>
                                                <td>{{$detail->email}}</td>

                                                <td style="">


                                                    <a href=""> &nbsp;<button type="button" class="btn btn btn-outline-danger">delete</button> </a>
                                                    <a href=""> &nbsp;<button type="button" class="btn btn btn-outline-warning">edit</button> </a>
                                                    <a href="">  <button type="button" class="btn btn btn-outline-info">show</button></a>
                                                    &nbsp;
                                                </td>

                                            </tr>

                                        @endforeach
                                        </tbody>
                                        <tfoot>

                                        </tfoot>
                                        <br>
                                        <div></div>
                                        <a href="{{route('create.details')}}">   <button type="button" class="btn btn btn-primary">create</button></a>

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

@endsection
