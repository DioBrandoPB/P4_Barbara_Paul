<?php

namespace App\controller\Frontend;


class commentController extends Controller
{

    public function signalCommentaire($commentId)
    {
        $this->commentDAO->signalCommentaire($commentId);
        header('Location: ../../index.php');
    }


}