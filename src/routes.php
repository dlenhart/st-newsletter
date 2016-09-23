<?php
use Slim\Http\Request;
use Slim\Http\Response;

//HOME & ADMIN Pages
$app->get('/', 'HomepageController:home');
$app->get('/admin', 'AdminController:admin')->add($authenticate);
$app->get('/admin/{page}', 'AdminController:adminPages')->add($authenticate);
$app->get('/admin/edit/{id}', 'AdminController:edit')->add($authenticate);

//LOGIN
$app->get('/login','AuthController:login');
$app->get('/logout','AuthController:logout');

//POST LOGIN
$app->post('/api/login','AuthController:postLogin');

//CRUD
$app->post('/api/newSignup','HomepageController:addEmail');
$app->post('/api/deleteEmail/{id}','AdminController:deleteEmail')->add($authenticate);
$app->post('/api/updateEmail','AdminController:updateEmail')->add($authenticate);