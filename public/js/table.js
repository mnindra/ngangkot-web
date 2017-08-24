if(document.querySelector('#table')) {
    new Vue({
        'el': '#table',
        'data': {
            'list': [],
            'path': $('#table').attr('data-path'),
            'search': ''
        },
        'methods': {
            'destroy': function (index) {
                $.ajax({
                    'url': '/' + this.path + "/" + index,
                    'type': 'delete',
                    'headers': {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    'success': response => {
                        console.log(this.path + ' deleted')
                    }
                })
            }
        },
        'mounted': function () {
            var self = this;
            var ref = database.ref(this.path);
            ref.on('value', snapshot => {

                this.list = [];
                Object.keys(snapshot.val()).forEach(key => {
                    console.log(key);          // the name of the current key.
                    console.log(snapshot.val()[key]);   // the value of the current key.
                    this.list.push(snapshot.val()[key]);
                });
            })
        },
        'computed': {
            'searchFilter': function () {
                var self = this;
                return this.list.filter(function(item) {
                    return item.nama.toLowerCase().indexOf(self.search.toLowerCase())>=0;
                });
            }
        }
    })
}