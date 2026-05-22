<?php
namespace Controller;

use Src\View;

class SalaryController
{
    public function index(): string
    {
        return (new View())->render('salaries.index');
    }
}