<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'ic',
        'phone',
        'user_address',
        'nationality',
        'gender',
        'age',
        'dob',
        'expected_allowance',
        'resume'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class, 'user_id', 'user_id');
    }

    public function getAttachmentUrlAttribute()
    {
        return asset('storage/attachments/'.$this->resume);
    }
}
