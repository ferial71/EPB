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
                                    <h1>Bon de commandes</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href={{route('home')}}>Page d'accueil</a></li>
                                        <li class="breadcrumb-item active">Bon de commandes</li>
                                    </ol>
                                </div>
                            </div>
                        </div><!-- /.container-fluid -->
                    </section>

                    <div class="card "  >
                        <!-- /.card-header -->

                            <div class="card-body col-md-12">
                                <div class="table-responsive">


                                    <table id="example1" class="table table-bordered table-striped ">
                                        <thead>
                                            <tr>
                                                <th>Navire</th>
                                                <th>Transitaire </th>
                                                <th>P.marchandise </th>
                                                <th>Objet </th>
                                                <th>Provenance </th>
                                                <th>Date d’entrée </th>
                                                <th>Valide</th>
                                                <th></th>

                                            </tr>
                                        </thead>
                                        @foreach($formulaires as $formulaire)
                                            <tbody>
                                                <td>    {{$formulaire->champs["nom_navire"]}} </td>

                                                        <td>{{$formulaire->champs["transitaire"]}}</td>
                                                <td>{{$formulaire->champs["poids"]}}</td>
                                                <td>{{$formulaire->champs["objet"]}}</td>
                                                <td>{{$formulaire->champs["provenance"]}}</td>
                                                <td>{{$formulaire->champs["date"]}}</td>

                                                <td>
                                                    @if($formulaire->valide)
                                                        <span class="badge badge-success">valide</span>
                                                    @else
                                                        <span class="badge badge-dark">non valide</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['bon_de_commandes.destroy', $formulaire->id] ]) !!}
                                                    @can('bon_de_commande-validate')
                                                        <a href="{{ route('bon_de_commandes.show', $formulaire->id) }}" class="btn btn-primary" role="button">Consulter</a>
                                                    @endcan
                                                    @can('bon_de_commande-create')
                                                        <a href="{{ route('bon_de_commandes.edit', $formulaire->id) }}" class="btn btn-info" role="button">Modifier</a>
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
                    @can('bon_de_commande-create')
                    <div class="card-footer">
                    <a href="{{ route('bon_de_commandes.create') }}" class="btn btn-info" role="button">Nouveau demande</a>
                    </div>
                    @endcan
                </div>
            </section>
        </div>
    </section>
@endsection
