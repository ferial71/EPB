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
                                            <h1>Annonces navire</h1>
                                        </div>
                                        <div class="col-sm-6">
                                            <ol class="breadcrumb float-sm-right">
                                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                                <li class="breadcrumb-item active">Annonces navire</li>
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
                                        <div class="col-sm-12 col-md-6"><div id="example1_filter" class="dataTables_filter">
                                                <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-11 col-md-offset-2 ">
                                            <table id="example1" class="table table-bordered table-striped ">

                                                <thead>
                                                <tr>
                                                    <th>id </th>
                                                    <th>Navire</th>
                                                    <th>Type</th>
                                                    <th>E.T.A</th>
                                                    <th>T.E.D</th>
                                                    <th>Cargaison </th>
                                                    <th>Tonnage </th>
                                                    <th>Pavillon</th>
                                                    <th>Agent</th>
                                                    <th></th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($annonceNavs as $annonceNav)
                                                <tr>

                                                    <td > <a href="{{ route('annonceNav.show', $annonceNav->id ) }}">{{ $annonceNav->id }} </a></td>
                                                    <td>{{ $annonceNav->navire->nom }}</td>
                                                    <td>{{ $annonceNav->navire->type}}</td>
                                                    <td>{{ $annonceNav->date_dentree }}</td>
                                                    <td>{{ $annonceNav->navire->tirant_eau }}</td>
                                                    <td> {{$annonceNav->cargaison_id }}</td>
                                                    <td>{{ $annonceNav->cargaison->tonnage }}</td>
                                                    <td>{{ $annonceNav->navire->pavillon}}</td>
                                                    <td>{{ $annonceNav->consignataire->nom}}</td>

                                                    <td>
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['annonceNav.destroy', $annonceNav->id] ]) !!}
                                                        <a href="{{ route('annonceNav.edit', $annonceNav->id) }}" class="btn btn-info" role="button">Edit</a>
                                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                        {!! Form::close() !!}

                                                    </td>

                                                </tr>
                                                @endforeach

                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>id </th>
                                                    <th>Navire</th>
                                                    <th>Type</th>
                                                    <th>ETA</th>
                                                    <th>TED</th>
                                                    <th>Cargaison </th>
                                                    <th>Tonnage </th>
                                                    <th>Provenance</th>
                                                    <th>Agent</th>
                                                    <th></th>
                                                </tr>
                                                </tfoot>
                                                {!! $annonceNavs->links() !!}
                                            </table>
                                            <div
                                                class="panel-footer">Page {{ $annonceNavs->currentPage() }} of {{ $annonceNavs->lastPage() }}
                                            </div>
                                        </div>

                                     </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('annonceNav.create') }}" class="btn btn-info" role="button">Nouveau annonce</a>

                            </div>
                        </div>

                    </section>
        </div>
    </section>
@endsection
