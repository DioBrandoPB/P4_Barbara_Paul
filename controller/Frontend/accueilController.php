<?php

namespace App\controller\Frontend;

use App\controller\Controller;


class accueilController extends Controller
{

    /* cette fonction retourne la vue accueil avec la fonction recupDernierChapitrePublier du fichier ChapitreDAO.php pour recuperer le dernier chapitre publier sur la page d'accueil */


    public function index()
    {
        $chapitres = $this->chapitreDAO->recupDernierChapitrePublier();
        return $this->view->render('accueil', [
            'chapitres' => $chapitres
        ]);
    }
}
