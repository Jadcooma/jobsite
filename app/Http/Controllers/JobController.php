<?php

namespace App\Http\Controllers;

use App\Models\Job;

class JobController extends Controller
{
    public function showAll() {
        return view('home', [
            'jobs' => Job::with('city', 'company')->get()
        ]);
    }

    public function create() {
        return view('jobs.create');
    }
}
