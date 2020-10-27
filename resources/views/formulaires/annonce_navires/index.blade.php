@extends('layouts.profile')

@section('content')
    <section>
        <div class="wrapper" style="padding-left: 4%; padding-right: 4%;">
            <section class="content">
                <div class="wrapper">
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>Annonce Navire</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href={{route('home')}}>Page d'accueil</a></li>
                                        <li class="breadcrumb-item active">Annonce Navire
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div><!-- /.container-fluid -->
                    </section>
                    <!-- /.card-header -->
                    <div class="card">
                        <div class="card-body col-md-12">
                            <div class="table-responsive">
                            <table id="example1" class="table table-bordered  table-hover">

                                <thead>
                                <tr>
                                    <th>Navire</th>
                                    <th>Transitaire </th>
                                    <th>Armateur </th>
                                    <th>Consignataire </th>
                                    <th>Provenance </th>
                                    <th>E.T.D </th>
                                    <th>Valide</th>
                                </tr>
                                </thead>
                                @foreach($formulaires as $formulaire)
                                    <tbody>

                                    <td> <a href="#bannerformmodal" data-toggle="modal" data-target="#modal-<?php echo $formulaire->id;?>">{{$formulaire->champs['nom_navire']}}</a></td>
                                    <td>{{$formulaire->champs['transitaire']}}</td>
                                    <td>{{$formulaire->champs['armateur']}}</td>
                                    <td>{{$formulaire->champs['consignataire']}}</td>
                                    <td>{{$formulaire->champs['provenance']}}</td>
                                    <td>{{$formulaire->champs['date']}}</td>
                                    <div class="modal fade bannerformmodal" tabindex="-1" role="dialog" aria-labelledby="modal-<?php echo $formulaire->id;?>" aria-hidden="true" id="modal-<?php echo $formulaire->id;?>">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">Information sur la navire</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <style type="text/css">
                                                            .label{ float: right;}
                                                        </style>
                                                        <div >
                                                            <ul class="list-group">
                                                                    <li class="list-group-item">IMO  :<span class="label label-default" style="float: right;"> {{$formulaire->champs['imo']}}  </span></li>
                                                                    <li class="list-group-item">Type du navire  :<span class="label label-default" style="float: right;"> {{$formulaire->champs['type']}}  </span></li>
                                                                    <li class="list-group-item">Tonnage :<span class="label label-default" style="float: right;"> {{$formulaire->champs['tonnage']}}  </span></li>
                                                                    <li class="list-group-item">Pavillon du navire  :<span class="label label-default" style="float: right;"> {{$formulaire->champs['pavillon']}}  </span></li>
                                                                    <li class="list-group-item">Longeur du navire  :<span class="label label-default" style="float: right;"> {{$formulaire->champs['longeur_navire']}}  </span></li>
                                                                    <li class="list-group-item">Largeur du navire  :<span class="label label-default" style="float: right;"> {{$formulaire->champs['largeur_navire']}}  </span></li>
                                                                    <li class="list-group-item">Le port en lourd  :<span class="label label-default" style="float: right;"> {{$formulaire->champs['port_lourd']}}  </span></li>
                                                                    <li class="list-group-item">Le tirant d'eau  :<span class="label label-default" style="float: right;"> {{$formulaire->champs['tirant_eau']}}  </span></li>
                                                            </ul>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <td>
                                        @if($formulaire->valide)
                                            <span class="badge badge-success">valide</span>
                                        @else
                                            <span class="badge badge-dark">non valide</span>
                                        @endif
                                    </td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['annonce_navires.destroy', $formulaire->id] ]) !!}
                                        @can('annonce_navire-validate')
                                            <a href="{{ route('annonce_navires.show', $formulaire->id) }}" class="btn btn-primary btn-sm" role="button">Consulter</a>
                                        @endcan
                                        @can('annonce_navire-create')
                                            <a href="{{ route('annonce_navires.edit', $formulaire->id) }}" class="btn btn-info btn-sm" role="button">Modifier</a>
                                        @endcan
                                        {!! Form::submit('Supprimer', ['class' => 'btn btn-danger  btn-sm']) !!}
                                        {!! Form::close() !!}

                                    </td>
                                    </tbody>
                                @endforeach

                            </table>
                            </div>
                        </div>
                    </div>
                    @can('annonce_navire-create')
                        <div class="card-footer">
                            <a href="{{ route('annonce_navires.create') }}" class="btn btn-info" role="button">Nouveau demande</a>

                        </div>
                    @endcan
                </div>
            </section>
        </div>
    </section>
@stop
