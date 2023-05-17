    @extends('layouts.app')



    @section('title', 'Apartments list')
        


@section('content')
<a class="btn btn-primary my-3 "  href="{{ route('admin.apartments.create') }}" role="button" >Add apartment</a>
<div class="row g-3 row-cols-2">
    @foreach ($apartments as $apartment)
    <div class="col">
    <div class="card h-100 my-3">

            {{-- @dump($apartment->image)
                @dump(str_starts_with($apartment->image, 'http')) --}}
                <img src="{{ $apartment->getImageUri() }}" class="card-img-top" alt="...">
                <div class="card-body d-flex flex-column mt-auto flex-grow-0">
                    <h5 class="card-title mb-auto">{{ $apartment->title }}</h5>
                    <p class="card-text">{{ $apartment->address }}</p>
                    <div class="mt-auto">
                        <a href="{{ route('admin.apartments.show', $apartment) }}" class="btn btn-primary">Details</a>
                        <a href="{{ route('admin.apartments.edit', $apartment) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('admin.apartments.edit', $apartment) }}" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-apartment-modal-{{ $apartment->id }}">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="col-12 mt-5">
        {{ $apartments->links() }}
    </div>
</div>



{{-- <table class="table">
  
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
                <a href="{{ route('admin.apartments.show', $apartment) }}"> <i class="fa-solid fa-circle-info"></i> </a>
                <a href="{{ route('admin.apartments.create') }}" role="button" ><i class="fa-solid fa-square-plus"></i></a>
                <a href="{{ route('admin.apartments.edit', $apartment) }}"><i class="fa-solid fa-pen-to-square"></i></a>
            </td>
        </tr>
        
        @endforeach
    </tbody>
    </div>
    
</table> --}}

@endsection

{{ $apartments->links() }}



{{-- bottone per la modale --}}


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

<!-- RISOLUZIONE INDEX -->