<?php

namespace App\Backoffice\Subscribers;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Security\Http\SecurityEvents;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class UserLocaleSubscriber implements EventSubscriberInterface
{

	private $session;

	public function __construct(RequestStack $requestStack)
	{
		$this->requestStack = $requestStack;
	}

	public function onLogin(InteractiveLoginEvent $event)
	{
		$user = $event->getAuthenticationToken()->getUser();

		if (!is_null($user->getLocale())) {
            $session = $this->requestStack->getSession();
			$session->set('_locale', $user->getLocale());
		}
	} 

	public static function getSubscribedEvents()
	{
		return [
			SecurityEvents::INTERACTIVE_LOGIN => [
				['onLogin', 15]
			]
		];
	}
}