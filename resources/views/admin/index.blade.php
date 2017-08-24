@extends('template')

@section('page')
    <div class="row clearfix" id="app">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">

                    <h2>
                        Data Admin
                        <small>Kumpulan data admin web ngangkot</small>
                    </h2>

                    <hr>

                    <a href="{{ url('/admin/tambah') }}" class="btn btn-primary btn-lg waves-effect">
                        <i class="material-icons">add_box</i>
                        <span>Tambah</span>
                    </a>

                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>NAMA</th>
                            <th>USERNAME</th>
                            <th>TELEPON</th>
                            <th>PILIHAN</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(item, index) in admin">
                            <td>@{{ index }}</td>
                            <td>@{{ item.nama }}</td>
                            <td>@{{ item.username }}</td>
                            <td>@{{ item.telp }}</td>
                            <td>
                                <button class="btn btn-warning waves-effect" v-on:click="deleteAdmin(index)">
                                    Ubah
                                </button>

                                <button class="btn btn-danger waves-effect" v-on:click="deleteAdmin(index)">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        new Vue({
            'el': '#app',
            'data': {
                admin: []
            },
            'methods': {
                'deleteAdmin': function (index) {
                    $.ajax({
                        'url': '/admin/' + index,
                        'type': 'delete',
                        'headers': {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        'success': function (response) {
                            console.log('admin deleted')
                        }
                    })
                }
            },
            'mounted': function () {
                var self = this;
                var ref = database.ref('admin');
                ref.on('value', function (snapshot) {
                    self.admin = snapshot.val();
                })
            }
        })
    </script>
@endsection