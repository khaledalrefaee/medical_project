@extends('backend.index')
@section('content')

    <form action="{{route('mail.store')}}"method="post">
        @csrf
        <div class="mb-3 row">
          <label for="name" class="col-sm-2 col-form-label"><strong>Email</strong></label>
          <div class="col-sm-6">
              <input type="text" class="form-control" id="name"  value="{{ old('name') }}" name="name" placeholder="email@gmail.net">
              @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>
      </div>
      <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label"><strong>Notes</strong></label>
          <textarea class="form-control h-100" id="exampleFormControlTextarea1" name="text"  rows="3"></textarea>
          @error('text')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
      </div>
      <button type="submit" class="btn btn-primary">Send Message</button>
    </form>
@endsection
