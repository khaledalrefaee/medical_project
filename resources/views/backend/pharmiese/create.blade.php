@extends('backend.index')
@section('content')
    <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">ADD Medicine </h3>
            </div>
            <form id="quickForm" novalidate="novalidate" action="{{route('store.pharmese')}}" method="POST" >
                @csrf

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <strong>Medicine Name:</strong>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1"  value="{{ old('name') }}"  placeholder="Enter name medicine">
                        @error('name')
                        <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Medicine Prise :</strong>
                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                            <input type="text" class="form-control @error('prise') is-invalid @enderror" name="prise"  value="{{ old('prise') }}" placeholder="prise medicine">
                                <span class="input-group-text">.00</span>

                                @error('prise')
                            <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>


                    <div class="form-group">
                        <strong>Description :</strong>
                        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="exampleInputPassword1"  value="{{ old('description') }}"  placeholder="description medicine">

                    @error('description')
                <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                    @enderror


                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">GO!</button>
                        </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
@endsection

