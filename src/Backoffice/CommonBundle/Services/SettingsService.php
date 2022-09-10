<?php

namespace App\Backoffice\CommonBundle\Services;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Translation\LocaleSwitcher;

class SettingsService  {

    public function __construct(
        private LocaleSwitcher $localeSwitcher,
        private RequestStack $requestStack
    ) {}

    public function languageSwitcher($lang){
        $session = $this->requestStack->getSession();
        $session->set('_locale', $lang);
    }
}