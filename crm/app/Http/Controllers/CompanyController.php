<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function show()
    {
        $companies = Company::all();
        $companyCount = Company::count();
        return view('company.showCompanies', ['companyCount' => $companyCount, 'companies' => $companies]);
    }
    public function create()
    {
        $companyCount = Company::count();
        return view('company.create', ['companyCount' => $companyCount]);
    }

    public function store(Request $request)
    {
        dd($request->all());
        // $company = new Company();  
    }
}
