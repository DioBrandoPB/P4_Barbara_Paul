<?php

namespace App\controller\Frontend;

use App\model\manager\View;


class bioController
{
    public function __construct()
    {
        $this->view = new View();
    }


    public function biographie() 
    {
        return $this->view->render('biographie', []);
    }


}