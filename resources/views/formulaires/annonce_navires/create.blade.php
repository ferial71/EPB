@extends('layouts.profile')

@section('content')


    <section class="content" style="padding-bottom: 2%">
        <div class="wrapper" style="padding-left: 4%; padding-right: 4%;">
            <section class="content">
                {{ Form::open(array('route' => 'annonce_navires.store')) }}
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
                <!-- /.card-header -->
                <!-- form start -->


                        <div class="card">
                             <form role="form">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <div class="form-group">

                                                    {{ Form::label('nom_consignataire', 'Nom du consignataire') }}
                                                    {{ Form::text('nom_consignataire', null, array('class' => 'form-control','placeholder'=>"Entrer le nom du consignataire")) }}

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    {{ Form::label('nom_navire', 'Nom du navire') }}
                                                    {{ Form::text('nom_navire', null, array('class' => 'form-control','placeholder'=>"Entrer le nom de navire")) }}

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- textarea -->
                                            <div class="form-group">
                                                <div class="form-group">
                                                    {{ Form::label('pavillon', 'Pavillon') }}
                                                    {{ Form::text('pavillon', null, array('class' => 'form-control','placeholder'=>"Entrer le pavillon de navire")) }}

                                                </div>



                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <div class="form-group">

                                                    {{ Form::label('date_dentree', 'Date d’entrée du navire:') }}
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                        {{ Form::text('date_dentree', null, array('class' => 'form-control','data-inputmask-alias'=>'datetime','data-inputmask-inputformat'=>"dd/mm/yyyy",'data-mask')) }}

                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <div class="form-group">
                                                    {{ Form::label('tonnage', 'Tonnage') }}
                                                    {{ Form::text('tonnage', null, array('class' => 'form-control','placeholder'=>"Entrer le Poids transporté par le navire")) }}

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <div class="form-group">
                                                    {{ Form::label('type', 'type du navire') }}
                                                    {{ Form::text('type', null, array('class' => 'form-control','placeholder'=>"Entrer le type de navire")) }}

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="IMO-Number">numéro IMO</label>
                                                {{ Form::label('imo', 'numéro IMO') }}
                                                {{ Form::text('imo', null, array('class' => 'form-control', 'placeholder'=>"Entrer le numéro IMO")) }}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                {{ Form::label('nom_armateur', 'Nom de l armateur') }}
                                                {{ Form::text('nom_armateur', null, array('class' => 'form-control','placeholder'=>"Entrer le nom de l armateur")) }}
                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group">
                                                {{ Form::label('longeur', 'Longeur') }}
                                                {{ Form::text('longeur', null, array('class' => 'form-control','placeholder'=>'Entrer le longeur')) }}

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                {{ Form::label('largeur', 'Largeur') }}
                                                {{ Form::text('largeur', null, array('class' => 'form-control','placeholder'=>'Entrer le largeur')) }}

                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                {{ Form::label('port_lourd', 'Le port en lourd') }}
                                                {{ Form::text('port_lourd', null, array('class' => 'form-control','placeholder'=>'Entrer le port en lourd')) }}

                                            </div>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group">
                                                {{ Form::label('tirant_eau', 'Le tirant d eau') }}
                                                {{ Form::text('tirant_eau', null, array('class' => 'form-control','placeholder'=>'Entrer le DRAFT')) }}

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputFile">Ou bien sélectionner une fichier CSV</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Upload</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </form>

                        </div>
                        <div class="card-footer">
                            {{ Form::submit('Crée annonce', array('class' => 'btn btn-primary')) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </section>
        </div>
    </section>
@endsection
