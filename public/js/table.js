if(document.querySelector('#table')) {

    new Vue({
        'el': '#table',
        'data': {
            'list': [],
            'path': $('#table').attr('data-path'),
            'search': '',
            'columns': ["nama", "username", "telp"]
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
                Object.keys(snapshot.val()).forEach(key => {
                    // console.log(key);          // the name of the current key.
                    // console.log(snapshot.val()[key]);   // the value of the current key.
                    this.list.push(snapshot.val()[key]);
                });
            })
        },
        'computed': {
            'searchFilter': function () {
                var self = this;
                return this.list.filter(function(item) {
                    let search = self.search.toLowerCase();
                    return item.nama.toLowerCase().indexOf(search) >= 0 || item.telp.toLowerCase().indexOf(search) >= 0;
                });
            }
        }
    })
}