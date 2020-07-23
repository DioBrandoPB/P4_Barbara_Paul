<?php

namespace App\controller\Frontend;

use App\model\manager\ChapitreDAO;
use App\model\manager\CommentDAO;
use App\model\manager\View;


abstract class Controller
{
    protected $articleDAO;
    protected $commentDAO;
    protected $view;

    public function __construct()
    {
        $this->articleDAO = new ChapitreDAO();
        $this->commentDAO = new CommentDAO();
        $this->view = new View();
    }
}