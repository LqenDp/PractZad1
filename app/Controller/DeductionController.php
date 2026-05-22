<?php
namespace Controller;

use Src\View;

class DeductionController
{
    public function index(): string
    {
        return (new View())->render('deductions.index');
    }
}