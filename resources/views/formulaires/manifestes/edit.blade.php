@extends('layouts.profile')

@section('content')


    <section class="content" style="padding-bottom: 2%">
        <div class="wrapper" style="padding-left: 4%; padding-right: 4%;">
            <section class="content">
                {{ Form::model($formulaire, array('route' => array('manifestes.update', $formulaire->id), 'method' => 'PUT')) }}

                <div class="wrapper">
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>Manifestes</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">page d'accueil</a></li>
                                        <li class="breadcrumb-item active">Manifestes</li>
                                    </ol>
                                </div>
                            </div>
                        </div><!-- /.container-fluid -->
                    </section>
                    <!-- /.card-header -->
                    <!-- form start -->


                    <div class="card">
                        <form role="form">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">

                                                <label for="nom_navire">Nom du navire</label>
                                                <input type="text" name="nom_navire" class="form-control" placeholder="Entrer le nom du navire"" >



                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">

                                                <label for="transitaire">Transitaire</label>
                                                <input type="text" name="transitaire" class="form-control" placeholder="Entrer le nom du transitaire" >


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">

                                                <label for="nom_armateur">Nom de l armateur</label>
                                                <input type="text" name="nom_armateur" class="form-control" placeholder="Entrer le nom de l armateur" >



                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-group">

                                                <label for="consignataire">consignataire</label>
                                                <input type="text" name="consignataire" class="form-control" placeholder="Entrer le nom du consignataire" >

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="provenance">Provenance</label>
                                                <input type="text" name="provenance" class="form-control" placeholder="Entrer la provenance du navire" >


                                            </div>



                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="date">Date d’entrée du navire: </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                    </div>
                                                    <input type="text" name="date" class="form-control"  data-inputmask-alias = "datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask >

                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="cargaison">Cargaisone</label>
                                            <input type="text" name="cargaison" class="form-control" placeholder="Entrer la Cargaison" >

                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="marchandise">Nature des marchandises</label>
                                            <input type="text" name="marchandise" class="form-control" placeholder="Entrer la nature des marchandises" >

                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label for="m_conditionnement">Mode de conditionnement</label>
                                            <input type="text" name="m_conditionnement" class="form-control" placeholder="Entrer le mode de conditionnement" >
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="tonnage">Tonnage </label>
                                                <input type="text" name="tonnage" class="form-control" placeholder="Entrer le Poids transporté par le navire" >

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="type">type du navire </label>
                                                <input type="text" name="type" class="form-control" placeholder="Entrer le type du navire" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="imo">numéro IMO</label>
                                            <input type="text" name="imo" class="form-control" placeholder="Entrer le numéro IMO" >
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="rade">La rade actuelle</label>
                                            <input type="text" name="rade" class="form-control" placeholder="Entrer la rade actuelle du navire" >
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">

                                            <label for="pavillon">Pavillon </label>
                                            <input type="text" name="pavillon" class="form-control" placeholder="Entrer le pavillon du navire" >

                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="longeur_navire">Longeur du navire</label>
                                            <input type="text" name="longeur_navire" class="form-control" placeholder="Entrer le longeur du navire" >

                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="largeur_navire">Largeur du navire</label>
                                            <input type="text" name="largeur_navire" class="form-control" placeholder="Entrer le largeur du navire" >

                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="port_lourd">Le port en lourd</label>
                                            <input type="text" name="port_lourd" class="form-control" placeholder="Entrer le port en lourd" >

                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label for="tirant_eau">Le tirant d'eau</label>
                                            <input type="text" name="tirant_eau" class="form-control" placeholder="Entrer le tirant d'eau" >
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
                        {{ Form::submit('update', array('class' => 'btn btn-primary')) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </section>
        </div>
    </section>
@endsection
