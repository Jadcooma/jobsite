<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Facades\Request;

class CompanyController extends Controller
{
    public function manage() {
        return view('companies.manage', [
            'companies' => Company::all()
        ]);
    }

    public function create() {
        return view('companies.create');
    }

    public function store() {
        $attributes = Request::validate([
            'name' => 'required',
            'sector' => 'required'
        ]);

        Company::create($attributes);

        return redirect('admin/companies');
    }

    public function edit(Company $company) {
        return view('companies.update', ['company' => $company]);
    }

    public function update(Company $company) {
        $attributes = Request::validate([
            'name' => 'required',
            'sector' => 'required'
        ]);

        $company->update($attributes);

        return redirect('admin/companies')->with('success', $company->name . " werd succesvol gewijzigd");
    }

    public function delete(Company $company) {
        $company->delete();

        return redirect('admin/companies')->with('success', $company->name . " werd succesvol verwijderd");
    }
}
