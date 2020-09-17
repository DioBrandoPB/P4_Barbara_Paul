<?php

namespace App\model;

class Request
{
    private $get;
    private $post;
    private $session;
    /* construction de l'objet parameter avec les variables superglobales get post et session */

    public function __construct()
    {
        $this->get = new Parameter($_GET);
        $this->post = new Parameter($_POST);
        $this->session = new Session($_SESSION);
    }

    /**
     * @return Parameter
     */
    public function getGet()
    {
        return $this->get;
    }

    /**
     * @return Parameter
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @return Session
     */
    public function getSession()
    {
        return $this->session;
    }
}