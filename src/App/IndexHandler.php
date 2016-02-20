<?php

namespace Smack\Kernel\App;

use \Smack\Kernel\HttpFactory;

class IndexHandler
{
	public function __invoke($request)
	{
		return HttpFactory::makeResponse(200, 'Okay!');
	}
}