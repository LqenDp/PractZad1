<?php

use Src\Route;

// Аутентификация
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);

// Главная страница
Route::add('GET', '/', [Controller\HomeController::class, 'index'])->middleware('auth');
Route::add('GET', '/hello', [Controller\Site::class, 'hello'])->middleware('auth');

// Сотрудники
Route::add('GET', '/employees', [Controller\EmployeeController::class, 'index'])->middleware('auth');
Route::add('GET', '/employees/create', [Controller\EmployeeController::class, 'create'])->middleware('role:accountant');
Route::add('POST', '/employees/create', [Controller\EmployeeController::class, 'store'])->middleware('role:accountant');
Route::add('GET', '/employees/{id}/edit', [Controller\EmployeeController::class, 'edit'])->middleware('role:accountant');
Route::add('POST', '/employees/{id}/edit', [Controller\EmployeeController::class, 'update'])->middleware('role:accountant');
Route::add('GET', '/employees/{id}/delete', [Controller\EmployeeController::class, 'delete'])->middleware('role:accountant');


Route::add('GET', '/positions', [Controller\PositionController::class, 'index'])->middleware('role:admin');
Route::add('GET', '/positions/create', [Controller\PositionController::class, 'create'])->middleware('role:admin');
Route::add('POST', '/positions/create', [Controller\PositionController::class, 'store'])->middleware('role:admin');
Route::add('GET', '/positions/{id}/edit', [Controller\PositionController::class, 'edit'])->middleware('role:admin');
Route::add('POST', '/positions/{id}/edit', [Controller\PositionController::class, 'update'])->middleware('role:admin');
Route::add('GET', '/positions/{id}/delete', [Controller\PositionController::class, 'delete'])->middleware('role:admin');

Route::add('GET', '/admin/users', [Controller\AdminController::class, 'users'])->middleware('role:admin');
Route::add('POST', '/admin/users/store', [Controller\AdminController::class, 'storeUser'])->middleware('role:admin');
Route::add('GET', '/admin/users/{id}/edit', [Controller\AdminController::class, 'editUser'])->middleware('role:admin');
Route::add('POST', '/admin/users/{id}/edit', [Controller\AdminController::class, 'updateUser'])->middleware('role:admin');
Route::add('GET', '/admin/users/{id}/delete', [Controller\AdminController::class, 'deleteUser'])->middleware('role:admin');

Route::add('GET', '/accruals', [Controller\AccrualController::class, 'index'])->middleware('auth');
Route::add('GET', '/deductions', [Controller\DeductionController::class, 'index'])->middleware('auth');
Route::add('GET', '/salaries', [Controller\SalaryController::class, 'index'])->middleware('auth');