<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

class CityController extends Controller
{
    public function manage()
    {
        return view('cities.manage', [
            'cities' => City::all()
        ]);
    }

    public function create()
    {
        return view('cities.create');
    }

    public function store()
    {
        $attributes = Request::validate([
            'name' => 'required',
            'code' => 'required|digits:4|unique:cities,code'
        ]);

        City::create($attributes);

        return redirect('admin/cities');
    }

    public function edit(City $city)
    {
        return view('cities.update', ['city' => $city]);
    }

    public function update(City $city)
    {
        $attributes = Request::validate([
            'name' => 'required',
            'code' => ['required', 'digits:4', Rule::unique('cities', 'code')->ignore($city->id)]
        ]);

        $city->update($attributes);

        return redirect('admin/cities')->with('success', $city->name . " werd succesvol gewijzigd");
    }

    public function delete(City $city) {
        $city->delete();

        return redirect('admin/cities')->with('success', $city->name . " werd succesvol verwijderd");
    }
}