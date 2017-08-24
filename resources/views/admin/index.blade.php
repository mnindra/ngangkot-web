@extends('template')

@section('page')
    <div class="row clearfix" id="table" data-path="admin" data-searchBy="nama">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
                            <h2>
                                Data Admin
                                <small>Kumpulan data admin web ngangkot</small>
                            </h2>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" align="right">
                            <a href="{{ url('/admin/create') }}" class="btn btn-primary btn-lg waves-effect">
                                <i class="material-icons">add_box</i>
                                <span>Tambah</span>
                            </a>
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
                            <th>TELEPON</th>
                            <th>PILIHAN</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(item, index) in searchFilter">
                            <td>@{{ index + 1 }}</td>
                            <td>@{{ item.nama }}</td>
                            <td>@{{ item.username }}</td>
                            <td>@{{ item.telp }}</td>
                            <td>
                                <button class="btn btn-warning waves-effect" v-on:click="edit(item.id_admin)">
                                    Ubah
                                </button>

                                <button class="btn btn-danger waves-effect" v-on:click="destroy(item.id_admin)">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>

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