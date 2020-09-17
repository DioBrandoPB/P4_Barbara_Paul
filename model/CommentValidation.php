<?php

namespace App\model;
use App\model\Parameter;

class CommentValidation extends Validation
{
    private $errors = [];
    private $constraint;
    /* construction de l'objets constraint */

    public function __construct()
    {
        $this->constraint = new Constraint();
    }
    /* verifie les champs de formulaires pour voir si ils sont vides */

    public function check(Parameter $post)
    {
        foreach ($post->all() as $key => $value) {
            $this->checkField($key, $value);
        }
        return $this->errors;
    }
    /* verifie les champs du formulaires d'ajout de commentaires pour voir si ils sont vides */


    private function checkField($name, $value)
    {
        if($name === 'pseudo') {
            $error = $this->checkPseudo($name, $value);
            $this->addError($name, $error);
        }
        elseif ($name === 'content') {
            $error = $this->checkContent($name, $value);
            $this->addError($name, $error);
        }
    }

    private function addError($name, $error) {
        if($error) {
            $this->errors += [
                $name => $error
            ];
        }
    }
    /* verifie le champ du pseudo afin de ne pas enregistrer de commentaire avec pseudo vide dans la bdd */

    private function checkPseudo($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('pseudo', $value);
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('pseudo', $value, 2);
        }
        if($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength('pseudo', $value, 255);
        }
    }
    /* verifie le champ du contenuafin de ne pas enregistrer de contenu vide dans la bdd */

    private function checkContent($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('contenu', $value);
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('contenu', $value, 2);
        }
    }
}