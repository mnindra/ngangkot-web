auth.onAuthStateChanged(function(user) {
    if (user) {

    } else {
        window.location = '/login';
    }
});

function logout () {
    auth.signOut().then(function() {
        window.location = '/login';
    });
}