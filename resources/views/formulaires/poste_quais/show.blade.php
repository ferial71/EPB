@extends('layouts.profile')

@section('styles')
{{--    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" integrity="sha256-b5ZKCi55IX+24Jqn638cP/q3Nb2nlx+MH/vMMqrId6k=" crossorigin="anonymous" />--}}

@stop
@section('content')

    <div class="wrapper" style="padding-left: 4%; padding-right: 4%;">
        <section class="content">
            <div class="wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Demande de poste à quai</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href={{route('home')}}>Page d'accueil</a></li>
                                    <li class="breadcrumb-item active">Demande de poste à quai</li>
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
                                        <td>Armateur</td>
                                        <td><span >{{$formulaire->champs['armateur']}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Consignataire</td>
                                        <td><span>{{$formulaire->champs['consignataire']}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td>Provenance</td>
                                        <td><span>{{$formulaire->champs['provenance']}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>6.</td>
                                        <td>E.T.D</td>
                                        <td><span>{{$formulaire->champs['date']}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>7.</td>
                                        <td>Cargaison</td>
                                        <td><span>{{$formulaire->champs['cargaison']}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>8.</td>
                                        <td>Nature du marchandise</td>
                                        <td><span>{{$formulaire->champs['marchandise']}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>9.</td>
                                        <td>Mode de conditionnement</td>
                                        <td><span>{{$formulaire->champs['m_conditionnement']}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>10.</td>
                                        <td>Tonnage</td>
                                        <td><span>{{$formulaire->champs['tonnage']}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>11.</td>
                                        <td>Type du navire</td>
                                        <td><span>{{$formulaire->champs['type']}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>12.</td>
                                        <td>IMO</td>
                                        <td><span>{{$formulaire->champs['imo']}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>13.</td>
                                        <td>La rade actuelle</td>
                                        <td><span>{{$formulaire->champs['rade']}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>14.</td>
                                        <td>Paviollon du navire</td>
                                        <td><span>{{$formulaire->champs['pavillon']}}</span></td>
                                    </tr>
                                    <tr>
                                        <td>15.</td>
                                        <td>Longeur du navire</td>
                                        <td><span>{{$formulaire->champs['longeur_navire']}}</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">

                    @can('demande_de_poste_a_quai-validate')
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                        Valider
                    </button>
                        @endcan


                </div>

            </div>
        </section>

    </div>
    {{ Form::model($formulaire, array('route' => array('poste_quais.validatation', $formulaire->id), 'method' => 'PUT')) }}
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
                    <p>Est ce que vous êtes sure vous voulez valider cette formulaire?</p>
{{--                    <p>veuillez remplir les champs suivants pour valider le formulaire</p>--}}


{{--                    <div class="container">--}}

{{--                            <div class="row form-group">--}}
{{--                                <div class="col-md-2">--}}
{{--                                    Appointment Time--}}
{{--                                </div>--}}
{{--                                <div class="col-md-8">--}}
{{--                                    <input type="text" class="form-control datetimepicker" name="Appointment_time">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                    </div>--}}

{{--                    <dateandtime></dateandtime>--}}
{{--                    <dateandtime v-model="datetime"></dateandtime>--}}

{{--                    <div class="row" style="margin-top: 100px;">--}}
{{--                        <div class="col-md-6 col-md-offset-3">--}}
{{--                            <div class="panel panel-default">--}}
{{--                                <div class="panel-heading">--}}
{{--                                    <h3>How to Use Bootstrap Datetimepicker in Laravel - NiceSnippets.com</h3>--}}
{{--                                </div>--}}
{{--                                <div class="panel-body">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>Bootstrap DateTimePicker</label>--}}
{{--                                        <input type="text" class="form-control datetimepicker" name="Appointment_time">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}


{{--                    <div class="form-group">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="champs">La date et l'heurs d’entrée du navire: </label>--}}
{{--                            <div class="input-group">--}}
{{--                                <div class="input-group-prepend">--}}
{{--                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>--}}
{{--                                </div>--}}
{{--                                <input type="text" data-provide="datepicker"  id="datetimepicker" name="champs[date]" class="form-control"  data-inputmask-alias = "datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask >--}}

{{--                            </div>--}}
{{--                            <!-- /.input group -->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="container">--}}
{{--                        <div class="row">--}}
{{--                            <div class='col-sm-6'>--}}
{{--                                <div class="form-group">--}}
{{--                                    <div class='input-group date' id='datetimepicker1'>--}}
{{--                                        <input type='text' type="date" class="form-control" />--}}
{{--                                        <span class="input-group-addon">--}}
{{--               <span class="glyphicon glyphicon-calendar"></span>--}}
{{--               </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
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
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>--}}
{{--        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha256-5YmaxAwMjIpMrVlK84Y/+NjCpKnFYa8bWWBbUHSBGfU=" crossorigin="anonymous"></script>--}}
{{--    <script type="text/javascript">--}}
{{--        $(document).ready(function() {--}}
{{--            $(function () {--}}
{{--                $('.datetimepicker').datetimepicker();--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--<script>--}}
{{--    $(function () {--}}
{{--        $('#datetimepicker').datetimepicker();--}}
{{--    });--}}
{{--</script>--}}
@endsection
