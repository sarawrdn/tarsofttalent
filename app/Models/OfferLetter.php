<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferLetter extends Model
{
    use HasFactory;

    public function jobApplication()
    {
        return $this->belongsTo(JobApplication::class);
    }

    public function getOfferUrlAttribute()
    {
        return asset('storage/offer-letter/'.$this->file);
    }
}
