@extends('backend.index')
@section('content')
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Update Medicine </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form novalidate="novalidate" action="{{route('update.pharmese',$phamies->id)}}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <strong>Medicine Name:</strong>
                        <input type="text" name="name"class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"  value="{{$phamies->name}}"  placeholder="Enter name clincs">

                    @error('name')
                    <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Medicine Prise :</strong>
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                        <input type="text" class="form-control  @error('prise') is-invalid @enderror" name="prise"  value="{{$phamies->prise}}"  placeholder="prise">
                            <span class="input-group-text">.00</span>
                            @error('prise')
                            <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>
                </div>

                <div class="form-group">
                    <strong>Description :</strong>
                        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="exampleInputPassword1"  value="{{$phamies->description}}"  placeholder="description">
                    @error('description')
                    <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Go!</button>
                        </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection

