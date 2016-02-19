<?php declare(strict_types=1);

namespace Smack\Http\Message;

interface MessageInterface
{
	public function getBody():string;

	public function setBody(string $body);

	public function getHeader(string $header);
	
	public function setHeader(string $name, string $value);

	public function getHeaders():array;

	public function setHeaders(array $headers);

	public function getProtocolVersion():float;

	public function setProtocolVersion(float $protocolVersion);
}