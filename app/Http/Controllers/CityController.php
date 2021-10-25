<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

class CityController extends Controller
{
    public function manage()
    {
        return view('city.manage', [
            'cities' => City::all()
        ]);
    }

    public function create()
    {
        return view('city.create');
    }

    public function store()
    {
        $attributes = Request::validate([
            'name' => 'required',
            'code' => 'required|digits:4|unique:city,code'
        ]);

        City::create($attributes);

        return redirect()->route('city-manage');
    }

    public function edit(City $city)
    {
        return view('city.update', [
            'city' => $city
        ]);
    }

    public function update(City $city)
    {
        $attributes = Request::validate([
            'name' => 'required',
            'code' => ['required', 'digits:4', Rule::unique('city', 'code')->ignore($city->id)]
        ]);

        $city->update($attributes);

        return redirect()
            ->route('city-manage')
            ->with('success', $city->name . " werd succesvol gewijzigd");
    }

    public function delete(City $city)
    {
        $city->delete();

        return redirect()
            ->route('city-manage')
            ->with('success', $city->name . " werd succesvol verwijderd");
    }
}