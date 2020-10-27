@extends('layouts.profile')

@section('content')


    <section class="content" style="padding-bottom: 2%">
        <div class="wrapper" style="padding-left: 4%; padding-right: 4%;">
            <section class="content">
                {{ Form::open(array('route' => 'poste_quais.store','data-parsley-validate'=> '','autocomplete'=>'off')) }}
                <div class="wrapper">
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>Demande de poste à quai</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="{{route('poste_quais.index')}}">Liste des postes à quai</a></li>
                                        <li class="breadcrumb-item active">Demande de poste à quai</li>
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
                                                <p class="text-danger">@error('champs.nom_navire') {{$message}} @enderror</p>
{{--                                                <input type="text" name="champs[nom_navire]" class="form-control" placeholder="Entrer le nom du navire" data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>--}}



                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">

                                                <label for="champs">Transitaire</label>
                                                <select id="champs[transitaire]" name="champs[transitaire]"class="form-control">
                                                    @foreach($users_trans as $users_tran)
                                                        <option value="{{$users_tran->name}}">{{$users_tran->name}}</option>
                                                    @endforeach
                                                </select>
                                                <p class="text-danger">@error('champs.transitaire') {{$message}} @enderror</p>
{{--                                                <input type="text" name="champs[transitaire]" class="form-control" placeholder="Entrer le nom du transitaire" data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>--}}


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">

                                                <label for="champs">Nom de l'armateur</label>
                                                <select id="armateur" name="champs[armateur]"class="form-control">
                                                    @foreach($armateurs as $armateur)
                                                        <option value="{{$armateur->nom}}">{{$armateur->nom}}</option>
                                                    @endforeach
                                                </select>
                                                <p class="text-danger">@error('champs.armateur') {{$message}} @enderror</p>
{{--                                                <input type="text" name="champs[nom_armateur]" class="form-control" placeholder="Entrer le nom de l armateur" data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>--}}



                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-group">

                                                <label for="champs">consignataire</label>
                                                <select id="champs[consignataire]" name="champs[consignataire]"class="form-control">
                                                    @foreach($users_cons as $users_con)
                                                        <option value="{{$users_con->name}}">{{$users_con->name}}</option>
                                                    @endforeach
                                                </select>
                                                <p class="text-danger">@error('champs.consignataire') {{$message}} @enderror</p>
{{--                                                <input type="text" name="champs[consignataire]" class="form-control" placeholder="Entrer le nom du consignataire" data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>--}}

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="champs">Provenance</label>
                                                <select id="champs[provenance]" name="champs[provenance]"class="form-control">
                                                    @foreach($countries as $countrie)
                                                        <option value="{{$countrie}}">{{$countrie}}</option>
                                                    @endforeach
                                                </select>
{{--                                                <input type="text" name="champs[provenance]" class="form-control" placeholder="Entrer la provenance du navire" data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>--}}


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
                                                    <input type="text" data-provide="datepicker"  id="datepicker" name="champs[date]" class=" datetimepicker form-control"  data-inputmask-alias = "datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask >
                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="champs">Cargaison</label>
                                            <input type="text" name="champs[cargaison]" class="form-control"  data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="champs">Nature des marchandises</label>
                                            <input type="text" name="champs[marchandise]" class="form-control"  data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="champs">Mode de conditionnement</label>
                                            <input type="text" name="champs[m_conditionnement]" class="form-control"  data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="champs">Tonnage </label>

                                                <input type="text" id="tonnage" name="champs[tonnage]" class="form-control"  data-parsley-pattern="[0-9]*(\.?[0-9]*)?" data-parsley-trigger="keyup" required>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="champs">type du navire </label>
                                                <input type="text" id="type" name="champs[type]" class="form-control"  data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">

                                            <label for="champs">numéro IMO</label>
                                            <input type="text" id="imo" name="champs[imo]" class="form-control"  data-parsley-pattern="[0-9]*" data-parsley-trigger="keyup" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">

                                            <label for="champs">La rade actuelle</label>
                                            <input type="text" name="champs[rade]" class="form-control"  data-parsley-pattern="[0-9]*" data-parsley-trigger="keyup" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">

                                            <label for="champs">Pavillon </label>
                                            <input type="text" id="pavillon" name="champs[pavillon]" class="form-control"  data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">

                                            <label for="champs">Longeur du navire</label>
                                            <input type="text" id="longeur_navire" name="champs[longeur_navire]" class="form-control"  data-parsley-pattern="[0-9]*(\.?[0-9]*)?" data-parsley-trigger="keyup" required>

                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="champs">Largeur du navire</label>
                                            <input type="text" id="largeur_navire" name="champs[largeur_navire]" class="form-control"  data-parsley-pattern="[0-9]*(\.?[0-9]*)?" data-parsley-trigger="keyup" required>

                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="champs">Le port en lourd</label>
                                            <input type="text" id="port_lourd" name="champs[port_lourd]" class="form-control" data-parsley-pattern="[0-9]*(\.?[0-9]*)?" data-parsley-trigger="keyup" required>

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="champs">Le tirant d'eau</label>
                                            <input type="text" id="tirant_eau" name="champs[tirant_eau]" class="form-control"  data-parsley-pattern="[0-9]*(\.?[0-9]*)?" data-parsley-trigger="keyup" required>
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
        $(document.body).on('change','#nom_navire',function(){
            // $("#nom_navire").change(function(){

            var nom = $(this).val();
            var url = '{{ route("poste_quais.navire", ":nom") }}';
            url = url.replace(':nom', nom);
            url = url.replace(' ', '_');

            // alert(url);

            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(response){
                    if(response != null){
                        // alert(response.imo);
                        $('#imo').val(response.imo);
                        $('#tirant_eau').val(response.tirant_eau);
                        ////
                        $('#port_lourd').val(response.port_lourd);
                        $('#largeur_navire').val(response.largeur);
                        $('#longeur_navire').val(response.longeur);
                        $('#pavillon').val(response.pavillon);
                        $('#tonnage').val(response.poids);
                        $('#type').val(response.type);
                    }
                },
                error: function() {
                    console.log('event');
                }
            });
        });

        $( function() {
            $( "#datepicker" ).datepicker();
        } );

    </script>
@stop
