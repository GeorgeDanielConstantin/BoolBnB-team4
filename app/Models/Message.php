<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public function apartment() {
        return $this->belongsTo(Apartment::class);
    }


    public function getAbstract($max = 20) {
        return substr($this->text, 0 , $max) . "...";
    }
}
