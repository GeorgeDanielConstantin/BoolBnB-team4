

<form action="{{ route('admin.apartments.sponsorship.process', $apartment) }}" method="POST">
    @csrf
    <label for="sponsorship_type">Seleziona il tipo di sponsorizzazione:</label>
    <select name="sponsorship_type" id="sponsorship_type">
        <option value="basic">Sponsorizzazione Base - Prezzo: €10</option>
        <option value="standard">Sponsorizzazione Standard - Prezzo: €20</option>
        <option value="premium">Sponsorizzazione Premium - Prezzo: €30</option>
    </select>

    <button type="submit">Scegli Sponsorizzazione</button>
</form>
