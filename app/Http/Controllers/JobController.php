<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\City;
use App\Models\Company;
use Illuminate\Support\Facades\Request;

class JobController extends Controller
{
    public function showAll() {
        return view('home', [
            'jobs' => Job::with('city', 'company')->get()
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
            'company_id' => 'exists:company,id',
            'city_id' => 'exists:city,id'
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
