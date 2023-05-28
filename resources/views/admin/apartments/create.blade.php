<div>
@section('title')
<h1 class="text-center">INSERISCI I DATI DEL TUO APPARTAMENTO</h1>
<form action="{{ route('apartments.store') }}" method="POST">
    @csrf
    <div class="col-md-10">
        <label for="title" class="form-label">Titolo</label>
    <input 
        type="text" 
        class="form-control @error('title') is-invalid @enderror" 
        id="title" 
        name="title" 
        value="{{old('title')}}" 
    />
    @error('title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    </div>

    <div class="col-md-10">
        <label for="description" class="form-label">Tissstolo</label>
    <input 
        type="text" 
        class="form-control @error('description') is-invalid @enderror" 
        id="description" 
        name="description" 
        value="{{old('description')}}" 
    />
    @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    </div>


    <div class="col-md-10">
        <label for="address" class="form-label">Titolo</label>
    <input 
        type="text" 
        class="form-control @error('address') is-invalid @enderror" 
        id="address" 
        name="address" 
        value="{{old('address')}}" 
    />
    @error('address')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    </div>


    <div class="col-md-10">
        <label for="rooms" class="form-label">Titolo</label>
    <input 
        type="text" 
        class="form-control @error('rooms') is-invalid @enderror" 
        id="rooms" 
        name="rooms" 
        value="{{old('rooms')}}" 
    />
    @error('rooms')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    </div>



    <div class="col-md-10">
        <label for="bathrooms" class="form-label">Titolo</label>
    <input 
        type="text" 
        class="form-control @error('bathrooms') is-invalid @enderror" 
        id="bathrooms" 
        name="bathrooms" 
        value="{{old('bathrooms')}}" 
    />
    @error('bathrooms')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    </div>


    <div class="col-md-10">
        <label for="beds" class="form-label">Titolo</label>
    <input 
        type="text" 
        class="form-control @error('beds') is-invalid @enderror" 
        id="beds" 
        name="beds" 
        value="{{old('beds')}}" 
    />
    @error('beds')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    </div>

    <div class="col-md-10">
        <label for="square_meters" class="form-label">Titolo</label>
    <input 
        type="text" 
        class="form-control @error('square_meters') is-invalid @enderror" 
        id="square_meters" 
        name="square_meters" 
        value="{{old('square_meters')}}" 
    />
    @error('square_meters')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    </div>



    


    <button type="submit" class="btn btn-primary">Salva</button>
</form>
</div>