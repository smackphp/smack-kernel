<?php

namespace Smack\Kernel\Listener;

use \Smack\Kernel\Event\ExceptionEvent;
use \Smack\Kernel\HttpFactory;

class ResolveHandlerListener
{
	public function __invoke($event, $handler, $request)
	{
		return $event;
	}
}