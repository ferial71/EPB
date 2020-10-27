@extends('layouts.profile')

@section('content')
    <section class="content" style="padding-bottom: 2%">
        <div class="wrapper" style="padding-left: 4%; padding-right: 4%;">
            <section class="content">
                <div class="wrapper">
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>Bon à enlever</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href={{route('home')}}>Page d'accueil</a></li>
                                        <li class="breadcrumb-item active">Bon à enlever</li>
                                    </ol>
                                </div>
                            </div>
                        </div><!-- /.container-fluid -->
                    </section>

                    <div class="card border-light mb-3"  >
                        <!-- /.card-header -->
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-11 col-md-offset-2 ">
                                    <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped ">
                                        <thead>
                                            <tr>
                                                <th>Navire</th>
                                                <th>Transitaire </th>
                                                <th>Réceptionnaire </th>
                                                <th>Marchandise</th>
                                                <th></th>


                                            </tr>
                                        </thead>
                                        @foreach($formulaires as $formulaire)
                                            <tbody>
                                                <?php $array =array_keys( $formulaire->champs );?>
                                                <td> <a href="#bannerformmodal" data-toggle="modal" data-target="#modal-<?php echo $formulaire->id;?>">{{$formulaire->champs[$array[0]]}} </a></td>
                                                @for( $i=1;$i<4;$i++)
                                                    <td>{{$formulaire->champs[$array[$i]]}}</td>
                                                @endfor
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
                                                                                <li class="list-group-item"> Date d'entrée de la marchandise :<span class="label label-default" style="float: right;" style="float: right;"> {{$formulaire->champs[$array[4]]}}  </span></li>
                                                                                <li class="list-group-item">Date d’enlèvement de la marchandise  :<span class="label label-default" style="float: right;"> {{$formulaire->champs[$array[5]]}}  </span></li>
                                                                                <li class="list-group-item">Mode de conditionnement  :<span class="label label-default" style="float: right;"> {{$formulaire->champs[$array[6]]}}  </span></li>
                                                                                <li class="list-group-item">Poids  :<span class="label label-default" style="float: right;"> {{$formulaire->champs[$array[7]]}}  </span></li>
                                                                                <li class="list-group-item">Nombre d'unité  :<span class="label label-default" style="float: right;"> {{$formulaire->champs[$array[8]]}}  </span></li>
                                                                                <li class="list-group-item">Date de la déclaration  :<span class="label label-default" style="float: right;"> {{$formulaire->champs[$array[9]]}}  </span></li>
                                                                                <li class="list-group-item">Numéro de déclaration  :<span class="label label-default" style="float: right;"> {{$formulaire->champs[$array[10]]}}  </span></li>
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
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['bon_a_enlevers.destroy', $formulaire->id] ]) !!}

                                                        <a href="{{ route('bon_a_enlevers.show', $formulaire->id) }}" class="btn btn-primary" role="button">Consulter</a>
                                                    @can('bon_a_enlever-create')
                                                        <a href="{{ route('bon_a_enlevers.edit', $formulaire->id) }}" class="btn btn-info" role="button">Modifier</a>
                                                    @endcan
                                                    {!! Form::submit('Supprimer', ['class' => 'btn btn-danger']) !!}
                                                    {!! Form::close() !!}

                                                </td>
                                            </tbody>
                                        @endforeach

                                    </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @can('bon_a_enlever-create')
                    <div class="card-footer">
                    <a href="{{ route('bon_a_enlevers.create') }}" class="btn btn-info" role="button">Nouveau demande</a>
                    </div>
                    @endcan
                </div>
            </section>
        </div>
    </section>
@endsection
