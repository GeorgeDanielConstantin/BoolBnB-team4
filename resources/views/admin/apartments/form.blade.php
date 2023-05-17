@extends('layouts.app')

@section('title', $apartment->id ? 'Modifica un Appartamento ' . $apartment->title : 'Inserisci un Appartamento')

@section('actions')
  <div>
    <a href="{{ route('admin.apartments.index') }}" class="btn btn-primary mx-1">
      Torna alla lista
    </a>

    @if ($apartment->id)
      <a href="{{ route('admin.apartments.show', $apartment) }}" class="btn btn-primary mx-1">
        Mostra Appartamento
      </a>
    @endif
  </div>
@endsection

@section('content')

  @include('layouts.partials.errors')

  <section class="card py-2">
    <div class="card-body">

      @if ($apartment->id)
        <form method="POST" action="{{ route('admin.apartments.update', $apartment) }}" enctype="multipart/form-data" class="row">
          @method('put')
        @else
          <form method="POST" action="{{ route('admin.apartments.store') }}" enctype="multipart/form-data" class="row">
      @endif

      @csrf

      <div class="row mb-3">
        <div class="col-md-2 text-end">
          <label for="title" class="form-label">Nome Appartamento</label>
        </div>
        <div class="col-md-10">
          <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
            value="{{ old('title', $apartment->title) }}" />
          @error('title')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-2 text-end">
          <label for="address" class="form-label">Indirizzo</label>
        </div>
        <div class="col-md-3">
          <label for="street">Via</label>
          <br>
          <input type="text" name="street" id="street"  class="form-control @error('street') is-invalid @enderror"
            value="{{ old('street', $apartment->street) }}" />
          @error('street')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="col-md-1">
          <label for="house_number">N° Civico</label>
          <br>
          <input type="text" name="house_number" id="house_number"  class="form-control @error('house_number') is-invalid @enderror"
            value="{{ old('house_number', $apartment->house_number) }}" />
          @error('house_number')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="col-md-3">
          <label for="city">Città</label>
          <br>
          <input type="text" name="city" id="city"  class="form-control @error('city') is-invalid @enderror"
            value="{{ old('city', $apartment->city) }}" />
          @error('city')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="col-md-3">
          <label for="postal_code">CAP</label>
          <br>
          <input type="text" name="postal_code" id="postal_code"  class="form-control @error('postal_code') is-invalid @enderror"
            value="{{ old('postal_code', $apartment->postal_code) }}" />
          @error('postal_code')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-2 text-end">
          <label for="rooms" class="form-label">Numero di Stanze</label>
        </div>
        <div class="col-md-10">
          <input type="number" name="rooms" id="rooms" min="1" class="form-control @error('rooms') is-invalid @enderror"
            value="{{ old('rooms', $apartment->rooms) }}" />
          @error('rooms')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-2 text-end">
          <label for="beds" class="form-label">Numero di letti</label>
        </div>
        <div class="col-md-10">
          <input type="number" name="beds" id="beds" min="1" class="form-control @error('beds') is-invalid @enderror"
            value="{{ old('beds', $apartment->beds) }}" />
          @error('beds')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-2 text-end">
          <label for="bathrooms" class="form-label">Numero di bagni</label>
        </div>
        <div class="col-md-10">
          <input type="number" name="bathrooms" id="bathrooms" min="1" class="form-control @error('bathrooms') is-invalid @enderror"
            value="{{ old('bathrooms', $apartment->bathrooms) }}" />
          @error('bathrooms')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-2 text-end">
          <label for="square_meters" class="form-label">Metri quadrati</label>
        </div>
        <div class="col-md-10">
          <input type="number" name="square_meters" id="square_meters" min="1" class="form-control @error('square_meters') is-invalid @enderror"
            value="{{ old('square_meters', $apartment->square_meters) }}" />
          @error('square_meters')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div>

      {{-- <div class="row mb-3">
        <div class="col-md-2 text-end">
          <label for="service_id" class="form-label">Servizi:</label>
        </div>
        <div class="col-md-10">
          <select name="service_id" id="service_id" class="form-select @error('service_id') is-invalid @enderror">
            <option value="">Nessun Servizio</option>
            @foreach ($services as $service)
              <option @if (old('service_id', $apartment->service_id) == $service->id) selected @endif value="{{ $service->id }}">{{ $service->name }}
              </option>
            @endforeach
          </select>
          @error('service_id')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div> --}}

      <div class="row mb-3">
        <div class="col-md-2 text-end">
          <label class="form-label">Servizi</label>
        </div>
        <div class="col-md-10">

          <div class="form-check @error('services') is-invalid @enderror p-0">

            @foreach ($services as $service)
              <input type="checkbox" id="service-{{ $service->id }}" value="{{ $service->id }}" name="services[]"
                class="form-check-control" @if (in_array($service->id, old('services', $apartment_services ?? []))) checked @endif>
              <label for="service-{{ $service->id }}">{{ $service->name }}</label>
              <br>
            @endforeach


          </div>

          @error('services')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div>


      <div class="row mb-3">
        <div class="col-md-2 text-end">
          <label for="visibility" class="form-label">Visibilità</label>
        </div>
        <div class="col-md-10">
          <input type="checkbox" name="visibility" id="visibility"
            class="form-check-control @error('visibility') is-invalid @enderror" @checked(old('visibility', $apartment->visibility))
            value="1" />
          @error('visibility')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-2 text-end">
          <label for="image" class="form-label">Immagine</label>
        </div>
        <div class="col-md-8">
          <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" />
          @error('image')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        {{-- TO DO DEFINIRE IL GETTER getImageUri() NEL MODEL APARTMENT --}}
        <div class="col-2 position-relative">
          <img src="{{ $apartment->getImageUri() }}" class="img-fluid w-100" alt="" id="image-preview">

          @if ($apartment->image)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
              id="delete-apartment-image">
              x
            </span>
          @endif

        </div>
      </div>

      {{-- TO DO LISTA DI SERVIZI AGGIUNTIVI --}}

      <div class="row mb-3">
        <div class="col-md-2 text-end">
          <label for="description" class="form-label">Descrizione Appartamento</label>
        </div>
        <div class="col-md-10">
          <textarea name="description" id="description" class="form-control
             @error('description') is-invalid @enderror"
            rows="5">{{ old('description', $apartment->description) }}</textarea>
          @error('description')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div>


      <div class="row">
        <div class="offset-2 col-8">
          <input type="submit" class="btn btn-primary" value="Salva" />
        </div>
      </div>
      </form>


      {{-- TO DO DEFINIRE LA ROUTE ADMIN.APARTMENTS.DELETE-IMAGE --}}
      {{-- @if ($apartment->image)
        <form id="delete-apartment-image-form" method="POST" action="{{ route('admin.apartments.delete-image', $apartment) }}">
          @method('delete')
          @csrf

        </form>
      @endif --}}
    </div>
  </section>
@endsection

@section('scripts')

  @if ($apartment->image)
    <script>
      const deleteImagebutton = document.getElementById('delete-apartment-image');
      const deleteImageForm = document.getElementById('delete-apartment-image-form');

      deleteImagebutton.addEventListener('click', () => {
        deleteImageForm.submit();
      })
    </script>
  @endif


  <script>
    const imageInputEl = document.getElementById('image');
    const imagePreviewEl = document.getElementById('image-preview');
    const placeholder = imagePreviewEl.src;

    imageInputEl.addEventListener('change', () => {
      if (imageInputEl.files && imageInputEl.files[0]) {
        const reader = new FileReader();
        reader.readAsDataURL(imageInputEl.files[0]);

        reader.onload = e => {
          imagePreviewEl.src = e.target.result;
        }
      } else imagePreviewEl.src = placeholder;
    })
  </script>
@endsection
