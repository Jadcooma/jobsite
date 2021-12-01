<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Models\JobFavorite;
use App\Models\User;

class JobFavoriteController extends Controller
{
    public function getFavoritesByUser(User $user)
    {
        ddd($jobs = JobFavorite::with('job')->where('user_id', $user->id)->all());
    }

    public function create()
    {
        $attributes = Request::validate([
            'user_id' => 'exists:user,id',
            'job_id' => 'exists:job,id',
        ]);

        $favorite = new JobFavorite($attributes);
        $favorite->save();

        return $favorite;
    }
    public function delete(JobFavorite $jobFavorite){
        $jobFavorite->delete();

        return $jobFavorite;
    }

}
