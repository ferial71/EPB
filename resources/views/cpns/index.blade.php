@extends('layouts.profile')

@section('content')

    <section class="content" style="padding-bottom: 2%">
        <div class="wrapper" style="padding-left: 4%; padding-right: 4%;">
            <section class="content">
                <div class="wrapper">
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>Bon à délivrer</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href={{route('home')}}>Page d'accueil</a></li>
                                        <li class="breadcrumb-item active">Bon à délivrer</li>
                                    </ol>
                                </div>
                            </div>
                        </div><!-- /.container-fluid -->
                    </section>

                    <div class="card border-light mb-3"  >
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="dataTables_length" id="example1_length">
                                        <label>Show
                                            <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm">
                                                <option value="5">5</option>
                                                <option value="10">10</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                            entries
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="example1_filter" class="dataTables_filter">
                                        <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-11 col-md-offset-2 ">
                                    <table id="example1" class="table table-bordered table-striped ">
                                        <thead>
                                            <tr>
                                            <th>POSTE</th>
                                                <th>NAVIRE</th>
                                                <th>LONGUEUR</th>
                                                <th>CARGAISON</th>

                                                <th>H.SORTIE</th>

                                            </tr>
                                        </thead>
                                        @foreach($cpns as $cpn)
                                            <tbody>
                                                <td>{{$cpn->getQuai($cpn->quai_id)->numero}}</td>

                                                <td>{{$cpn->getNavire($cpn->navire_id)->nom}}</td>
                                                <td>{{$cpn->getNavire($cpn->navire_id)->longeur}}</td>
                                                <td>{{$cpn->getNavire($cpn->navire_id)->getCargaison($cpn->navire_id)->id}}</td>
                                                <td>{{$cpn->heur_sortie}}</td>

{{--                                                @php($id_nav = $escale->getNavire($escale->navire_id)->id)--}}

{{--                                                @php(dd($id_nav))--}}
{{--                                                @php($id_cargo = $escale->getNavire($escale->navire_id)->getAnnonceNavire($id_nav)->id)--}}
{{--                                                @php(dd(var_dump($escale->getNavire($escale->navire_id)->getAnnonceNavire($id_nav))))--}}
{{--                                                @php(dd($id_cargo))--}}
{{--                                                @php(dd($escale->getNavire($escale->navire_id)->getAnnonceNavire($id_nav)->id))--}}
{{--                                                @php(dd($escale->getNavire($escale->navire_id)->getAnnonceNavire($id_nav)->getCargaison($id_cargo)->nom))--}}
{{--                                                <td>{{$escale->getNavire($escale->navire_id)->getAnnonceNavire($id_nav)->getCargaison($id_cargo)->nom}}</td>--}}

{{--                                                <td>{{strval($escale->navire_id)}}</td>--}}
{{--                                                <td>@php(var_dump($escale->navire_id))</td>--}}

                                            </tbody>
                                        @endforeach



                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
@endsection
