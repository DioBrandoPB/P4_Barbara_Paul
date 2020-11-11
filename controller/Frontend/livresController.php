<?php

namespace App\controller\Frontend;
use App\controller\Controller;


class livresController extends Controller
{
    /* cette fonction retourne la vue de la page livres dans notre base.php */


    public function livres() 
    {
        return $this->vue->rendue('livres', []);
    }


}