<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Braintree\Gateway;

class SponsorController extends Controller
{
    public function showPaymentForm()
{
    return view('admin.payment.form');
}
    // Effettua la configurazione del gateway di Braintree
    public function processPayment(Request $request)
{
    $amount = $request->input('amount');

    $gateway = new Gateway([ 
        'environment' => env('BRAINTREE_ENV'),
        'merchantId' =>  env('BRAINTREE_MERCHANT_ID'),
        'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
        'privateKey' => env('BRAINTREE_PRIVATE_KEY')
    ]);

    $result = $gateway->transaction()->sale([
        'amount' => $amount, // Importo da addebitare
        'paymentMethodNonce' => 'nonce-from-the-client',
        'options' => [
            'submitForSettlement' => true
        ]
    ]);

    if ($result->success) {
        // Pagamento riuscito
        return redirect('.admin.payment.success')->with('success', 'Pagamento effettuato con successo!');
    } else {
        // Pagamento fallito
        return redirect()->back()->with('error', 'Pagamento fallito. Riprova.');
    }
}

public function showPaymentSuccess()
{
    return view('/admin/payment-success');
}



}