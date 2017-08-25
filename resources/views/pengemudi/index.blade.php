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
                            <td><button class="btn btn-primary waves-effect" data-toggle="modal" :data-target="'#defaultModal-'+item.id_pengemudi">Lihat Angkutan</button></td>
                            <td>
                                <button class="btn btn-danger waves-effect" v-on:click="destroy(item.id_pengemudi)">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <div v-for="(item, index) in searchFilter">
                        <div class="modal fade" :id="'defaultModal-'+item.id_pengemudi" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="defaultModalLabel">Data Angkutan</h4>
                                    </div>
                                    <div class="modal-body col-lg-12">
                                        <div class="col-lg-8">
                                            <h4>Kode Rute</h4>
                                            <h5>@{{ item.angkutan.id_rute }}</h5>
                                            <hr>
                                            <h4>Nomor Angkutan</h4>
                                            <h5>@{{ item.angkutan.no_angkutan }}</h5>
                                        </div>

                                        <div class="col-lg-4">
                                            <img class="media-object" src="http://placehold.it/64x64" width="100" height="100">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div v-if="searchFilter.length <= 0">
                        <center>
                            <h4 class="col-pink">DATA TIDAK DITEMUKAN</h4>
                            <button class="btn btn-lg btn-primary waves-effect" v-on:click="search = ''">Reset</button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection