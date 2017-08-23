new Vue({
    'el': '#form-validation',
    'data': {
        'formInputs': {},
        'formErrors': {}
    },
    'methods': {
        'submitForm': function (e) {
            var form = e.srcElement;
            var action = form.action;
            var csrfToken = form.querySelector('input[name="_token"]').value;

            this.$http.post(action, this.formInputs, {
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            }).then(function () {
                form.submit();
            }).catch(function (response) {
                var errors = response.data;
                this.formErrors = errors;

                this.formInputs.password = "";
                this.formInputs.konfirmasi_password = "";
            })
        }
    }
});