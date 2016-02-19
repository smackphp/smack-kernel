<?php declare(strict_types=1);

namespace Smack\Http\Message;

interface ParsedRequestInterface
{
	public function getAttribute(string $key);

	public function setAttribute(string $key, $value);

	public function getAttributes():array;

	public function setAttributes(array $attributes);

	public function getParsedBody():array;

	public function setParsedBody(array $parsedBody);

	public function getQueryParam(string $key);

	public function getQueryParams():array;

	public function setQueryParams(array $queryParams);

	public function getServerParam(string $key):string;

	public function getServerParams():array;

	public function setServerParams(array $serverParams);

	public function getUploadedFiles():array;

	public function setUploadedFiles(array $uploadedFiles);

	public function getCookie(string $key);

	public function getCookies():array;

	public function setCookies(array $cookies);
}
