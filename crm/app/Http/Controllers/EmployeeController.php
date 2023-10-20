<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{
    public function show()
    {
        $employees = Employee::paginate(10);
        $companyCount = Company::count();
        $employeeCount = Employee::count();
        return view('employee.showEmployees', ['employeeCount' => $employeeCount, 'employees' => $employees, 'companyCount' => $companyCount]);
    }

    public function create()
    {
        $companies = Company::all();
        $employeeCount = Employee::count();
        $companyCount = Company::count();

        return view('employee.create', ['employeeCount' => $employeeCount, 'companyCount' => $companyCount,   'companies' => $companies]);
    }

    public function store()
    {
        $inputs = request()->validate([
            'company_id' => 'required',
            'first_name' => 'required|min:1|max:255',
            'last_name' => 'required|min:1|max:255',
            'email' => 'required',
            'phone' => 'required|numeric|digits:8',
        ]);

        Employee::create($inputs + ['user_id' => auth()->user()->id]);

        Session::flash('user-created', $inputs['first_name'] . '\'s profile has been created');

        return redirect()->route('employee/showEmployees');
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

    public function destroy(Employee $employee)
    {
        $employee->delete();

        Session::flash('message', $employee->first_name . ' was deleted');
        return back();
    }
}
