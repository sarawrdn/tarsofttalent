<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;

    public function jobApplication()
    {
        return $this->belongsTo(JobApplication::class);
    }
}
