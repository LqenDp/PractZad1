<?php
namespace Controller;

use Src\View;
use Src\Request;
use Model\User;

class Site
{
    public function index(Request $request): string
    {
        $posts = \Illuminate\Database\Capsule\Manager::table('posts')->get();
        return (new View())->render('site.post', ['posts' => $posts]);
    }

    public function hello(): string
    {
        return new View('site.hello', ['message' => 'hello working']);
    }

    public function signup(Request $request): string
    {
        if ($request->method === 'POST' && User::create($request->all())) {
            return new View('site.signup', ['message' => 'Вы успешно зарегистрированы']);
        }
        return new View('site.signup');
    }
}