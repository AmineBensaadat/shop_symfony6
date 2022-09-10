<?php

namespace App\Backoffice\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('@AdminDashboard/Dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
}