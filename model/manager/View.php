<?php

namespace App\model\manager;

use App\model\Request;

/* va gerer le fonctionnement du rendu des vues pour nos fichier dans base.php en front et en back */

class View
{
    private $file;
    private $title;
    private $request;
    private $session;

    /* construction des objets request et session */

    public function __construct()
    {
        $this->request = new Request();
        $this->session = $this->request->getSession();
    }
    /* rendu des pages frontend */
    public function render($template, $data = [])
    {
        $this->file = '../view/Frontend/' . $template . '.php';
        $content  = $this->renderFile($this->file, $data);
        $view = $this->renderFile('../view/Frontend/base.php', [
            'title' => $this->title,
            'content' => $content,
            'session' => $this->session

        ]);
        echo $view;
    }
    /* rendu des pages backend */

    public function renderBack($template, $data = [])
    {
        $this->file = '../view/Backend/' . $template . '.php';
        $content  = $this->renderFile($this->file, $data);
        $view = $this->renderFile('../view/Backend/base.php', [
            'title' => $this->title,
            'content' => $content,
            'session' => $this->session

        ]);
        echo $view;
    }
    /* mise en "content" via ob_start() */

    private function renderFile($file, $data)
    {
        if (file_exists($file)) {
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        }
        header('Location: index.php?route=notFound');
    }
}
