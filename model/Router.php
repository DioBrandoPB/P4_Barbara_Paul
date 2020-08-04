<?php

namespace App\model;
use App\controller\Frontend\accueilController;
use App\controller\Frontend\chapitreController;
use App\controller\Frontend\commentController;
use App\controller\Frontend\bioController;
use App\controller\Frontend\livresController;
use App\controller\Frontend\contactController;
use App\controller\Backend\BackController;
use App\controller\Backend\adminController;
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
    private $adminController;
    private $request;


    public function __construct()
    {
        $this->backController = new backController();
        $this->accueilController = new accueilController();
        $this->chapitreController = new chapitreController();
        $this->commentController = new commentController();
        $this->bioController = new bioController();
        $this->livresController = new livresController();
        $this->contactController = new contactController();
        $this->adminController = new adminController();
        $this->request = new Request();
    }

    public function run()
    {
        $route = $this->request->getGet()->get('route');
        try{
            if(isset($_GET['route']))
            {
                if($route === 'accueil'){
                    $this->accueilController->index();

                }
                elseif($route === 'chapitre'){
                    $this->chapitreController->chapitre($this->request->getGet()->get('chapitreId'));
                }
                elseif($route === 'chapitres'){
                    $this->chapitreController->chapitres();
                }
                elseif($route === 'addArticle'){
                    $this->backController->addArticle($_POST);
                }
                elseif($route === 'biographie'){
                    $this->bioController->biographie();
                }
                elseif($route === 'livres'){
                    $this->livresController->livres();
                }
                elseif($route === 'contact'){
                    $this->contactController->contact();
                }
                elseif($route === 'admin'){
                    $this->adminController->admin();
                }
                elseif($route === 'addComment'){
                    $this->chapitreController->addComment($this->request->getPost(), $this->request->getGet()->get('chapitreId'));
                }
                elseif($route === 'signalCommentaire'){
                    $this->commentController->signalCommentaire($_GET['commentId']);
                }
                
                else{
                    echo 'page inconnue';
                }
            }
            else{
                $this->accueilController->index();
            }
        }
        catch (Exception $e)
        {
            echo 'Erreur';
        }
    }
}