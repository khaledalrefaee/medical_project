@extends('backend.index')
@section('content')

    <form action="{{route('store_user')}}" method="POST">
        @csrf

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Add user</h3>
        </div>
        <br>


        <div class="card-body">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                </div>
                <input type="text" class="form-control" placeholder="Username"  value="{{ old('name') }}" class="@error('name') is-invalid @enderror" name="name">

            </div>
              @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                </div>

             <input type="email" class="form-control" name="email"  value="{{ old('email') }}" class="@error('email') is-invalid @enderror" placeholder="Email">
            </div>
                @error('email')
                <div class="alert alert-danger">{{ $message }}
                @enderror
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">

                </div>

                <input type="password" class="form-control" name="password"  value="{{ old('password') }}" class="@error('password') is-invalid @enderror" placeholder="password">
            </div>
                @error('password')
                <div class="alert alert-danger">{{ $message }}
                @enderror
            </div>

            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text" >00963</span>
                </div>
                <input type="number" class="form-control" name="phone"  value="{{ old('phone') }}" class="@error('phone') is-invalid @enderror" placeholder="number phone">
            </div>
                @error('phone')
                <div class="alert alert-danger">{{ $message }}
                @enderror
            </div>

            <select name="gender_id" id="inputStatus" class="form-control custom-select" >
                <option selected="" disabled="" >gender </option>
                @foreach($gender as $item)
                    <option value="{{$item->id}}">{{$item->name}} </option>
                @endforeach

            </select>
            @error('gender_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <br>
            <br>

            <div class="input-group mb-3">
                <input type="text" class="form-control" name="address"  value="{{ old('address') }}" class="@error('address') is-invalid @enderror" placeholder="address">

                @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>

            <div class="input-group mb-3">
                <input type="date" class="form-control" name="birthday"  value="{{ old('birthday') }}" class="@error('birthday') is-invalid @enderror" placeholder="Birthday">
                @error('birthday')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-check"></i></span>
                </div>
            </div>
            <div>
                <input type="hidden" name="latitude" id="latitude" readonly>
            </div>
            <br><br>
            <div>
                <input type="hidden" name="longitude" id="longitude"  readonly>
            </div>
            <br>
            <div id="map" style="height: 500px"></div>


                <span class="input-group-append">
                 <button type="submit" class="btn btn-info btn-flat">Go!</button>
                  </span>
            </div>
        </div>
    </div>
    </form>
    <script>
        function initMap() {
            // Create a new map centered on your current location
            navigator.geolocation.getCurrentPosition(function(position) {
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    },
                    zoom: 12
                });

                // Create a marker at your current location
                var marker = new google.maps.Marker({
                    position: {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    },
                    map: map,
                    icon: {
                        url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png"
                    }
                });

                // Allow the user to drag the marker
                marker.setDraggable(true);

                // Update the marker's position when the user drags it
                google.maps.event.addListener(marker, 'dragend', function(event) {
                    document.getElementById("latitude").value = this.getPosition().lat();
                    document.getElementById("longitude").value = this.getPosition().lng();
                });
            });
        }
    </script>

@endsection
