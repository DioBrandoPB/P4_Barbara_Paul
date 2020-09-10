<?php

namespace App\controller\Frontend;
use App\controller\Controller;
use App\model\Parameter;



class commentController extends Controller
{

    public function signalCommentaire($commentId)
    {
        $this->commentDAO->signalCommentaire($commentId);
        header('Location: ../../index.php');
    }
    public function validéCommentaire($commentId)
    {
        $this->commentDAO->validéCommentaire($commentId);
        header('Location: ../../index.php');
    }
    public function supprimerComm($commentId)
    {
        $this->commentDAO->supprimerComm($commentId);
        $this->session->set('delete_comment', 'Le commentaire a bien été supprimé');
        header('Location: index.php');
    }
}