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
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="rute" v-model="formInputs.rute" placeholder="Masukkan Nomor Rute">
                                    </div>
                                    <div class="col-pink" v-if="formErrors['rute']">@{{ formErrors['rute'][0] }}</div>
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