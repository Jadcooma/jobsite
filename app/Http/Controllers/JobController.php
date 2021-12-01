<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\City;
use App\Models\Company;
use App\Models\JobFavorite;
use Illuminate\Support\Facades\Request;

class JobController extends Controller
{
    public function showAll() {
        $user = auth()->user();
        $jobs = Job::with('city', 'company')->get();

        $favorites = isset($user)
            ? JobFavorite::where('user_id', $user->id)->get()
            : null;

        return view('home', [
            'jobs' => $jobs,
            'favorites' => $favorites
        ]);
    }

    public function manage() {
        return view('job.manage', [
            'jobs' => Job::with('city', 'company')->get()
        ]);
    }

    public function create() {
        return view('job.create', [
            'cities' => City::all(),
            'companies' => Company::all()
        ]);
    }

    public function store() {
        $attributes = Request::validate([
            'function' => 'required',
            'description' => 'required',
            'company_id' => 'exists:company',
            'city_id' => 'exists:city'
        ]);

        Job::create($attributes);

        return redirect()
            ->route('job-manage')
            ->with('success', 'Job succesvol aangemaakt');
    }

    public function edit(Job $job) {
        return view('job.update', [
            'job' => $job,
            'cities' => City::get(),
            'companies' => Company::get()
        ]);
    }

    public function update(Job $job) {
        $attributes = Request::validate([
            'function' => 'required',
            'description' => 'required',
            'company_id' => 'exists:company,id',
            'city_id' => 'exists:city,id'
        ]);

        $job->update($attributes);

        return redirect()
            ->route('job-manage')
            ->with('success', 'Job succesvol aangepast');
    }

    public function delete(Job $job) {
        $job->delete();

        return redirect()
            ->route('job-manage')
            ->with('success', 'Job succesvol verwijderd');
    }
}
