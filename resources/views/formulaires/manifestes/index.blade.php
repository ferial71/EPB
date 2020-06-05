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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="dataTables_length" id="example1_length">
                                        <label>Show
                                            <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm">
                                                <option value="5">5</option>
                                                <option value="10">10</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                            entries
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="example1_filter" class="dataTables_filter">
                                        <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-11 col-md-offset-2 ">
                                    <table id="example1" class="table table-bordered table-striped ">
                                        <thead>
                                            <tr>
                                                <th>Navire</th>
                                                <th>escale </th>
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
                                                <td> <a href="#bannerformmodal" data-toggle="modal" data-target="#modal-<?php echo $formulaire->id;?>">{{$formulaire->champs[$array[0]]}} </a></td>
                                                    @for( $i=1;$i<6;$i++)
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
                                                                                <li class="list-group-item">Nature des marchandises  :<span class="label label-default"> {{$formulaire->champs[$array[6]]}}  </span></li>
                                                                                <li class="list-group-item">mode de conditionnement :<span class="label label-default"> {{$formulaire->champs[$array[7]]}}  </span></li>
                                                                                <li class="list-group-item">Poids total de la marchandise  :<span class="label label-default"> {{$formulaire->champs[$array[8]]}}  </span></li>
                                                                                <li class="list-group-item">Poids du BL  :<span class="label label-default"> {{$formulaire->champs[$array[9]]}}  </span></li>
                                                                                <li class="list-group-item">Nombre de colis transportés  :<span class="label label-default"> {{$formulaire->champs[$array[10]]}}  </span></li>
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
