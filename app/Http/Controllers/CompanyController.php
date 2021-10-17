<?php

namespace App\Http\Controllers;

use App\Models\Company;

class CompanyController extends Controller
{
    public function manage() {
        return view('companies.manage', [
            'companies' => Company::all()
        ]);
    }
}
