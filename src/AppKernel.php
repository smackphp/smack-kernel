<?php

namespace Smack\Kernel;

class AppKernel extends HttpKernel
{
	public function __construct($router, $dispatcher)
	{
		parent::__construct($router, $dispatcher);
	}
}