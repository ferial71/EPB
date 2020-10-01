<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="userid" contetnt="{{ Auth::check() ? Auth::user()->id : '' }}">

    <title>EPB</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <script>
        window.Laravel ={!! json_encode(['crfToken' => csrf_token(),]) !!};
    </script>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>



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
    <link rel="stylesheet" href="{{ asset('css/parsley.css') }}">
    <script src="https://parsleyjs.org/dist/parsley.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>


    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <style>
        .box
        {
            width:100%;
            max-width:600px;
            background-color:#f9f9f9;
            border:1px solid #ccc;
            border-radius:5px;
            padding:16px;
            margin:0 auto;
        }
        input.parsley-success,
        select.parsley-success,
        textarea.parsley-success {
            color: #468847;
            background-color: #DFF0D8;
            border: 1px solid #D6E9C6;
        }

        input.parsley-error,
        select.parsley-error,
        textarea.parsley-error {
            color: #B94A48;
            background-color: #F2DEDE;
            border: 1px solid #EED3D7;
        }

        .parsley-errors-list {
            margin: 2px 0 3px;
            padding: 0;
            list-style-type: none;
            font-size: 0.9em;
            line-height: 0.9em;
            opacity: 0;

            transition: all .3s ease-in;
            -o-transition: all .3s ease-in;
            -moz-transition: all .3s ease-in;
            -webkit-transition: all .3s ease-in;
        }

        .parsley-errors-list.filled {
            opacity: 1;
        }

        .parsley-type, .parsley-required, .parsley-equalto, .parsley-pattern, .parsley-length{
            color:#ff0000;
        }

    </style>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">
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


        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto" >
            <!-- Messages Dropdown Menu -->
            <!-- Notifications Dropdown Menu -->
            <notification :userid="{{auth()->id()}}" :unreads="{{auth()->user()->unreadNotifications}}"></notification>
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
                <div class="info">
                    <a href="#" class="d-block">{{{ Auth::user()->name }}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    @canany(['annonce_navire-create', 'demande_de_poste_a_quai-create','manifeste-create','bon_de_commande-create','bon_a_enlever-create','demande_de_mise_a_quai-create','bon_a_delivrer-create','bon_a_delivrer-list'])
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Formulaires
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('annonce_navire-create')
                                <li class="nav-item">
                                    <a  href={{route('annonce_navires.create')}}  class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Annonce navire  </p>
                                    </a>
                                </li>
                            @endcan
                            @can('demande_de_poste_a_quai-create')
                                <li class="nav-item">
                                    <a href={{route('poste_quais.create')}} class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Demande de poste à quai</p>
                                    </a>
                                </li>
                            @endcan
                            @can('manifeste-create')
                                <li class="nav-item">
                                    <a href={{route('manifestes.create')}} class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Manifeste</p>
                                    </a>
                                </li>
                            @endcan
                            @can('bon_de_commande-create')
                                <li class="nav-item">
                                    <a href={{route('bon_de_commandes.create')}} class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Bon de commande</p>
                                    </a>
                                </li>
                            @endcan
                            @can('bon_a_enlever-create')
                                <li class="nav-item">
                                    <a href={{route('bon_a_enlevers.create')}} class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Bon à enlever</p>
                                    </a>
                                </li>
                            @endcan
                            @can('demande_de_mise_a_quai-create')
                                <li class="nav-item">
                                    <a href={{route('mise_a_quais.create')}} class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Demande de mise à quai</p>
                                    </a>
                                </li>
                            @endcan
                            @can('bon_a_delivrer-create')
                                <li class="nav-item">
                                    <a href={{route('bon_a_delivrers.create')}} class="nav-link">
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
                    @endcanany
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Listes
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
                    @can('user-create')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Administration
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a  href={{route('users.index')}}  class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Utilisateurs  </p>
                                    </a>
                                </li>
                            <li class="nav-item">
                                <a  href={{route('roles.index')}}  class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Roles  </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a  href={{route('permissions.index')}}  class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>permissions  </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endcan
                    <li class="nav-item has-treeview">


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

{{--<!-- Bootstrap 4 -->--}}
{{--<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>--}}

{{--<!-- Select2 -->--}}
{{--<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>--}}
{{--<!-- Bootstrap4 Duallistbox -->--}}
{{--<script src="{{ asset('plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>--}}
{{--<!-- InputMask -->--}}
{{--<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>--}}
{{--<script src="{{ asset('plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>--}}
<!-- date-range-picker -->
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
{{--<!-- bootstrap color picker -->--}}
{{--<script src="{{ asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>--}}
{{--<!-- Tempusdominus Bootstrap 4 -->--}}
{{--<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>--}}
{{--<!-- Bootstrap Switch -->--}}
{{--<script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>--}}



<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
<script src="https://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>

@yield('scripts')



<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/parsley.min.js') }}"></script>

<!-- AdminLTE App -->




</body>
</html>
