<?php

namespace App\controller\Frontend;

use App\model\Parameter;



class commentController extends Controller
{

    public function signalCommentaire($commentId)
    {
        $this->commentDAO->signalCommentaire($commentId);
        header('Location: ../../index.php');
    }

}