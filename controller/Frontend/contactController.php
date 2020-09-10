<?php

namespace App\controller\Frontend;

use App\controller\Controller;
use App\model\Parameter;
class contactController extends Controller
{

    public function contact() 
    {
        return $this->view->render('contact', []);
        
    }

    public function ajoutMessage(Parameter $post, $contact)
    {
        if($post->get('submit')) {
            $this->ContactDAO->ajoutMessage($post,$contact);

            header('Location: index.php?route=ajoutMessage');
        }
    }
}