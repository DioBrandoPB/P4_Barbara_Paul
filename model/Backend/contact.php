<?php

namespace App\model\Backend;

/* class contact qui permet de recuperer les propriétés et methodes qui nous crée ces objets séparer de son fichier DAO associé pour plus de sécurités */


class contact
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $Nom;

    /**
     * @var string
     */
    private $Mail;
    /**
     * @var string
     */
    private $Message;

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
     * @param string $Nom
     */
    public function SetNom($Nom)
    {
        $this->Nom = $Nom;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->Nom;
    }

    /**
     * @param string $Mail
     */
    public function setMail($Mail)
    {
        $this->Mail = $Mail;
    }
    
    /**
    * @return string
    */
   public function getMail()
   {
       return $this->Mail;
   }

    /**
     * @param string $Msg
     */
    public function setMessage($Msg)
    {
        $this->Msg = $Msg;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->Msg;
    }

        /**
     * @param string $Sujet
     */
    public function setSujet($Sujet)
    {
        $this->Sujet = $Sujet;
    }

    /**
     * @return string
     */
    public function getSujet()
    {
        return $this->Sujet;
    }

}