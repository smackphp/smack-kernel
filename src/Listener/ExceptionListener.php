<?php

namespace Smack\Kernel\Listener;

use \Smack\Kernel\Event\ExceptionEvent;
use \Smack\Kernel\HttpFactory;

class ExceptionListener
{
	public function __invoke(ExceptionEvent $event, \Exception $exception)
	{
		$response = HttpFactory::makeResponse(500, $exception->getMessage());
		$event->setResponse($response);
		return $event;
	}
}