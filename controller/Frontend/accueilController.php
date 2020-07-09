<?php

namespace App\controller\Frontend;

use App\model\manager\View;


class accueilController
{
    public function __construct()
    {
        $this->view = new View();
    }

    public function index() 
    {
        return $this->view->render('accueil', []);
    }

}