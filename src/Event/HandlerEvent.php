<?php

namespace Smack\Kernel\Event;

use \Smack\Event\Event;
use \Smack\Http\Message\ParsedRequestInterface;

class HandlerEvent extends HttpEvent
{
	public function setHandler($handler, ParsedRequestInterface $request)
	{
		$this->handler = $handler;
	}

	public function getHandler()
	{
		return $this->handler;
	}
}