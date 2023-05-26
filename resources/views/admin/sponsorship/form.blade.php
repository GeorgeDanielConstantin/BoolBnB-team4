@extends('layouts.app')
<div class="container">
@section('title', 'Sponsorship of the apartment: '. $apartment->title)

{{-- 
<form action="{{ route('admin.apartments.sponsorship.process', $apartment) }}" method="POST">
    @csrf
    <label for="sponsorship_type">Seleziona il tipo di sponsorizzazione:</label>
    <select name="sponsorship_type" id="sponsorship_type">
        <option value="basic">Sponsorizzazione Base - Prezzo: €10</option>
        <option value="standard">Sponsorizzazione Standard - Prezzo: €20</option>
        <option value="premium">Sponsorizzazione Premium - Prezzo: €30</option>
    </select>

    <button type="submit">Scegli Sponsorizzazione</button>
</form> --}}


@section('content')

@if (session('error'))
<div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif



<form action="{{ route('admin.apartments.sponsorship.process', $apartment) }}" method="POST" id="sponsorship-form">
    @csrf

    <!-- Aggiungi il campo di input per l'importo -->
    <div class="form-group">
        <label for="sponsorship_type">Tipo di sponsorizzazione</label>
        <select name="sponsorship_type" id="sponsorship_type" class="form-control form-select">
            <option value="basic">Basic - 2.99 € for 24 hours of sponsorship</option>
            <option value="standard">Standard - 5.99 € for 72 hours of sponsorship</option>
            <option value="premium">Premium - 9.99 € for 144 hours of sponsorship</option>
        </select>
    </div>

    <!-- Aggiungi il container per il drop-in di Braintree -->
    <div id="dropin-container"></div>

    <!-- Aggiungi il pulsante per avviare il pagamento -->
    <button type="button" id="submit-button" class="btn btn-primary">Avvia Pagamento</button>

    <!-- Aggiungi il pulsante per confermare il pagamento -->
    <button type="button" id="confirm-button" class="btn btn-success" style="display: none;">Conferma Pagamento</button>
</form>

<script src="https://js.braintreegateway.com/web/dropin/1.37.0/js/dropin.js"></script>
<script>
    var button = document.querySelector('#submit-button');
    var confirmButton = document.querySelector('#confirm-button');
    var form = document.querySelector('#sponsorship-form');

    braintree.dropin.create({
        authorization: '{{ env('BRAINTREE_AUTHORIZATION') }}',
        container: '#dropin-container'
    }, function (err, instance) {
        button.addEventListener('click', function () {
            instance.requestPaymentMethod(function (err, payload) {
                if (err) {
                    console.log('Errore di pagamento:', err);
                    return;
                }

                // Memorizza il nonce del pagamento
                var paymentNonce = payload.nonce;

                // Nascondi il pulsante Avvia Pagamento e mostra il pulsante Conferma Pagamento
                button.style.display = 'none';
                confirmButton.style.display = 'block';

                // Aggiungi il nonce del pagamento come campo di input al modulo
                var nonceInput = document.createElement('input');
                nonceInput.setAttribute('type', 'hidden');
                nonceInput.setAttribute('name', 'payment_method_nonce');
                nonceInput.setAttribute('value', paymentNonce);
                form.appendChild(nonceInput);
            });
        });

        confirmButton.addEventListener('click', function () {
            // Invia il modulo di sponsorizzazione solo quando viene cliccato il pulsante Conferma Pagamento
            form.submit();
        });
    });
</script>
</div>
@endsection