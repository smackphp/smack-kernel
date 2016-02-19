<?php declare(strict_types=1);

namespace Smack\Http\Message;

class ParsedRequest extends Request implements ParsedRequestInterface
{
	use ParsedRequestTrait;

	public function __construct(
		$uri = '/',
	    $serverParams = [],
	    $uploadedFiles = [],
	    $parsedBody = [],
	    $queryParams = [],
	    $cookies = [],
	    $attributes = []
	){
		parent::__construct($uri);

	    $this->setServerParams($serverParams)
	       ->setUploadedFiles($uploadedFiles)
	       ->setParsedBody($parsedBody)
	       ->setQueryParams($queryParams)
	       ->setCookies($cookies)
	       ->setAttributes($attributes);
	}
}
