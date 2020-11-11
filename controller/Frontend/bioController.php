<?php

namespace App\controller\Frontend;
use App\controller\Controller;


class bioController extends Controller
{

    /* cette fonction retourne la vue de la page biographie dans notre base.php */

    public function biographie() 
    {
        return $this->vue->rendue('biographie', []);
    }


}