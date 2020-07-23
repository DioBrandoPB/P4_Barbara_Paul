<?php

namespace App\controller\Frontend;



class chapitreController extends Controller
{

    public function chapitres()
    {
        $chapitres = $this->articleDAO->getArticles();
        return $this->view->render('chapitres', [
            'chapitres' => $chapitres
        ]);
    }
    public function chapitresAccueil()
    {
        $chapitres = $this->articleDAO->getArticles();
        return $this->view->render('accueil', [
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