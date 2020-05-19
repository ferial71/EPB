@extends('layouts.profile')

@section('content')




        <div class="card-header">
            <h3 class="card-title">Annonces navire</h3>
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-6">
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
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>id </th>
                            <th>Nom navire </th>
                            <th>date_dentree</th>
                            <th>IMO</th>
                            <th>LOA</th>
                            <th>BEAM </th>
                            <th>DWT </th>
                            <th>DRAFT</th>
                            <th></th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($annonceNavs as $annonceNav)
                        <tr>

                            <td > <a href="{{ route('annonceNav.show', $annonceNav->id ) }}">{{ $annonceNav->id }} </a></td>
                            <td>{{ $annonceNav->navire->nom }}</td>
                            <td>{{ $annonceNav->date_dentree }}</td>
                            <td>{{ $annonceNav->IMO }}</td>
                            <td> {{ $annonceNav->BEAM }}</td>
                            <td>{{ $annonceNav->DWT }}</td>
                            <td>{{ $annonceNav->DRAFT }}</td>
                            <td>{{ $annonceNav->DWT }}</td>
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
                            <th>Nom navire </th>
                            <th>date_dentree</th>
                            <th>IMO</th>
                            <th>LOA</th>
                            <th>BEAM </th>
                            <th>DWT </th>
                            <th>DRAFT</th>
                            <th></th>
                        </tr>
                        </tfoot>
                        {!! $annonceNavs->links() !!}
                    </table>
                </div>
            </div>
            <div class="panel-footer">Page {{ $annonceNavs->currentPage() }} of {{ $annonceNavs->lastPage() }}</div>


        </div>
        <div class="card-footer">
            <a href="{{ route('annonceNav.create') }}" class="btn btn-info" role="button">Nouveau annonce</a>

        </div>


@endsection
