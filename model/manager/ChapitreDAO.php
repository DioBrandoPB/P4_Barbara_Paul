<?php

namespace App\model\manager;

use App\model\Backend\chapitre;
use App\model\Parameter;

class ChapitreDAO extends DAO
{
/* fonction buildObject qui nous permet de convertir chaque champ de la table en propriété de notre objet */
    /* row = ranger */
    private function buildObject($row)
    {
        $chapitre = new chapitre();
        $chapitre->setId($row['id']);
        $chapitre->setTitle($row['title']);
        $chapitre->setContent($row['content']);
        $chapitre->setExtrait($row['extrait']);
        $chapitre->setAuthor($row['author']);
        $chapitre->setImage($row['Images']);
        $chapitre->setCreatedAt($row['createdAt']);
        $chapitre->setStatut($row['statut']);
        return $chapitre;
    }

    public function recupChapitresPublier()
    {
        $sql = 'SELECT * FROM chapitre WHERE statut = 0 ORDER BY id DESC ';
        $result = $this->createQuery($sql);
        $chapitres = [];
        foreach ($result as $row){
            $chapitreId = $row['id'];
            $chapitres[$chapitreId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $chapitres;
    }
    public function recupToutChapitres()
    {
        $sql = 'SELECT * FROM chapitre ORDER BY id DESC ';
        $result = $this->createQuery($sql);
        $chapitres = [];
        foreach ($result as $row){
            $chapitreId = $row['id'];
            $chapitres[$chapitreId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $chapitres;
    }

    public function recupChapitre($chapitreId)
    {
        $sql = 'SELECT * FROM chapitre WHERE id = ?';
        $result = $this->createQuery($sql, [$chapitreId]);
        $chapitre = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($chapitre);
    }

    public function recupDernierChapitrePublier()
    {
        $sql = 'SELECT * FROM chapitre WHERE statut = 0 ORDER BY id DESC LIMIT 0,1';
        $result = $this->createQuery($sql);
        $chapitres = [];
        foreach ($result as $row){
            $chapitreId = $row['id'];
            $chapitres[$chapitreId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $chapitres;
    
    }
    
    public function modifierChapitre(Parameter $post, $chapitreId)
    {
        $sql = 'UPDATE chapitre SET title=:title, content=:content WHERE id=:chapitreId';
        $this->createQuery($sql, [
            'title' => $post->get('title'),
            'content' => $post->get('content'),
            'chapitreId' => $chapitreId
        ]);
    }

    public function supprimerChapitre($chapitreId)
    {
        $sql = 'DELETE FROM comment WHERE article_id = ?';
        $this->createQuery($sql, [$chapitreId]);
        $sql = 'DELETE FROM chapitre WHERE id = ?';
        $this->createQuery($sql, [$chapitreId]);
    }

    public function ajouterChapitre($chapitre)
    {
        //Permet de récupérer les variables $title, $content et $author
        extract($chapitre);
        $sql = 'INSERT INTO chapitre (title, content, author, createdAt, statut) VALUES (?, ?, ?, NOW(), 1)';
        $author = "Jean Forteroche";
        $this->createQuery($sql, [$title, $content, $author]);
    }
    
    public function publierChapitre($chapitreId)
    {
        $sql = 'UPDATE chapitre SET statut = ? WHERE id = ?';
        $this->createQuery($sql, [0, $chapitreId]);
    }

    public function brouillonnerChapitre($chapitreId)
    {
        $sql = 'UPDATE chapitre SET statut = ? WHERE id = ?';
        $this->createQuery($sql, [1, $chapitreId]);
    }
    
}



