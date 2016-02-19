<?php declare(strict_types=1);

namespace Smack\Http\Message;

trait MessageTrait
{
	protected $body;
	protected $headers;
	protected $protocolVersion;

	public function getBody():string
	{
		return $this->body;
	}

	public function setBody(string $body)
	{
		$this->body = $body;
		return $this;
	}

	public function getHeader(string $header)
	{
		$this->has($header) ? $this->headers[$header] : false;
	}
	
	public function setHeader(string $name, string $value)
	{
	    $this->headers[$name] = $value;
	}

	public function getHeaders():array
	{
		return $this->headers;
	}

	public function setHeaders(array $headers)
	{
		$this->headers = $headers;
		return $this;
	}

	public function hasHeader($header)
	{
		return isset($this->headers[$header]);
	}

	public function getProtocolVersion():float
	{
		return $this->protocolVersion;
	}

	public function setProtocolVersion(float $protocolVersion)
	{
		$this->protocolVersion = $protocolVersion;
		return $this;
	}
}