<?php

namespace Smack\Kernel\Event;

use \Smack\Event\Event;
use \Smack\Http\Message\ParsedRequestInterface;
use \Smack\Http\Message\ResponseInterface;

class HttpEvent extends Event
{
	protected $request;
	protected $response;

	public function getRequest()
	{
		return $this->request;
	}

	public function setRequest(ParsedRequestInterface $request)
	{
		$this->request = $request;
	}

	public function getResponse()
	{
		return $this->response;
	}

	public function setResponse(ResponseInterface $response)
	{
		$this->response = $response;
	}
}