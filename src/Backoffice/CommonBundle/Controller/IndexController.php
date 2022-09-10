<?php

namespace App\Backoffice\CommonBundle\Controller;

use App\Entity\Language;
use App\Entity\User;
use App\Backoffice\CommonBundle\Forms\Type\LangType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\Expr\Func;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Translation\LocaleSwitcher;

class IndexController  extends AbstractController {

    public function __construct(EntityManagerInterface $em, RequestStack $requestStack, ContainerInterface $containerInterface, LocaleSwitcher $localeSwitcher){
        $this->requestStack = $requestStack;
        $this->containerInterface = $containerInterface;
        $this->localeSwitcher = $localeSwitcher;
        $this->em = $em;
    }

    public function SwitchLang(Request $request){
        $lang = $request->query->get('lang');
       
        if ($lang) {
            $settings_service = $this->containerInterface->get('settings_service');
            $settings_service->languageSwitcher($lang);
            
            }
            
    $currentUrl = $request->query->get('currentUrl');
    
    return $this->redirectToRoute($currentUrl);
	}

    public function Settings(Request $request){
        // test file Uploader service
        $file_uploader = $this->containerInterface->get('file_uploader');
        // end test
        $user = $this->getUser();
        $formLang = $this->createForm(LangType::class, ['locale' => $user->getLocale()]);

        $formLang->handleRequest($request);
        if ($formLang->isSubmitted() && $formLang->isValid()) {
            // set the lang for the user
            $lang = $formLang->getData()['locale'];
			$user->setLocale($lang);
			$this->em->persist($user);
			$this->em->flush();

            // change lang in session
            $settings_service = $this->containerInterface->get('settings_service');
            $settings_service->languageSwitcher($lang);

            // redirect to the same page
            return $this->redirect($request->getUri());
        }

        return $this->renderForm('@CommonBundleTheme/index.html.twig', [
            'formLang' => $formLang,
        ] );
    }
      
}