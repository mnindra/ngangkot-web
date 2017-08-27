@extends('template')

@section('page')
    <div class="row clearfix" id="table" data-path="pengemudi" data-searchBy="nama">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                            <h2>
                                Data Pengemudi
                                <small>Kumpulan data pengemudi ngangkot</small>
                            </h2>
                        </div>
                    </div>
                    <hr>

                    <div class="row clearfix">
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
                                <option value="nama">Nama</option>
                                <option value="username">Username</option>
                                <option value="alamat">Alamat</option>
                                <option value="tanggal">Tanggal Daftar</option>
                                <option value="telp">Telepon</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="body table-responsive">
                    <table id="hoho" class="table" v-if="searchFilter.length > 0">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>NAMA</th>
                            <th>USERNAME</th>
                            <th>ALAMAT</th>
                            <th>TANGGAL DAFTAR</th>
                            <th>TELEPON</th>
                            <th>STATUS</th>
                            <th>FOTO PENGEMUDI</th>
                            <th>ANGKUTAN</th>
                            <th>PILIHAN</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(item, index) in searchFilter">
                            <td>@{{ index + 1 }}</td>
                            <td>@{{ item.nama }}</td>
                            <td>@{{ item.username }}</td>
                            <td>@{{ item.alamat }}</td>
                            <td>@{{ item.tanggal }}</td>
                            <td>@{{ item.telp }}</td>
                            <td>
                                <span v-if="item.blokir == true" class="col-red">diblokir</span>
                                <span v-if="item.blokir == false">tidak diblokir</span>
                            </td>
                            <td><button class="btn btn-primary waves-effect" v-on:click="lihat_pengemudi(item.id_pengemudi)">Lihat Foto</button></td>
                            <td><button class="btn btn-primary waves-effect" v-on:click="lihat_angkutan(item.angkutan)">Lihat Angkutan</button></td>
                            <td>
                                <button v-if="item.blokir == false" class="btn btn-danger waves-effect" v-on:click="blokir(item.id_pengemudi)">
                                    Blokir
                                </button>

                                <button v-if="item.blokir == true" class="btn btn-primary waves-effect" v-on:click="unblokir(item.id_pengemudi)">
                                    Jangan Blokir
                                </button>

                                <button class="btn btn-danger waves-effect" v-on:click="destroy(item.id_pengemudi); hapus_foto(item.id_pengemudi, item.angkutan.no_angkutan);">
                                    Hapus
                                </button>
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

        {{-- MODAL LIHAT ANGKUTAN --}}
        <div class="modal fade" id="lihat_angkutan" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Data Angkutan</h4>
                    </div>
                    <div class="modal-body col-lg-12">
                        <div class="col-lg-8">
                            <h4>ID Rute</h4>
                            <h5 id="id_rute"></h5>
                            <hr>
                            <h4>Nomor Angkutan</h4>
                            <h5 id="no_angkutan"></h5>
                        </div>

                        <div class="col-lg-4">
                            <img class="media-object img-responsive thumbnail" id="foto_angkutan" src="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">TUTUP</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- MODAL LIHAT PENGEMUDI --}}
        <div class="modal fade" id="lihat_pengemudi" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body col-lg-12">
                        <img class="media-object img-responsive thumbnail" id="foto_pengemudi" src="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">TUTUP</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        vue_table.lihat_angkutan = function (angkutan) {

            var id_rute = angkutan.id_rute;
            var no_angkutan = angkutan.no_angkutan;

            $('#id_rute').html(id_rute);
            $('#no_angkutan').html(no_angkutan);

            storage.ref('angkutan/' + no_angkutan + '.jpg').getDownloadURL().then(function (url) {
                $('#foto_angkutan').attr('src', url);
            }).catch(function (error) {
                $('#foto_angkutan').attr('src', 'http://via.placeholder.com/100x100');
            });;

            $('#lihat_angkutan').modal({
                show: true
            });
        }

        vue_table.lihat_pengemudi = function (id_pengemudi) {
            storage.ref('pengemudi/' + id_pengemudi + '.jpg').getDownloadURL().then(function (url) {
                $('#foto_pengemudi').attr('src', url);
            }).catch(function (error) {
                $('#foto_pengemudi').attr('src', 'http://via.placeholder.com/600x480');
            });;

            $('#lihat_pengemudi').modal({
                show: true
            });
        }

        vue_table.hapus_foto = function (id_pengemudi, no_angkutan) {

            storage.ref('pengemudi/' + id_pengemudi + ".jpg").delete().then(function () {
                console.log('foto pengemudi terhapus');
            }).catch(function (error) {
                console.log('foto pengemudi gagal dihapus');
            });

            storage.ref('angkutan/' + no_angkutan + ".jpg").delete().then(function () {
                console.log('foto angkutan terhapus');
            }).catch(function (error) {
                console.log('foto angkutan gagal dihapus');
            });
        }

        vue_table.blokir = function (id_pengemudi) {
            $.ajax({
                url: '/pengemudi/' + id_pengemudi,
                type: 'put',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'blokir': 1
                },
                success: function () {
                    console.log('pengemudi diblokir')
                }
            });
        };

        vue_table.unblokir = function (id_pengemudi) {
            $.ajax({
                url: '/pengemudi/' + id_pengemudi,
                type: 'put',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'blokir': 0
                },
                success: function () {
                    console.log('pengemudi di unblokir')
                }
            });
        };
    </script>
@endsection