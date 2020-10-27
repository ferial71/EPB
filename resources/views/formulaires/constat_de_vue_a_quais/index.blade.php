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
                                    <h1>Constat de vue à quai</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href={{route('home')}}>Page d'accueil</a></li>
                                        <li class="breadcrumb-item active">Constat de vue à quai</li>
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
                                    <table id="example1" class="table table-bordered  table-striped ">
                                        <thead>
                                            <tr>


                                                <th>Nature marchandie</th>
                                                <th>Poid </th>
                                                <th>Ligne </th>
                                                <th>Collone </th>
                                                <th>Altitude </th>
                                                <th>Valide</th>
                                                <th></th>

                                            </tr>
                                        </thead>
                                        @foreach($formulaires as $formulaire)
                                            <tbody>
                                                <?php $array =array_keys( $formulaire->champs );?>
                                                <td>{{$formulaire->champs["nature"]}}</td>
                                                <td>{{$formulaire->champs["poids"]}}</td>
                                                <td>{{$formulaire->champs["ligne"]}}</td>
                                                <td>{{$formulaire->champs["collone"]}}</td>
                                                <td>{{$formulaire->champs["altitude"]}}</td>
                                                <td>
                                                    @if($formulaire->valide)
                                                        <span class="badge badge-success">valide</span>
                                                    @else
                                                        <span class="badge badge-dark">non valide</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['constat_de_vue_a_quais.destroy', $formulaire->id] ]) !!}
                                                    @can('constat_de_vue_a_quais-validate')
                                                        <a href="{{ route('constat_de_vue_a_quais.show', $formulaire->id) }}" class="btn btn-sm btn-primary" role="button">Consulter</a>
                                                    @endcan
                                                    @can('constat_de_vue_a_quais-create')
                                                        <a href="{{ route('constat_de_vue_a_quais.edit', $formulaire->id) }}" class="btn btn-sm btn-info" role="button">Modifier</a>
                                                    @endcan
                                                    {!! Form::submit('Supprimer', ['class' => 'btn btn-sm btn-danger']) !!}
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
                    @can('constat_de_vue_a_quais-create')
                    <div class="card-footer">
                    <a href="{{ route('constat_de_vue_a_quais.create') }}" class="btn btn-info" role="button">Nouveau demande</a>
                    </div>
                    @endcan
                </div>
            </section>
        </div>
    </section>
@endsection
