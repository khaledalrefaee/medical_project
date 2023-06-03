@extends('backend.index')
@section('content')

    <form action="{{route('mail.store')}}"method="post">
        @csrf

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
