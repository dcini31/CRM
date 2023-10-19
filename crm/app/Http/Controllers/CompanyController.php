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
        return view('company.showCompanies', compact('companyCount'), ['companies' => $companies]);
    }
    public function create()
    {
        return view('company.create');
    }
}
