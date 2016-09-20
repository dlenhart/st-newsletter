<?php
use Slim\Http\Request;
use Slim\Http\Response;

//Auth middleware

$authenticate = function ($request, $response, $next) {
	if (!isset($_SESSION['admin'])) {
		$path = $request->getAttribute('routeInfo');
		$path = $path['request'][1];
		$this->flash->addMessage('url', $path);
		return $response->withRedirect('/login');
	}

	$response = $next($request, $response);
	return $response;
};