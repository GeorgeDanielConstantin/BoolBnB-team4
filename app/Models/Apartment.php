<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\Message;
use App\Models\ApartmentSponsor;
use App\Models\View;
use App\Models\Image;
use App\Models\User;




class Apartment extends Model
{
    use HasFactory;

    protected $fillable = ["title", "description", "image", "address", "street", "house_number", "city", "postal_code", "latitude", "longitude", "rooms", "bathrooms", "beds", "square_meters", "visibility"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function messages()
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
        return $this->belongsToMany(Service::class, 'apartment_service', 'apartment_id', 'service_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
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
