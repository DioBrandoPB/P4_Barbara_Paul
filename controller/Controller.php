<?php

namespace App\controller;

use App\model\manager\ChapitreDAO;
use App\model\manager\CommentDAO;
use App\model\manager\ContactDAO;
use App\model\manager\UserDAO;
use App\model\Validation;
use App\model\Session;
use App\model\manager\View;
use App\model\Request;

/* classe abstraite ne pouvans etre instancier, toutes les méthodes marquées comme abstraites dans la déclaration de la classe parente doivent être définies par l'enfant*/

abstract class Controller
{
    protected $chapitreDAO;
    protected $commentDAO;
    protected $ContactDAO;
    protected $userDAO;
    protected $view;
    protected $validation;
    protected $get;
    protected $post;
    protected $session;

    /* construction des différents objets du site et les initialise */
    public function __construct()
    {
        $this->chapitreDAO = new ChapitreDAO();
        $this->commentDAO = new CommentDAO();
        $this->ContactDAO = new ContactDAO();
        $this->userDAO = new UserDAO();
        $this->view = new View();
        $this->validation = new Validation();
        $this->request = new Request();
        $this->get = $this->request->getGet();
        $this->post = $this->request->getPost();
        $this->session = $this->request->getSession();
    }
}
