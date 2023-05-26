<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Sponsor;
use App\Models\ApartmentSponsor;
use Illuminate\Http\Request;
use Braintree\Gateway;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;
use Carbon\Carbon;
use App\Jobs\UpdateVisibilityJob;

class SponsorController extends Controller
{
    public function showSponsorshipForm(Apartment $apartment)
    {
        // Verifica se l'utente autenticato è il proprietario dell'appartamento
        if ($apartment->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'Accesso non autorizzato');
        }

        // L'utente è autorizzato, visualizza il modulo di sponsorizzazione
        return view('admin.sponsorship.form', compact('apartment'));
    }

    public function processSponsorship(Request $request, Apartment $apartment)
    {
        $sponsorshipType = $request->input('sponsorship_type');
        $amount = 0;

        // Imposta l'importo in base al tipo di sponsorizzazione
        if ($sponsorshipType === 'basic') {
            $amount = 2.99;
            $visibilityDuration = 24 * 3600; // Durata in secondi per la sponsorizzazione basic (24 ore)
        } elseif ($sponsorshipType === 'standard') {
            $amount = 5.99;
            $visibilityDuration = 72 * 3600; // Durata in secondi per la sponsorizzazione standard (72 ore)
        } elseif ($sponsorshipType === 'premium') {
            $amount = 9.99;
            $visibilityDuration = 144 * 3600; // Durata in secondi per la sponsorizzazione premium (144 ore)
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

            $currentSponsorship = $apartment->apartmentSponsor()->where('ending_date', '>', now())->latest()->first();

            if ($currentSponsorship) {
                // Esiste una sponsorizzazione attiva
                $currentExpiration = Carbon::parse($currentSponsorship->ending_date);
                $newExpiration = $currentExpiration->addSeconds($visibilityDuration);
            } else {
                // Non esiste una sponsorizzazione attiva
                $newExpiration = now()->addSeconds($visibilityDuration);
            }

            $apartmentSponsor = new ApartmentSponsor();
            $apartmentSponsor->starting_date = now();
            $apartmentSponsor->ending_date = $newExpiration;

            $apartment->apartmentSponsor()->save($apartmentSponsor);

            $apartment->visibility = true;
            $apartment->save();

            $delayInSeconds = now()->diffInSeconds($newExpiration);
            UpdateVisibilityJob::dispatch($apartmentSponsor)->delay($delayInSeconds);

            return redirect()->route('admin.apartments.show', $apartment)->with('success', 'Successful payment!');
        } else {
            // Pagamento fallito
            return redirect()->back()->with('error', 'Payment failed, please try again!');
        }
    }
}