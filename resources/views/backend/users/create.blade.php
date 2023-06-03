@extends('backend.index')
@section('content')

    <form action="{{route('store_user')}}" method="POST">
        @csrf

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Add User</h3>
        </div>
        <br>


        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Username" value="{{ old('name') }}" name="name">

                    @error('name')
                    <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">00963</span>
                        </div>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  >

                    @error('phone')
                    <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email">

                    @error('email')
                    <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <div class="input-group">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" placeholder="Password">

                    @error('password')
                    <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        </div>



        <div class="row">
            <div class="col-xs-6 col-sm-4 col-md-4">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-check"></i></span>
                        </div>
                        <select name="gender_id" id="inputStatus" class="form-control @error('gender_id') is-invalid @enderror">
                            <option selected disabled>Gender</option>
                            @foreach($gender as $item)
                                <option value="{{$item->id}}" {{ old('gender_id') == $item->id ? 'selected' : '' }}>{{$item->name}}</option>
                            @endforeach
                        </select>
                        @error('gender_id')
                        <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                        @enderror

                    </div>

                </div>
            </div>

            <div class="col-xs-6 col-sm-4 col-md-4">
                <div class="form-group">
                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="Address">
                    @error('address')
                    <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-xs-6 col-sm-4 col-md-4">
                <div class="form-group">
                    <input type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}" placeholder="Birthday">
                    @error('birthday')
                    <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>





        <input type="hidden" name="longitude" value="{{ old('longitude') }}" id="longitude"  readonly>

            <div id="map" style="height: 500px"></div>

        <input type="hidden" name="latitude" class="form-control @error('latitude') is-invalid @enderror"  value="{{ old('latitude') }}"  id="latitude" readonly>
        @error('latitude')
        <div class="invalid-feedback" style="color: #8B0000;">{{ $message }}</div>
        @enderror

                <span class="input-group-append">
                 <button type="submit" class="btn btn-info btn-flat">Go!</button>
                  </span>
            </div>
        </div>
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
                    zoom: 17
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
