<?php

namespace App\controller\Backend;

use App\controller\Controller;
use App\model\manager\ChapitreDAO;
use App\model\manager\ContactDAO;
use App\model\Parameter;

class BackController extends Controller
{
    protected $view;
    protected $chapitreDAO;
    protected $commentDAO;
    protected $usersDAO;
    protected $ContactDAO;

    /* si le formulaire de soumission est "submit" on instancie l'objet ChapitreDAO puis on appel la fonction ajouterchapitre dans le fichier ChapitreDAO.php
    et on ramenne l'utilisateur a la page add_article*/
    public function ajouterChapitre($post)
    {
        if (isset($post['submit'])) {
            $ChapitreDAO = new ChapitreDAO();
            $ChapitreDAO->ajouterChapitre($post);
            header('Location: index.php?route=chapitres');
        }
        return $this->view->renderBack('add_article', [
            'post' => $post
        ]);
    }
    /* si le formulaire de soumission est "submit" on instancie l'objet ContactDAO puis on appel la fonction ajoutMessage dans le fichier ContactDAO.php
    et on ramenne l'utilisateur a la page add_article*/

    public function ajoutMessage($post)
    {
        if ($post->get('submit')) {
            $ContactDAO = new ContactDAO();
            $this->ContactDAO->ajoutMessage($post);
            $this->session->set('envoyer_message', 'Votre message a été transmis a Jean Forteroche');
            header('Location: index.php?route=accueil');
        }
        return $this->view->render('contact', [
            'post' => $post
        ]);
    }
    /* on appel la fonction recupChapitre du fichier ChapitreDAO.php et si le formulaire de soumission est "submit" on appel la fonction modifierChapitre dans le fichier ChapitreDAO.php
    puis on ramenne l'utilisateur a la page admin*/

    public function modifierChapitre(Parameter $post, $chapitreId)
    {
        $chapitre = $this->chapitreDAO->recupChapitre($chapitreId);
        if ($post->get('submit')) {

            $this->chapitreDAO->modifierChapitre($post, $chapitreId);
            $this->session->set('edit_article', 'L\' article a bien été modifié');
            header('Location: index.php?route=admin');
        }
        return $this->view->renderBack('edit_article', [
            'chapitre' => $chapitre
        ]);
    }
    /* on recupere la fonction supprimerComm du fichier commentDAO.php et on ramenne l'utilasateur a la page d'index du site*/

    public function supprimerComm($commentId)
    {
        $this->commentDAO->supprimerComm($commentId);
        $this->session->set('delete_comment', 'Le commentaire a bien été supprimé');
        header('Location: index.php');
    }
    /* cette fonction permets de recuperer via les differentes fonctions de recupération des chapitres, commentaires, utilisateurs et messages dans la page d'administration*/

    public function comments()
    {
        $comments = $this->commentDAO->recupCommAdmin();
        $chapitres = $this->chapitreDAO->recupToutChapitres();
        $users = $this->userDAO->recupUtilisateurs();
        $contacts = $this->ContactDAO->recupMessage();
        return $this->view->renderBack('admin', [
            'comments' => $comments,
            'chapitres' => $chapitres,
            'users' => $users,
            'contacts' => $contacts
        ]);
    }
    /* cette fonction renvoie la vue profile.php*/

    public function profile()
    {
        return $this->view->renderBack('profile');
    }
    /* cette fonction permet la modification du mdp via la fonction majMDP dans le fichier userDAO.php et renvoie sur la page de profile de l'utilisateur */
    public function majMDP(Parameter $post)
    {
        if ($post->get('submit')) {
            $this->userDAO->majMDP($post, $this->session->get('pseudo'));
            $this->session->set('update_password', 'Le mot de passe a été mis à jour');
            header('Location: index.php?route=profile');
        }
        return $this->view->renderBack('update_password');
    }

    /* cette fonction permet de reinitialiser la session afin d'assurer la deconnection d'un utilisateur */

    public function logout()
    {
        $this->session->stop();
        $this->session->start();
        $this->session->set('logout', 'À bientôt');
        header('Location: index.php');
    }
    /* cette fonction permet de designaler un commentaire via la fonction designalerComm de CommentaireDAO.php et renvoie sur la page admin */

    public function designalerComm($commentId)
    {
        $this->commentDAO->designalerComm($commentId);
        $this->session->set('unflag_comment', 'Le commentaire a bien été désignalé');
        header('Location: index.php?route=admin');
    }
    /* cette fonction permet de publier un chapitre via la fonction publierChapitre dans le fichier ChapitreDAO.php et ramenne sur la page admin */

    public function publierChapitre($chapitreId)
    {
        $this->chapitreDAO->publierChapitre($chapitreId);
        $this->session->set('publierChapitre', 'Le chapitre a bien été publié');
        header('Location: index.php?route=admin');
    }
    /* cette fonction permet de passer un chapitre a l'état de brouillon via la fonction brouillonnerChapitre du fichier ChapitreDAO.php et ramenne sur la page admin */

    public function brouillonnerChapitre($chapitreId)
    {
        $this->chapitreDAO->brouillonnerChapitre($chapitreId);
        $this->session->set('brouillonnerChapitre', 'Le chapitre a été définit comme brouillon');
        header('Location: index.php?route=admin');
    }
    /* cette fonction permet de supprimer un utilisateur via la fonction deleteUser du fichier UserDAO.php et ramenne sur la page admin */

    public function deleteUser($userId)
    {
        $this->userDAO->deleteUser($userId);
        $this->session->set('delete_user', 'L\'utilisateur a bien été supprimé');
        header('Location: index.php?route=admin');
    }

    /* cette fonction permet de supprimer un chapitre via la fonction supprimerChapitre du fichier ChapitreDAO.php et ramenne sur la page admin */

    public function supprimerChapitre($chapitreId)
    {
        $this->chapitreDAO->supprimerChapitre($chapitreId);
        $this->session->set('delete_article', 'L\' article a bien été supprimé');
        header('Location: index.php?route=admin');
    }
}
