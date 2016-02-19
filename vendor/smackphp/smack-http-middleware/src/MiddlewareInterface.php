<?php declare(strict_types=1);

namespace Smack\Http\Middleware;

use \Smack\Http\Message\{
	ParsedRequestInterface,
	ResponseInterface
}

interface MiddlewareInterface
{
    public function __invoke(ParsedRequestInterface $request, ResponseInterface $response):ResponseInterface;
}
