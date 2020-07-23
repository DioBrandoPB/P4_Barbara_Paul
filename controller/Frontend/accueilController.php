<?php

namespace App\controller\Frontend;




class accueilController extends Controller
{


    public function index() 
    {
        return $this->view->render('accueil', []);
        $chapitres = $this->articleDAO->getLastArticles();
    }


}