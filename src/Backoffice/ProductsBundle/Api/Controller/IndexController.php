<?php

namespace App\Backoffice\ProductsBundle\Api\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class IndexController  extends AbstractController {
    
    public function listProducts(){        
        return new JsonResponse(
            [
            'code' => 'SUCCESS', 
            'message' => 'return data',
            'data' => array(
                array(
                    'id' => 1,
                    'first_name' => 'bensaadat',
                    'last_name' => 'amine',
                    'gender' => 31,
                    'phone' => '0624681853',
                    'cin' => 'AE36826',
                    'adress' => 'Hey errahma sect E',
                    'city' => 'Salé'
                ),
                array(
                    'id' => 2,
                    'first_name' => 'bensaadat',
                    'last_name' => 'mourad',
                    'gender' => 23,
                    'phone' => '0666391857',
                    'cin' => 'AB20888',
                    'adress' => 'Hey errahma sect E',
                    'city' => 'Rabat'
                ),
                array(
                    'id' => 3,
                    'first_name' => 'karim',
                    'last_name' => 'khadija',
                    'gender' => 27,
                    'phone' => '0686391852',
                    'cin' => 'AC20981',
                    'adress' => 'derb ghalef',
                    'city' => 'Casablanca'
                )
            )
            ]
            ,  200);
     }
}