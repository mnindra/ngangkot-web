auth2.onAuthStateChanged(function(user) {
    if (user) {

    } else {
        window.location = '/login';
    }
});