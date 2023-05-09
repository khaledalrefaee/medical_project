@extends('backend.index')
@section('content')





    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                @can('user employee create')
                    <a href="{{route('create_user')}}"> <button class="btn btn-primary">create User</button></a>
                @endcan


                <h6 class="m-0 font-weight-bold text-primary">UserTables</h6>
                <input type="text" id="myInput" onkeyup='tableSearch()' placeholder="search">
            </div>



            <div class="table-responsive p-3">
                <table class="table" id="myTable" data-filter-control="true" data-show-search-clear-button="true">
                    <tr>
                                                <th >#</th>
                                                <th >name</th>
                                                <th >email</th>
                                                <th >phone</th>
                                                <th >Age</th>
                                                <th >status</th>
                                              <th >Actions</th>
                                            </tr>
                                                </thead>
                                              <tbody>

                                            <?php $i = 0; ?>

                                            @foreach($Users as $user)
                                                <tr class="odd">
                                                    <?php $i++; ?>

                                                    <td>{{ $i }}</td>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td >{{$user->phone}}</td>



                                                        <td>{{ Carbon\Carbon::parse($user->birthday)->age }}</td>

                                                        <td > <label class="badge badge-success">{{ $user->status }}</label></td>

                                                        <td>
                                                                @can('user employee delete')
                                                                <a href="{{route('delet_user',$user->id)}}"> &nbsp;<button type="button" class="btn btn btn-outline-danger">delete</button> </a>
                                                                @endcan

                                                                @can('user employee edit')
                                                                <a href="{{route('edit_user',$user->id)}}"> &nbsp;<button type="button" class="btn btn btn-outline-warning">edit</button> </a>
                                                                @endcan

                                                                 <a href="{{route('show_user',$user->id)}}">  <button type="button" class="btn btn btn-outline-info">Show </button></a>

                                                    </td>

                                                </tr>

                                            @endforeach

                                            </tbody>

                                        </table>



                                        {{$Users ->links('pagination::bootstrap-4')}}


                        </div>
                    </div>



                </div>

            </div>
        </div>
            </div>
        </div>

    </section>




@endsection



