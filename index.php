<?php 

require 'flight/Flight.php';
session_start();

//base de datos
Flight::register('db', 'PDO', array('mysql:host=localhost;dbname=io.codigos','codigo','codigo2016'));
//clase paginador
Flight::register('paginator', 'clases/Paginator');

//partes del body
Flight::render('header', array('heading' => 'Administrador'), 'header_content');
Flight::render('layout', array('title' => 'Administrador'));

Flight::map('notFound', function(){
    // Display custom 404 page
    include 'views/404.php';

});

function home(){
    Flight::render('home');
}

function login(){
    Flight::render('login');
}

Flight::map('error', function(Exception $ex){
    // Handle error
    echo $ex->getTraceAsString();
});

Flight::set('flight.log_errors', true);

Flight::route('/', 'login');
Flight::route('/login', 'login');
Flight::route('/home', 'home');

Flight::start();