<?php

namespace App\controller\Frontend;
use App\controller\Controller;


class livresController extends Controller
{


    public function livres() 
    {
        return $this->view->render('livres', []);
    }


}