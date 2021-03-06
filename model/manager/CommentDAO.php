<?php

namespace App\model\manager;

use App\model\Backend\Comment;

use App\model\Parameter;

class CommentDAO extends DAO
{
    /* fonction buildObject qui nous permet de convertir chaque champ de la table en propriété de notre objet */
    /* row = ranger */

    private function buildObject($row)
    {
        $comment = new Comment();
        $comment->setId($row['id']);
        $comment->setPseudo($row['pseudo']);
        $comment->setContent($row['content']);
        $comment->setCreatedAt($row['createdAt']);
        $comment->signalementFait($row['signalé']);
        $comment->validationFaite($row['validé']);
        return $comment;
    }

    public function recupCommChapitres($chapitreId)
    {
        $sql = 'SELECT id, pseudo, content, createdAt, signalé FROM comment WHERE article_id = ? ORDER BY createdAt DESC';
        $result = $this->createQuery($sql, [$chapitreId]);
        $comments = [];
        foreach ($result as $row) {
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments;
    }
    public function recupCommAdmin()
    {
        $sql = 'SELECT * FROM comment ORDER BY id DESC';
        $result = $this->createQuery($sql);
        $comments = [];
        foreach ($result as $row) {
            $commentsId = $row['id'];
            $comments[$commentsId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $comments;
    }

    public function signalCommentaire($commentId)
    {
        $sql = 'UPDATE comment SET signalé = ? WHERE id = ?';
        $this->createQuery($sql, [1, $commentId]);
    }
    public function ajoutComm(Parameter $post, $chapitreId)
    {
        $sql = 'INSERT INTO comment (pseudo, content, createdAt, article_id) VALUES (?, ?, NOW(), ?)';
        $this->createQuery($sql, [$post->get('pseudo'), $post->get('content'), $chapitreId]);
    }
    public function supprimerComm($commentId)
    {
        $sql = 'DELETE FROM comment WHERE id = ?';
        $this->createQuery($sql, [$commentId]);
    }

    public function designalerComm($commentId)
    {
        $sql = 'UPDATE comment SET signalé = ? WHERE id = ?';
        $this->createQuery($sql, [0, $commentId]);
    }
    public function validéCommentaire($commentId)
    {
        $sql = 'UPDATE comment SET validé = ? WHERE id = ?';
        $this->createQuery($sql, [1, $commentId]);
    }
    public function invalidéCommentaire($commentId)
    {
        $sql = 'UPDATE comment SET validé = ? WHERE id = ?';
        $this->createQuery($sql, [0, $commentId]);
    }
}
