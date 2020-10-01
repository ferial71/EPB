@extends('layouts.profile')

@section('content')


    <section class="content" style="padding-bottom: 2%">
        <div class="wrapper" style="padding-left: 4%; padding-right: 4%;">
            <section class="content">
                {{ Form::open(array('route' => 'manifestes.store','data-parsley-validate'=> '','autocomplete'=>'off')) }}
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

                                                <label for="champs">La nature de l’escale du navire</label>
                                                <input type="text" name="champs[nature_escale]" class="form-control"  data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>


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


                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="champs">Date estimée d’arrivée du navire: </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                    </div>
                                                    <input type="text" data-provide="datepicker" id="datepicker" name="champs[date]" class="form-control"  data-inputmask-alias = "datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask >

                                                </div>
                                                <!-- /.input group -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="champs">Nom du réceptionnaire </label>
                                            <input type="text" name="champs[receptionnaire]" class="form-control"  data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>

                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-group">

                                                <label for="champs">Marchandises transportées</label>
                                                <input type="text" name="champs[marchandise]" class="form-control"  data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="champs">Nature des marchandises</label>
                                            <input type="text" name="champs[n_marchandise]" class="form-control"  data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>

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

                                                <label for="champs">Poids total de la marchandise</label>
                                                <input type="text" name="champs[poids]" class="form-control"  data-parsley-pattern="[0-9]*(\.?[0-9]*)?" data-parsley-trigger="keyup" required>



                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">

                                                <label for="champs">Poids du BL </label>
                                                <input type="text" name="champs[poids_bl]" class="form-control"  data-parsley-pattern="[0-9]*(\.?[0-9]*)?" data-parsley-trigger="keyup" required>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">

                                                <label for="champs">Nombre de colis transportés </label>
                                                <input type="text" name="champs[nb_colis]" class="form-control" data-parsley-pattern="[0-9]*" data-parsley-trigger="keyup" required>
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
