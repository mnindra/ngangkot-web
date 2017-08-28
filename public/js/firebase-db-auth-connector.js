function getDatabaseUserByEmail (email, path) {
    return database.ref(path).once('value').then(function (snapshot) {
       for (var index in snapshot.val()) {
           if (snapshot.val()[index].email == email) {
               return snapshot.val()[index];
           }
       }
    });
}

function getAuthUserByEmail (email, password) {
    return auth2.signInWithEmailAndPassword(email, password).then(function () {
        return auth2.currentUser;
    });
}