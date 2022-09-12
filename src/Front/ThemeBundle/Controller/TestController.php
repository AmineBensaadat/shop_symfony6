<?php

namespace App\Front\ThemeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController{

    /**
     * @Route("/testFrontTheme", name="front_theme")
     */
    public function testTheme(){
        return $this->render('@FrontThemeBundle/index.html.twig');
        dump("ee");
        die;
    }    
}
