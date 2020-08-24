@extends('layouts.profile')

@section('content')


    <section class="content" style="padding-bottom: 2%">
        <div class="wrapper" style="padding-left: 4%; padding-right: 4%;">

            <section class="content">
                {{ Form::open(array('route' => 'annonce_navires.store', 'data-parsley-validate'=> '','autocomplete'=>'off'))  }}
                <div class="wrapper">
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>Annonces navire</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="{{route('annonce_navires.index')}}">liste des annonces</a></li>
                                        <li class="breadcrumb-item active">Annonces navire</li>
                                    </ol>
                                </div>
                            </div>
                        </div><!-- /.container-fluid -->
                    </section>
                <!-- /.card-header -->
                <!-- form start -->
                        <div class="card">
                             <form role="form" id="validate_form" autocomplete="off">
                                 @csrf
                                <div class="card-body">
                                    <div class="row">
{{--                                        <input-element></input-element>--}}
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="champs">Nom du navire</label>
                                                    <input type="text" autocomplete="off" name="champs[nom_navire]" class="form-control" data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required >
                                                    <p class="text-danger">@error('champs.nom_navire') {{$message}} @enderror</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="champs">Transitaire</label>
                                                    <input type="text" autocomplete="off" name="champs[transitaire]" class="form-control" data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required >
                                                    <p class="text-danger">@error('champs.transitaire') {{$message}} @enderror</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="champs">Armateur</label>
                                                    <input type="text" autocomplete="off" name="champs[armateur]" class="form-control" data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>
                                                    <p class="text-danger">@error('champs.armateur') {{$message}} @enderror</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="champs">Consignataire</label>
                                                    <input type="text" autocomplete="off" name="champs[consignataire]" class="form-control" data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>
                                                    <p class="text-danger">@error('champs.consignataire') {{$message}} @enderror</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="champs">Provenance</label>
                                                    <input type="text" autocomplete="off" name="champs[provenance]" class="form-control" data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>
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
                                                        <input type="text" autocomplete="off" name="champs[date]" class="form-control"  data-inputmask-alias = "datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask required >
                                                        <p class="text-danger">@error('champs.date') {{$message}} @enderror</p>
                                                    </div>

                                                    <!-- /.input group -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">

                                                <label for="champs[imo]">numéro IMO</label>
                                                <input type="text" autocomplete="off" name="champs[imo]" class="form-control" data-parsley-pattern="[0-9]*(\.?[0-9]*)?" data-parsley-trigger="keyup" required>
                                                <p class="text-danger">@error('champs.imo') {{$message}} @enderror</p>

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- textarea -->
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="champs">type du navire </label>
                                                    <input type="text" autocomplete="off" name="champs[type]" class="form-control"data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" required>
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
                                                    <input type="text" autocomplete="off" name="champs[tonnage]" class="form-control" data-parsley-pattern="[0-9]*(\.[0-9]*)?" data-parsley-trigger="keyup" required>
                                                    <p class="text-danger">@error('champs.tonnage') {{$message}} @enderror</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="champs">Pavillon </label>
                                                    <input type="text" autocomplete="off" name="champs[pavillon]" data-parsley-pattern="/^[a-zA-Z0-9 ]*$/" data-parsley-trigger="keyup" class="form-control" required>
                                                    <p class="text-danger">@error('champs.pavillon') {{$message}} @enderror</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="champs">Longeur du navire</label>
                                                <input type="text" autocomplete="off" name="champs[longeur_navire]" class="form-control" data-parsley-pattern="[0-9]*(\.[0-9]*)?" data-parsley-trigger="keyup" required>
                                                <p class="text-danger">@error('champs.longeur_navire') {{$message}} @enderror</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="champs">Largeur du navire</label>
                                                <input type="text" autocomplete="off" name="champs[largeur_navire]" class="form-control" data-parsley-pattern="[0-9]*(\.[0-9]*)?" data-parsley-trigger="keyup" required>
                                                <p class="text-danger">@error('champs.largeur_navire') {{$message}} @enderror</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="champs">Le port en lourd</label>
                                                <input type="text" autocomplete="off" name="champs[port_lourd]" class="form-control" data-parsley-pattern="[0-9]*(\.[0-9]*)?" data-parsley-trigger="keyup" required>
                                                <p class="text-danger">@error('champs.port_lourd') {{$message}} @enderror</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="champs">Le tirant d'eau</label>
                                                <input type="text" autocomplete="off" name="champs[tirant_eau]" class="form-control" data-parsley-pattern="[0-9]*(\.[0-9]*)?" data-parsley-trigger="keyup" required>
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

{{--                            @error('champs[transitaire]') {{$message}} @enderror--}}
                        </div>
                        <div class="card-footer">
                            {{ Form::submit('Crée annonce', array('class' => 'btn btn-primary')) }}
                            {{ Form::close() }}
                        </div>



{{--                    <div class="form-group{{ $errors->has('csv_file') ? ' has-error' : '' }}">--}}
{{--                        <label for="csv_file">Ou bien sélectionner une fichier CSV</label>--}}


{{--                        <div class="input-group">--}}
{{--                            <div class="custom-file">--}}
{{--                                <input id="csv_file" type="file" class="form-control" name="csv_file" required>--}}
{{--                            </div>--}}

{{--                            <div class="input-group-append">--}}
{{--                                <a  class="input-group-text" id="" href="{{route('annonce_navires.import')}}" method="POST">Upload</a>--}}
{{--                            </div>--}}
{{--                            @if ($errors->has('csv_file'))--}}
{{--                                <span class="help-block">--}}
{{--                                                    <strong>{{ $errors->first('csv_file') }}</strong>--}}
{{--                                                </span>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <form class="form-horizontal" method="POST" action="{{ route('annonce_navires.import') }}" enctype="multipart/form-data">--}}
{{--                        {{ csrf_field() }}--}}

{{--                        <div class="form-group{{ $errors->has('csv_file') ? ' has-error' : '' }}">--}}
{{--                            <label for="csv_file" class="col-md-4 control-label">CSV file to import</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="csv_file" type="file" class="form-control" name="csv_file" >--}}

{{--                                @if ($errors->has('csv_file'))--}}
{{--                                    <span class="help-block">--}}
{{--                                        <strong>{{ $errors->first('csv_file') }}</strong>--}}
{{--                                    </span>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <div class="col-md-6 col-md-offset-4">--}}
{{--                                <div class="checkbox">--}}
{{--                                    <label>--}}
{{--                                        <input type="checkbox" name="header" checked> File contains header row?--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <div class="col-md-8 col-md-offset-4">--}}
{{--                                <button type="submit" class="btn btn-primary">--}}
{{--                                    Parse CSV--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}

                    </div>
                </section>
        </div>
    </section>
@stop

{{--@section('scripts')--}}
{{--    <script>--}}
{{--        $(document).ready(function(){--}}

{{--            $('#validate_form').parsley();--}}

{{--            $('#validate_form').on('submit', function(event){--}}
{{--                event.preventDefault();--}}

{{--                if($('#validate_form').parsley().isValid())--}}
{{--                {--}}
{{--                    $.ajax({--}}
{{--                        url: '{{ route("annonce_navires.create") }}',--}}
{{--                        method:"POST",--}}
{{--                        data:$(this).serialize(),--}}
{{--                        dataType:"json",--}}
{{--                        beforeSend:function()--}}
{{--                        {--}}
{{--                            $('#submit').attr('disabled', 'disabled');--}}
{{--                            $('#submit').val('Submitting...');--}}
{{--                        },--}}
{{--                        success:function(data)--}}
{{--                        {--}}
{{--                            $('#validate_form')[0].reset();--}}
{{--                            $('#validate_form').parsley().reset();--}}
{{--                            $('#submit').attr('disabled', false);--}}
{{--                            $('#submit').val('Submit');--}}
{{--                            alert(data.success);--}}
{{--                        }--}}
{{--                    });--}}
{{--                }--}}
{{--            });--}}

{{--        });--}}
{{--    </script>--}}
{{--@stop--}}
