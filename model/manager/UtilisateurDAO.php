<?php

namespace App\model\manager;

use App\model\Backend\utilisateur;
use App\model\Parameter;

class UtilisateurDAO extends DAO
{
    /* fonction buildObject qui nous permet de convertir chaque champ de la table en propriété de notre objet */
    /* row = ranger */

    private function buildObject($row)
    {
        $utilisateur = new Utilisateur();
        $utilisateur->setId($row['id']);
        $utilisateur->setPseudo($row['pseudo']);
        $utilisateur->setCreatedAt($row['creea']);
        $utilisateur->setMail($row['mail']);
        $utilisateur->setRole($row['name']);
        return $utilisateur;
    }

    public function recupUtilisateurs()
    {
        $sql = 'SELECT utilisateur.id, utilisateur.pseudo, utilisateur.creea, utilisateur.mail, role.name FROM utilisateur INNER JOIN role ON utilisateur.role_id = role.id ORDER BY utilisateur.id DESC';
        $result = $this->createQuery($sql);
        $utilisateurs = [];
        foreach ($result as $row) {
            $utilisateurId = $row['id'];
            $utilisateurs[$utilisateurId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $utilisateurs;
    }
    public function inscription(Parameter $post)
    {
        $this->verifUtilisateur($post);
        $sql = 'INSERT INTO utilisateur (pseudo, password, creea, mail, role_id ) VALUES (?, ?, NOW(), ?, ?)';
        $this->createQuery($sql, [$post->get('pseudo'), password_hash($post->get('password'), PASSWORD_BCRYPT), $post->get('mail'), 2]);
    }
    public function verifUtilisateur(Parameter $post)
    {
        $sql = 'SELECT COUNT(pseudo) FROM utilisateur WHERE pseudo = ?';
        $result = $this->createQuery($sql, [$post->get('pseudo')]);
        $isUnique = $result->fetchColumn();
        if ($isUnique) {
            return '<p>Le pseudo existe déjà</p>';
        }
    }
    public function connexion(Parameter $post)
    {
        $sql = 'SELECT utilisateur.id, utilisateur.role_id, utilisateur.password, role.name FROM utilisateur INNER JOIN role ON role.id = utilisateur.role_id WHERE pseudo = ?';
        $data = $this->createQuery($sql, [$post->get('pseudo')]);
        $result = $data->fetch();
        $isPasswordValid = password_verify($post->get('password'), $result['password']);
        return [
            'result' => $result,
            'isPasswordValid' => $isPasswordValid
        ];
    }
    public function majMDP(Parameter $post, $pseudo)
    {
        $sql = 'UPDATE utilisateur SET password = ? WHERE pseudo = ?';
        $this->createQuery($sql, [password_hash($post->get('password'), PASSWORD_BCRYPT), $pseudo]);
    }

    public function supprimerCompte($pseudo)
    {
        $sql = 'DELETE FROM utilisateur WHERE pseudo = ?';
        $this->createQuery($sql, [$pseudo]);
    }
    public function supprimerUtilisateur($utilisateurId)
    {
        $sql = 'DELETE FROM utilisateur WHERE id = ?';
        $this->createQuery($sql, [$utilisateurId]);
    }
}
