<?php declare(strict_types=1);

namespace Smack\Http\Middleware;

use \Smack\Http\Message\{
  ParsedRequestInterface,
  ResponseInterface
};

trait MiddlewareSupportTrait
{
    protected $middleware;

    public function push(MiddlewareInterface $middleware)
    {
       if (empty($this->middleware)) {
           $this->middleware[] = $middleware;
       } else {
           $middleware->setNext(array_pop($this->middleware));
           array_push($this->middleware, $middleware);
       }

       return $this;
    }

    public function invokeMiddleware(ParsedRequestInterface $request, ResponseInterface $response):ResponseInterface
    {
      if (!empty($this->middleware)) {
        return $this->middleware[0]->__invoke($request, $response);
      } else {
        return $response;
      }
    }
}
