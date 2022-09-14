<?php

namespace App\Backoffice\ProductsBundle\Controller;

use App\Backoffice\UserBundle\Form\ProductFormType;
use App\Entity\Products;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class IndexController  extends AbstractController {
    public function index(){
        return $this->render('@BoProductsBundle/index.html.twig');
    }

    public function addProduct(Request $request, EntityManagerInterface $em){
        $products = new Products();
        $productForm = $this->createForm(ProductFormType::class, $products);
        $productForm->handleRequest($request);
        
        if ($productForm->isSubmitted() && $productForm->isValid()) {
            // save the datat
            $products->setName($productForm->get('name')->getData());
           
            $products->setQty(12);
            $em->persist($products);
            $em->flush();
            dump($productForm, $productForm->get('name')->getData());
            die;
        }
        
        return $this->render('@BoProductsBundle/add_product.html.twig', [
            'productForm' => $productForm->createView()]);
    }
}