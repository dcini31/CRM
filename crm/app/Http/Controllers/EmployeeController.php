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

        $inputs['first_name'] = ucfirst($inputs['first_name']);
        $inputs['last_name'] = ucfirst($inputs['last_name']);

        Employee::create($inputs + ['user_id' => auth()->user()->id]);

        Session::flash('user-created', $inputs['first_name'] . '\'s profile has been created');

        return redirect()->route('employee/showEmployees');
    }

    public function edit(Employee $employee)
    {
        $companies = Company::all();
        $employeeCount = Employee::count();
        $companyCount = Company::count();

        return view('employee.edit', ['employeeCount' => $employeeCount, 'companyCount' => $companyCount, 'employee' => $employee, 'companies' => $companies]);
    }

    public function update(Employee $employee)
    {
        $inputs = request()->validate([

            'first_name' => 'required|min:1|max:255',
            'last_name' => 'required|min:1|max:255',
            'email' => 'required',
            'phone' => 'required|numeric|digits:8',
        ]);

        $inputs['first_name'] = ucfirst($inputs['first_name']);
        $inputs['last_name'] = ucfirst($inputs['last_name']);

        $employee->update($inputs);

        Session::flash('updated-message', $inputs['first_name'] . ' was updated');
        return redirect()->route('employee/showEmployees');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        Session::flash('message', $employee->first_name . ' was deleted');
        return back();
    }
}
