@extends('layouts.app')

@section('content')

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Address</th>
            <th scope="col">Latitude</th>
            <th scope="col">Longitude</th>
            <th scope="col">Rooms</th>
            <th scope="col">Bathrooms</th>
            <th scope="col">Beds</th>
            <th scope="col">Square_meters</th>
            <th scope="col">Visibility</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($Aapartments as $apartment)
        <tr>
            <th scope="row">{{ $apartment->id }}</th>
            <td>{{ $apartment->title }}</td>
            <td>{{ $apartment->description }}</td>
            <td>{{ $apartment->address }}</td>
            <td>{{ $apartment->latitude }}</td>
            <td>{{ $apartment->longitude }}</td>
            <td>{{ $apartment->rooms }}</td>
            <td>{{ $apartment->bathrooms }}</td>
            <td>{{ $apartment->beds }}</td>
            <td>{{ $apartment->square_meters }}</td>
            <td>{{ $apartment->visibility }}</td>

        </tr>
        @endforeach
    </tbody>
</table>