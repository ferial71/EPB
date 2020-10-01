@extends('layouts.profile')

@section('content')


    <section class="content" style="padding-bottom: 2%">
        <div class="wrapper" style="padding-left: 4%; padding-right: 4%;">
            <section class="content">
                {{ Form::open(array('route' => 'bon_a_enlevers.store','data-parsley-validate'=> '','autocomplete'=>'off')) }}
                <div class="wrapper">
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-4">
                                    <h1>Bon à enlever</h1>
                                </div>
                                <div class="col-sm-4">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">Page d'accueil</a></li>
                                        <li class="breadcrumb-item active">Bon à enlever</li>
                                    </ol>
                                </div>
                            </div>
                        </div><!-- /.container-fluid -->
                    </section>
                    <!-- /.card-header -->
                    <!-- form start -->


                    <div class="card">
                        <form role="form"autocomplete="off">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">

                                                <label for="champs">Nom du navire</label>
                                                <select id="nom_navire" name="champs[nom_navire]"class="form-control">
                                                    @foreach($navires as $navire)
                                                        <option value="{{$navire->nom}}">{{$navire->nom}}</option>
                                                    @endforeach
                                                </select>
{{--                                                <input type="text" name="champs[nom_navire]" class="form-control" placeholder="Entrer le nom du navire" data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required >--}}



                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">

                                                <label for="champs">Nom du transitaire</label>
                                                <select id="transitaire" name="champs[transitaire]"class="form-control">
                                                    @foreach($users_trans as $users_tran)
                                                        <option value="{{$users_tran->name}}">{{$users_tran->name}}</option>
                                                    @endforeach
                                                </select>
{{--                                                <input type="text" name="champs[transitaire]" class="form-control" placeholder="Entrer le nom du transitaire" data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>--}}


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">

                                                <label for="champs">Nom du client</label>
                                                <select id="client" name="champs[client]"class="form-control">
                                                    @foreach($clients as $client)
                                                        <option value="{{$client->nom}}">{{$client->nom}}</option>
                                                    @endforeach
                                                </select>
{{--                                                <label for="champs">Nom du réceptionnaire</label>--}}
{{--                                                <input type="text" name="champs[receptionnaire]" class="form-control" placeholder="Entrer le nom de réceptionnaire" data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>--}}



                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="champs">Marchandise à enlever </label>
                                            <select id="client" name="champs[client]"class="form-control">
                                                @foreach($marchandise as $marchandis)
                                                    <option value="{{$marchandis->name}}">{{$marchandis->name}}</option>
                                                @endforeach
                                            </select>
                                            {{--                                            <input type="text" name="champs[marchandise]" class="form-control" placeholder="Entrer la marchandise à enlever" data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>--}}

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="champs">Date d’entrée de la marchandise: </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                    </div>
                                                    <input type="text" id="datepicker" data-provide="datepicker" name="champs[date_entrer]" class="form-control"  data-inputmask-alias = "datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask >

                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="champs">Date d’enlèvement de la marchandise: </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                    </div>
                                                    <input type="text" id="datepicker" data-provide="datepicker" name="champs[date_enlever]" class="form-control"  data-inputmask-alias = "datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask >

                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">



                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="champs">Mode de conditionnement de la marchandise</label>
                                            <input type="text" name="champs[m_conditionnement]" class="form-control"   data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="champs">Poids de la marchandise</label>

                                            <input type="text" name="champs[p_marchandise]" class="form-control"  data-parsley-pattern="[0-9]*(\.?[0-9]*)?" data-parsley-trigger="keyup" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="champs">Nombre d'unité </label>

                                                <input type="text" name="champs[nb_unite]" class="form-control"  data-parsley-pattern="[0-9]*(\.?[0-9]*)?" data-parsley-trigger="keyup" required>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="champs">Date de la déclaration : </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                    </div>
                                                    <input type="text" id="datepicker" data-provide="datepicker" name="champs[date_declaration]" class="form-control"  data-inputmask-alias = "datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask >

                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">

                                                <label for="champs">Numéro de déclaration</label>

                                                <input type="text" name="champs[num_declaration]" class="form-control"  data-parsley-pattern="[0-9]*(\.?[0-9]*)?" data-parsley-trigger="keyup" required>
                                            </div>
                                        </div>
                                    </div>

                                </div>



                                <div class="form-group">
                                    <label for="exampleInputFile">Ou bien sélectionner un fichier CSV</label>
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
@section('scripts')
    <script >
        $( function() {
            $( "#datepicker" ).datepicker();
        } );

    </script>
@stop
