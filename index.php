<?php

require('vendor/autoload.php');

use Smack\Kernel\HttpFactory;

$request = HttpFactory::makeParsedRequest();
$response = HttpFactory::makeResponse(200, 'hello');
$kernel = new Smack\Kernel\HttpKernel();