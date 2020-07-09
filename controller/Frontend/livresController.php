<?php

namespace App\controller\Frontend;

use App\model\manager\View;


class livresController
{
    public function __construct()
    {
        $this->view = new View();
    }


    public function livres() 
    {
        return $this->view->render('livres', []);
    }


}