@extends('layouts.profile')

@section('content')


    <section class="content" style="padding-bottom: 2%">
        <div class="wrapper" style="padding-left: 4%; padding-right: 4%;">
            <section class="content">
                {{ Form::open(array('route' => 'poste_quais.store')) }}
                <div class="wrapper">
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>Demande de poste à quai</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">Page d'accueil</a></li>
                                        <li class="breadcrumb-item active">Demande de poste à quai</li>
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

                                                <label for="champs">Nom du navire</label>
                                                <input type="text" name="champs[nom_navire]" class="form-control" placeholder="Entrer le nom du navire"" >



                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">

                                                <label for="champs">Transitaire</label>
                                                <input type="text" name="champs[transitaire]" class="form-control" placeholder="Entrer le nom du transitaire" >


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">

                                                <label for="champs">Nom de l armateur</label>
                                                <input type="text" name="champs[nom_armateur]" class="form-control" placeholder="Entrer le nom de l armateur" >



                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-group">

                                                <label for="champs">consignataire</label>
                                                <input type="text" name="champs[consignataire]" class="form-control" placeholder="Entrer le nom du consignataire" >

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="champs">Provenance</label>
                                                <input type="text" name="champs[provenance]" class="form-control" placeholder="Entrer la provenance du navire" >


                                            </div>



                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="champs">Date d’entrée du navire: </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                    </div>
                                                    <input type="text" name="champs[date]" class="form-control"  data-inputmask-alias = "datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask >

                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="champs">Cargaisone</label>
                                            <input type="text" name="champs[cargaison]" class="form-control" placeholder="Entrer la Cargaison" >

                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="champs">Nature des marchandises</label>
                                            <input type="text" name="champs[marchandise]" class="form-control" placeholder="Entrer la nature des marchandises" >

                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label for="champs">Mode de conditionnement</label>
                                            <input type="text" name="champs[m_conditionnement]" class="form-control" placeholder="Entrer le mode de conditionnement" >
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="champs">Tonnage </label>
                                                <input type="text" name="champs[tonnage]" class="form-control" placeholder="Entrer le Poids transporté par le navire" >

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="champs">type du navire </label>
                                                <input type="text" name="champs[type]" class="form-control" placeholder="Entrer le type du navire" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="champs">numéro IMO</label>
                                            <input type="text" name="champs[imo]" class="form-control" placeholder="Entrer le numéro IMO" >
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="champs">La rade actuelle</label>
                                            <input type="text" name="champs[rade]" class="form-control" placeholder="Entrer la rade actuelle du navire" >
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">

                                            <label for="champs">Pavillon </label>
                                            <input type="text" name="champs[pavillon]" class="form-control" placeholder="Entrer le pavillon du navire" >

                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="champs">Longeur du navire</label>
                                            <input type="text" name="champs[longeur_navire]" class="form-control" placeholder="Entrer le longeur du navire" >

                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="champs">Largeur du navire</label>
                                            <input type="text" name="champs[largeur_navire]" class="form-control" placeholder="Entrer le largeur du navire" >

                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="champs">Le port en lourd</label>
                                            <input type="text" name="champs[port_lourd]" class="form-control" placeholder="Entrer le port en lourd" >

                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label for="champs">Le tirant d'eau</label>
                                            <input type="text" name="champs[tirant_eau]" class="form-control" placeholder="Entrer le tirant d'eau" >
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
                        {{ Form::submit('Crée demande', array('class' => 'btn btn-primary')) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </section>
        </div>
    </section>
@endsection
