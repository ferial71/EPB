@extends('layouts.profile')

@section('content')


    <section class="content" style="padding-bottom: 2%">
        <div class="wrapper" style="padding-left: 4%; padding-right: 4%;">
            <section class="content">
                {{ Form::open(array('route' => 'mise_a_quais.store','data-parsley-validate'=> '','autocomplete'=>'off')) }}
                <div class="wrapper">
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>Demande de mise à quai</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="{{route('mise_a_quais.index')}}">Liste des mises à quai</a></li>
                                        <li class="breadcrumb-item active">Nouveau mise à quai</li>
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
{{--                                                <input type="text" name="champs[nom_navire]" class="form-control" placeholder="Entrer le nom du navire" data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>--}}



                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">

                                                <label for="champs">Nom du transitaire</label>
                                                <select id="champs[transitaire]" name="champs[transitaire]"class="form-control">
                                                    @foreach($users_trans as $users_tran)
                                                        <option value={{$users_tran->name}}>{{$users_tran->name}}</option>
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

                                                <label for="champs">Nom du réceptionnaire</label>
                                                <input type="text" name="champs[receptionnaire]" class="form-control"  data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required >



                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="champs">Marques des marchandises</label>
                                                <input type="text" name="champs[marques]" class="form-control"  data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>


                                            </div>



                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="champs">Nombre d'entité</label>

                                            <input type="text" name="champs[nb]" class="form-control"  data-parsley-pattern="[0-9]*(\.?[0-9]*)?" data-parsley-trigger="keyup" required>

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="champs">Nature des colis à transportés</label>
                                            <input type="text" name="champs[n_colis]" class="form-control"  data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="champs">Poids de la marchandise</label>

                                            <input type="text" name="champs[p_marchandise]" class="form-control"  data-parsley-pattern="[0-9]*(\.?[0-9]*)?" data-parsley-trigger="keyup" required>
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
@section('scripts')

    <script >

        $( function() {
            $( "#datepicker" ).datepicker();
        } );

    </script>
@stop
