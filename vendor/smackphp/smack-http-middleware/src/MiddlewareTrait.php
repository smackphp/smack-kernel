<?php declare(strict_types=1);

namespace Smack\Http\Middleware;

use \Smack\Http\Message\{
    ParsedRequestInterface,
    ResponseInterface
}

trait MiddlewareTrait
{
    protected $next;

    public function next(ServerRequestInterface $request, ResponseInterface $response):ResponseInterface
    {
        $next = $this->next;
        return $next($request, $response);
    }

    public function setNext(MiddlewareInterface $next)
    {
        $this->next = $next;
        return $this;
    }
}
