<?php

namespace App\model;

use App\controller\Frontend\accueilController;
use App\controller\Frontend\chapitreController;
use App\controller\Frontend\commentController;
use App\controller\Frontend\bioController;
use App\controller\Frontend\livresController;
use App\controller\Frontend\contactController;
use App\controller\Backend\BackController;
use App\controller\Frontend\userController;
use App\model\Parameter;
use App\model\Request;
use Exception;

class Router
{
    private $backController;
    private $accueilController;
    private $chapitreController;
    private $commentController;
    private $bioController;
    private $livresController;
    private $contactController;
    private $userController;
    private $request;

    /* construction des objets lié aux différents controller gerant l'affichage des pages dans la base.php du site */

    public function __construct()
    {
        $this->backController = new backController();
        $this->accueilController = new accueilController();
        $this->chapitreController = new chapitreController();
        $this->commentController = new commentController();
        $this->bioController = new bioController();
        $this->livresController = new livresController();
        $this->contactController = new contactController();
        $this->userController = new userController();
        $this->request = new Request();
    }

    public function run()
    {
        $route = $this->request->getGet()->get('route');
        try {
            if (isset($_GET['route'])) {
                if ($route === 'accueil') {
                    $this->accueilController->index();
                } elseif ($route === 'chapitre') {
                    $this->chapitreController->chapitre($this->request->getGet()->get('chapitreId'));
                } elseif ($route === 'chapitres') {
                    $this->chapitreController->chapitres();
                } elseif ($route === 'ajouterChapitre') {
                    $this->backController->ajouterChapitre($_POST);
                } elseif ($route === 'deleteChapitre') {
                    $this->backController->supprimerChapitre($this->request->getGet()->get('chapitreId'));
                } elseif ($route === 'biographie') {
                    $this->bioController->biographie();
                } elseif ($route === 'livres') {
                    $this->livresController->livres();
                } elseif ($route === 'contact') {
                    $this->contactController->contact();
                } elseif ($route === 'ajoutMessage') {
                    $this->backController->ajoutMessage($this->request->getPost());
                } elseif ($route === 'admin') {
                    $this->backController->comments();
                } elseif ($route === 'upload') {
                    $this->backController->upload();
                } elseif ($route === 'ajoutComm') {
                    $this->chapitreController->ajoutComm($this->request->getPost(), $this->request->getGet()->get('chapitreId'));
                } elseif ($route === 'signalCommentaire') {
                    $this->commentController->signalCommentaire($_GET['commentId']);
                } elseif ($route === 'designalerComm') {
                    $this->backController->designalerComm($_GET['commentId']);
                } elseif ($route === 'modifierChapitre') {
                    $this->backController->modifierChapitre($this->request->getPost(), $_GET['chapitreId']);
                } elseif ($route === 'publierChapitre') {
                    $this->backController->publierChapitre($_GET['chapitreId']);
                } elseif ($route === 'brouillonnerChapitre') {
                    $this->backController->brouillonnerChapitre($_GET['chapitreId']);
                } elseif ($route === 'supprimerComm') {
                    $this->commentController->supprimerComm($_GET['commentId']);
                } elseif ($route === 'validéCommentaire') {
                    $this->commentController->validéCommentaire($_GET['commentId']);
                } elseif ($route === 'register') {
                    $this->userController->register($this->request->getPost());
                } elseif ($route === 'login') {
                    $this->userController->login($this->request->getPost());
                } elseif ($route === 'profile') {
                    $this->backController->profile();
                } elseif ($route === 'majMDP') {
                    $this->backController->majMDP($this->request->getPost());
                } elseif ($route === 'logout') {
                    $this->backController->logout();
                } elseif ($route === 'deleteUser') {
                    $this->backController->deleteUser($this->request->getGet()->get('userId'));
                } else {
                    echo 'page inconnue';
                }
            } else {
                $this->accueilController->index();
            }
        } catch (Exception $e) {
            echo 'Erreur';
        }
    }
}
