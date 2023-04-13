<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $guarded = [];  

    public function profile()
    {
        return $this->belongsTo(Profile::class, 'user_id', 'user_id');
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function interview()
    {
        return $this->hasOne(Interview::class);
    }

    public function offerLetter()
    {
        return $this->hasOne(OfferLetter::class);
    }

}
