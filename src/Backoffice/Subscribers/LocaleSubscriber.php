<?php

namespace App\Backoffice\Subscribers;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class LocaleSubscriber implements EventSubscriberInterface
{
    private $defautlLocale;

	public function __construct(string $defaultLocale = "fr")
	{
		$this->defautlLocale = $defaultLocale;
	}

    public function onKernelRequest(RequestEvent $event)
	{
		$request = $event->getRequest();
		// dump($request->getSession()->get('_locale'), $request->attributes->get('_locale'), $request->getSession()->get('_locale', $this->defautlLocale));
		// die;

		if (!$request->hasPreviousSession()) {
			return;
		}

		if ($locale = $request->attributes->get('_locale')) {
			$request->getSession()->set('_locale', $locale);
		} else {
			$request->setLocale($request->getSession()->get('_locale', $this->defautlLocale));
		}
	}

	public static function getSubscribedEvents()
	{
		return [
			KernelEvents::REQUEST => [['onKernelRequest', 17]]
		];
	}
}