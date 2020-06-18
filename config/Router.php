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
                elseif($_GET['route'] === 'articles'){
                    $this->frontController->articles();
                }
                elseif($_GET['route'] === 'article'){
                    $this->frontController->article($_GET['articleId']);
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