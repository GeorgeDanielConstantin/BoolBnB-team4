@section('title')
<form action="{{ route('apartments.update') }}" method="POST">
    @method('PUT') @csrf

    <label for="title" class="form-label">Titolo</label>
    <input
        type="text"
        class="form-control"
        id="title"
        name="title"
        value="{{ $apartment->title }}"
    />

    <label for="description" class="form-label">Descrizione</label>
    <input
        type="text"
        class="form-control"
        id="description"
        name="description"
        value="{{ $apartment->description }}"
    />

    <label for="address" class="form-label">Indirizzo</label>
    <input
        type="text"
        class="form-control"
        id="address"
        name="address"
        value="{{ $apartment->address }}"
    />

    <label for="rooms" class="form-label">Stanze</label>
    <input
        type="number"
        class="form-control"
        id="rooms"
        name="rooms"
        value="{{ $apartment->rooms }}"
    />

    <label for="bathrooms" class="form-label">Bagni</label>
    <input
        type="number"
        class="form-control"
        id="bathrooms"
        name="bathrooms"
        value="{{ $apartment->bathrooms }}"
    />

    <label for="beds" class="form-label">Letti</label>
    <input
        type="number"
        class="form-control"
        id="beds"
        name="beds"
        value="{{ $apartment->beds }}"
    />

    <label for="square_meters" class="form-label">Metri quadri</label>
    <input
        type="number"
        class="form-control"
        id="square_meters"
        name="square_meters"
        value="{{ $apartment->square_meters" }}"
    />
    <button type="submit" class="btn btn-primary">Salva</button>
</form>