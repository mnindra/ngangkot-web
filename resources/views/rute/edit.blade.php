@extends('template');

@section('page')
    <div class="row clearfix" id="form-validation" data-action="edit" data-id="{{ $id }}" data-path="rute">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        UBAH DATA RUTE
                    </h2>
                </div>
                <div class="body">
                    <form v-on:submit.prevent="submitForm" action="{{ url('/rute/' . $id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <label class="form-label">Keterangan</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="keterangan" v-model="formInputs.keterangan" placeholder="Masukkan Keterangan">
                                    </div>
                                    <div class="col-pink" v-if="formErrors['keterangan']">@{{ formErrors['keterangan'][0] }}</div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Biaya</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="biaya" v-model="formInputs.biaya" placeholder="Masukkan Biaya">
                                    </div>
                                    <div class="col-pink" v-if="formErrors['biaya']">@{{ formErrors['biaya'][0] }}</div>
                                </div>
                            </div>
                            <div class="col-sm-12">

                                <label class="form-label">Rute</label>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                        <div class="gm-map" id="rute"></div>
                                        <div class="col-pink" v-if="formErrors['rute']">@{{ formErrors['rute'][0] }}</div>

                                        <br>
                                        <button class="btn btn-lg btn-primary btn-block waves-effect" type="button" id="setRute">Tentukan Rute</button>
                                        <input type="hidden" name="rute" v-model="formInputs.rute">
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                        <div class="card">
                                            <div class="header">
                                                <h2>
                                                    Informasi Rute
                                                </h2>
                                            </div>
                                            <div class="body gm-map-card">
                                                <div id="panel_rute"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-lg waves-effect">
                                        {{--<i class="material-icons">save</i>--}}
                                        Simpan
                                    </button>
                                    <button type="button" onclick="window.location='{{ url('/rute') }}'" class="btn btn-danger btn-lg waves-effect">
                                        {{--<i class="material-icons">arrow_back</i>--}}
                                        Batal
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var map;
        var markers = [];
        var directionsDisplay;
        var directionsService;

        // inisialisasi map
        function initMap() {
            map = new google.maps.Map(document.getElementById('rute'), {
                center: {lat: -7.9713294, lng: 112.6281746},
                zoom: 14
            });

            directionsDisplay = new google.maps.DirectionsRenderer({
                draggable: true,
                map: map,
                panel: document.getElementById('panel_rute')
            });
            directionsService = new google.maps.DirectionsService();

            google.maps.event.addListener(directionsDisplay, 'routeindex_changed', function() {
                var rute = JSON.stringify(directionsDisplay.directions);
                vue_formValidation.formInputs.rute = rute;
                $('input[name="rute"]').val(rute);
            });
        }

        function loadRoute(route) {
            directionsDisplay.setDirections(route);
        }

        $(document).ready(function () {

            google.maps.event.addListener(map, 'click', function(event) {
                placeMarker(event.latLng);
            });

            // meletakkan marker
            let i = 0;
            function placeMarker(location) {

                let title = ["awal", "tujuan"];

                if(markers.length < 2) {
                    var marker = new google.maps.Marker({
                        position: location,
                        map: map,
                        draggable: true,
                        title: title[i++],
                        animation: google.maps.Animation.DROP,
                    });
                    markers.push(marker);
                }
            }

            // menentukan rute
            $('#setRute').click(function () {
                var request = {
                    origin: markers[0].position,
                    destination: markers[1].position,
                    travelMode: 'DRIVING'
                };

                directionsService.route(request, function (result, status) {
                    if(status == "OK") {
                        directionsDisplay.setDirections(result);
                        markers.forEach(function (marker) {
                            marker.setMap(null);
                        });
                        markers = [];
//                       console.log('direction : ' + JSON.stringify(result));
                    }
                });
            });

        });
    </script>
@endsection