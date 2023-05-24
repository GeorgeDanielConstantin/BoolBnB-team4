<?php

namespace App\Jobs;

use App\Models\ApartmentSponsor;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateVisibilityJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $apartmentSponsor;

    /**
     * Create a new job instance.
     *
     * @param  ApartmentSponsor  $apartmentSponsor
     * @return void
     */
    public function __construct(ApartmentSponsor $apartmentSponsor)
    {
        $this->apartmentSponsor = $apartmentSponsor;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
{
    $apartmentSponsor = $this->apartmentSponsor;
    $expiration = $apartmentSponsor->ending_date;

    if (now()->greaterThan($expiration)) {
        $apartment = $apartmentSponsor->apartment;
        $apartment->visibility = false;
        $apartment->save();
    }
}

    
}