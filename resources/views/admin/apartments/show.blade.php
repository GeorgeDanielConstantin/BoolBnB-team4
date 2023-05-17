@extends('layouts.app')

@section('title', $apartment->title)

@section('content')

  <section class="card py-2">
    <div class="card-body">

        <figure class="float-end ms-5 mb-3">
         
                <img src="{{ $apartment->getImageUri() }}" class="img-fluid" alt="..." width="300">
          
            <figcaption>
                <p class="text-secondary m-0"><strong></strong></p>
            </figcaption>
        </figure>

        
        <div class="row mb-3">
            @dump("Latitudine: " . $apartment->latitude)
            @dump("Longitudine: " . $apartment->longitude)
            <div class="col-md-3 text-end">
                <label for="title" class="form-label"><strong>Nome Appartamento</strong></label>
            </div>
            <div class="col-md-5">
                <p>{{$apartment->title}}</p>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 text-end">
                <label for="address" class="form-label"><strong>Indirizzo</strong></label>
            </div>
            <div class="col-md-5">
                <p>{{$apartment->address}}</p>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 text-end">
                <label for="rooms" class="form-label"><strong>Numero di Stanze</strong></label>
            </div>
            <div class="col-md-5">
                <p>{{$apartment->rooms}}</p>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 text-end">
                <label for="beds" class="form-label"><strong>Numero di letti</strong></label>
            </div>
            <div class="col-md-5">
                <p>{{$apartment->beds}}</p>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 text-end">
                <label for="bathrooms" class="form-label"><strong>Numero di bagni</strong></label>
            </div>
            <div class="col-md-5">
                <p>{{$apartment->bathrooms}}</p>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 text-end">
                <label for="square_meters" class="form-label"><strong>Metri quadrati</strong></label>
            </div>
            <div class="col-md-5">
                <p>{{$apartment->square_meters}}</p>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 text-end">
                <label for="visibility" class="form-label"><strong>Visibilità</strong></label>
            </div>
            <div class="col-md-5">
                <p>{{$apartment->visibility}}</p>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 text-end">
                <label for="description" class="form-label"><strong>Descrizione Appartamento</strong></label>
            </div>
            <div class="col-md-5">
                <p>{{$apartment->description}}</p>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3 text-end">
                <label for="description" class="form-label"><strong>Servizi</strong></label>
            </div>
            <ul class="col-md-5 mx-2">
                @forelse ($apartment->service as $service)
                <li>
                    <span>
                        {{$service->type}} 
                    </span>
                    <span>
                        {{$service->name}}
                    </span>    
                </li>

                @empty
                Nessun servizio
                @endforelse
            </ul>
        </div>
        
    </div>
  </section>
@endsection