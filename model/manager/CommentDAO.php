<?php

namespace App\model\manager;

use App\model\Backend\Comment;

class CommentDAO extends DAO
{
    private function buildObject($row)
    {
        $comment = new Comment();
        $comment->setId($row['id']);
        $comment->setPseudo($row['pseudo']);
        $comment->setContent($row['content']);
        $comment->setCreatedAt($row['createdAt']);
        $comment->signalementFait($row['signalé']);
        return $comment;
    }

    public function getCommentsFromArticle($chapitreId)
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

    public function signalCommentaire($commentId)
    {
        $sql = 'UPDATE comment SET signalé = ? WHERE id = ?';
        $this->createQuery($sql, [1, $commentId]);
    }
}
