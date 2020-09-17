<?php

namespace App\controller\Frontend;

use App\controller\Controller;
use App\model\Parameter;

class chapitreController extends Controller
{

    /* cette fonction retourne la vue de la page chapitres.php dans notre base.php avec la fonction recupChapitresPublier pour recuperer tout les chapitres publier sur cette page */

    public function chapitres()
    {
        $chapitres = $this->chapitreDAO->recupChapitresPublier();
        return $this->view->render('chapitres', [
            'chapitres' => $chapitres
        ]);
    }

    /* cette fonction retourne la vue de la page chapitre.php dans notre base.php avec la fonction recupChapitre et recupCommChapitres des fichiers ChapitreDAO.php et 
    CommentDAO.php pour recuperer le chapitre designer (via son id) et ses commentaires sur la page chapitre.php */



    public function chapitre($chapitreId)
    {
        $chapitre = $this->chapitreDAO->recupChapitre($chapitreId);
        $comments = $this->commentDAO->recupCommChapitres($chapitreId);
        return $this->view->render('chapitre', [
            'chapitre' => $chapitre,
            'comments' => $comments
        ]);
    }
    /* cette fonction permet l'ajout de commentaire sur notre chapitre via son id via la soummission de données dans un formulaire via la fonction ajoutComm du fichier
    CommentaireDAO.php */


    public function ajoutComm(Parameter $post, $chapitreId)
    {
        if ($post->get('submit')) {
            $this->commentDAO->ajoutComm($post, $chapitreId);

            header('Location: index.php?route=chapitre&chapitreId=' . $chapitreId);
        }
    }
}
