<?php

namespace App\model;

class Validation
{
    public function validate($data, $name)
    {
        if ($name === 'User') {
            $userValidation = new UserValidation();
            $erreurs = $userValidation->check($data);
            return $erreurs;
        } elseif ($name === 'Comment') {
            $commentValidation = new CommentValidation();
            $erreurs = $commentValidation->check($data);
            return $erreurs;
        }
    }
}
