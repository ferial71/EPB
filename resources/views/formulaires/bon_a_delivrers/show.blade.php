@extends('layouts.profile')

@section('title', '| View Post')

@section('content')

    <div class="wrapper" style="padding-left: 4%; padding-right: 4%;">
        <section class="content">
            <div class="wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Bon à délivrer</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href={{route('bon_a_delivrers.index')}}>Liste des bon à délivrer</a></li>
                                    <li class="breadcrumb-item active">Bon à délivrer</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>
                <div class="card">
                    <div class="card-body p-0">
                        <div >
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Indication</th>
                                        <th>Valeur</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1.</td>
                                        <td>Nom du navire</td>
                                        <td><span>{{$formulaire->champs['nom_navire']}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Transitaire</td>
                                        <td><span>{{$formulaire->champs['transitaire']}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Nom du Client</td>
                                        <td><span >{{$formulaire->champs['client']}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>6.</td>
                                        <td>Provenance</td>
                                        <td><span>{{$formulaire->champs['provenance']}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>7.</td>
                                        <td>E.T.D</td>
                                        <td><span>{{$formulaire->champs['date']}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>8.</td>
                                        <td>Marchandise délivrée</td>
                                        <td><span>{{$formulaire->champs['marchandise']}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>9.</td>
                                        <td>Quantité de marchandise</td>
                                        <td><span>{{$formulaire->champs['q_marchandise']}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>10.</td>
                                        <td>Poids de la marchandise</td>
                                        <td><span>{{$formulaire->champs['p_marchandise']}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>11.</td>
                                        <td>Numéro du BL</td>
                                        <td><span>{{$formulaire->champs['num_bl']}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>12.</td>
                                        <td>Date d’escale :</td>
                                        <td><span>{{$formulaire->champs['date_escale']}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>13.</td>
                                        <td>Lieux du chargement</td>
                                        <td><span>{{$formulaire->champs['l_chargement']}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>14.</td>
                                        <td>Lieux du déchargement</td>
                                        <td><span>{{$formulaire->champs['l_dechargement']}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>15.</td>
                                        <td>Nombre d’unité</td>
                                        <td><span>{{$formulaire->champs['nb_unite']}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>16.</td>
                                        <td>Numéro du poste</td>
                                        <td><span>{{$formulaire->champs['nb_poste']}}</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">


                    @can('bon_a_delivrer-validate')
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                        Valider
                    </button>
                        @endcan


                </div>

            </div>
        </section>

    </div>
    {{ Form::model($formulaire, array('route' => array('bon_a_delivrers.validatation', $formulaire->id), 'method' => 'PUT')) }}
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Validation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Est ce que vous êtes sure vous voulez valider ce formulaire?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    {{ Form::submit('Valider', array('class' => 'btn btn-success' ,'name'=>'valide', 'value'=>'true')) }}

                    {{ Form::close() }}
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

@endsection
@section('scripts')


    <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}} "></script>
    <!-- Toastr -->
    <script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
    <script type="text/javascript">
        $(function() {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            $('.swalDefaultSuccess').click(function() {
                Toast.fire({
                    icon: 'success',
                    title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.swalDefaultInfo').click(function() {
                Toast.fire({
                    icon: 'info',
                    title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.swalDefaultError').click(function() {
                Toast.fire({
                    icon: 'error',
                    title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.swalDefaultWarning').click(function() {
                Toast.fire({
                    icon: 'warning',
                    title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.swalDefaultQuestion').click(function() {
                Toast.fire({
                    icon: 'question',
                    title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });

            $('.toastrDefaultSuccess').click(function() {
                toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
            });
            $('.toastrDefaultInfo').click(function() {
                toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
            });
            $('.toastrDefaultError').click(function() {
                toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
            });
            $('.toastrDefaultWarning').click(function() {
                toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
            });

            $('.toastsDefaultDefault').click(function() {
                $(document).Toasts('create', {
                    title: 'Toast Title',
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.toastsDefaultTopLeft').click(function() {
                $(document).Toasts('create', {
                    title: 'Toast Title',
                    position: 'topLeft',
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.toastsDefaultBottomRight').click(function() {
                $(document).Toasts('create', {
                    title: 'Toast Title',
                    position: 'bottomRight',
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.toastsDefaultBottomLeft').click(function() {
                $(document).Toasts('create', {
                    title: 'Toast Title',
                    position: 'bottomLeft',
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.toastsDefaultAutohide').click(function() {
                $(document).Toasts('create', {
                    title: 'Toast Title',
                    autohide: true,
                    delay: 750,
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.toastsDefaultNotFixed').click(function() {
                $(document).Toasts('create', {
                    title: 'Toast Title',
                    fixed: false,
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.toastsDefaultFull').click(function() {
                $(document).Toasts('create', {
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
                    title: 'Toast Title',
                    subtitle: 'Subtitle',
                    icon: 'fas fa-envelope fa-lg',
                })
            });
            $('.toastsDefaultFullImage').click(function() {
                $(document).Toasts('create', {
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
                    title: 'Toast Title',
                    subtitle: 'Subtitle',
                    image: '../../dist/img/user3-128x128.jpg',
                    imageAlt: 'User Picture',
                })
            });
            $('.toastsDefaultSuccess').click(function() {
                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'Toast Title',
                    subtitle: 'Subtitle',
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.toastsDefaultInfo').click(function() {
                $(document).Toasts('create', {
                    class: 'bg-info',
                    title: 'Toast Title',
                    subtitle: 'Subtitle',
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.toastsDefaultWarning').click(function() {
                $(document).Toasts('create', {
                    class: 'bg-warning',
                    title: 'Toast Title',
                    subtitle: 'Subtitle',
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.toastsDefaultDanger').click(function() {
                $(document).Toasts('create', {
                    class: 'bg-danger',
                    title: 'Toast Title',
                    subtitle: 'Subtitle',
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.toastsDefaultMaroon').click(function() {
                $(document).Toasts('create', {
                    class: 'bg-maroon',
                    title: 'Toast Title',
                    subtitle: 'Subtitle',
                    body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
        });

    </script>


@endsection
