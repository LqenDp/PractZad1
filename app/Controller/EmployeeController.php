<?php
namespace Controller;

use Model\Employee;
use Model\Position;
use Src\Request;
use Src\View;
use Src\Auth\Auth;

class EmployeeController
{
    public function index(): string
    {
        $employees = Employee::with('position')->get();
        return (new View())->render('employees.index', ['employees' => $employees]);
    }
    
    public function create(): string
    {
        $positions = Position::all();
        return (new View())->render('employees.create', ['positions' => $positions]);
    }
    
    public function store(Request $request): void
    {
        $errors = [];
        
        if (Employee::where('tab_number', $request->tab_number)->exists()) {
            $errors[] = 'Табельный номер уже существует';
        }
        
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $request->all();
            app()->route->redirect('/employees/create');
            return;
        }
        
        Employee::create([
            'tab_number' => $request->tab_number,
            'surname' => $request->surname,
            'name' => $request->name,
            'inn' => $request->inn,
            'snils' => $request->snils,
            'banc_account' => $request->banc_account,
            'departament' => $request->departament,
            'position_id' => $request->position_id
        ]);
        
        app()->route->redirect('/employees');
    }
    
    public function edit($id): string
    {
        $employee = Employee::findOrFail($id);
        $positions = Position::all();
        return (new View())->render('employees.edit', [
            'employee' => $employee,
            'positions' => $positions
        ]);
    }
    
    public function update(Request $request, $id): void
    {
        $employee = Employee::findOrFail($id);
        $employee->update($request->all());
        app()->route->redirect('/employees');
    }
    
    public function delete($id): void
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        app()->route->redirect('/employees');
    }
}