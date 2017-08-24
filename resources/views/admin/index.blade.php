@extends('template')

@section('page')
    <div class="row clearfix" id="table" data-path="admin">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">

                    <h2>
                        Data Admin
                        <small>Kumpulan data admin web ngangkot</small>
                    </h2>

                    <hr>

                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                            <a href="{{ url('/admin/create') }}" class="btn btn-primary btn-lg waves-effect">
                                <i class="material-icons">add_box</i>
                                <span>Tambah</span>
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">search</i>
                                </span>
                                <div class="form-line">
                                    <input type="text" class="form-control date" placeholder="Pencarian" v-model="search">
                                </div>
                            </div>
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