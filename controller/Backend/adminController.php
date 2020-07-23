<?php

namespace App\controller\Backend;

use App\model\manager\ChapitreDAO;
use App\model\manager\View;

class adminController 
{
    private $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function admin() 
    {
        return $this->view->render('admin', []);
    }
}