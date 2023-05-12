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



{{-- bottone per la modale --}}
<a href="{{ route('admin.projects.edit', $project) }}" class="text-danger" data-bs-toggle="modal" data-bs-target="#delete-project-modal-{{ $project->id }}">
    <i class="bi bi-trash mx-1"></i>
</a>

{{-- modale --}}
@section('modals')
    @foreach ($apartments as $apartment)
        <div class="modal fade" id="delete-apartment-modal-{{ $apartment->id }}" tabindex="-1" aria-labelledby="delete-apartment-modal-{{ $apartment->id }}-label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="delete-apartment-modal-{{ $apartment->id }}-label">Elimina l'appartamento n°{{ $apartment->id }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    L'appartamento <strong>{{ $apartment->title }}</strong> sarà eliminato. Sei sicuro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, annulla</button>
                    <form method="POST" action="{{ route('admin.apartments.destroy', $apartment)}}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-primary">Sì, elimina</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection