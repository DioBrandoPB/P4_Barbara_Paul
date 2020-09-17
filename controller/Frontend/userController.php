<?php

namespace App\controller\Frontend;
use App\controller\Controller;
use App\model\Parameter;

class userController extends Controller
{
    /* cette fonction permet d'enregistrer un utilisateur dans la bdd via la soumission de données d'un formulaire sur la page register.php et permet la gestion d'erreur si
    jamais un user du meme nom existe deja et renvoie la vue associé a cette page dans le fichier base.php */


    public function register(Parameter $post)
    {
        if($post->get('submit')) {
            $errors = $this->validation->validate($post, 'User');
            if($this->userDAO->checkUser($post)) {
                $errors['pseudo'] = $this->userDAO->checkUser($post);
            }
            if(!$errors) {
                $this->userDAO->register($post);
                $this->session->set('register', 'Votre inscription a bien été effectuée');
                header('Location: ../index.php');
            }
            return $this->view->render('register', [
                'post' => $post,
                'errors' => $errors
            ]);

        }
        return $this->view->render('register');
    }
        /* cette fonction permet de connecter un utilisateur si jamais un user du meme nom existe avec le meme mdp 
        puis verifie son role et renvoie la vue associé a la page login.php dans le fichier base.php, en cas d'erreur un message d'erreur apparait */

    public function login(Parameter $post)
    {
        if($post->get('submit')) {
            $result = $this->userDAO->login($post);
            if($result && $result['isPasswordValid']) {
                $this->session->set('login', 'Content de vous revoir');
                $this->session->set('id', $result['result']['id']);
                $this->session->set('role', $result['result']['name']);
                $this->session->set('pseudo', $post->get('pseudo'));
                header('Location: index.php');
            }
            else {
                $this->session->set('error_login', 'Le pseudo ou le mot de passe sont incorrects');
                return $this->view->render('login', [
                    'post'=> $post
                ]);
            }
        }
        return $this->view->render('login');
    }

}