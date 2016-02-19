<?php declare(strict_types=1);

namespace Smack\Http\Message;

trait RequestTrait
{
	use MessageTrait;

	protected $method;
	protected $uri;

	public function getStartLine():string
	{
		return $this->method.' '.$this->uri.' HTTP/'.$this->protocolVersion;
	}

	public function getMethod():string
	{
		return $this->method;
	}

	public function setMethod(string $method)
	{
		$this->method = $method;
		return $this;
	}

	public function getUri():string
	{
		return $this->uri;
	}

	public function setUri(string $uri)
	{
		$this->uri = $uri;
		return $this;
	}
}