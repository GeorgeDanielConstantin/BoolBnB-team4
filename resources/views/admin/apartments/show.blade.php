@extends('layouts.app')
@section('content')


    <strong>Titolo: </strong> {{ $apartment->title }} <br />
    <strong>Descrizione: </strong> {{ $apartment->description }} <br />
    <strong>Indirizzo: </strong> {{ $apartment->address }} <br />
    <strong>Latitudine: </strong> {{ $apartment->latitude }} <br />
    <strong>Longitudine: </strong> {{ $apartment->longitude }} <br />
    <strong>Stanze:</strong> {{ $apartment->rooms  }} <br />
    <strong>Bagni:</strong> {{ $apartment->bathrooms }} <br />
    <strong>Letti:</strong> {{ $apartment->beds }} <br />
    <strong>Metri quadri:</strong> {{ $apartment->square_meters }} <br />

    <a href="{{ route('admin.apartments.index') }}" class="btn btn-outline-primary my-5 mx-3">
        Back to list
    </a>
@endsection