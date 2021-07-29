<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;

class DbkmhController extends Controller
{
    public function dbkmh()
    {
        $users = DB::table('employees')
        ->selectRaw('count(*) as ecount, job')
       ->where('job', '<>', 'doctor')
        ->groupBy('job')
        ->get();
        //dd($users);

        $employees = DB::table('employees')
    ->leftjoin('emp_category','emp_category.category_id','=','employees.category_id')
    ->selectRaw('COUNT(*) as nbr,emp_category.category_name')
 //   ->selectRaw('emp_category.category_name, count(*) as y')
    ->groupBy('emp_category.category_name')
    ->get();
   // dd($employees);

    $salaries = DB::table('salaries')
    ->selectRaw('employees.name as employee_name,employees.id, avg(salaries) as avg_salary, count(*) as people_count')
    ->join('employees', 'salaries.employee_id', '=', 'employees.id')
    ->groupBy('employees.id')
    ->orderByDesc('avg_salary')
    ->get();
    //dd($salaries);

    $visitors = Employee::select(
       // "id" ,
       DB::raw("(sum(salary)) as total_click"),
        DB::raw("(DATE_FORMAT(created_at,'%m-%Y')) as month_year")
        )
        //->orderBy('created_at')
        ->orderBy(DB::raw("DATE_FORMAT(created_at,'%m-%Y')"))
       ->groupBy(DB::raw("DATE_FORMAT(created_at,'%m-%Y')"))
        ->get();

dd($visitors);

    }
}
