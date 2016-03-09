<?php //Datos de conexión a la base de datos
$hostname = 'localhost';
$database = 'proyectos';
$username = 'root';
$password = '';

//MySQL PDO
require_once 'mysql-login.php';
try {
$con = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
print "Conexión exitosa!";
}
catch (PDOException $e) {
print "¡Error!: " . $e->getMessage() . "
";
die();
}
$con =null;







?>