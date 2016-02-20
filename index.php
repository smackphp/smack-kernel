<?php

require('vendor/autoload.php');

use Smack\Kernel\{HttpKernel, HttpFactory};
use Smack\Event\{Dispatcher, EventCollection};
use Smack\Routing\Router;

$kernel = new Smack\Kernel\HttpKernel(
	new Router, 
	new Dispatcher(new EventCollection)
);

$kernel->boot(
	include_once('config/routes.php'),
	include_once('config/events.php')
);

$kernel->run(HttpFactory::makeParsedRequest());