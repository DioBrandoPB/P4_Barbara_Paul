<?php

namespace App\controller\Frontend;

use App\model\manager\ChapitreDAO;
use App\model\manager\CommentDAO;
use App\model\manager\View;


class chapitreController
{
    public function __construct()
    {
        $this->articleDAO = new ChapitreDAO();
        $this->commentDAO = new CommentDAO();
        $this->view = new View();
    }

    public function chapitres()
    {
        $chapitres = $this->articleDAO->getArticles();
        return $this->view->render('chapitres', [
            'chapitres' => $chapitres
        ]);
    }

    public function chapitre($chapitreId)
    {
        $chapitre = $this->articleDAO->getArticle($chapitreId);
        $comments = $this->commentDAO->getCommentsFromArticle($chapitreId);
        return $this->view->render('chapitre', [
            'chapitre' => $chapitre,
            'comments' => $comments
        ]);
    }

}