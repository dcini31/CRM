<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function show()
    {
        $companies = Company::paginate(10)->onEachSide(1);
        // $companies = Company::all();
        $companyCount = Company::count();
        return view('company.showCompanies', ['companyCount' => $companyCount, 'companies' => $companies]);
    }
    public function create()
    {
        $companyCount = Company::count();
        return view('company.create', ['companyCount' => $companyCount]);
    }

    public function store()
    {
        $inputs = request()->validate([
            'name' => 'required|min:1|max:255',
            'email' => 'required',
            'logo' => 'required|file|mimes:jpeg,png,svg',
            'website' => 'required',
        ]);
        if (request('logo')) {
            $inputs['logo'] = request('logo')->store('public/company-logos');
        }

        Company::create($inputs + ['user_id' => auth()->user()->id]);

        return back();
    }
}
