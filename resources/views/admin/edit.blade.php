@extends('template');

@section('page')
    <div class="row clearfix" id="form-validation" data-action="edit" data-id="{{ $id }}" data-path="admin">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        UBAH DATA ADMIN
                    </h2>
                </div>
                <div class="body">
                    <form v-on:submit.prevent="submitForm" action="{{ url('/admin/' . $id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <label>Nama</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nama" v-model="formInputs.nama" placeholder="Masukkan Nama">
                                    </div>
                                    <div class="col-pink" v-if="formErrors['nama']">@{{ formErrors['nama'][0] }}</div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Telepon</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="telp" v-model="formInputs.telp" placeholder="Masukkan Nomor Telepon">
                                    </div>
                                    <div class="col-pink" v-if="formErrors['telp']">@{{ formErrors['telp'][0] }}</div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button class="btn btn-primary btn-lg waves-effect">
                                        {{--<i class="material-icons">save</i>--}}
                                        Simpan
                                    </button>
                                    <button type="button" onclick="window.location='{{ url('/admin') }}'" class="btn btn-danger btn-lg waves-effect">
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