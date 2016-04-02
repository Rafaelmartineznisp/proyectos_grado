<?php
//Conexion a DB
class Conexion
{
	
	public function conectar()
	{
		$root='root';
		$password='';
		$host='localhost';
		$dbname='proyecto';

		return $Conexion = new PDO("mysql:host=$host;dbname=$dbname;", $root, $password);
	}
}
?>