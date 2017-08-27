<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Login Admin Ngangkot</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('css/waves.css') }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body class="login-page">
<div class="login-box">
    <div class="logo">
        <a href="javascript:void(0);">Ngangkot</a>
        <small>Web Admin</small>
    </div>
    <div class="card">
        <div class="body">
            <form id="sign_in">
                <div class="msg">Login untuk melanjutkan</div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                    <div class="form-line">
                        <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <button class="btn btn-block btn-lg bg-indigo waves-effect" id="login" type="button">LOGIN</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="{{ asset('js/jquery.min.js') }}"></script>

<!-- Bootstrap Core Js -->
<script src="{{ asset('js/bootstrap.js') }}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{ asset('js/waves.js') }}"></script>

<!-- Validation Plugin Js -->
<script src="{{ asset('js/jquery.validate.js') }}"></script>

<!-- Custom Js -->
<script src="{{ asset('js/admin.js') }}"></script>
<script src="{{ asset('js/sign-in.js') }}"></script>

<!-- Firebase -->
<script src="https://www.gstatic.com/firebasejs/4.3.0/firebase.js"></script>

<!-- Firebase Config -->
<script src="{{ asset('js/firebase_config.js') }}"></script>

<script>

    $('#login').on('click', function () {
        var email = $('input[name="email"]').val();
        var password = $('input[name="password"]').val();
        auth.signInWithEmailAndPassword(email, password).then(function () {

        }).catch(function(error) {
            window.location = '/login';
        });
    });

    auth.onAuthStateChanged(function(user) {
        if (user) {
            database.ref('admin').once('value').then(function(snapshot) {
                var success = false;
                var email = auth.currentUser.email;
                for (var index in snapshot.val()) {
                    if (snapshot.val()[index].email == email) {
                        success = true;
                    }
                }

                if(success) {
                    window.location = '/';
                } else {
                    auth.signOut();
                    window.location = '/login';
                }
            });
        }
    });
</script>

</body>

</html>