@extends('layouts.profile')

@section('content')




        <div class="card-header">
            <h3 class="card-title">Annonces navire</h3>
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            <div class="row">
                <div class="col-md-11 col-md-offset-2 ">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>id </th>
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
