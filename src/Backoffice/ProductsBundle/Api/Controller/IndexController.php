<?php

namespace App\Backoffice\ProductsBundle\Api\Controller;

use App\Entity\Products;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Contracts\Translation\TranslatorInterface;

class IndexController  extends AbstractController {
    
    public function __construct(EntityManagerInterface $em, TranslatorInterface $translator)
    {
        $this->em = $em;
        $this->translator = $translator;
    }
    public function listProducts(){ 
        // get all products
        $products = $this->em->getRepository(Products::class)->getAllPoroducts();

        return new JsonResponse(
            [
            'code' => 'SUCCESS', 
            'message' => 'return data',
            'data' => $products
            ]
            ,  200);
     }
}