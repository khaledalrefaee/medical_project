@extends('backend.index')
@section('content')

    <form action="{{route('mail.store')}}"method="post">
        @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">name </label>
        <input type="text" class="form-control" id="name"  value="{{ old('name') }}" name="name" placeholder="email@gamil.net">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Notes</label>
        <textarea class="form-control" id="exampleFormControlTextarea1"   name="text" rows="3" ></textarea>
        @error('text')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
        <button type="submit" class="btn btn-dark">send massage</button>
        <br>
    </form>
@endsection
