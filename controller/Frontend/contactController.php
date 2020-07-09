<?php

namespace App\controller\Frontend;

use App\model\manager\View;


class contactController
{
    public function __construct()
    {
        $this->view = new View();
    }

    public function contact() 
    {
        return $this->view->render('contact', []);
    }

}