<?php

namespace App\model\Backend;

/* class chapitre qui permet de recuperer les propriétés et methodes qui nous crée ces objets séparer de son fichier DAO associé pour plus de sécurités */

class chapitre
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $titre;

    /**
     * @var string
     */
    private $contenu;
    /**
     * @var string
     */
    private $extrait;

    /**
     * @var string
     */
    private $autheur;

    /**
     * @var \DateTime
     */
    private $creea;

    /**
     * @var string
     */
    private $Images;
    

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
    public function getTitle()
    {
        return $this->titre;
    }

    public function setImage($Images)
    {
        $this->Images = $Images;
    }
    public function getImages()
    {
        return $this->Images;
    }

    /**
     * @param string $titre
     */
    public function setTitle($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->contenu;
    }
    /**
    * @return string
    */
   public function getExtrait()
   {
       return $this->extrait;
   }
    /**
     * @param string $extrait
     */
    public function setExtrait($extrait)
    {
        $this->extrait = $extrait;
    }
    /**
     * @param string $contenu
     */
    public function setContent($contenu)
    {
        $this->contenu = $contenu;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->autheur;
    }

    /**
     * @param string $autheur
     */
    public function setAuthor($autheur)
    {
        $this->autheur = $autheur;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->creea;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($creea)
    {
        $this->creea = $creea;
    }
    
    /**
     * @param bool $statut
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;
    }
            /**
     * @return bool
     */
    public function getStatut()
    {
        return $this->statut;
    }
}