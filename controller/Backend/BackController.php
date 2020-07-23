<?php

namespace App\controller\Backend;

use App\model\manager\ChapitreDAO;
use App\model\manager\View;

class BackController 
{
    private $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function addArticle($post)
    {
        if(isset($post['submit'])) {
            $ChapitreDAO = new ChapitreDAO();
            $ChapitreDAO->addArticle($post);
            header('Location: index.php');
        }
        return $this->view->render('add_article', [
            'post' => $post
        ]);
    }
}