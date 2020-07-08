<?php

namespace App\src\controller;
use App\src\DAO\ArticleDAO;
use App\src\DAO\CommentDAO;
use App\src\model\View;

class FrontController
{
    private $articleDAO;
    private $commentDAO;
    private $view;

    public function __construct()
    {
        $this->articleDAO = new ArticleDAO();
        $this->commentDAO = new CommentDAO();
        $this->view = new View();
    }

    public function index() 
    {
        return $this->view->render('accueil', []);
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

    public function biographie() 
    {
        return $this->view->render('biographie', []);
    }

    public function livres() 
    {
        return $this->view->render('livres', []);
    }

    public function contact() 
    {
        return $this->view->render('contact', []);
    }
}