@extends('layouts.profile')

@section('content')


    <section class="content" style="padding-bottom: 2%">
        <div class="wrapper" style="padding-left: 4%; padding-right: 4%;">
            <section class="content">
                {{ Form::open(array('route' => 'bon_a_delivrers.store','data-parsley-validate'=> '','autocomplete'=>'off')) }}
                <div class="wrapper">
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>Bon à délivrer</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">Page d'accueil</a></li>
                                        <li class="breadcrumb-item active">Bon à délivrer</li>
                                    </ol>
                                </div>
                            </div>
                        </div><!-- /.container-fluid -->
                    </section>
                    <!-- /.card-header -->
                    <!-- form start -->


                    <div class="card">
                        <form role="form" autocomplete="off">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">

                                                <label for="champs">Nom du navire</label>
                                                <input type="text" name="champs[nom_navire]" class="form-control" placeholder="Entrer le nom du navire" data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required >



                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">

                                                <label for="champs">Nom du transitaire</label>
                                                <input type="text" name="champs[transitaire]" class="form-control" placeholder="Entrer le nom du transitaire" data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">

                                                <label for="champs">Nom du client</label>
                                                <input type="text" name="champs[client]" class="form-control" placeholder="Entrer le nom du client" data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>



                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-group">

                                                <label for="champs">Adresse du client</label>
                                                <input type="text" name="champs[client_adr]" class="form-control" placeholder="Entrer l\'adresse du client" data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>

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
                                                <input type="text" name="champs[provenance]" class="form-control" placeholder="Entrer la provenance du navire" data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>


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
                                            <label for="champs">Marchandise délivrée</label>
                                            <input type="text" name="champs[marchandise]" class="form-control" placeholder="Entrer la marchandise" data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>

                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="champs">Quantité de la marchandise</label>

                                            <input type="text" name="champs[q_marchandise]" class="form-control" placeholder="Entrer la quantité de la marchandise" data-parsley-pattern="[0-9]*(\.?[0-9]*)?" data-parsley-trigger="keyup" required>

                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group">
                                            <label for="champs">Poids de la marchandise</label>
                                            <input type="text" name="champs[p_marchandise]" class="form-control" placeholder="Entrer le poids de la maechandise" data-parsley-pattern="[0-9]*(\.?[0-9]*)?" data-parsley-trigger="keyup" required>
                                        </div>
                                    </div>
                                </div>




                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="champs">Numéro de BL </label>

                                                <input type="text" name="champs[num_bl]" class="form-control" placeholder="Entrer le numéro de BL" data-parsley-pattern="[0-9]*(\.?[0-9]*)?" data-parsley-trigger="keyup" required>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="champs">Date d’escale : </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                    </div>
                                                    <input type="text" name="champs[date_escale]" class="form-control"  data-inputmask-alias = "datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask >

                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">

                                                <label for="champs">Lieux du chargement </label>
                                                <input type="text" name="champs[l_chargement]" class="form-control" placeholder="Entrer le lieux de chargement" data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">

                                                <label for="champs">Lieux du déchargement </label>
                                                <input type="text" name="champs[l_dechargement]" class="form-control" placeholder="Entrer le lieux de déchargement" data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">

                                                <label for="champs">Nombre d’unité </label>

                                                <input type="text" name="champs[nb_unite]" class="form-control" placeholder="Entrer le nombre d'unité" data-parsley-pattern="[0-9]*(\.?[0-9]*)?" data-parsley-trigger="keyup" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">

                                                <label for="champs">Numéro de poste</label>

                                                <input type="text" name="champs[nb_poste]" class="form-control" placeholder="Entrer le numéro de poste" data-parsley-pattern="[0-9]*(\.?[0-9]*)?" data-parsley-trigger="keyup" required>
                                            </div>
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
