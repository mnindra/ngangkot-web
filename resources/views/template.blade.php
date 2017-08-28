<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Ngangkot Web Admin</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ asset('css/bootstrap.css')  }}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ asset('css/waves.css')  }}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="{{ asset('css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="{{ asset('css/waitMe.css') }}" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="{{ asset('css/bootstrap-select.css') }}" rel="stylesheet" />

    <!-- Template Custom Css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('css/all-themes.css') }}" rel="stylesheet" />

    <!-- Ngangkot Custom Css -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>

<body class="theme-blue">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Memuat Halaman...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="/">Admin Ngangkot</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info" style="background: url('{{ asset('images/user-img-background.jpg') }}') no-repeat no-repeat;">
                <div class="image">
                    <img src="{{ asset('images/user.png') }}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="loggedIn_nama"></div>
                    <div class="email" id="loggedIn_email"></div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MENU UTAMA</li>
                    <li class="active">
                        <a href="/">
                            <i class="material-icons">home</i>
                            <span>Beranda</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">folder</i>
                            <span>Data Master</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="/penumpang">
                                    <i class="material-icons">person</i>
                                    <span>Penumpang</span>
                                </a>
                            </li>
                            <li>
                                <a href="/pengemudi">
                                    <i class="material-icons">directions_car</i>
                                    <span>Pengemudi</span>
                                </a>
                            </li>
                            <li>
                                <a href="/rute">
                                    <i class="material-icons">directions</i>
                                    <span>Rute</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin">
                                    <i class="material-icons">supervisor_account</i>
                                    <span>Admin</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" onclick="logout()">
                            <i class="material-icons">exit_to_app</i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->

            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    copyright &copy; 2017 <a href="javascript:void(0);">ngangkot - WRI DEV</a>.
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">

            @yield('page')

        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ asset('js/bootstrap.js') }}"></script>

    <!-- Select Plugin Js -->
    <script src="{{ asset('js/bootstrap-select.js') }}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ asset('js/waves.js') }}"></script>

    <!-- Tooltip JS -->
    <script src="{{ asset('js/tooltips-popovers.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('js/admin.js') }}"></script>

    <!-- Firebase -->
    <script src="https://www.gstatic.com/firebasejs/4.3.0/firebase.js"></script>

    <!-- Firebase Config -->
    <script src="{{ asset('js/firebase_config.js') }}"></script>

    <!-- Firebase Database and Auth User Connector -->
    <script src="{{ asset('js/firebase-db-auth-connector.js') }}"></script>

    <!-- Firebase Auth -->
    <script src="{{ asset('js/firebase_auth.js') }}"></script>

    <!-- Vue JS -->
    <script src="https://unpkg.com/vue"></script>

    <!-- Form Validation (use vue) -->
    <script src="{{ asset('js/form-validation.js') }}"></script>

    <!-- Table operation (use vue) -->
    <script src="{{ asset('js/table.js') }}"></script>

    @yield('script');

    <!-- Google Map API -->>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-0iUmT6UROU_Hx4RJtY32o2vSxS6PQS4&callback=initMap&language=id&region=ID"></script>

</body>

</html>