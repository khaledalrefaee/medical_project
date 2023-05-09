@extends('backend.index')
@section('content')


    <section class="content">
        <div > </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12">
                                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">

                                            <thead>
                                            <tr>
                                                <th >name</th>
                                                <th >email</th>
                                                <th >phone</th>
                                                <th >gender</th>
                                                <th >address</th>
                                                <th >age</th>
                                               </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="odd">
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td style="">{{$user->phone}}</td>
                                                    <td style="">{{$user->gender->name ?? 'nono'}}</td>
                                                    <td style="">{{$user->address}}</td>
                                                    <td style="">{{$user->birthday}}</td>

                                                        <a href="{{url('Retreat')}}"> <button class="btn btn-primary">Retreat</button></a>

                                                    </td>
                                                </tr>
                                                <input type="hidden" name="latitude" id="latitude" value="{{$user->latitude}}">
                                                <input type="hidden" name="longitude" id="longitude" value="{{$user->longitude}}">

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                        <div id="map" style="height: 500px"></div>
                            </div>
                        </div>
                    </div>
    </section>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDG9moWiWFp4yE6PDUWvUbDUQYRP-8ltRg&libraries=places&callback=initMap" async defer></script>

    <script>
        function initMap() {
            var location = { lat: {{$user->latitude}}, lng: {{$user->longitude}} }; // example location
            var map = new google.maps.Map(document.getElementById('map'), {
                center: location,
                zoom: 18
            });

            var marker = new google.maps.Marker({
                position: location,
                map: map,
                draggable: false, // disable marker dragging
                icon: {
                    url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png"
                }
            });
        }
    </script>

@endsection
