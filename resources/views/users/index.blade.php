{{-- \resources\views\users\index.blade.php --}}
@extends('layouts.profile')

@section('content')

    <div class="wrapper" style="padding-left: 4%; padding-right: 4%;">
        <section class="content">
            <div class="wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1> Administration des utilisateurs
                                    <hr>
                                    <a href="{{ route('roles.index') }}" class="btn btn-outline-info pull-right">Roles</a>
                                    <a href="{{ route('permissions.index') }}" class="btn btn-outline-info pull-right">Permissions</a></h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href={{route('home')}}>Page d'accueil</a></li>
                                    <li class="breadcrumb-item active">Administration des utilisateurs </li>
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
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Date d'ajout</th>
                    <th>Roles</th>
                    <th>Operations</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($users as $user)
                    <tr>

                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                        <td>{{  $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                        <td style="display: flex;">
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-info pull-left" style="margin-right: 3px;">Modifier</a>
                            {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id] ]) !!}
                            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-sm']) !!}
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
            <a href="{{ route('users.create') }}" class="btn btn-success">Ajouter un Utilisateur</a>
        </section>
    </div>
@endsection
