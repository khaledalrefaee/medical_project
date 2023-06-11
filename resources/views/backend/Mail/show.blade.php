@extends('backend.index')
@section('content')

    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Notes</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="text" rows="3">{{$mail->text}}</textarea>
    </div>
    <a href="{{url('redirect')}}"> <button type="submit" class="btn btn-dark">redirect</button></a>

@endsection
