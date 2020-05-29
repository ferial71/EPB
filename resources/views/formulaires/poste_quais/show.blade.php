@extends('layouts.profile')

@section('title', '| View Post')

@section('content')

    <div class="wrapper" style="padding-left: 4%; padding-right: 4%;">
        <section class="content">
            <div class="wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Demande de poste à quai</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href={{route('home')}}>Home</a></li>
                                    <li class="breadcrumb-item active">Demande de poste à quai</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>
                <div class="card">
                    <div class="card-body">
                        <div >
                            <ul class="list-group">

                                <li class="list-group-item">  Nom du navire:<span class="label label-default"> {{$formulaire->champs['nom_navire']}}  </span></li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    {{ Form::model($formulaire, array('route' => array('poste_quais.update', $formulaire->id,true), 'method' => 'PUT')) }}
                    <a href="{{ route('poste_quais.update',$formulaire->id,$valide =true) }}" class="btn btn-info" role="button">valider</a>
                    {{ Form::submit('update', array('class' => 'btn btn-primary')) }}
                    {{ Form::close() }}

                </div>

            </div>
        </section>

    </div>

@endsection
