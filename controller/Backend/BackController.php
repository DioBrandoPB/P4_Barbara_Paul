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
    protected $usersDAO;



    public function ajouterChapitre($post)
    {
        if(isset($post['submit'])) {
            $ChapitreDAO = new ChapitreDAO();
            $ChapitreDAO->ajouterChapitre($post);
            header('Location: index.php?route=chapitres');
        }
        return $this->view->renderBack('add_article', [
            'post' => $post
        ]);
    }
    public function modifierChapitre(Parameter $post, $chapitreId)
    {
        $chapitre = $this->chapitreDAO->recupChapitre($chapitreId);
        if($post->get('submit')) {

            $this->chapitreDAO->modifierChapitre($post, $chapitreId);
            $this->session->set('edit_article', 'L\' article a bien été modifié');
            header('Location: index.php?route=admin');
        }
        return $this->view->renderBack('edit_article', [
            'chapitre' => $chapitre
        ]);
    }

    
    public function supprimerComm($commentId)
    {
        $this->commentDAO->supprimerComm($commentId);
        $this->session->set('delete_comment', 'Le commentaire a bien été supprimé');
        header('Location: index.php');
    }
    public function comments()
    {
        $comments = $this->commentDAO->recupCommAdmin();
        $chapitres = $this->chapitreDAO->recupToutChapitres();
        $users = $this->userDAO->recupUtilisateurs();
        return $this->view->renderBack('admin', [
            'comments' => $comments,
            'chapitres' => $chapitres,
            'users' => $users
        ]);
        
    }
    public function profile()
    {
        return $this->view->renderBack('profile');
    }
    public function majMDP(Parameter $post)
    {
        if($post->get('submit')) {
            $this->userDAO->majMDP($post, $this->session->get('pseudo'));
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
    public function designalerComm($commentId)
    {
        $this->commentDAO->designalerComm($commentId);
        $this->session->set('unflag_comment', 'Le commentaire a bien été désignalé');
        header('Location: index.php?route=admin');
    }
    public function publierChapitre($chapitreId)
    {
        $this->chapitreDAO->publierChapitre($chapitreId);
        $this->session->set('publierChapitre', 'Le chapitre a bien été publié');
        header('Location: index.php?route=admin');
    }
    public function brouillonnerChapitre($chapitreId)
    {
        $this->chapitreDAO->brouillonnerChapitre($chapitreId);
        $this->session->set('brouillonnerChapitre', 'Le chapitre a été définit comme brouillon');
        header('Location: index.php?route=admin');
    }
    public function deleteUser($userId)
    {
        $this->userDAO->deleteUser($userId);
        $this->session->set('delete_user', 'L\'utilisateur a bien été supprimé');
        header('Location: index.php?route=admin');
    }
    public function supprimerChapitre($chapitreId)
    {
        $this->chapitreDAO->supprimerChapitre($chapitreId);
        $this->session->set('delete_article', 'L\' article a bien été supprimé');
        header('Location: index.php?route=admin');
    }
}