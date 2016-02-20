<?php

namespace Smack\Kernel;

use \Smack\Http\Middleware\MiddlewareSupportTrait;
use \Smack\Routing\RouterInterface;
use \Smack\Event\DispatcherInterface;
use \Smack\Http\Message\ParsedRequestInterface;
use \Smack\Http\Message\ResponseInterface;
use \Smack\Kernel\Event\{ExceptionEvent, HandlerEvent, HttpEvent, RouteMatchEvent};
use \Smack\Kernel\Listener\{ExceptionListener, ResolveHandlerListener};

class HttpKernel implements HttpKernelInterface
{
	protected $router;
	protected $eventDispatcher;

	public function __construct(
		RouterInterface $router,
		DispatcherInterface $dispatcher
	){
		$this->router = $router;
		$this->eventDispatcher = $dispatcher;
	}

	public function boot(array $routes, $events = null)
	{
		$this->router->addMany($routes);
		$this->eventDispatcher->getEvents()->addEvents($events['events']);

		foreach ($events['listeners'] as $event => $listeners) {
			$this->eventDispatcher->getEvents()->addListeners($event, $listeners);
		}

		$this->eventDispatcher->getEvents()->addEvent(Events::EXCEPTION, new ExceptionEvent(Events::EXCEPTION))
		->addEvent(Events::REQUEST, new HttpEvent(Events::REQUEST))
		->addEvent(Events::ROUTE_MATCH, new RouteMatchEvent(Events::ROUTE_MATCH))
		->addEvent(Events::HANDLER, new HandlerEvent(Events::HANDLER))
		->addEvent(Events::RESPONSE, new HttpEvent(Events::RESPONSE));

		$this->eventDispatcher->getEvents()->addListeners(Events::EXCEPTION, [new ExceptionListener])
		->addListeners(Events::HANDLER, [new ResolveHandlerListener])
		->addListeners(Events::REQUEST, [new RequestLogListener]);
	}

	public function run(ParsedRequestInterface $request, bool $sendResponse = true)
	{
		try {

			$request = $this->eventDispatcher->dispatch(Events::REQUEST, [$request])->getRequest();

			$match = $this->router->route(
				$request->getMethod(),
				$request->getUri()
			);

			$match = $this->eventDispatcher->dispatch(Events::ROUTE_MATCH, [$match, $request])->getMatch();
			$handler = $this->eventDispatcher->dispatch(Events::HANDLER, [$match->getHandler(), $request])->getHandler();

			$params = $match->getParams();
			array_unshift($params, $request);
			
			$response = call_user_func_array($handler, $params);

			if (!$response instanceOf ResponseInterface) {
				throw new \Exception('handler must return a response');
			}

			$response = $this->eventDispatcher->dispatch(Events::RESPONSE, [$response, $request])->getResponse();

		} catch (\Exception $e) {
			$event = $this->eventDispatcher->dispatch('exception', [$e]);
			$response = $event->getResponse();
		}

		if ($sendResponse === true) {
			$this->sendResponse($response);
		} else {
			return $response;
		}
	}

	public function sendResponse($response)
	{
		echo $response->getBody();
	}

	public function getRouter():RouterInterface
	{
		return $this->router;
	}

	public function getEventDispatcher():DispatcherInterface
	{
		return $this->eventDispatcher;
	}
}