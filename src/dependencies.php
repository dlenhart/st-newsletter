<?php
// Configuration for Slim Dependency Injection Container

$container = $app->getContainer();

// Using Twig as template engine
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig('../src/Views', [
        'cache' => false //'cache'
    ]);
    $view->addExtension(new \Slim\Views\TwigExtension(
        $container['router'],
        $container['request']->getUri()
    ));
	$view->getEnvironment()->addGlobal('flash', $container['flash']);
    return $view;
};

// Flash messages
$container['flash'] = function ($container) {
    return new \Slim\Flash\Messages();
};

// Homepage Controller
$container['HomepageController'] = function ($container) {
    return new \ST\Controller\HomepageController($container);
};

// Auth Controller
$container['AuthController'] = function ($container) {
    return new \ST\Controller\AuthController($container);
};

// Authentication
$container['auth'] = function ($container) {
    return new \ST\Auth\Auth;
};