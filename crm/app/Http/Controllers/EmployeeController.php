<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function show()
    {
        $employees = Employee::all();
        return view('employee.showEmployees', ['employees' => $employees]);
    }
}
