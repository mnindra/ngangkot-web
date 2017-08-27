if(document.querySelector('#table')) {

    var vue_table = new Vue({
        'el': '#table',
        'data': {
            'list': [],
            'path': $('#table').attr('data-path'),
            'search': '',
            'searchBy': $('#table').attr('data-searchBy'),
            'loading': true
        },
        'methods': {
            'destroy': function (id) {
                $.ajax({
                    'url': '/' + this.path + "/" + id,
                    'type': 'delete',
                    'headers': {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    'success': response => {
                        console.log(this.path + ' deleted')
                    }
                })
            },
            'edit': function (id) {
                window.location = '/' + this.path + '/edit/' + id
            }
        },
        'mounted': function () {
            // synch to firebase
            var self = this;
            var ref = database.ref(this.path);
            ref.on('value', snapshot => {
                this.list = [];
                this.loading = true;
                Object.keys(snapshot.val()).forEach(key => {
                    // console.log(key);          // the name of the current key.
                    // console.log(snapshot.val()[key]);   // the value of the current key.
                    this.list.push(snapshot.val()[key]);
                });
                this.loading = false;
            })
        },
        'computed': {
            'searchFilter': function () {
                var self = this;
                return this.list.filter(function(item) {
                    let search = self.search.toLowerCase();
                    let searchBy = self.searchBy;
                    return item[searchBy].toLowerCase().indexOf(search) >= 0;
                });
            }
        }
    })
}