<?php

use \RedBeanPHP\R;

R::setup('mysql:host=localhost;port=3306;dbname=homestead','root','');


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/view', function () use ($router) {
    return view('test', ['name' => 'Fred']);
});

$router->get('/fred', function () use ($router) {
    return "fred";
});

$router->get('/save', function () use ($router) {
    
    $tool = R::dispense("tools");

    $tool->name = "Fred";
    $tool->link = "link";

    $id = R::store($tool);

    return "save: " . $id;
});

$router->get('/load', function () {
    $tools = R::findAll('tools');
    $table = "<table border='1'><thead><tr><th>#</th><th>data</th></tr></thead><tbody>";
    if( $tools ) {
        foreach($tools as $index => $item) {
            $table .= "<tr><td>".$index."</td><td>id".($item->id) . $item ."</td></tr>";
        }
        $table .= "</tbody></table>";
    }
    return $table;
});

$router->get('load/{id}', function ($id) {
    $tool = R::load("tools", $id);
    return $tool;
});

$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->get('/auth/user', function () {
        // Uses Auth Middleware
        return "auth";
    });
});