<?php

namespace App\controller\Backend;

use App\controller\Frontend\Controller;
use App\model\manager\ChapitreDAO;
use App\model\manager\View;
use App\model\Session;
use App\model\Parameter;
class BackController extends Controller
{
    protected $view;
    protected $chapitreDAO;
    protected $commentDAO;

public function administration()
    {

        $comments = $this->commentDAO->getFlagComments();
        return $this->view->render('administration', [

            'comments' => $comments
        ]);
        $chapitres = $this->chapitreDAO->getArticles();
        return $this->view->renderBack('chapitres', [
            'chapitres' => $chapitres
        ]);
    }

    public function addArticle($post)
    {
        if(isset($post['submit'])) {
            $ChapitreDAO = new ChapitreDAO();
            $ChapitreDAO->addArticle($post);
            header('Location: index.php?route=chapitres');
        }
        return $this->view->renderBack('add_article', [
            'post' => $post
        ]);
    }
    public function deleteComment($commentId)
    {
        $this->commentDAO->deleteComment($commentId);
        $this->session->set('delete_comment', 'Le commentaire a bien été supprimé');
        header('Location: index.php');
    }
    public function comments()
    {
        $comments = $this->commentDAO->getComments();
        $chapitres = $this->chapitreDAO->getArticles();
        return $this->view->renderBack('admin', [
            'comments' => $comments,
            'chapitres' => $chapitres
        ]);
        
    }
    public function profile()
    {
        return $this->view->renderBack('profile');
    }
    public function updatePassword(Parameter $post)
    {
        if($post->get('submit')) {
            $this->userDAO->updatePassword($post, $this->session->get('pseudo'));
            $this->session->set('update_password', 'Le mot de passe a été mis à jour');
            header('Location: index.php?route=profile');
        }
        return $this->view->renderBack('update_password');
    }
    public function logout()
    {
        $this->session->stop();
        $this->session->start();
        $this->session->set('logout', 'À bientôt');
        header('Location: index.php');
    }
    public function unflagComment($commentId)
    {
        $this->commentDAO->unflagComment($commentId);
        $this->session->set('unflag_comment', 'Le commentaire a bien été désignalé');
        header('Location: index.php?route=administration');
    }
}