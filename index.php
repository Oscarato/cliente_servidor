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

Flight::route('/buscar/@cedula', function($cedula){

    $ch = curl_init();                    // Initiate cURL
    $url = "http://190.145.101.3:70/WsEmpleados/WsEmpleados.asmx/getEmpleadoJSON"; // Where you want to post data
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POST, true);  // Tell cURL you want to post something
    curl_setopt($ch, CURLOPT_POSTFIELDS, "token=43697479252652652d5669727475616c&identificacion=".$cedula); // Define what you want to post
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the output in string format
    $output = curl_exec ($ch); // Execute

    curl_close ($ch); // Close cURL handle

    echo $output; // Show output

    Flight::render('busqueda', array('cedula' => $cedula));
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