@extends('layouts.profile')

@section('content')

    <section class="content" style="padding-bottom: 2%">
        <div class="wrapper" style="padding-left: 4%; padding-right: 4%;">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Demande de poste à quai</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Demande de poste à quai</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <div class="card border-light mb-3"  >

                <form role="form">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="nom_consignataire">Nom du consignataire</label>
                                            <input type="text" class="form-control" placeholder="Entrer le nom de consignataire">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="nom_navire">Nom du navire</label>
                                        <input type="text" class="form-control" placeholder="Entrer le nom de navire">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="Nom_transitaire">Nom du transitaire</label>
                                        <input type="text" class="form-control" placeholder="Entrer le nom du transitaire">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- textarea -->
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="Provenance">Provenance</label>
                                        <input type="text" class="form-control" placeholder="Entrer le Provenance du navire">
                                    </div>



                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Date de la demande:</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
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
                                        <label for="Tonnage">Tonnage</label>
                                        <input type="text" class="form-control" placeholder="Entrer le Poids transporté par le navire">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="Type-Navire">Type du navire</label>
                                        <input type="text" class="form-control" placeholder="Entrer le Type de navire">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="IMO-Number">numéro IMO</label>
                                    <input type="text" class="form-control" placeholder="Entrer le numéro IMO">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="FLAG">FLAG</label>
                                    <input type="text" class="form-control" placeholder="Entrer le Pavillon du navire">
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="LOA">LOA</label>
                                    <input type="text" class="form-control" placeholder="Entrer le LOA">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="BEAM">BEAM</label>
                                    <input type="text" class="form-control" placeholder="Entrer le BEAM">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="DWT">DWT</label>
                                    <input type="text" class="form-control" placeholder="Entrer le DWT">
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="DRAFT">DRAFT</label>
                                    <input type="text" class="form-control" placeholder="Entrer le DRAFT">
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
            <section>
                <button type="submit" class="btn btn-primary">Submit</button>
            </section>
        </div>
    </section>

@endsection
