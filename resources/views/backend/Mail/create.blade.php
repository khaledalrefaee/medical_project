@extends('backend.index')
@section('content')

    <form action="{{route('mail.store')}}"method="post">
        @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">name </label>
        <input type="email" class="form-control" id="name" name="name" placeholder="email@gamil.net">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Notes</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="text" rows="3"></textarea>
    </div>
        <button type="submit" class="btn btn-dark">Dark</button>
        <br>
    </form>
@endsection
