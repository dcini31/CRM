<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

    public function store(Company $company)
    {
        $inputs = request()->validate([
            'name' => 'required|min:1|max:255',
            'email' => 'required',
            'logo' => 'required|file|mimes:jpeg,png,svg',
            'website' => 'required',
        ]);
        if (request('logo')) {
            $logoPath = request('logo')->store('public/company-logos');
            // Save only the file name, not the full path
            $inputs['logo'] = basename($logoPath);
            // $inputs['logo'] = request('logo')->store('public/company-logos');
        }

        Company::create($inputs + ['user_id' => auth()->user()->id]);

        Session::flash('success-message', $inputs['name'] . ' has been created');
        return redirect()->route('company/store');
    }

    public function destroy(Company $company)
    {
        $company->delete();

        Session::flash('message', $company->name . ' was deleted');
        return back();
    }
}
