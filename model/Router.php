<?php

namespace App\model;
use App\controller\Frontend\accueilController;
use App\controller\Frontend\chapitreController;
use App\controller\Frontend\commentController;
use App\controller\Frontend\bioController;
use App\controller\Frontend\livresController;
use App\controller\Frontend\contactController;
use Exception;

class Router
{
    private $accueilController;
    private $chapitreController;
    private $commentController;
    private $bioController;
    private $livresController;
    private $contactController;
    public function __construct()
    {
        $this->accueilController = new accueilController();
        $this->chapitreController = new chapitreController();
        $this->commentController = new commentController();
        $this->bioController = new bioController();
        $this->livresController = new livresController();
        $this->contactController = new contactController();
    }

    public function run()
    {
        try{
            if(isset($_GET['route']))
            {
                if($_GET['route'] === 'accueil'){
                    $this->accueilController->index();
                }
                elseif($_GET['route'] === 'chapitre'){
                    $this->chapitreController->chapitre($_GET['chapitreId']);
                }
                elseif($_GET['route'] === 'chapitres'){
                    $this->chapitreController->chapitres();
                }
                elseif($_GET['route'] === 'biographie'){
                    $this->bioController->biographie();
                }
                elseif($_GET['route'] === 'livres'){
                    $this->livresController->livres();
                }
                elseif($_GET['route'] === 'contact'){
                    $this->contactController->contact();
                }
                elseif($_GET['route'] === 'signalCommentaire'){
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