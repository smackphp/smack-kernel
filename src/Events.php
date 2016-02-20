<?php

namespace Smack\Kernel;

class Events
{
	const REQUEST = 'kernel-request';
	const ROUTE_MATCH = 'kernel-route-match';
	const HANDLER = 'kernel-handler';
	const RESPONSE = 'kernel-response';
	const EXCEPTION = 'kernel-exception';
}