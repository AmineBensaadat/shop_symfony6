<?php

namespace App\Backoffice\ProductsBundle\Controller;

use App\Backoffice\ProductsBundle\Form\ProductFormType as FormProductFormType;
use App\Entity\ProductPrices;
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
        $ProductPrices = new ProductPrices();
        $productForm = $this->createForm(FormProductFormType::class, $products);
        $productForm->handleRequest($request);
        
        if ($productForm->isSubmitted() && $productForm->isValid()) {
            
            // save product table data 
            $em->persist($products);
            $em->flush();
            
            // save price product data
            $product_price = $productForm->get('price')->getData();
            $ProductPrices->setPrice($product_price);
            $ProductPrices->setProductId($products);
            $em->persist($ProductPrices);
            $em->flush();

            return $this->redirectToRoute('Backoffice_ProdutsBundle_index');
        }
        
        return $this->render('@BoProductsBundle/create_product.html.twig', [
            'productForm' => $productForm->createView()]);
    }
}