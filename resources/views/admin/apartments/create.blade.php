<div>
<h1 class="text-center">INSERISCI I DATI DEL TUO APPARTAMENTO</h1>
<form action="{{ route('apartments.store') }}" method="POST">
    @csrf

    <label for="title" class="form-label">Titolo</label>
    <input type="text" class="form-control" id="title" name="title" />

    <label for="description" class="form-label">Descrizione</label>
    <input type="text" class="form-control" id="description" name="description" />

    <label for="address" class="form-label">Indirizzo</label>
    <input type="text" class="form-control" id="address" name="address" />


    <label for="rooms" class="form-label">Stanze</label>
    <input type="text" class="form-control" id="rooms" name="rooms" />

    <label for="bathrooms" class="form-label">Bagni</label>
    <input type="text" class="form-control" id="bathrooms" name="bathrooms" />

    <label for="beds" class="form-label">Letti</label>
    <input type="text" class="form-control" id="beds" name="beds" />

    <label for="square_meters" class="form-label">Metri quadri</label>
    <input type="text" class="form-control" id="square_meters" name="square_meters" />

    <button type="submit" class="btn btn-primary">Salva</button>
</form>
</div>