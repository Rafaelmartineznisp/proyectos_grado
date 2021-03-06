<?php
//Ver Informacion del proyecto

require "Conexion.php";
require "Crud.php";

if (isset($_REQUEST['id'])) {
	$id= htmlspecialchars($_REQUEST['id']);
	$model = new Crud;
	$model->from='proyecto';
	$model->select='*';
	$model->condition='id='.$id;
	$todo = $model->Read();
	$filas = $model->rows;
	

}


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
<ul class="nav nav-tabs">
  <li class="active"><a href="VerProyecto.php?id=<?php echo $id;?>">Informacion General</a></li>
  <li><a href="VerAutores.php?id=<?php echo $id;?>">Autores</a></li>
  </ul>
<?php 
if ($filas) {
?>
<br>
<br>
<div class="tablaver">
<table class="table table-bordered" >
<tr>
	<th>ID</th>
	<th>Nombre</th>
	
	<th>Asesor</th>
	<th>Fecha</th>
	<th>Nota</th>
</tr>
	<?php
	
		foreach ($filas as $fila) {
			
		
			
		
			echo "<tr>";
			echo "<td>".$fila['id']."</td>";
			echo "<td>".$fila['Nombre']."</td>";
			echo "<td>".$fila['Asesor']."</td>";
			echo "<td>".$fila['Fecha']."</td>";
			echo "<td>".$fila['Nota']."</td>";
			echo "</tr>";
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></scri
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