<?php
//Registra funciones
class Crud
{

public $insertInto;
public $insertColumns;
public $insertValues;
public $mensaje;
public $select;
public $from;
public $condition;
public $rows;
public $update;
public $set;
public $deleteFrom;

public function Create(){
	$model= new Conexion;
	$conexion = $model->conectar();
	$insertInto = $this->insertInto;
	$insertColumns= $this->insertColumns;
	$insertValues= $this->insertValues;
	$sql="INSERT INTO $insertInto ($insertColumns) VALUES ($insertValues)";
	$consulta = $conexion->prepare($sql);
	if(!$consulta){
		$this->mensaje="Error al crear el registro";
	}
else {
	$consulta->execute();
	$this->mensaje="registro creado Correctamente";
}

}
public function Read(){
	$model = new Conexion();
	$Conexion = $model->conectar();
	$select = $this->select;
	$from = $this->from;
	$condition= $this->condition;
	if ($condition!="") {
		$condition="WHERE ".$condition;
		
 	}
	$sql="SELECT $select FROM $from $condition";
	$consulta = $Conexion->prepare($sql);
	$consulta->execute();

	while ($filas= $consulta->fetch()) {
		$this->rows[]=$filas;
	}
}

public function Update(){
	$model = new Conexion();
	$Conexion = $model->conectar();
	$update = $this->update;
	$set = $this->set;
	$condition = $this->condition;
	if($condition!=''){
		$condition ="WHERE ". $condition;

	}
		$sql="UPDATE $update SET $set  $condition";
		$consulta = $Conexion->prepare($sql);
		if (!$consulta) {
			$this->mensaje="Ha ocurrido un error al actualizar el registro";
		}
		else{
			$consulta->execute();
			$this->mensaje="se ha actualizado correctamente";

		}
}
public function Delete(){
	$model = new Conexion();
	$conexion = $model->conectar();
	$deleteFrom = $this->deleteFrom;
	$condition = $this->condition;
	$this->mensaje="Error al eliminar el registro";
	if($condition!=''){
		$condition = "WHERE " . $condition;
	}
	$sql = "DELETE FROM $deleteFrom $condition";
	$consulta = $conexion->prepare($sql);
	if(!$consulta){
		$this->mensaje="Error al eliminar el registro";
	}
	else{

		$consulta->execute();
		$this->mensaje= $sql;
	}
}
}

?>