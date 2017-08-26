if (document.querySelector('#form-validation')) {
    var vue_formValidation = new Vue({
        'el': '#form-validation',
        'data': {
            'formInputs': {},
            'formErrors': {}
        },
        'methods': {
            'submitForm': function (e) {
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
                        form.submit()
                    },
                    'error': function (xhr, status, error) {
                        var errors = JSON.parse(xhr.responseText);
                        self.formErrors = errors;
                        self.formInputs.password = "";
                        self.formInputs.konfirmasi_password = "";
                    }
                });
            }
        },
        'mounted': function () {
            var self = this;
            var action = $('#form-validation').attr('data-action');
            if (action == 'edit') {
                var id = $('#form-validation').attr('data-id');
                var path = $('#form-validation').attr('data-path');
                database.ref(path + "/" + id).once('value').then(function (snapshot) {
                    self.formInputs = snapshot.val();

                    // apabila ada data rute, maka load ke map
                    if(self.formInputs.rute) {
                        loadRoute(self.formInputs.rute);
                    }
                })
            }
        }
    });
}