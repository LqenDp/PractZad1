<?php
namespace Controller;

use Model\Position;
use Src\Request;
use Src\View;
use Src\Auth\Auth;

class PositionController
{
    public function index(): string
    {
        $positions = Position::all();
        return (new View())->render('positions.index', ['positions' => $positions]);
    }
    
    public function create(): string
    {
        return (new View())->render('positions.create');
    }
    
    public function store(Request $request): void
    {
        Position::create([
            'title' => $request->title,
            'salary_base' => $request->salary_base,
            'bonus_seniority' => $request->bonus_seniority ?? 0,
            'bonus_hazard' => $request->bonus_hazard ?? 0
        ]);
        app()->route->redirect('/positions');
    }
    
    public function edit($id): string
    {
        $position = Position::findOrFail($id);
        return (new View())->render('positions.edit', ['position' => $position]);
    }
    
    public function update(Request $request, $id): void
    {
        $position = Position::findOrFail($id);
        $position->update($request->all());
        app()->route->redirect('/positions');
    }
    
    public function delete($id): void
    {
        $position = Position::findOrFail($id);
        
        if ($position->employees()->count() > 0) {
            $_SESSION['errors'] = ['Нельзя удалить должность, к которой привязаны сотрудники'];
            app()->route->redirect('/positions');
            return;
        }
        
        $position->delete();
        app()->route->redirect('/positions');
    }
}