<?php

namespace App\Http\Controllers;

use App\Models\Employee;
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
        $companyCount = Company::count();
        $employeeCount = Employee::count();
        return view('company.showCompanies', ['companyCount' => $companyCount, 'companies' => $companies, 'employeeCount' => $employeeCount,]);
    }
    public function create()
    {
        $companyCount = Company::count();
        $employeeCount = Employee::count();
        return view('company.create', ['companyCount' => $companyCount, 'employeeCount' => $employeeCount,]);
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
            $logoPath = request('logo')->store('public/company-logos');
            $inputs['logo'] = basename($logoPath);
        }

        Company::create($inputs + ['user_id' => auth()->user()->id]);

        Session::flash('success-message', $inputs['name'] . ' has been created');
        return redirect()->route('company/store');
    }

    public function edit(Company $company)
    {
        $companyCount = Company::count();
        return view('company.edit', ['companyCount' => $companyCount, 'companies' => $company]);
    }

    public function update(Company $company)
    {
        $inputs = request()->validate([
            'name' => 'required|min:1|max:255',
            'email' => 'required',
            'logo' => 'required|file|mimes:jpeg,png,svg',
            'website' => 'required',
        ]);
        if (request('logo')) {
            $logoPath = request('logo')->store('public/company-logos');
            $inputs['logo'] = basename($logoPath);
            $company->logo  = $inputs['logo'];
        }
        $company->name = $inputs['name'];
        $company->email = $inputs['email'];
        $company->website = $inputs['website'];

        $company->save();
        // $company = Company::where(auth()->user())->save($company);


        Session::flash('updated-message', $inputs['name'] . ' was updated');
        return redirect()->route('company/store');
    }

    public function destroy(Company $company)
    {
        $company->delete();

        Session::flash('message', $company->name . ' was deleted');
        return back();
    }
}
