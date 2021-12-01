<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobFavorite extends Model
{

    protected $table = 'job_favorite';

    protected $guarded = [];

    protected function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function job()
    {
        return $this->belongsTo(Job::class);
    }
}
