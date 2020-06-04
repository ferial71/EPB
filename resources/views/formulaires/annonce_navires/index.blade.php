@extends('layouts.profile')

@section('content')

    <section>
        <div class="wrapper" style="padding-left: 4%; padding-right: 4%;">
            <section class="content">
                <div class="wrapper">
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>Annonce Navire</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href={{route('home')}}>Page d'accueil</a></li>
                                        <li class="breadcrumb-item active">Annonce Navire
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div><!-- /.container-fluid -->
                    </section>
                    <!-- /.card-header -->
                    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover ">
                                <thead>
                                <tr>
                                    <th>Navire</th>
                                    <th>Transitaire </th>
                                    <th>Armateur </th>
                                    <th>Consignataire </th>
                                    <th>Provenance </th>
                                    <th>E.T.D </th>
                                    <th>Valide</th>
                                </tr>
                                </thead>
                                @foreach($formulaires as $formulaire)
                                    <tbody>
                                    <td> <a href="#bannerformmodal" data-toggle="modal" data-target="#modal-<?php echo $formulaire->id;?>">{{$formulaire->champs[$array[0]]}} </a></td>
                                    @for( $i=1;$i<6;$i++)
                                        <td>{{$formulaire->champs[$array[$i]]}}</td>
                                    @endfor
                                    <div class="modal fade bannerformmodal" tabindex="-1" role="dialog" aria-labelledby="modal-<?php echo $formulaire->id;?>" aria-hidden="true" id="modal-<?php echo $formulaire->id;?>">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">Information sur la navire</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <style type="text/css">
                                                            .label{ float: right;}
                                                        </style>
                                                        <div >
                                                            <ul class="list-group">
                                                                @for( $i=6;$i<12;$i++)
                                                                    <li class="list-group-item">{{$array[$i]}}  :<span class="label label-default"> {{$formulaire->champs[$array[$i]]}}  </span></li>
                                                                @endfor
                                                            </ul>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <td>
                                        @if($formulaire->valide)
                                            <span class="badge badge-success">valide</span>
                                        @else
                                            <span class="badge badge-dark">non valide</span>
                                        @endif
                                    </td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['annonce_navires.destroy', $formulaire->id] ]) !!}
                                        @can('demande_de_poste_a_quai-validate')
                                            <a href="{{ route('annonce_navires.show', $formulaire->id) }}" class="btn btn-primary" role="button">Consulter</a>
                                        @endcan
                                        @can('demande_de_poste_a_quai-create')
                                            <a href="{{ route('annonce_navires.edit', $formulaire->id) }}" class="btn btn-info" role="button">Modifier</a>
                                        @endcan
                                        {!! Form::submit('Supprimer', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}

                                    </td>
                                    </tbody>
                                @endforeach

                            </table>
                        </div>
                    </div>
                    @can('annonce_navire-create')
                        <div class="card-footer">
                            <a href="{{ route('annonce_navires.create') }}" class="btn btn-info" role="button">Nouveau demande</a>

                        </div>
                    @endcan
                </div>
            </section>
        </div>

    @endsection

    @section('scripts')
        <!-- DataTables -->
            <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
            <script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
            <script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
            <script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
            <script>
                $(function () {
                    $("#example1").DataTable({
                        "responsive": true,
                        "autoWidth": false,
                    });
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                        "responsive": true,
                    });
                });
            </script>
@endsection

