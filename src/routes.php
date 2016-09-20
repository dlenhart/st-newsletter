<?php
use Slim\Http\Request;
use Slim\Http\Response;

//HOME & ADMIN Pages
$app->get('/', 'HomepageController:home');
$app->get('/admin', 'HomepageController:admin')->add($authenticate);
$app->get('/admin/{page}', 'HomepageController:adminPages');
$app->get('/admin/edit/{id}', 'HomepageController:edit')->add($authenticate);

$app->get('/auth','HomepageController:test')->add($authenticate);

//LOGIN
$app->get('/login','AuthController:login');
$app->get('/logout','AuthController:logout');

//POST LOGIN
$app->post('/api/login','AuthController:postLogin');

//CRUD
$app->post('/api/newSignup','HomepageController:addEmail');
$app->post('/api/deleteEmail/{id}','HomepageController:deleteEmail')->add($authenticate);
$app->post('/api/updateEmail','HomepageController:updateEmail')->add($authenticate);