@extends('layouts.profile')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Posts</h3></div>
                    <div class="panel-heading">Page {{ $annonce_navires->currentPage() }} of {{ $annonce_navires->lastPage() }}</div>
                    @foreach ($annonce_navires as $annonce_navire)
                        <div class="panel-body">
                            <li style="list-style-type:disc">
                                <a href="{{ route('annonce_navire.show', $annonce_navire->id ) }}"><b>{{ $annonce_navire->navire_id }}</b><br>
                                    <p class="teaser">
                                        {{  str_limit($annonce_navire->DRAFT, 100) }} {{-- Limit teaser to 100 characters --}}
                                    </p>
                                </a>
                            </li>
                        </div>
                    @endforeach
                </div>
                <div class="text-center">
                    {!! $annonce_navires->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
