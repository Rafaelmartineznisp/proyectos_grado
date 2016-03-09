<?php
class Consultas{

 public function insertarproyecto($arg_nombre,$arg_autor1, $arg_autor2, $arg_autor3, $arg_asesor, $arg_fecha, $arg_nota, $arg_linea_inv){
 	 $modelo=new Conexion();
 	 $con=$modelo->get_conexion();
 	 $sql="(insert into proyecto (nombre,autor1,autor2,autor3,asesor,fecha,nota,linea_inv) values(:nombre,:autor1,:autor2,:autor3,:asesor,:fecha,:nota,:linea_inv))";
     $sta=$conexion->prepare($sql);
     $sta->bindParam(':nombre', $arg_nombre);
     $sta->bindParam(':autor1', $arg_autor1);
     $sta->bindParam(':autor2', $arg_autor2);
     $sta->bindParam(':autor3', $arg_autor3);
     $sta->bindParam(':asesor', $arg_asesor);
     $sta->bindParam(':nota', $arg_nota);
     $sta->bindParam(':linea_inv', $linea_inv);
      
      if(!$sta){
    return "error al crear proyecto";
	}else {
		$sta->execute();
		return "registro creado satisfactoriamente";

	}



}
}

?>