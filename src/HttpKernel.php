<?php

namespace Smack\Kernel;

use \Smack\Routing\RouterInterface;
use \Smack\Http\Message\ParsedRequestInterface;
use \Smack\Http\Message\ResponseInterface;
use \Smack\Http\Middleware\MiddlewareSupportTrait;

class HttpKernel implements HttpKernelInterface
{
	use MiddlewareSupportTrait;

	protected $router;
	protected $eventDispatcher;

	public function __construct(
		RouterInterface $router,
		DispatcherInterface $dispatcher,
	){
		$this->router = $router;
		$this->eventDispatcher = $dispatcher;
	}

	public function boot()
	{

	}

	public function run(ParsedRequestInterface $request, ResponseInterface $response)
	{

	}
}