@extends('layouts.app')

@section('title', $apartment->title)

@section('content')
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap"
    rel="stylesheet"
  />




  <section class="showcard card py-2 ">
    <div class="card-body">

        

        <figure class="float-end ms-5 mb-1">
         
                <img src="{{ $apartment->getImageUri() }}" class="img-fluid showimage" alt="..." width="80%">
          
            <figcaption>
                <p class="text-secondary m-0"><strong></strong></p>
            </figcaption>
        </figure>

        
        <div class="row mb-1 ">
            {{-- @dump("Latitudine: " . $apartment->latitude)
            @dump("Longitudine: " . $apartment->longitude) --}}
            <div class="col-md-3 text-end">
                <label for="title" class="form-label"><strong>Nome Appartamento </strong></label>
            </div>
            <div class="col-md-5">
                <p class="text-muted">{{$apartment->title}}</p>
            </div>
        </div>

        <div class="row mb-1">
            <div class="col-md-3 text-end">
                <label for="address" class="form-label"><strong>Indirizzo </strong></label>
            </div>
            <div class="col-md-5">
                <p class="text-muted">{{$apartment->address}}</p>
            </div>
        </div>

        <div class="row mb-1">
            <div class="col-md-3 text-end">
                <label for="rooms" class="form-label"><strong>Numero di Stanze </strong></label>
            </div>
            <div class="col-md-5">
                <p class="text-muted">{{$apartment->rooms}}</p>
            </div>
        </div>

        <div class="row mb-1">
            <div class="col-md-3 text-end">
                <label for="beds" class="form-label"><strong>Numero di letti </strong></label>
            </div>
            <div class="col-md-5">
                <p class="text-muted">{{$apartment->beds}}</p>
            </div>
        </div>

        <div class="row mb-1">
            <div class="col-md-3 text-end">
                <label for="bathrooms" class="form-label"><strong>Numero di bagni </strong></label>
            </div>
            <div class="col-md-5">
                <p class="text-muted">{{$apartment->bathrooms}}</p>
            </div>
        </div>

        <div class="row mb-1">
            <div class="col-md-3 text-end">
                <label for="square_meters" class="form-label"><strong>Metri quadrati </strong></label>
            </div>
            <div class="col-md-5">
                <p class="text-muted">{{$apartment->square_meters}}</p>
            </div>
        </div>

        <div class="row mb-1">
            <div class="col-md-3 text-end">
                <label for="visibility" class="form-label">
                    <strong>Sponsered untill</strong>
                </label>
            </div>
            <div class="col-md-5 d-flex">
                <p class="text-muted">
                    @if ($apartment->apartmentsponsor->isNotEmpty())
                    {{ $apartment->apartmentsponsor->last()->ending_date }}
                    @else Not sponsored
                    @endif
                </p>
                <a class="btn btn-primary btn-sm ms-3" href="{{ route('admin.apartments.sponsorship', $apartment) }}"> Add sponsorship</a>
            </div>
        </div>

        <div class="d-flex flex-column col-12 mr-5 ">
            <div class="text-start ">
                <label for="description" class="form-label"><strong>Descrizione Appartamento </strong></label>
            </div>
            <div class="col-12 text-center p-3">
                <p class="text-muted showdescription">{{$apartment->description}}</p>
            </div>
            
        </div>

        

        <div class="row mb-1 p-3">
            <div class="col-6">

                <div class="">
                    <label for="description" class="form-label"><strong>Servizi</strong></label>
                </div>
                <ul class="mx-2 ">
                    @forelse ($apartment->service as $service)
                    <li class="">
                        <span class="text-muted">
                            {{$service->type}} 
                        </span>
                        <span class="text-muted" >
                            {{$service->name}}
                        </span>    
                    </li>
                    
                    @empty
                    Nessun servizio
                    @endforelse
                </ul>
            </div>

        
        </div>
        
    </div>
  </section>
@endsection