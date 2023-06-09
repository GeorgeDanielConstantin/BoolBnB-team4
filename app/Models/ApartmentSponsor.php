<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApartmentSponsor extends Model
{
    use HasFactory;

    protected $table = "apartment_sponsor";

    public function apartment() {
        return $this->belongsTo(Apartment::class);
    }

    public function sponsor() {
        return $this->hasMany(Sponsor::class);
    }
}
