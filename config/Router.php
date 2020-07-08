<?php

namespace App\config;
use App\src\controller\FrontController;
use Exception;

class Router
{
    private $frontController;

    public function __construct()
    {
        $this->frontController = new FrontController();
    }

    public function run()
    {
        try{
            if(isset($_GET['route']))
            {
                if($_GET['route'] === 'accueil'){
                    $this->frontController->index();
                }
                elseif($_GET['route'] === 'chapitre'){
                    $this->frontController->chapitre($_GET['chapitreId']);
                }
                elseif($_GET['route'] === 'chapitres'){
                    $this->frontController->chapitres();
                }
                elseif($_GET['route'] === 'biographie'){
                    $this->frontController->biographie();
                }
                elseif($_GET['route'] === 'livres'){
                    $this->frontController->livres();
                }
                elseif($_GET['route'] === 'contact'){
                    $this->frontController->contact();
                }
                else{
                    echo 'page inconnue';
                }
            }
            else{
                $this->frontController->index();
            }
        }
        catch (Exception $e)
        {
            echo 'Erreur';
        }
    }
}