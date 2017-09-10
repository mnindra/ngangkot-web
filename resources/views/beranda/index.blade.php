@extends('template')

@section('page')
    <div id="beranda">
        <div class="block-header">
            <h2>BERANDA</h2>
        </div>

        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-pink hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">person</i>
                    </div>
                    <div class="content">
                        <div class="text">PENUMPANG</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">@{{ penumpang.length }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-cyan hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">directions_car</i>
                    </div>
                    <div class="content">
                        <div class="text">PENGEMUDI</div>
                        <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">@{{ pengemudi.length }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-light-green hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">directions</i>
                    </div>
                    <div class="content">
                        <div class="text">RUTE ANGKOT</div>
                        <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20">@{{ rute.length }}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-orange hover-zoom-effect">
                    <div class="icon">
                        <i class="material-icons">supervisor_account</i>
                    </div>
                    <div class="content">
                        <div class="text">ADMIN</div>
                        <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20">@{{ admin.length }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <div class="card">
                <div class="header">
                    <h2>
                        Monitoring Pengemudi Angkot
                    </h2>
                </div>
                <div class="body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="gm-map" id="map"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('script')
    <script>
        let vueObj = new Vue({
            'el': '#beranda',
            'data': {
                'penumpang': [],
                'pengemudi': [],
                'jml_online': 0,
                'rute': []
            },
            'methods': {
                'ambil_data': function (path) {
                    database.ref(path).on('value', (snapshot) => {
                        this[path] = [];
                        for(let index in snapshot.val()) {
                            this[path].push(snapshot.val()[index]);
                        }
                    });
                }
            },
            'mounted': function () {
                this.ambil_data('penumpang');
                this.ambil_data('pengemudi');
                this.ambil_data('rute');
                this.ambil_data('admin');
            }
        });

        // inisialisasi map
        var map;
        var markers = [];
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -7.9713294, lng: 112.6281746},
                zoom: 14
            });
        }

        $('document').ready(function () {

            vueObj.pengemudi.forEach((item) => {
                let location = {
                    lat: item.lokasi.latitude,
                    lng: item.lokasi.longitude
                };

                let marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    title: 'Angkot',
                    animation: google.maps.Animation.DROP,
                });
                markers.push(marker);
            });
        });
    </script>
@endsection
