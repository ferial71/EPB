{{-- \resources\views\roles\index.blade.php --}}
@extends('layouts.profile')


@section('content')

    <div class="wrapper" style="padding-left: 4%; padding-right: 4%;">
        <section class="content">
            <div class="wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1> Administration des Roles
                                    <hr>

                                        <a href="{{ route('users.index') }}" class="btn btn-outline-info pull-right">Utilisateurs</a>
                                        <a href="{{ route('permissions.index') }}" class="btn btn-outline-info pull-right">Permissions</a></h1>

                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href={{route('home')}}>Page d'accueil</a></li>
                                    <li class="breadcrumb-item active">Administration des Roles </li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.card-header -->
                <div class="card">
                    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered table-responsive  table-striped">
                <thead>
                <tr>
                    <th>Role</th>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($roles as $role)
                    <tr>

                        <td>{{ $role->name }}</td>

                        <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                        <td style="display: flex;">
                            <a href="{{ URL::to('roles/'.$role->id.'/edit') }}" class="btn btn-info btn-sm pull-left" style="margin-right: 3px;">Modifier</a>

                            {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]) !!}
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
        </section>
        <a href="{{ URL::to('roles/create') }}" class="btn btn-success">Ajouter un Role</a>
    </div>







@endsection
