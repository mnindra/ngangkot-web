@extends('template');

@section('page')
    <div class="row clearfix" id="form-validation">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        TAMBAH DATA ADMIN
                    </h2>
                </div>
                <div class="body">
                    <form v-on:submit.prevent="create_auth" action="{{ url('/admin') }}" method="post">

                        {{ csrf_field() }}

                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <label class="form-label">Nama</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="nama" v-model="formInputs.nama" placeholder="Masukkan Nama">
                                    </div>
                                    <div class="col-pink" v-if="formErrors['nama']">@{{ formErrors['nama'][0] }}</div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="email" v-model="formInputs.email" placeholder="Masukkan Email">
                                    </div>
                                    <div class="col-pink" v-if="formErrors['email']">@{{ formErrors['email'][0] }}</div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Password</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="password" v-model="formInputs.password" placeholder="Masukkan Password">
                                    </div>
                                    <div class="col-pink" v-if="formErrors['password']">@{{ formErrors['password'][0] }}</div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Konfirmasi Password</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="konfirmasi_password" v-model="formInputs.konfirmasi_password" placeholder="Masukkan Password Kembali">
                                    </div>
                                    <div class="col-pink" v-if="formErrors['konfirmasi_password']">@{{ formErrors['konfirmasi_password'][0] }}</div>
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

@section('script')
    <script>
        vue_formValidation.create_auth = function (e) {
            var self = this;
            var form = e.srcElement;
            var action = form.action;
            var csrfToken = form.querySelector('input[name="_token"]').value;
            var method = form.querySelector('input[name="_method"]') ? form.querySelector('input[name="_method"]').value : "post";

            console.log(method);

            $.ajax({
                'type': method,
                'headers': {
                    'X-CSRF-TOKEN': csrfToken
                },
                'url': action,
                'data': this.formInputs,
                'success': function () {
                    auth2.createUserWithEmailAndPassword(self.formInputs.email, self.formInputs.password).then(function() {
                        form.submit();
                        auth2.signOut();
                    });
                },
                'error': function (xhr, status, error) {
                    var errors = JSON.parse(xhr.responseText);
                    self.formErrors = errors;
                    self.formInputs.password = "";
                    self.formInputs.konfirmasi_password = "";
                }
            });
        }
    </script>
@endsection