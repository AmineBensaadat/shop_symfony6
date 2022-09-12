<?php

namespace App\Backoffice\ProductsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class IndexController  extends AbstractController {
    public function index(){
        return $this->render('@BoProductsBundle/index.html.twig');
    }
}