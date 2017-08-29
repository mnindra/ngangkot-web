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
                    </div>
                    <hr>

                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                            <a href="{{ url('/admin/create') }}" class="btn btn-primary btn-lg waves-effect">
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
                                <option value="nama">Nama</option>
                                <option value="email">Email</option>
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
                            <th>EMAIL</th>
                            <th>TELEPON</th>
                            <th>PILIHAN</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(item, index) in searchFilter">
                            <td>@{{ index + 1 }}</td>
                            <td>@{{ item.nama }}</td>
                            <td>@{{ item.email }}</td>
                            <td>@{{ item.telp }}</td>
                            <td>
                                <div class="btn-group btn-group-xs" role="group">
                                    <button class="btn btn-warning waves-effect" v-on:click="edit(item.id_admin)" data-toggle="tooltip" data-placement="top" title="Ubah">
                                        <i class="material-icons">edit</i>
                                    </button>

                                    <button class="btn bg-red waves-effect" v-on:click="destroy(item.id_admin); destroy_auth(item);" data-toggle="tooltip" data-placement="top" title="Hapus">
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
    </div>
@endsection

@section('script')
    <script>
        vue_table.destroy_auth = function (item) {
            getAuthUserByEmail(item.email, item.password).then(function (user) {
                user.delete().then(function () {
                    auth2.signOut();
                    console.log('auth deleted');
                });
            });
        };
    </script>
@endsection