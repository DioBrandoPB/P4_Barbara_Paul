<?php

namespace App\controller\Frontend;

use App\controller\Controller;
use App\model\Parameter;

class contactController extends Controller
{

    /* cette fonction renvoie la vue du fichier contact.php dans notre base */


    public function contact()
    {
        return $this->view->render('contact', []);
    }

    /* cette fonction permet d'ajouter un message via la soumission de données d'un formulaire dans la bdd via la fonction ajoutMessage du fichier
    ContactDAO.php */

    public function ajoutMessage(Parameter $post, $contact)
    {
        if ($post->get('submit')) {
            $this->ContactDAO->ajoutMessage($post, $contact);

            header('Location: index.php?route=ajoutMessage');
        }
    }
}
