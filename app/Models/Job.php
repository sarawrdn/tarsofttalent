<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'vacancy',
        'allowance',
        'description',
        'requirement',
    ];

    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class, 'job_id', 'id');
    }

}
