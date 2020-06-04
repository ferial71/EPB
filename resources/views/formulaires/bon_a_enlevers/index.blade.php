@extends('layouts.profile')

@section('content')


    <style>
        table {
            font-family: Arial, sans-serif;
            font-size: 14px;
            border-collapse: collapse;
            width: 100%;
            margin: 10px 0 0 0;
            table-layout: fixed;
        }
        table td, table th {
            height: 50px;
            max-width: 0;
            overflow: hidden;
            text-overflow: ellipsis;
            cursor: pointer;
            word-break: break-all;
            white-space: nowrap;
            border: 1px solid #C8C8C8;
            text-align: left;
            padding: 10px;
        }
        tr:hover > td {
            overflow: visible;
            white-space: unset;
        }
        th:hover {
            overflow: visible;
            white-space: unset;
        }

    </style>
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
                                    <table id="example1" class="table table-bordered table-striped " style="table-layout:fixed">
                                        <thead>
                                            <tr>
                                                <th>Navire</th>
                                                <th>Transitaire </th>
                                                <th>Réceptionnaire </th>
                                                <th>Date d'entrée de la marchandise </th>
                                                <th>Date d’enlèvement de la marchandise </th>
                                                <th>Marchandise</th>
                                                <th>Mode de conditionnement</th>
                                                <th>Poids</th>
                                                <th>Nombre d'unité </th>
                                                <th>Date de la déclaration</th>
                                                <th>Numéro de déclaration</th>
                                                <th>Valide</th>
                                                <th></th>


                                            </tr>
                                        </thead>
                                        @foreach($formulaires as $formulaire)
                                            <tbody>
                                                <?php $array =array_keys( $formulaire->champs );?>
                                                <td>    {{$formulaire->champs[$array[0]]}} </td>
                                                    @for( $i=1;$i<11;$i++)
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
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['bon_a_enlevers.destroy', $formulaire->id] ]) !!}

                                                    @can('bon_a_enlever-validate')
                                                        <a href="{{ route('bon_a_enlevers.show', $formulaire->id) }}" class="btn btn-primary" role="button">Consulter</a>
                                                    @endcan
                                                    @can('bon_a_enlever-create')
                                                        <a href="{{ route('bon_a_enlevers.edit', $formulaire->id) }}" class="btn btn-info" role="button">Modifier</a>
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
                    <div class="card-footer">
                    <a href="{{ route('bon_a_enlevers.create') }}" class="btn btn-info" role="button">Nouveau demande</a>

                    </div>
                </div>
            </section>
        </div>
    </section>
@endsection
