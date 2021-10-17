<?php

namespace App\Http\Controllers;

use App\Models\City;

class CityController extends Controller
{
    public function manage() {
        return view('cities.manage', [
            'cities' => City::all()
        ]);
    }
}
