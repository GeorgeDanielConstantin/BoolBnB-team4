


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
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
    <div class="">
    <tbody class="indexcard d-flex flex-row flex-wrap align-items-center gap-5 text-center">
        @foreach ($apartments as $apartment)
        <tr class="card p-5 text-center bg-info">
            <th class="text-light" scope="row">{{ $apartment->id }}</th>
            <td class="text-secondary">{{ $apartment->title }}</td>
            <td><img src="{{$apartment->image}}" alt="" width="400px" height="300px" ></td>
            <!--<td class="descriptionindex">{{ $apartment->description }}</td>-->
            <td class="text-light">{{ $apartment->address }}</td>
            <!--<td class="text-secondary">{{ $apartment->latitude }}</td>
            <td class="text-secondary">{{ $apartment->longitude }}</td>-->
            <!--<td class="text-light">Stanze:{{ $apartment->rooms }}</td>
            <td class="text-light">Bagni:{{ $apartment->bathrooms }}</td>
            <td class="text-light">Letti{{ $apartment->beds }}</td>-->
            <td class="text-light">Metri quadri:{{ $apartment->square_meters }}</td>
            <td class="text-light">Visibilità:{{ $apartment->visibility }}</td>
             <td class="d-flex flex-row gap-3 align-items-center justify-content-center">
                <a href="{{ route('apartments.show', $apartment) }}"> <i class="fa-solid fa-circle-info"></i> </a>
                <a href="{{ route('apartments.create') }}" role="button" ><i class="fa-solid fa-square-plus"></i></a>
                <a href="{{ route('apartments.edit', $apartment) }}"><i class="fa-solid fa-pen-to-square"></i></a>
            </td>
        </tr>
        
        @endforeach
    </tbody>
    </div>
    
</table>

{{ $apartments->links() }}



{{-- bottone per la modale --}}
{{-- <a href="{{ route('admin.apartments.edit', $apartment) }}" class="text-danger" data-bs-toggle="modal" data-bs-target="#delete-project-modal-{{ $apartment->id }}">
    <i class="bi bi-trash mx-1"></i>
</a> --}}

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
                    <form method="POST" action="{{ route('apartments.destroy', $apartment)}}">
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

<!-- RISOLUZIONE INDEX -->
</body>
</html>