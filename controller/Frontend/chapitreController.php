<?php

namespace App\controller\Frontend;
use App\controller\Controller;
use App\model\Parameter;

class chapitreController extends Controller
{

    public function chapitres()
    {
        $chapitres = $this->chapitreDAO->recupChapitresPublier();
        return $this->view->render('chapitres', [
            'chapitres' => $chapitres
        ]);
    }




    public function chapitre($chapitreId)
    {
        $chapitre = $this->chapitreDAO->recupChapitre($chapitreId);
        $comments = $this->commentDAO->recupCommChapitres($chapitreId);
        return $this->view->render('chapitre', [
            'chapitre' => $chapitre,
            'comments' => $comments
        ]);
    }
    public function ajoutComm(Parameter $post, $chapitreId)
    {
        if($post->get('submit')) {
            $this->commentDAO->ajoutComm($post, $chapitreId);

            header('Location: index.php?route=chapitre&chapitreId='.$chapitreId);
        }
    }
    
}