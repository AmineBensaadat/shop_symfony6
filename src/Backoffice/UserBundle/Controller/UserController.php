<?php

namespace App\Backoffice\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
class UserController extends AbstractController {

    public function edit(){
        return $this->render('@UserBundleTheme/edit.html.twig');
    }

    public function list(){
        dump("list");
        die;
    }
}