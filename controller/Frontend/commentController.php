<?php

namespace App\controller\Frontend;

use App\controller\Controller;
use App\model\Parameter;



class commentController extends Controller
{
    /* cette fonction permet de signaler un commentaire via la fonction signalCommentaire du fichier CommentaireDAO.php */

    public function signalCommentaire($commentId)
    {
        $this->commentaireDAO->signalCommentaire($commentId);
        header('Location: ../../index.php');
    }

    /* cette fonction permet de validé un commentaire via la fonction validéCommentaire du fichier CommentaireDAO.php */

    public function validéCommentaire($commentId)
    {
        $this->commentaireDAO->validéCommentaire($commentId);
        header('Location: ../../index.php');
    }

    /* cette fonction permet de supprimé un commentaire via la fonction supprimerComm du fichier CommentaireDAO.php */


    public function supprimerComm($commentId)
    {
        $this->commentaireDAO->supprimerComm($commentId);
        $this->session->set('supprimer_comm', 'Le commentaire a bien été supprimé');
        header('Location: index.php');
    }
}
