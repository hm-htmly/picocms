<?php
require_once "autoload.php";

if(!defined('BASEURL')) define('BASEURL', 'http://server.my-homeip.de/my_router/');

$router = new Router;

$router->all('/', function() {
    View::render('head', array('title' => 'Routing', 'slug' => 'Hier kommt der simple Router.'));
    View::render('header-navi');
    View::render('home', array('site_title' => 'The first Site','content' => 'Hier kommt die erste Beschreibung des Projekt\'s'));
    View::render('footer');
});

$router->get('artikel/([\d]+)', function($art_id) {
    View::render('head', array('title' => 'Routing', 'slug' => 'Hier kommt der simple Router.'));
    View::render('header-navi');
    $text = "Der Artikel mit der Nummer: ".$art_id.".";
    View::render('content', array('site_title' => 'The second Site','content' => $text));
    View::render('footer');
});

$router->set404(function() {
    View::render('head', array('title' => 'Routing', 'slug' => 'Hier kommt der simple Router.'));
    View::render('header-navi');
    View::render('404', array('site_title' => 'Fehler 404','content' => 'Sorry, die angeforderte Datei kann nicht gefunden werden.'));
    View::render('footer');
});

$router->run();
