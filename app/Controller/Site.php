<?php
namespace Controller;

use Src\View;
use Illuminate\Database\Capsule\Manager as DB;
use Src\Request;

class Site
{
    public function index(Request $request): string
    {
        $posts = DB::table('posts')->where('id', $request->id)->get();
        return (new View())->render('site.post', ['posts' => $posts]);
    }

    public function hello(): string
    {
        return new View('site.hello', ['message' => 'hello working']);
    }
}