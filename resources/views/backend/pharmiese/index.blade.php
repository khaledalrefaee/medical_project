@extends('backend.index')
@section('content')




    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    @can('pharmacy create')
                        <a href="{{route('create.pharmese')}}">   <button type="button" class="btn btn-outline-success mb-1">create</button></a>
                    @endcan

                <h6 class="m-0 font-weight-bold text-primary">PhariseeTables</h6>
                <input type="text" id="myInput" onkeyup='tableSearch()' placeholder="search">
            </div>


    <div class="table-responsive p-3">
        <table class="table" id="myTable" data-filter-control="true" data-show-search-clear-button="true">
            <tr>
                <th >name</th>
                <th > Pries</th>
                <th >description</th>
                <th >Actions</th>
            </tr>

            <tbody>
            @foreach($phamiese as $phamies)
                <tr class="odd">
                    <td>{{$phamies->name}}</td>
                    <td>{{$phamies->prise}} SYP</td>
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
