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
                                    <h1>Manifestes</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href={{route('home')}}>page d'accueil</a></li>
                                        <li class="breadcrumb-item active">Manifestes</li>
                                    </ol>
                                </div>
                            </div>
                        </div><!-- /.container-fluid -->
                    </section>

                    <div class="card border-light mb-3"  >
                        <!-- /.card-header -->
                            <div class="card-body col-md-12">
                                <div class="table-responsive">
                                <div class="col-md-11 col-md-offset-2 ">
                                    <table id="example1" class="table table-bordered table-responsive  table-striped ">
                                        <thead>
                                            <tr>
                                                <th>Navire</th>
                                                <th>Escale </th>
                                                <th>Provenance </th>
                                                <th>E.T.D </th>
                                                <th>réceptionnaire</th>
                                                <th>Marchandises transportées</th>
                                                <th>Valide</th>
                                                <th></th>

                                            </tr>
                                        </thead>
                                        @foreach($formulaires as $formulaire)
                                            <tbody>
                                                <?php $array =array_keys( $formulaire->champs );?>
                                                <td> <a href="#bannerformmodal" data-toggle="modal" data-target="#modal-<?php echo $formulaire->id;?>">{{$formulaire->champs["nom_navire"]}} </a></td>

                                                        <td>{{$formulaire->champs["nature_escale"]}}</td>
                                                <td>{{$formulaire->champs["provenance"]}}</td>
                                                <td>{{$formulaire->champs["date"]}}</td>
                                                <td>{{$formulaire->champs["receptionnaire"]}}</td>
                                                <td>{{$formulaire->champs["marchandise"]}}</td>


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
                                                                                <li class="list-group-item">Nature des marchandises  :<span class="label label-default" style="float: right;"> {{$formulaire->champs["n_marchandise"]}}  </span></li>
                                                                                <li class="list-group-item">mode de conditionnement :<span class="label label-default" style="float: right;"> {{$formulaire->champs["m_conditionnement"]}}  </span></li>
                                                                                <li class="list-group-item">Poids total de la marchandise  :<span class="label label-default" style="float: right;"> {{$formulaire->champs["poids"]}}  </span></li>
                                                                                <li class="list-group-item">Poids du BL  :<span class="label label-default" style="float: right;"> {{$formulaire->champs["poids_bl"]}}  </span></li>
                                                                                <li class="list-group-item">Nombre de colis transportés  :<span class="label label-default" style="float: right;"> {{$formulaire->champs["nb_colis"]}}  </span></li>
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
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['manifestes.destroy', $formulaire->id] ]) !!}

                                                    @can('manifeste-validate')
                                                        <a href="{{ route('manifestes.show', $formulaire->id) }}" class="btn btn-primary" role="button">Consulter</a>
                                                    @endcan
                                                    @can('manifeste-create')
                                                        <a href="{{ route('manifestes.edit', $formulaire->id) }}" class="btn btn-info" role="button">Modifier</a>
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
                    @can('manifeste-create')
                    <div class="card-footer">
                    <a href="{{ route('manifestes.create') }}" class="btn btn-info" role="button">Nouveau demande</a>

                    </div>
                    @endcan
                </div>
            </section>
        </div>
    </section>
@endsection
