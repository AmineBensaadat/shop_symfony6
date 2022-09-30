<?php

namespace App\Backoffice\ProductsBundle\Controller;

use App\Backoffice\ProductsBundle\Form\ProductFormType as FormProductFormType;
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
        $productForm = $this->createForm(FormProductFormType::class, $products);
        $productForm->handleRequest($request);
        
        if ($productForm->isSubmitted() && $productForm->isValid()) {
            // save the datat  
            dump($productForm);
            die;      
            $em->persist($products);
            $em->flush();
            return $this->redirectToRoute('Backoffice_ProdutsBundle_index');
        }
        
        return $this->render('@BoProductsBundle/add_product.html.twig', [
            'productForm' => $productForm->createView()]);
    }
}