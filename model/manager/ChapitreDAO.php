<?php

namespace App\model\manager;

use App\model\Backend\chapitre;

class ChapitreDAO extends DAO
{
    private function buildObject($row)
    {
        $chapitre = new chapitre();
        $chapitre->setId($row['id']);
        $chapitre->setTitle($row['title']);
        $chapitre->setContent($row['content']);
        $chapitre->setAuthor($row['author']);
        $chapitre->setCreatedAt($row['createdAt']);
        return $chapitre;
    }

    public function getArticles()
    {
        $sql = 'SELECT id, title, content, author, createdAt FROM chapitre ORDER BY id DESC';
        $result = $this->createQuery($sql);
        $chapitres = [];
        foreach ($result as $row){
            $chapitreId = $row['id'];
            $chapitres[$chapitreId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $chapitres;
    }

    public function getArticle($chapitreId)
    {
        $sql = 'SELECT id, title, content, author, createdAt FROM chapitre WHERE id = ?';
        $result = $this->createQuery($sql, [$chapitreId]);
        $chapitre = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($chapitre);
    }
}