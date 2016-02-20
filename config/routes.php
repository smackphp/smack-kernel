<?php

return [
	['GET', '/^\/smack-kernel\//', '\Smack\Kernel\App\IndexHandler'],
	['GET', '/^\/home\/(?<id>\d+)$/', 'IndexHandler']
];