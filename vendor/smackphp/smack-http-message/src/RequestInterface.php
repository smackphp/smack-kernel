<?php declare(strict_types=1);

namespace Smack\Http\Message;

interface RequestInterface
{
	public function getStartLine():string;

	public function getMethod():string;

	public function setMethod(string $method);

	public function getUri():string;

	public function setUri(string $uri);
}