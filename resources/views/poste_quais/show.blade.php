@extends('layouts.profile')

@section('title', '| View Post')

@section('content')

    <div class="container">

        <h1>{{ $annonceNav->date_dentree }}</h1>
        <hr>
        <p class="lead">{{ $annonceNav->IMO }} </p>
        <hr>
        {!! Form::open(['method' => 'DELETE', 'route' => ['annonceNav.destroy', $annonceNav->id] ]) !!}
        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>

            <a href="{{ route('annonceNav.edit', $annonceNav->id) }}" class="btn btn-info" role="button">Edit</a>


            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

        {!! Form::close() !!}

    </div>

@endsection
