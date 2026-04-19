<?php
namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;

class AuthMiddleware
{
    public function handle($request)
    {
        if (!Auth::check()) {
            app()->route->redirect('/login');
        }
    }
}