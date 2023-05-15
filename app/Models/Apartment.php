<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = ["title", "description", "image", "address", "latitude", "longitude", "rooms", "bathrooms", "beds", "square_meters", "visibility"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function message()
    {
        return $this->hasMany(Message::class);
    }
    public function apartmentsponsor()
    {
        return $this->hasMany(ApartmentSponsor::class);
    }

    public function views()
    {
        return $this->hasMany(View::class);
    }

    public function service()
    {
        return $this->belongsMany(Service::class);
    }


    // GETTERS
    public function getImageUri()
    {
        return $this->image ? url('storage/' . $this->image) : 'https://www.frosinonecalcio.com/wp-content/uploads/2021/09/default-placeholder.png';
    }
}
