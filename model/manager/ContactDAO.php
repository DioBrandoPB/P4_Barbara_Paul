<?php

namespace App\model\manager;

use App\model\Backend\contact;
use App\model\Parameter;

class ContactDAO extends DAO
{
    /* fonction buildObject qui nous permet de convertir chaque champ de la table en propriété de notre objet */


    private function buildObject($row)
    {
        $contact = new contact();
        $contact->setId($row['id']);
        $contact->setNom($row['Nom']);
        $contact->setMail($row['Mail']);
        $contact->setMessage($row['Msg']);
        $contact->setSujet($row['Sujet']);
        return $contact;
    }

    public function ajoutMessage(Parameter $post)
    {
        $sql = 'INSERT INTO contact (Nom, Mail, Msg, Sujet) VALUES (?, ?, ?, ?)';
        $this->createQuery($sql, [$post->get('Nom'), $post->get('Mail'), $post->get('Msg'), $post->get('Sujet')]);
    }
    public function recupMessage()
    {
        $sql = 'SELECT * FROM contact ORDER BY id DESC ';
        $result = $this->createQuery($sql);
        $contacts = [];
        foreach ($result as $row) {
            $contactsid = $row['id'];
            $contacts[$contactsid] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $contacts;
    }
}
