<?php

namespace App\controller\Frontend;

use App\controller\Controller;
use App\model\Parameter;



class commentController extends Controller
{
    /* cette fonction permet de signaler un commentaire via la fonction signalCommentaire du fichier CommentDAO.php */

    public function signalCommentaire($commentId)
    {
        $this->commentDAO->signalCommentaire($commentId);
        header('Location: ../../index.php');
    }

    /* cette fonction permet de validé un commentaire via la fonction validéCommentaire du fichier CommentDAO.php */

    public function validéCommentaire($commentId)
    {
        $this->commentDAO->validéCommentaire($commentId);
        header('Location: ../../index.php');
    }

    /* cette fonction permet de supprimé un commentaire via la fonction supprimerComm du fichier CommentDAO.php */


    public function supprimerComm($commentId)
    {
        $this->commentDAO->supprimerComm($commentId);
        $this->session->set('delete_comment', 'Le commentaire a bien été supprimé');
        header('Location: index.php');
    }
}
