<?php
namespace Controller;

use Model\User;
use Model\Employee;
use Src\Request;
use Src\View;
use Src\Auth\Auth;

class AdminController
{
    private function checkAdmin(): void
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            app()->route->redirect('/');
        }
    }

    public function users(): string
    {
        $this->checkAdmin();
        $users = User::all();
        $employees = Employee::all();
        return (new View())->render('admin.users', [
            'users' => $users,
            'employees' => $employees
        ]);
    }

    public function storeUser(Request $request): void
    {
        $this->checkAdmin();

        if (User::where('login', $request->login)->exists()) {
            $_SESSION['message'] = 'Пользователь с таким логином уже существует';
            app()->route->redirect('/admin/users');
            return;
        }

        // Получаем employee_id только если он передан в форме
        $employee_id = $request->get('employee_id') ?: null;

        User::create([
            'login' => $request->login,
            'password' => $request->password,
            'full_name' => $request->full_name,
            'role' => $request->role,
            'employee_id' => $employee_id
        ]);

        $_SESSION['message'] = 'Пользователь успешно добавлен';
        app()->route->redirect('/admin/users');
    }

    public function editUser(int $id): string
    {
        $this->checkAdmin();
        $user = User::findOrFail($id);
        $employees = Employee::all();
        return (new View())->render('admin.users_edit', [
            'user' => $user,
            'employees' => $employees
        ]);
    }

    public function updateUser(Request $request, int $id): void
    {
        $this->checkAdmin();
        $user = User::findOrFail($id);

        $data = [
            'full_name' => $request->full_name,
            'role' => $request->role,
            'employee_id' => $request->get('employee_id') ?: null
        ];

        if (!empty($request->password)) {
            $data['password'] = $request->password;
        }

        if ($request->login !== $user->login) {
            if (User::where('login', $request->login)->exists()) {
                $_SESSION['message'] = 'Логин уже занят другим пользователем';
                app()->route->redirect('/admin/users');
                return;
            }
            $data['login'] = $request->login;
        }

        $user->update($data);
        $_SESSION['message'] = 'Пользователь обновлён';
        app()->route->redirect('/admin/users');
    }

    public function deleteUser(int $id): void
    {
        $this->checkAdmin();
        $user = User::findOrFail($id);

        if ($user->id == Auth::user()->id) {
            $_SESSION['message'] = 'Нельзя удалить самого себя';
            app()->route->redirect('/admin/users');
            return;
        }

        $user->delete();
        $_SESSION['message'] = 'Пользователь удалён';
        app()->route->redirect('/admin/users');
    }
}