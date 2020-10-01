{{-- \resources\views\permissions\index.blade.php --}}
@extends('layouts.profile')

@section('content')


    <div class="wrapper" style="padding-left: 4%; padding-right: 4%;">
        <section class="content">
            <div class="wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1> Administration des permissions </h1>
                                    <br>
                                        <a href="{{ route('users.index') }}" class="btn btn-outline-info pull-right">Utilisateurs</a>
                                        <a href="{{ route('roles.index') }}" class="btn btn-outline-info pull-right">Roles</a>


                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href={{route('home')}}>Page d'accueil</a></li>
                                    <li class="breadcrumb-item active">Administration des permissions </li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.card-header -->
                <div class="card">
                    <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-striped">

                    <thead>
                    <tr>
                        <th>Permissions</th>
                        <th>Opération</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td style="display: flex ">
                                <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-info btn-sm pull-left" style="margin-right: 3px;">Modifier</a>

                                {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}

                                {!! Form::submit('Supprimer', ['class' => 'btn btn-sm btn-danger']) !!}
                                {!! Form::close() !!}

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
                </div>
            </div>
            <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">Ajouter une Permission</a>
        </section>

    </div>

@endsection
