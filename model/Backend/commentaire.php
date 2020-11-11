<?php

namespace App\model\Backend;

/* class Commentaire qui permet de recuperer les propriétés et methodes qui nous crée ces objets séparer de son fichier DAO associé pour plus de sécurités */


class Commentaire
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
    private $contenu;

    /**
     * @var \DateTime
     */
    private $creea;

    

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
        return $this->contenu;
    }

    /**
     * @param string $contenu
     */
    public function setContent($contenu)
    {
        $this->contenu = $contenu;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->creea;
    }

    /**
     * @param \DateTime $creea
     */
    public function setCreatedAt($creea)
    {
        $this->creea = $creea;
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