@extends('backend.index')
@section('content')


    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                @can('nurse create')
                    <a href="{{route('create.nuers')}}">
                        <button type="button" class="btn btn-outline-success mb-1">create</button></a>
                @endcan


                <h6 class="m-0 font-weight-bold text-primary">NurseTables</h6>
                    <input type="text" id="myInput" onkeyup='tableSearch()' placeholder="Name">
            </div>


            <div class="table-responsive p-3">
                <table class="table" id="myTable" data-filter-control="true" data-show-search-clear-button="true">
                    <tr>
                        <th>Name</th>
                        <th>phone nurse</th>
                        <th>description</th>
                        <th>image</th>
                        <th>Actions </th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        @foreach($nuers as $nuer)
                            <td>{{$nuer->name}}</td>
                            <td>{{$nuer->phone}}</td>
                            <td>{{$nuer->description}}</td>
                            <td><img  src="{{ asset('storage/' . $nuer->image) }}" alt="{{ $nuer->name }}" style="width: 100px;height: 100px"></td>
                            <td>
                                @can('nurse delete')
                                <a href="{{route('delet.nuers'  , $nuer->id)}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                @endcan
                                @can('nurse edit')
                                <a href="{{route('edit.nuers', $nuer->id)}}" class="btn btn-warning btn-sm"><i class="fas fa-exclamation-triangle"></i></a>
                                @endcan
                                @can('nurse show')
                                <a href="{{route('show.nuers' , $nuer->id)}}" class="btn btn-info btn-sm"><i class="fas fa-info-circle"></i></a>
                                @endcan
                            </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
