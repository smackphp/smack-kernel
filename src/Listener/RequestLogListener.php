<?php

namespace Smack\kernel\Listener;

class RequestLogListener
{
	public function __invoke($event, $request)
	{
		$event->setRequest($request);
		return $event;
	}	
}