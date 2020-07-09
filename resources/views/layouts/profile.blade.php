<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="userid" contetnt="{{ Auth::check() ? Auth::user()->id : '' }}">

    <title>AdminLTE 3 | User Profile</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

{{--    <script>--}}
{{--        window.Laravel ={!! json_encode([--}}
{{--    'crfToken' => csrf_token(),--}}
{{--]) !!};--}}
{{--    </script>--}}


    <!-- iCheck for checkboxes and radio inputs -->
{{--    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}})">--}}
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css')}}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">


    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" >
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('home')}}" class="nav-link">Home</a>
            </li>

        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto" id="app">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="{{ asset('dist/img/user8-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>


                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
{{--            <li class="nav-item dropdown">--}}
{{--                <a class="nav-link" data-toggle="dropdown" href="#">--}}
{{--                    <i class="far fa-bell"></i>--}}
{{--                    <span class="badge badge-warning navbar-badge">15</span>--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">--}}

{{--                    <span class="dropdown-item dropdown-header">15 Notifications</span>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    <a href="#" class="dropdown-item">--}}
{{--                        <i class="fas fa-envelope mr-2"></i> 4 new messages--}}
{{--                        <span class="float-right text-muted text-sm">3 mins</span>--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-divider"></div>--}}
{{--                    --}}
{{--                    <notification :userid="{{auth()->id()}}" :unreads="{{auth()->user()->unreadNotifications}}"></notification>--}}
            <notification v-bind:notifications="notifications"></notification>
{{--                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>--}}
{{--                </div>--}}
{{--            </li>--}}
            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4 " style="opacity :0.8;" >
        <!-- Brand Logo -->
        <a href="{{route('home')}}" class="brand-link">
            <img src="{{ asset('dist/img/logo.jpg') }}"
                 alt="EPB Logo"
                 class="brand-image img-circle elevation-3"
                 style="opacity: 1">
            <span class="brand-text font-weight-light">EPB</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar" >
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{{ Auth::user()->name }}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Statistique
                                <i class="right fas"></i>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Formulaires
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('annonce_navire-list')
                                <li class="nav-item">
                                    <a  href={{route('annonce_navires.index')}}  class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Annonce navire  </p>
                                    </a>
                                </li>
                            @endcan
                            @can('demande_de_poste_a_quai-list')
                                <li class="nav-item">
                                    <a href={{route('poste_quais.index')}} class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Demande de poste à quai</p>
                                    </a>
                                </li>
                            @endcan
                            @can('manifeste-list')
                                <li class="nav-item">
                                    <a href={{route('manifestes.index')}} class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Manifeste</p>
                                    </a>
                                </li>
                            @endcan
                            @can('bon_de_commande-list')
                                <li class="nav-item">
                                    <a href={{route('bon_de_commandes.index')}} class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Bon de commande</p>
                                    </a>
                                </li>
                            @endcan
                            @can('bon_a_enlever-list')
                                <li class="nav-item">
                                    <a href={{route('bon_a_enlevers.index')}} class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Bon à enlever</p>
                                    </a>
                                </li>
                            @endcan
                            @can('demande_de_mise_a_quai-list')
                                <li class="nav-item">
                                    <a href={{route('mise_a_quais.index')}} class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Demande de mise à quai</p>
                                    </a>
                                </li>
                            @endcan
                            @can('bon_a_delivrer-list')
                                <li class="nav-item">
                                    <a href={{route('bon_a_delivrers.index')}} class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Bon à délivrer</p>
                                    </a>
                                </li>
                            @endcan
                            @can('cpn-list')
                                <li class="nav-item">
                                    <a href={{route('home')}} class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Consulter la CPN</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Historique
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="../tables/simple.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Simple Tables</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../tables/data.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>DataTables</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="../tables/jsgrid.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>jsGrid</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-envelope"></i>
                            <p>
                                Mailbox
                                <i class="fas right"></i>
                            </p>
                        </a>

                    <li class="nav-header">Action</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p class="text">Contact</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();"
                        >
                            <i class="nav-icon far fa-circle text-danger"></i>
                            <p class="text">Logout</p>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
        </div>
        <strong>Copyright &copy; 2020 <a href="https://portdebejaia.dz">Entreprise Portuaire de Béjaia</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
{{--<!-- Bootstrap 4 -->--}}
{{--<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>--}}

{{--<!-- Select2 -->--}}
{{--<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>--}}
{{--<!-- Bootstrap4 Duallistbox -->--}}
{{--<script src="{{ asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>--}}
{{--<!-- InputMask -->--}}
{{--<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>--}}
{{--<script src="{{ asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>--}}
{{--<!-- date-range-picker -->--}}
{{--<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>--}}
{{--<!-- bootstrap color picker -->--}}
{{--<script src="{{ asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>--}}
{{--<!-- Tempusdominus Bootstrap 4 -->--}}
{{--<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>--}}
{{--<!-- Bootstrap Switch -->--}}
{{--<script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>--}}



<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>

@yield('scripts')



<script src="{{ asset('js/app.js') }}"></script>

<!-- AdminLTE App -->




</body>
</html>
