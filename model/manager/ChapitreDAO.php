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
        $chapitre->setTitle($row['titre']);
        $chapitre->setContent($row['contenu']);
        $chapitre->setExtrait($row['extrait']);
        $chapitre->setAuthor($row['autheur']);
        $chapitre->setImage($row['Images']);
        $chapitre->setCreatedAt($row['creea']);
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
        $sql = 'UPDATE chapitre SET titre=:titre, contenu=:contenu WHERE id=:chapitreId';
        $this->createQuery($sql, [
            'titre' => $post->get('titre'),
            'contenu' => $post->get('contenu'),
            'chapitreId' => $chapitreId
        ]);
    }

    public function supprimerChapitre($chapitreId)
    {
        $sql = 'DELETE FROM commentaire WHERE chapitre_id = ?';
        $this->createQuery($sql, [$chapitreId]);
        $sql = 'DELETE FROM chapitre WHERE id = ?';
        $this->createQuery($sql, [$chapitreId]);
    }

    public function ajouterChapitre($chapitre)
    {
        //Permet de récupérer les variables $titre, $contenu et $autheur
        extract($chapitre);
        $sql = 'INSERT INTO chapitre (titre, contenu, autheur, creea, statut) VALUES (?, ?, ?, NOW(), 1)';
        $autheur = "Jean Forteroche";
        $this->createQuery($sql, [$titre, $contenu, $autheur]);
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



