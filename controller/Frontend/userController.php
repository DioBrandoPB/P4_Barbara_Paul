<?php

namespace App\controller\Frontend;
use App\controller\Controller;
use App\model\Parameter;

class userController extends Controller
{
    /* cette fonction permet d'enregistrer un utilisateur dans la bdd via la soumission de données d'un formulaire sur la page inscription.php et permet la gestion d'erreur si
    jamais un utilisateur du meme nom existe deja et renvoie la vue associé a cette page dans le fichier base.php */


    public function inscription(Parameter $post)
    {
        if($post->get('submit')) {
            $erreurs = $this->validation->validate($post, 'User');
            if($this->utilisateurDAO->verifUtilisateur($post)) {
                $erreurs['pseudo'] = $this->utilisateurDAO->verifUtilisateur($post);
            }
            if(!$erreurs) {
                $this->utilisateurDAO->inscription($post);
                $this->session->set('inscription', 'Votre inscription a bien été effectuée');
                header('Location: ../index.php');
            }
            if($erreurs){
                $this->session->set('erreurinscription', 'renseigner un mail ou un pseudo valide');
            }
            return $this->vue->rendue('inscription', [
                'post' => $post,
                'erreurs' => $erreurs
            ]);

        }
        return $this->vue->rendue('inscription');
    }
        /* cette fonction permet de connecter un utilisateur si jamais un utilisateur du meme nom existe avec le meme password 
        puis verifie son role et renvoie la vue associé a la page connexion.php dans le fichier base.php, en cas d'erreur un message d'erreur apparait */

    public function connexion(Parameter $post)
    {
        if($post->get('submit')) {
            $result = $this->utilisateurDAO->connexion($post);
            if($result && $result['isPasswordValid']) {
                $this->session->set('connexion', 'Content de vous revoir');
                $this->session->set('id', $result['result']['id']);
                $this->session->set('role', $result['result']['name']);
                $this->session->set('pseudo', $post->get('pseudo'));
                header('Location: index.php');
            }
            else {
                $this->session->set('error_login', 'Le pseudo ou le mot de passe sont incorrects');
                return $this->vue->rendue('connexion', [
                    'post'=> $post
                ]);
            }
        }
        return $this->vue->rendue('connexion');
    }

}