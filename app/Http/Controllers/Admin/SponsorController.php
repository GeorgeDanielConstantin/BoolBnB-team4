<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\ApartmentSponsor;
use App\Models\Sponsor;
use Illuminate\Http\Request;
use Braintree\Gateway;
use League\Flysystem\Visibility;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;
use DateTime;
use DateInterval;
use Illuminate\Support\Facades\DB;

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
            
                // Imposta la durata della visibilità in base al tipo di sponsorizzazione
                $duration = 0;
                if ($sponsorshipType === 'basic') {
                    $duration = 60; // Durata in secondi per la sponsorizzazione basic
                } elseif ($sponsorshipType === 'standard') {
                    $duration = 72 * 60 * 60; // Durata in secondi per la sponsorizzazione standard
                } elseif ($sponsorshipType === 'premium') {
                    $duration = 144 * 60 * 60; // Durata in secondi per la sponsorizzazione premium
                }
            
                // Calcola la data e l'ora di scadenza della visibilità
                $expiration = new DateTime();
                $expiration->add(new DateInterval('PT' . $duration . 'S'));
            
                // Imposta la scadenza della visibilità nel formato corretto per il salvataggio nel database
                $expirationFormatted = $expiration->format('Y-m-d H:i:s');
                
                $apartment->visibility_expiration = $expirationFormatted;
                $apartment->save();
                dd($apartment->apartmentsponsor);
                
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

public function updateEndingDate(Apartment $apartment, $endingDate)
{
    // Recupera l'istanza di ApartmentSponsor associata all'appartamento
    $apartmentSponsor = $apartment->apartmentSponsor;

    // Aggiorna il valore di ending_date
    $apartmentSponsor->ending_date = $endingDate;

    // Salva le modifiche nel database
    DB::transaction(function () use ($apartmentSponsor) {
        $apartmentSponsor->save();
    });

    // Restituisci una risposta o esegui le azioni desiderate dopo l'aggiornamento
    return response()->json(['success' => true, 'message' => 'Ending date updated successfully']);
}

}