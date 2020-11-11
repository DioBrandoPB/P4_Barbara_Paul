<?php

namespace App\model\manager;

use App\model\Backend\commentaire;

use App\model\Parameter;

class CommentaireDAO extends DAO
{
    /* fonction buildObject qui nous permet de convertir chaque champ de la table en propriété de notre objet */
    /* row = ranger */

    private function buildObject($row)
    {
        $commentaire = new Commentaire();
        $commentaire->setId($row['id']);
        $commentaire->setPseudo($row['pseudo']);
        $commentaire->setContent($row['contenu']);
        $commentaire->setCreatedAt($row['creea']);
        $commentaire->signalementFait($row['signalé']);
        $commentaire->validationFaite($row['validé']);
        return $commentaire;
    }

    public function recupCommChapitres($chapitreId)
    {
        $sql = 'SELECT id, pseudo, contenu, creea, signalé FROM commentaire WHERE chapitre_id = ? ORDER BY creea DESC';
        $result = $this->createQuery($sql, [$chapitreId]);
        $commentaires = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $commentaires[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $commentaires;
    }
    public function recupCommAdmin()
    {
        $sql = 'SELECT * FROM commentaire ORDER BY id DESC';
        $result = $this->createQuery($sql);
        $commentaires = [];
        foreach ($result as $row) {
            $commentsId = $row['id'];
            $commentaires[$commentsId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $commentaires;
    }

    public function signalCommentaire($commentId)
    {
        $sql = 'UPDATE commentaire SET signalé = ? WHERE id = ?';
        $this->createQuery($sql, [1, $commentId]);
    }
    public function ajoutComm(Parameter $post, $chapitreId)
    {
        $sql = 'INSERT INTO commentaire (pseudo, contenu, creea, chapitre_id) VALUES (?, ?, NOW(), ?)';
        $this->createQuery($sql, [$post->get('pseudo'), $post->get('contenu'), $chapitreId]);
    }
    public function supprimerComm($commentId)
    {
        $sql = 'DELETE FROM commentaire WHERE id = ?';
        $this->createQuery($sql, [$commentId]);
    }

    public function designalerComm($commentId)
    {
        $sql = 'UPDATE commentaire SET signalé = ? WHERE id = ?';
        $this->createQuery($sql, [0, $commentId]);
    }
    public function validéCommentaire($commentId)
    {
        $sql = 'UPDATE commentaire SET validé = ? WHERE id = ?';
        $this->createQuery($sql, [1, $commentId]);
    }
    public function invalidéCommentaire($commentId)
    {
        $sql = 'UPDATE commentaire SET validé = ? WHERE id = ?';
        $this->createQuery($sql, [0, $commentId]);
    }
}
