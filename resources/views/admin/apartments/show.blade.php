@extends('layouts.app')

@section('title', $apartment->title)

@section('content')

  <section class="card py-2">
    <div class="card-body">

        <div class="row mb-3">
            <div class="col-md-2 text-end">
            <label for="title" class="form-label">Nome Appartamento</label>
            </div>
            <div class="col-md-10">
            <h2>{{$apartment->title}}</h2>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-2 text-end">
            <label for="address" class="form-label">Indirizzo</label>
            </div>
            <div class="col-md-10">
            <h2>{{$apartment->address}}</h2>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-2 text-end">
            <label for="rooms" class="form-label">Numero di Stanze</label>
            </div>
            <div class="col-md-10">
            <h2>{{$apartment->rooms}}</h2>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-2 text-end">
            <label for="beds" class="form-label">Numero di letti</label>
            </div>
            <div class="col-md-10">
            <h2>{{$apartment->beds}}</h2>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-2 text-end">
            <label for="bathrooms" class="form-label">Numero di bagni</label>
            </div>
            <div class="col-md-10">
            <h2>{{$apartment->bathrooms}}</h2>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-2 text-end">
            <label for="square_meters" class="form-label">Metri quadrati</label>
            </div>
            <div class="col-md-10">
            <h2>{{$apartment->square_meters}}</h2>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-2 text-end">
            <label for="visibility" class="form-label">Visibilità</label>
            </div>
            <div class="col-md-10">
            <h2>{{$apartment->visibility}}</h2>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-2 text-end">
            <label for="image" class="form-label">Immagine</label>
            </div>
            <div class="col-md-8 position-relative">
            <img src="{{ $apartment->getImageUri() }}" class="img-fluid" alt="" id="image-preview">
            </div>

            
        </div>

        <div class="row mb-3">
            <div class="col-md-2 text-end">
            <label for="description" class="form-label">Descrizione Appartamento</label>
            </div>
            <div class="col-md-10">
            <p>{{$apartment->description}}</p>
            </div>
        </div>
        
    </div>
  </section>
@endsection

