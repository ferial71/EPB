{{-- \resources\views\users\create.blade.php --}}
@extends('layouts.profile')



@section('content')

    <div class="wrapper" style="padding-left: 4%; padding-right: 4%;">
        {{ Form::open(array('url' => 'users')) }}
        <section class="content">
            <div class="wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1> Ajouter Utilisateur</h1>


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
        <div class="form-group">
            {{ Form::label('name', 'Nom') }}
            {{ Form::text('name', '', array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', '', array('class' => 'form-control')) }}
        </div>

        <div class='form-group'>
            {{ Form::label('role', 'Role') }}
            <br>
            @foreach ($roles as $role)
                {{ Form::checkbox('roles[]',  $role->id ) }}
                {{ Form::label($role->name, ucfirst($role->name)) }}<br>

            @endforeach
        </div>

        <div class="form-group">
            {{ Form::label('password', 'Mot de pass') }}<br>
            {{ Form::password('password', array('class' => 'form-control')) }}

        </div>

        <div class="form-group">
            {{ Form::label('password', 'Confirmer le mot de pass') }}<br>
            {{ Form::password('password_confirmation', array('class' => 'form-control')) }}

        </div>



    </div>

                </div>
            </div>
            {{ Form::submit('Ajouter', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
        </section>
    </div>

@endsection
