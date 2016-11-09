<?php 

require 'flight/Flight.php';
require_once 'clases/lib/nusoap.php';
session_start();

global $url;

if ($_SERVER['SERVER_NAME'] == 'localhost') {
    $url= 'http://localhost/administrador/cliente_servidor/';
    //$url= 'http://localhost/Revlon/';
}else{
    $url= 'http://'.$_SERVER['SERVER_NAME'].'/';
}

//base de datos
Flight::register('db', 'PDO', array('mysql:host=localhost;dbname=io.codigos','codigo','codigo2016'));
//clase paginador
Flight::register('paginator', 'clases/Paginator');

//partes del body
if(Flight::request()->url != '/save'){
    Flight::render('header', array('heading' => 'Administrador'), 'header_content');
    Flight::render('layout', array('title' => 'Administrador', 'url' => $url));
}

function home(){
  $data = call_method_ws('getAllEmpleadoJSON',array( "token" => '43697479252652652d5669727475616c'));
  $employes = json_decode($data['getAllEmpleadoJSONResult']);
  Flight::render('home', array('employes' => $employes) ); 
}

function save(){
    $params = array(  'token'=>'43697479252652652d5669727475616c',
                      'nombres'=>$_POST['NOMBRE'],
                      'apellidos'=>$_POST['APELLIDO'],
                      'identificacion'=>$_POST['IDENTIFICACION'],
                      'direccion'=>$_POST['DIRECCION'],
                      'telefono'=>$_POST['TELEFONO'],
                      'celular'=>$_POST['CELULAR'],
                      'email'=>$_POST['EMAIL'],
    );
    call_method_ws('updateEmpleadoJSON',$params);
    Flight::json( array('response'=>'Datos Guardatos') );
}
function login(){
    Flight::render('login');
}

function call_method_ws($method,$params){
    $url_webservices = "http://190.145.101.3:70/WsEmpleados/WsEmpleados.asmx?wsdl";
    $client = new nusoap_client($url_webservices, true);
    #$client->setCredentials($token);
    $result = $client->call( $method, $params );
    return $result;
}
 
 
Flight::set('flight.log_errors', true);
Flight::map('notFound', function(){
    // Display custom 404 page
    include 'views/404.php';

});
Flight::map('error', function(Exception $ex){
    // Handle error
    echo $ex->getTraceAsString();
});

#Routes
Flight::route('/', 'login');
Flight::route('/login', 'login');
Flight::route('/home', 'home');
Flight::route('POST /save', 'save');
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

#flight run
Flight::start();