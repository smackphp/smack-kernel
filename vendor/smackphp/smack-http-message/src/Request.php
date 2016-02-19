<?php declare(strict_types=1);

namespace Smack\Http\Message;

class Request implements RequestInterface
{
	use RequestTrait;

	public function __construct(
		$uri,
		$method = 'GET',
		$body = '',
		$headers = [],
		$protocolVersion = 1.1
	){
		$this->setUri($uri)
		->setMethod($method)
		->setBody($body)
		->setHeaders($headers)
		->setProtocolVersion($protocolVersion);
	}
}
