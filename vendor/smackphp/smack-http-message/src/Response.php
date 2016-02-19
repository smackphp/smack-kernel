<?php declare(strict_types=1);

namespace Smack\Http\Message;

class Response implements ResponseInterface
{
	use ResponseTrait;

	public function __construct(
		$code = 200,
		$body = '',
		$headers = [],
		$reasonPhrase = 'Ok',
		$protocolVersion = 1.1
	){
		$this->setStatusCode($code)
		->setReasonPhrase($reasonPhrase)
		->setBody($body)
		->setHeaders($headers)
		->setProtocolVersion($protocolVersion);
	}
}
