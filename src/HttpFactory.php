<?php

namespace Smack\Kernel;

use \Smack\Http\Message\ParsedRequest;
use \Smack\Http\Message\Response;

class HttpFactory
{
	public static function makeParsedRequest($attributes = []) 
	{
		return new ParsedRequest(
			$_SERVER['REQUEST_URI'],
		    $_SERVER,
		    $_FILES,
		    $_POST,
		    $_GET,
		    $_COOKIE,
		    $attributes
		);
	}

	public static function makeResponse($code, $body = '', $headers = [])
	{
		return new Response(
			$code,
			$body, 
			$headers
		);
	}
}