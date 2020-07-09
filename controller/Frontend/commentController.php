<?php

namespace App\controller\Frontend;
use App\model\manager\ChapitreDAO;
use App\model\manager\CommentDAO;
use App\model\manager\View;


class commentController
{
    public function __construct()
    {
        $this->articleDAO = new ChapitreDAO();
        $this->commentDAO = new CommentDAO();
        $this->view = new View();
    }

    public function signalCommentaire($commentId)
    {
        $this->commentDAO->signalCommentaire($commentId);
        header('Location: ../../index.php');
    }

}