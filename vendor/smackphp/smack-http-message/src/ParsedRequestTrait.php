<?php declare(strict_types=1);

namespace Smack\Http\Message;

trait ParsedRequestTrait
{
	protected $attributes;
	protected $parsedBody;
	protected $queryParams;
	protected $serverParams;
	protected $uploadedFiles;
	protected $cookies;

	public function getAttribute(string $key)
	{
	    return $this->has($key) ? $this->attributes[$key] : false;
	}

	public function setAttribute(string $key, $value):self
	{
	    $this->attributes[$key] = $value;
	    return $this;
	}

	public function getAttributes():array
	{
		return $this->attributes;
	}

	public function setAttributes(array $attributes):self
	{
	    $this->attributes = $attributes;
	    return $this;
	}

	public function hasAttribute(string $name)
	{
		return isset($this->attributes[$name]);
	}

	public function getParsedBody():array
	{
		return $this->parsedBody;
	}

	public function setParsedBody(array $parsedBody):self
	{
	    $this->parsedBody = $parsedBody;
	    return $this;
	}

	public function getQueryParam(string $key):self
	{
	    return $this->queryParams[$key];
	    return $this;
	}

	public function getQueryParams():array
	{
		return $this->queryParams;
	}

	public function setQueryParams(array $queryParams):self
	{
	    $this->queryParams = $queryParams;
	    return $this;
	}

	public function getServerParam(string $key):string
	{
	    return $this->serverParams[$key];
	}

	public function getServerParams():array
	{
		return $this->serverParams;
	}

	public function setServerParams(array $serverParams):self
	{
	    $this->serverParams = $serverParams;
	    return $this;
	}

	public function getUploadedFiles():array
	{
		return $this->uploadedFiles;
	}

	public function setUploadedFiles(array $uploadedFiles):self
	{
	    $this->uploadedFiles = $uploadedFiles;
	    return $this;
	}

	public function getCookie(string $key)
	{
	    return $this->cookies[$key];
	}

	public function getCookies():array
	{
		return $this->cookies;
	}

	public function setCookies(array $cookies):self
	{
	    $this->cookies = $cookies;
	    return $this;
	}
}
