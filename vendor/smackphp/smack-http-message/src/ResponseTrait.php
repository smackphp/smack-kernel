<?php declare(strict_types=1);

namespace Smack\Http\Message;

trait ResponseTrait
{
	use MessageTrait;

	protected $statusCode;
	protected $reasonPhrase;

	public function getStartLine():string
	{
		return 'HTTP/'.$this->protocolVersion.' '.$this->statusCode.' '.$this->reasonPhrase;
	}

	public function getStatusCode():int
	{
		return $this->statusCode;
	}

	public function setStatusCode(int $code)
	{
		$this->statusCode = $code;
		return $this;
	}

	public function getReasonPhrase():string
	{
		return $this->reasonPhrase;
	}

	public function setReasonPhrase(string $reasonPhrase)
	{
		$this->reasonPhrase = $reasonPhrase;
		return $this;
	}
}