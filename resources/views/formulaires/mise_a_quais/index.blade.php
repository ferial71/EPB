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
                                    <h1>Demande de mise à quai</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href={{route('home')}}>page d'accueil</a></li>
                                        <li class="breadcrumb-item active">Demande de mise à quai</li>
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
                                                <th>Transitaire</th>
                                                <th>réceptionnaire</th>
                                                <th>Marchandises</th>
                                                <th>Nombre d’entités</th>
                                                <th>Nature des colis</th>
                                                <th>Poids de la marchandise</th>
                                                <th>Valide</th>
                                                <th>  </th>
                                            </tr>
                                        </thead>
                                        @foreach($formulaires as $formulaire)
                                            <tbody>
                                                <?php $array =array_keys( $formulaire->champs );?>
                                                <td>    {{$formulaire->champs[$array[0]]}} </td>
                                                    @for( $i=1;$i<7;$i++)
                                                        <td>{{$formulaire->champs[$array[$i]]}}</td>
                                                    @endfor

                                                <td>
                                                    @if($formulaire->valide)
                                                        <span class="badge badge-success">valide</span>
                                                    @else
                                                        <span class="badge badge-dark">non valide</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['mise_a_quais.destroy', $formulaire->id] ]) !!}

                                                    @can('demande_de_mise_a_quai-validate')
                                                        <a href="{{ route('mise_a_quais.show', $formulaire->id) }}" class="btn btn-primary" role="button">Consulter</a>
                                                    @endcan
                                                    @can('demande_de_mise_a_quai-create')
                                                        <a href="{{ route('mise_a_quais.edit', $formulaire->id) }}" class="btn btn-info" role="button">Modifier</a>
                                                    @endcan
                                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                    {!! Form::close() !!}

                                                </td>
                                            </tbody>
                                        @endforeach

                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    @can('demande_de_mise_a_quai-create')
                    <div class="card-footer">
                    <a href="{{ route('mise_a_quais.create') }}" class="btn btn-info" role="button">Nouveau demande</a>
                    </div>
                    @endcan
                </div>
            </section>
        </div>
    </section>
@endsection