<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Braintree\Gateway;
use League\Flysystem\Visibility;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;

class SponsorController extends Controller
{
  
    public function showSponsorshipForm(Apartment $apartment)
{
    return view('admin.sponsorship.form', compact('apartment'));
}


public function processSponsorship(Request $request, Apartment $apartment)
{
    $sponsorshipType = $request->input('sponsorship_type');
    $amount = 0;
   

    // Imposta l'importo in base al tipo di sponsorizzazione
    if ($sponsorshipType === 'basic') {
        $amount = 2.99;
    } elseif ($sponsorshipType === 'standard') {
        $amount = 5.99;
    } elseif ($sponsorshipType === 'premium') {
        $amount = 9.99;
    }

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
                $apartment->visibility = true;
                $apartment->save();
            
                return redirect()->route('admin.apartments.show', $apartment)->with('success', 'Pagamento effettuato con successo!');
            } else {
                // Pagamento fallito
                return redirect()->back()->with('error', 'Pagamento fallito. Riprova.');
            }
            
            

    // Effettua il pagamento e gestisci il risultato come desiderato

    // Ritorna una vista di conferma o reindirizza a una pagina di successo
}

//     public function showPaymentForm()
// {
//     return view('admin.payment.form');
// }
//     // Effettua la configurazione del gateway di Braintree
//     public function processPayment(Request $request)
// {
//     $amount = $request->input('amount');

//     $gateway = new Gateway([ 
//         'environment' => env('BRAINTREE_ENV'),
//         'merchantId' =>  env('BRAINTREE_MERCHANT_ID'),
//         'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
//         'privateKey' => env('BRAINTREE_PRIVATE_KEY')
//     ]);

//     $result = $gateway->transaction()->sale([
//         'amount' => $amount, // Importo da addebitare
//         'paymentMethodNonce' => 'nonce-from-the-client',
//         'options' => [
//             'submitForSettlement' => true
//         ]
//     ]);

    // if ($result->success) {
    //     // Pagamento riuscito
    //     return redirect('/admin/payment-success')->with('success', 'Pagamento effettuato con successo!');
    // } else {
    //     // Pagamento fallito
    //     return redirect()->back()->with('error', 'Pagamento fallito. Riprova.');
    // }
// }

// public function showPaymentSuccess()
// {
//     return view('.admin.payment.payment-success')->with('success', 'Pagamento effettuato con successo!');
// }



}