@extends('template')

@section('page')
    <div class="row clearfix" id="table" data-path="rute" data-searchBy="id_rute">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                            <h2>
                                Data Rute
                                <small>Kumpulan data rute ngangkot</small>
                            </h2>
                        </div>
                    </div>
                    <hr>

                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                            <a href="{{ url('/rute/create') }}" class="btn btn-primary btn-lg waves-effect">
                                <i class="material-icons">add_box</i>
                                <span>Tambah</span>
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                            <label for="">Pencarian</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">search</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control date" placeholder="Masukkan Kata Kunci" v-model="search">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                            <label for="">Cari Berdasarkan</label>
                            <select class="form-control" v-model="searchBy">
                                <option value="id_rute">ID Rute</option>
                                <option value="keterangan">Keterangan</option>
                                <option value="biaya">Biaya</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="body table-responsive">
                    <table id="hoho" class="table" v-if="searchFilter.length > 0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Rute</th>
                            <th>Keterangan</th>
                            <th>Biaya</th>
                            <th>Rute</th>
                            <th>PILIHAN</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(item, index) in searchFilter">
                            <td>@{{ index + 1 }}</td>
                            <td>@{{ item.id_rute }}</td>
                            <td>@{{ item.keterangan }}</td>
                            <td>@{{ item.biaya }}</td>
                            <td><button type="button" class="btn btn-primary btn-sm waves-effect" v-on:click="lihat_rute(item.rute)">Lihat Rute</button></td>
                            <td>
                                <div class="btn-group btn-group-xs" role="group">
                                    <button class="btn btn-warning waves-effect" v-on:click="edit(item.id_rute)" data-toggle="tooltip" data-placement="top" title="Ubah">
                                        <i class="material-icons">edit</i>
                                    </button>

                                    <button class="btn bg-red waves-effect" v-on:click="destroy(item.id_rute)" data-toggle="tooltip" data-placement="top" title="Hapus">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <div v-if="searchFilter.length <= 0 && loading === false">
                        <center>
                            <h4 class="col-pink">DATA TIDAK DITEMUKAN</h4>
                            <button class="btn btn-lg btn-primary waves-effect" v-on:click="search = ''">Reset</button>
                        </center>
                    </div>

                    <div v-if="loading !== false">
                        <center>
                            <h6 class="col-black">
                                <div class="preloader pl-size-xs">
                                    <div class="spinner-layer pl-red-grey">
                                        <div class="circle-clipper left">
                                            <div class="circle"></div>
                                        </div>
                                        <div class="circle-clipper right">
                                            <div class="circle"></div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                Memuat Data...
                            </h6>
                        </center>
                    </div>
                </div>
            </div>
        </div>

        {{-- MODEL LIHAT RUTE --}}
        <div class="modal fade" id="lihat_rute" tabindex="-1" role="dialog" style="display: none;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                <div id="rute" class="gm-map"></div>
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
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script>
        var map;
        var directionsDisplay;

        vue_table.lihat_rute = function (rute) {
            directionsDisplay.setDirections(rute);
            $('#lihat_rute').modal({
                show: true
            });

            $('#lihat_rute').on('shown.bs.modal', function ()
            {
                google.maps.event.trigger(map, "resize");
                map.fitBounds(rute.routes[0].bounds);
                map.setZoom(14);
            });
        };

        // inisialisasi map
        function initMap() {
            map = new google.maps.Map(document.getElementById('rute'), {
                center: {lat: -7.9713294, lng: 112.6281746},
                zoom: 14
            });

            directionsDisplay = new google.maps.DirectionsRenderer({
                map: map,
                panel: document.getElementById('panel_rute')
            });
        }
    </script>

@endsection