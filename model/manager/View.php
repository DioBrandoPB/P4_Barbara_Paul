<?php

namespace App\model\manager;

use App\model\Request;

/* va gerer le fonctionnement du rendu des vues pour nos fichier dans base.php en front et en back */

class View
{
    private $fichier;
    private $titre;
    private $requete;
    private $session;

    /* construction des objets request et session */

    public function __construct()
    {
        $this->request = new Request();
        $this->session = $this->request->getSession();
    }
    /* rendu des pages frontend */
    public function rendue($template, $data = [])
    {
        $this->fichier = '../view/Frontend/' . $template . '.php';
        $contenu  = $this->miseEnContenue($this->fichier, $data);
        $vue = $this->miseEnContenue('../view/Frontend/base.php', [
            'titre' => $this->titre,
            'contenu' => $contenu,
            'session' => $this->session

        ]);
        echo $vue;
    }
    /* rendu des pages backend */

    public function rendueBack($template, $data = [])
    {
        $this->fichier = '../view/Backend/' . $template . '.php';
        $contenu  = $this->miseEnContenue($this->fichier, $data);
        $vue = $this->miseEnContenue('../view/Backend/base.php', [
            'titre' => $this->titre,
            'contenu' => $contenu,
            'session' => $this->session

        ]);
        echo $vue;
    }
    /* mise en "content" via ob_start() */

    private function miseEnContenue($fichier, $data)
    {
        if (file_exists($fichier)) {
            extract($data);
            ob_start();
            require $fichier;
            return ob_get_clean();
        }
        header('Location: index.php?route=notFound');
    }
}
