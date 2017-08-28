auth.onAuthStateChanged(function(user) {
    if (user) {
        $('#loggedIn_email').html(auth.currentUser.email);
        getDatabaseUserByEmail(auth.currentUser.email, 'admin').then(function (user) {
            $('#loggedIn_nama').html(user.nama);
        });
    } else {
        window.location = '/login';
    }
});

function logout () {
    auth.signOut().then(function() {
        window.location = '/login';
    });
}