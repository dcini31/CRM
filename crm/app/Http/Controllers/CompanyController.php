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

        return view('company.showCompanies', ['companies' => $companies]);
    }
    public function create()
    {
        return view('company.create');
    }
}
