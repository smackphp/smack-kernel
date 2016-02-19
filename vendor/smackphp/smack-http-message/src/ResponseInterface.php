<?php declare(strict_types=1);

namespace Smack\Http\Message;

interface ResponseInterface
{
	public function getStartLine():string;

	public function getStatusCode():int;

	public function setStatusCode(int $code);

	public function getReasonPhrase():string;

	public function setReasonPhrase(string $reasonPhrase);
}