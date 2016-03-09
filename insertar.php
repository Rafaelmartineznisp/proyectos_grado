<?php
require_once('class_conexion.php');
require_once('class_consultas.php');

 $mensaje=null;
 $nombre=$_POST['nombre'];
 $autor1=$_POST['autor1'];
 $autor2=$_POST['autor2'];
 $autor3=$_POST['autor3'];
 $asesor=$_POST['asesor'];
 $fecha=$_POST['fecha'];
 $nota=$_POST['nota'];
 $linea_inv=$_POST['linea_inv'];

if(count($nombre)>0 && count($autor1)>0 && count($autor2)>0 && count($autor3)>0  && count($asesor)>0 && count($fecha)>0 && count($nota)>0 && count($linea_inv)>0) {
  $consultas= new Consultas();
  $mensaje= $consultas->insertarproyecto($arg_nombre,$arg_autor1, $arg_autor2, $arg_autor3, $arg_asesor, $arg_fecha, $arg_nota, $arg_linea_inv);

}else{
 echo"por favor llenar los campos";

}

echo  $mensaje;








?>