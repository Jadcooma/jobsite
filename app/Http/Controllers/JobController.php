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
        return view('jobs.manage', [
            'jobs' => Job::with('city', 'company')->get()
        ]);
    }

    public function create() {
        return view('jobs.create', [
            'cities' => City::all(),
            'companies' => Company::all()
        ]);
    }

    public function store() {
        $attributes = Request::validate([
            'function' => 'required',
            'description' => 'required',
            'company_id' => 'exists:companies,id',
            'city_id' => 'exists:cities,id'
        ]);

        Job::create($attributes);

        return redirect('admin/jobs')->with('success', 'Job succesvol aangemaakt');
    }

    public function edit(Job $job) {
        return view('jobs.update', [
            'job' => $job,
            'cities' => City::get(),
            'companies' => Company::get()
        ]);
    }

    public function update(Job $job) {
        $attributes = Request::validate([
            'function' => 'required',
            'description' => 'required',
            'company_id' => 'exists:companies,id',
            'city_id' => 'exists:cities,id'
        ]);

        $job->update($attributes);

        return redirect('admin/jobs')->with('success', 'Job succesvol aangepast');
    }

    public function delete(Job $job) {
        $job->delete();

        return redirect('admin/jobs')->with('success', 'Job succesvol verwijderd');
    }
}
