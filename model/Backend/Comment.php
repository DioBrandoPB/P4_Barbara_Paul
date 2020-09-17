<?php

namespace App\model\Backend;

/* class Comment qui permet de recuperer les propriétés et methodes qui nous crée ces objets séparer de son fichier DAO associé pour plus de sécurités */


class Comment
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $pseudo;

    /**
     * @var string
     */
    private $content;

    /**
     * @var \DateTime
     */
    private $createdAt;

    

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param string $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

        /**
     * @return bool
     */
    public function signalement()
    {
        return $this->signalé;
    }

    /**
     * @param bool $signalé
     */
    public function signalementFait($signalé)
    {
        $this->signalé = $signalé;
    }
            /**
     * @return bool
     */
    public function validation()
    {
        return $this->validé;
    }

    /**
     * @param bool $validé
     */
    public function validationFaite($validé)
    {
        $this->validé = $validé;
    }
}