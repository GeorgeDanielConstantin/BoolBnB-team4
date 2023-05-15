@extends('layouts.app')

@section('title', $apartment->id ? 'Modifica un Appartamento ' . $apartment->title : 'Inserisci un Appartamento')

@section('actions')
  <div>
    <a href="{{ route('apartments.index') }}" class="btn btn-primary mx-1">
      Torna alla lista
    </a>

    @if ($apartment->id)
      <a href="{{ route('apartments.show', $apartment) }}" class="btn btn-primary mx-1">
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
        <form method="POST" action="{{ route('apartments.update', $apartment) }}" enctype="multipart/form-data" class="row">
          @method('put')
        @else
          <form method="POST" action="{{ route('apartments.store') }}" enctype="multipart/form-data" class="row">
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
        <div class="col-md-10">
          <input type="text" name="address" id="address" min="1" class="form-control @error('address') is-invalid @enderror"
            value="{{ old('address', $apartment->address) }}" />
          @error('address')
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
          <label for="category_id" class="form-label">Categoria</label>
        </div>
        <div class="col-md-10">
          <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">
            <option value="">Non categorizzato</option>
            @foreach ($categories as $category)
              <option @if (old('category_id', $post->category_id) == $category->id) selected @endif value="{{ $category->id }}">{{ $category->label }}
              </option>
            @endforeach
          </select>
          @error('category_id')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div> --}}

      {{-- <div class="row mb-3">
        <div class="col-md-2 text-end">
          <label class="form-label">Tags</label>
        </div>
        <div class="col-md-10">

          <div class="form-check @error('tags') is-invalid @enderror p-0">

            @foreach ($tags as $tag)
              <input type="checkbox" id="tag-{{ $tag->id }}" value="{{ $tag->id }}" name="tags[]"
                class="form-check-control" @if (in_array($tag->id, old('tags', $post_tags ?? []))) checked @endif>
              <label for="tag-{{ $tag->id }}">{{ $tag->label }}</label>
              <br>
            @endforeach


          </div>

          @error('tags')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div> --}}


      <div class="row mb-3">
        <div class="col-md-2 text-end">
          <label for="visibility" class="form-label">Visibilità</label>
        </div>
        <div class="col-md-10">
          <input type="checkbox" name="visibility" id="visibility"
            class="form-check-control @error('visibility') is-invalid @enderror" @checked(old('visibility', $post->visibility))
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
          <img src="{{ $apartment->getImageUri() }}" class="img-fluid" alt="" id="image-preview">

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
      @if ($apartment->image)
        <form id="delete-apartment-image-form" method="POST" action="{{ route('admin.apartments.delete-image', $apartment) }}">
          @method('delete')
          @csrf

        </form>
      @endif
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
