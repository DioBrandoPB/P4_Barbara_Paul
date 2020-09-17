<?php

namespace App\model\manager;

use PDO;
use Exception;
/* gere les fonctions liées a la connection a la bdd grace a pdo et exception et l'envoie de requete */

abstract class DAO
{

    private $connection;

    private function verifConnection()
    {
        //Vérifie si la connexion est nulle et fait appel à recupConnection()
        if($this->connection === null) {
            return $this->recupConnection();
        }
        //Si la connexion existe, elle est renvoyée, inutile de refaire une connexion
        return $this->connection;
    }

    //Méthode de connexion à notre base de données
    private function recupConnection()
    {
        //Tentative de connexion à la base de données
        try{
            $this->connection = new PDO(DB_HOST, DB_USER, DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //On renvoie la connexion
            return $this->connection;
        }
            //On lève une erreur si la connexion échoue
        catch(Exception $errorConnection)
        {
            die ('Erreur de connection :'.$errorConnection->getMessage());
        }

    }

    protected function createQuery($sql, $parameters = null)
    {
        if($parameters)
        {
            $result = $this->verifConnection()->prepare($sql);
            $result->execute($parameters);
            return $result;
        }
        $result = $this->verifConnection()->query($sql);
        return $result;
    }
}