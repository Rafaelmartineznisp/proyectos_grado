<?php
//se crea desde la linea de investigacion

session_start();
require "Crud.php";
require "Conexion.php";

if(isset($_GET['id_lineainv'])){
$inp1=$_GET['id_lineainv'];
}

$mensaje=null;
if(isset($_POST["create"])){
	$Nombre = htmlspecialchars($_POST['Nombre']);
	$Asesor = htmlspecialchars($_POST['Asesor']);
	$Nota = htmlspecialchars($_POST['Nota']);
	$Fecha = date("Y-m-d");
	$Linea_inv = $_POST['id'];


	if (!is_numeric($Nota)) {
		$mensaje ='Error, el campo es solo numerico';
			}
	else{
		$model= new Crud;
		$model->insertInto ='proyecto';
		$model->insertColumns='Nombre,  Asesor, Nota,Fecha, id_lineainv';
		$model->insertValues="'$Nombre', '$Asesor', '$Nota','$Fecha', '$Linea_inv'";
		$model->create();
		$mensaje= $model->mensaje;
	}
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
	<h1>REGISTRAR PROYECTOS</h1>
	<strong><?php echo $mensaje; ?></strong>
	<form class="input" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<table>
		<tr>
			<div class="input-group ">
         <span class="input-group-addon"><span class="glyphicon glyphicon-book"></span></span>
         <input type="text" class="form-control" placeholder="Nombre de proyecto" required name="Nombre">

         </div>
		</tr>
		
		<tr>
			<div class="input-group ">
         <span class="input-group-addon"><span class="glyphicon glyphicon-eye-open"></span></span>
         <input type="text" class="form-control" placeholder="Nombre del asesor" required name="Asesor">

         </div>
		</tr>
		
		<tr>
		<div class="input-group ">
         <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
         <input type="text" class="form-control" placeholder="Nota recibida" required name="Nota">
         </div>
         </tr>
              
         
         </table>
         <center>
<input type="hidden" name="create">
<input type="submit" class="btn btn-info" value="Enviar">
<?php if(isset($inp1)) {?>
                <input type="hidden" class="form-control" placeholder="Proyecto" required name="id" id="id_inv" value="<?php echo $inp1; ?>"> 

<?php  } else {?>
<input type="hidden" class="form-control" placeholder="Proyecto" required name="id" id="id_inv" value="<?php echo $Linea_inv; ?>"> 
<?php } ?>
</center>
	</form>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
</body>
<div class="footer">
    <footer><center>Alexander Ceballos & Rafael Martines & Andres Sanchez &copy</center></footer>
    </div>
</html>