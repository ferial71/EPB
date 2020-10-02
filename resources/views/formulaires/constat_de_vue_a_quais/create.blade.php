@extends('layouts.profile')

@section('content')


    <section class="content" style="padding-bottom: 2%">
        <div class="wrapper" style="padding-left: 4%; padding-right: 4%;">
            <section class="content">
                {{ Form::open(array('route' => 'constat_de_vue_a_quais.store','data-parsley-validate'=> '','autocomplete'=>'off')) }}
                <div class="wrapper">
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>Constat de vue a quais</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="{{route('home')}}">Page d'accueil</a></li>
                                        <li class="breadcrumb-item active">Constat de vue a quais</li>
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
                                                    <label for="champs">Nature marchandie</label>
                                                    <select id="nature" name="champs[nature]"class="form-control">
                                                        @foreach($marchandise as $marchandis)
                                                            <option value="{{$marchandis->nature}}">{{$marchandis->nature}}</option>
                                                        @endforeach
                                                    </select>
    {{--                                                <input type="text" name="champs[nom_navire]" class="form-control" placeholder="Entrer le nom du navire"data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required >--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">

                                                <label for="champs">Poids</label>


                                                <input type="text" name="champs[poids]" class="form-control"data-parsley-pattern="[0-9]*(\.?[0-9]*)?" data-parsley-trigger="keyup" required>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <div class="form-group">



                                                <label for="champs">Ligne du poste de marchandise</label>
                                                <select id="ligne" name="champs[ligne]"class="form-control">
                                                    @foreach($emplacements as $emplacement)
                                                        <option value="{{$emplacement->ligne}}">{{$emplacement->ligne}}</option>
                                                    @endforeach
                                                </select>
{{--                                                <input type="text" name="champs[poids]" class="form-control" placeholder="Entrer le poids de la marchandise" data-parsley-pattern="[0-9]*(\.?[0-9]*)?" data-parsley-trigger="keyup" required>--}}



                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-group">

                                                <label for="champs">Collone</label>
                                                <select id="collone" name="champs[collone]"class="form-control">
                                                    @foreach($emplacements as $emplacement)
                                                        <option value="{{$emplacement->collone}}">{{$emplacement->collone}}</option>
                                                    @endforeach
                                                </select>
{{--                                                <input type="text" name="champs[objet]" class="form-control" placeholder="Entrer l'objet demandée" data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>--}}

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="champs">Altitude</label>
                                                <select id="altitude" name="champs[altitude]"class="form-control">
                                                    @foreach($emplacements as $emplacement)
                                                        <option value="{{$emplacement->altitude}}">{{$emplacement->altitude}}</option>
                                                    @endforeach
                                                </select>
{{--                                                <input type="text" name="champs[provenance]" class="form-control" placeholder="Entrer la provenance du navire" data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>--}}
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
