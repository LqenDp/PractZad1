<?php
namespace Controller;

use Model\Employee;
use Src\Request;
use Src\View;

class HomeController
{
    public function index(Request $request): string
    {
        $page = (int)($request->get('page') ?? 1);
        $per_page = 5;
        $offset = ($page - 1) * $per_page;
        
        $total_employees = Employee::count();
        $total_pages = ceil($total_employees / $per_page);
        
        $employees = Employee::with('position')->offset($offset)->limit($per_page)->get();
        
        $monthly_accruals = 0;
        $monthly_deductions = 0;
        
        return (new View())->render('home.index', [
            'employees' => $employees,
            'employee_count' => $total_employees,
            'monthly_accruals' => $monthly_accruals,
            'monthly_deductions' => $monthly_deductions,
            'current_page' => $page,
            'total_pages' => $total_pages
        ]);
    }
}