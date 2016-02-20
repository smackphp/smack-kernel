<?php

namespace Smack\Kernel\Event;

use \Smack\Event\Event;
use \Smack\Routing\RouteMatchInterface;

class RouteMatchEvent extends HttpEvent
{
	public function getMatch()
	{
		return $this->match;
	}

	public function setMatch(RouteMatchInterface $match)
	{
		$this->match = $match;
	}
}