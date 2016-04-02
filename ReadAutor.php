<?php
require "Conexion.php";
require "Crud.php";

$model= new Crud;
$model->select='*';
//$model->condition='id=32';
$model->from='autor';
$model->Read();
$filas=$model->rows;

//nombre linea de investigacion

$model = new Crud;
	$model->from='proyecto';
	$model->select='*';
	
	$todo = $model->Read();
	$filas1 = $model->rows;


?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/estilo.css">
<head>
	<title></title>
</head>
<body>
<div class="contenedor">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Proyectos UNICOR</a>
    </div>
    <ul class="nav navbar-nav">
    <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
      Registrar <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
    <li><a href="FormularioLinea_inv.php">Linea de investigacion</a></li>
      <li><a href="CreateDirect.php">Proyecto</a></li>
      <li><a href="Create1Direct.php">Autor</a></li>
    </ul>
 	</li>    
      <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
      Eliminar <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
    <li><a href="BuscarLinea.php">Line de investigacion</a></li>
    <li><a href="Buscar.php">Proyecto</a></li>
    <li><a href="BuscarAu.php">Autor</a></li>
    </ul>
   
  </li>    
   <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
      Ver <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
    <li><a href="Read1.php">Lineas</a></li>
    <li><a href="Read.php">Proyectos</a></li>
    <li><a href="ReadAutor.php">Autores</a></li>
    </ul>
   <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
      Editar/Modificar <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
    <li><a href="actualizarlinea.php">Lineas</a></li>
    <li><a href="actualizarproyecto.php">Proyectos</a></li>
    <li><a href="actualizarautor.php">Autores</a></li>
    </ul>
  </li>
      
       
       
    </ul>
  </div>
</nav>
<center><h1>LISTA DE PROYECTOS:</h1></center>
<br>
<br>
<?php 
if ($filas) {
?>
<div class="tablaver">
<table class="table table-bordered" >
<tr>
	<th>ID</th>
	<th>Nombre</th>
	
	<th>Apellido</th>
	<th>Sexo</th>
	<th>Proyecto</th>
</tr>
	<?php
	

		


		foreach ($filas as $fila) {
			echo "<tr>";
			echo "<td>".$fila['id_Autor']."</td>";
			echo "<td>".$fila['Nombre']."</td>";
			
			echo "<td>".$fila['Apellido']."</td>";
			echo "<td>".$fila['Sexo']."</td>";
		foreach ($filas1 as $fila1) {
			if ($fila1['id']==$fila['id_pro']) {
				echo "<td>".$fila1['Nombre']."</td>";
			}
		
			
}
	
		
		}
	
?>
</table>
</div>
<?php		
	}else{
?>

<strong>No Existen Proyectos Registrados</strong>
<?php		

	}
	?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</div>
</body>
<div class="footer">
    <footer><center>Alexander Ceballos & Rafael Martines & Andres Sanchez &copy</center></footer>
    </div>
</html>