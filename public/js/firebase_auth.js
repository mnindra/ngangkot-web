auth.onAuthStateChanged(function(user) {
    if (user) {
        $('#loggedIn_email').html(auth.currentUser.email);
    } else {
        window.location = '/login';
    }
});

function logout () {
    auth.signOut().then(function() {
        window.location = '/login';
    });
}