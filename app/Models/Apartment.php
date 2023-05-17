<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = ["title", "description", "image", "address", "street", "house_number", "city", "postal_code", "latitude", "longitude", "rooms", "bathrooms", "beds", "square_meters", "visibility"];

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
        return $this->belongsToMany(Service::class);
    }


    // GETTERS
    public function getImageUri()
    {
        if ($this->image && str_starts_with($this->image, 'http')) {
            return $this->image;
        } else {
            return $this->image ? url('storage/' . $this->image) : 'https://www.frosinonecalcio.com/wp-content/uploads/2021/09/default-placeholder.png';
        }
    }
}
