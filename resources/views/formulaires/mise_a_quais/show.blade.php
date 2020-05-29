@extends('layouts.profile')

@section('title', '| View Post')

@section('content')

    <div class="container">

        <h1>{{ $annonce_navire->date_dentree }}</h1>
        <hr>
        <p class="lead">{{ $annonce_navire->IMO }} </p>
        <hr>
        {!! Form::open(['method' => 'DELETE', 'route' => ['mise_a_quais.destroy', $annonce_navire->id] ]) !!}
        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>

            <a href="{{ route('mise_a_quais.edit', $annonce_navire->id) }}" class="btn btn-info" role="button">Edit</a>


            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

        {!! Form::close() !!}

    </div>

@endsection
