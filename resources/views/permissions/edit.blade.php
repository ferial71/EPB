@extends('layouts.profile')

@section('title', '| Edit Permission')

@section('content')

    <div class="wrapper" style="padding-left: 4%; padding-right: 4%;">
        <section class="content">
            <div class="wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">

                                <h1> Modifier {{$permission->name}}</h1>

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

        {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}
                        {{-- Form model binding to automatically populate our fields with permission data --}}

        <div class="form-group">
            {{ Form::label('name', 'Nom du permission ') }}
            {{ Form::text('name', null, array('class' => 'form-control')) }}
        </div>
        <br>
        {{ Form::submit('Modifier', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
