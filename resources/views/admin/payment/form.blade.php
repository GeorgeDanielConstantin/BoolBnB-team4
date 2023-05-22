
@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<form action="/admin/process-payment" method="POST">
    @csrf
    <label for="amount">Importo:</label>
    <input type="text" id="amount" name="amount" required>
    <button type="submit">Effettua pagamento</button>
  </form>