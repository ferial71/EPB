@extends('layouts.profile')

@section('content')


    <section class="content" style="padding-bottom: 2%">
        <div class="wrapper" style="padding-left: 4%; padding-right: 4%;">
            <section class="content">
                {{ Form::model($formulaire, array('route' => array('annonce_navires.update', $formulaire->id), 'method' => 'PUT')) }}

                <div class="wrapper">
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>Annonce Navire</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="{{route('annonce_navires.index')}}">liste des annonces</a></li>
                                        <li class="breadcrumb-item active">Modifier l'annonce navire</li>
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
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="champs">Nom du navire</label>
                                                <input type="text" autocomplete="off" name="champs[nom_navire]" class="form-control" >
                                                <p class="text-danger">@error('champs.nom_navire') {{$message}} @enderror</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="champs">Transitaire</label>
                                                <input type="text" autocomplete="off" name="champs[transitaire]" class="form-control" >
                                                <p class="text-danger">@error('champs.transitaire') {{$message}} @enderror</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="champs">Armateur</label>
                                                <input type="text" autocomplete="off" name="champs[armateur]" class="form-control" >
                                                <p class="text-danger">@error('champs.armateur') {{$message}} @enderror</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="champs">Consignataire</label>
                                                <input type="text" autocomplete="off" name="champs[consignataire]" class="form-control" >
                                                <p class="text-danger">@error('champs.consignataire') {{$message}} @enderror</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="champs">Provenance</label>
                                                <input type="text" autocomplete="off" name="champs[provenance]" class="form-control"  >
                                                <p class="text-danger">@error('champs.provenance') {{$message}} @enderror</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="champs">Date d’entrée du navire: </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                    </div>
                                                    <input type="text" autocomplete="off" name="champs[date]" class="form-control"  data-inputmask-alias = "datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask >
                                                </div>
                                                <p class="text-danger">@error('champs.date') {{$message}} @enderror</p>
                                                <!-- /.input group -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">

                                            <label for="champs[imo]">numéro IMO</label>
                                            <input type="text" autocomplete="off" name="champs[imo]" class="form-control" >
                                            <p class="text-danger">@error('champs.imo') {{$message}} @enderror</p>

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="champs">type du navire </label>
                                                <input type="text" autocomplete="off" name="champs[type]" class="form-control" >
                                                <p class="text-danger">@error('champs.type') {{$message}} @enderror</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="champs">Tonnage </label>
                                                <input type="text" autocomplete="off" name="champs[tonnage]" class="form-control" >
                                                <p class="text-danger">@error('champs.tonnage') {{$message}} @enderror</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="champs">Pavillon </label>
                                                <input type="text" autocomplete="off" name="champs[pavillon]" class="form-control" >
                                                <p class="text-danger">@error('champs.pavillon') {{$message}} @enderror</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="champs">Longeur du navire</label>
                                            <input type="text" autocomplete="off" name="champs[longeur_navire]" class="form-control"  >
                                            <p class="text-danger">@error('champs.longeur_navire') {{$message}} @enderror</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="champs">Largeur du navire</label>
                                            <input type="text" autocomplete="off" name="champs[largeur_navire]" class="form-control" >
                                            <p class="text-danger">@error('champs.largeur_navire') {{$message}} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="champs">Le port en lourd</label>
                                            <input type="text" autocomplete="off" name="champs[port_lourd]" class="form-control"  >
                                            <p class="text-danger">@error('champs.port_lourd') {{$message}} @enderror</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="champs">Le tirant d'eau</label>
                                            <input type="text" autocomplete="off" name="champs[tirant_eau]" class="form-control" >
                                            <p class="text-danger">@error('champs.tirant_eau') {{$message}} @enderror</p>
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
