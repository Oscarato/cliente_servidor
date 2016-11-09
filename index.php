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
  //$resutl = call_method_ws('getAllEmpleadoJSON',array( "token" => '43697479252652652d5669727475616c'));
  $result = '[{"NOMBRE":" ADRIANA MARIA ","APELLIDO":"RODRIGUEZ MAMANCHE","IDENTIFICACION":"39804009","DIRECCION":"Cll 1 B Sur No A 01 Gran colom","TELEFONO":"no aplica","CELULAR":"3138948666","EMAIL":"adrianarm02@hotmail.com"},{"NOMBRE":" ANDRES CAMILO ","APELLIDO":"GUZMAN CALDERON","IDENTIFICACION":"1014241073","DIRECCION":"Diag. 82 C no 79 D 42","TELEFONO":"2236498","CELULAR":"3204761535","EMAIL":"andresmmsa@gmail.com"},{"NOMBRE":" CATHERINE  ","APELLIDO":"ACUÑA GALAN","IDENTIFICACION":"52394237","DIRECCION":"CLLE 93 No 60-B60","TELEFONO":"6225537","CELULAR":"3204138512","EMAIL":"N/A"},{"NOMBRE":" IVAN DARIO","APELLIDO":"BECERRA SARMIENTO","IDENTIFICACION":"79787103","DIRECCION":"Calle 127C N 4-46 Apto 406 Alt","TELEFONO":"N/A","CELULAR":"3007878501","EMAIL":""},{"NOMBRE":" JAIRO DAMIAN ","APELLIDO":"ALGARRA MARTINEZ","IDENTIFICACION":"1018474112","DIRECCION":"Calle 188 N 15-42 Berbenal","TELEFONO":"N/A","CELULAR":"3124031420","EMAIL":""},{"NOMBRE":" JENNY PAOLA","APELLIDO":"MENJURA CASTIBLANCO","IDENTIFICACION":"1019027995","DIRECCION":"CARRERA 91 B N 127 C 21","TELEFONO":"6817053","CELULAR":"3176635269","EMAIL":"1519JP@GMAIL.COM"},{"NOMBRE":" JOSE WILLIAM","APELLIDO":"MAHECHA BUITRAGO","IDENTIFICACION":"80812919","DIRECCION":"DG 53 BIS SUR No 3D 57","TELEFONO":"","CELULAR":"3106808267","EMAIL":""},{"NOMBRE":" JUAN SEBASTIAN","APELLIDO":"MORENO MARTINEZ","IDENTIFICACION":"1020761815","DIRECCION":"\tCra 8 N 192 - 60 Apto 305 Lij","TELEFONO":"N/A","CELULAR":"3175126344","EMAIL":"sebogotadc_14@hotmail.com"},{"NOMBRE":" LEONARDO ENRIQUE","APELLIDO":" PEREIRA BOSSA","IDENTIFICACION":"73556503","DIRECCION":"ARJONA CENTRO ","TELEFONO":"N/A","CELULAR":"3107225272","EMAIL":"leopbo@hotmail.com"}]';
    $employes = json_decode($result);
    Flight::render('home', array('employes' => $employes)); 
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