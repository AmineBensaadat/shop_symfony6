<?php

namespace App\Backoffice\SettingsBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RequestStack;
class BrandController extends AbstractController {

    public function __construct(RequestStack $requestStack){
        $this->requestStack = $requestStack;
    }
    public function index(){
        $user = $this->getUser();
        $currentLocale = $user->getLocale();
        return $this->render('@SettingsBundleTheme/index.html.twig', ['currentLocale' => $currentLocale]);
    }







}