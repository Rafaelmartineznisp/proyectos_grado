<?php
//Registro de Linea de Investigacion

session_start();
require "Crud.php";
require "Conexion.php";




$mensaje=null;
if(isset($_POST["create1"])){
	$Linea_inv = htmlspecialchars($_POST['Linea_inv']);

if($Linea_inv==''){
	$mensaje="Debe escribir el nombre del proyecto";

}

		//$cuenta=array();
		//$i=0;
		else{
			$model= new Crud;
        $model->select='*';
		$model->condition='Linea_inv="'.$Linea_inv.'"';
		$model->from='linea_investigacion';
		$model->Read();
		$filas=$model->rows;
if($filas){
		foreach ($filas as $fila) {
			if ($Linea_inv==$fila['Linea_inv']) {
				$mensaje="Ya existe un linea de investigacion con ese nombre";
			}
			
			}
		}
		else{
				$Linea_inv = htmlspecialchars($_POST['Linea_inv']);
	$model= new Crud;
	$model->insertInto ='linea_investigacion';
	$model->insertColumns='Linea_inv';
	$model->insertValues="'$Linea_inv'";
	$model->create();
	$mensaje= $model->mensaje;	
	
	}	
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
<style type="text/css">
        
        input[type="text"] { margin:2px; }
        #btnEnviar { margin-top:20px; }
        /* Definimos un estilo para el contenedor donde se mostrarán los mensajes de error */
         #divErrores { color:yellow;background-color:red;margin-bottom:10px; }
        /* Definimos un estilo personalizado para los mensajes de error */
         .error { font-weight:bold; }
    </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>

<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    
    <!-- Agregamos JQuery -->
    <script type="text/javascript" src="lib/jquery-1.9.1.min.js"></script>
    <!-- Agregamos el plugin para validar el formulario -->
    <script type="text/javascript" src="lib/jquery.validate.min.js"></script>
    <script type="text/javascript" src="lib/additional-methods.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function()
        {
            $("#form1").validate({
                rules: {
                    "Linea_inv": { required:true, lettersonly:true },
                  
                },
                messages: {
                    "Linea_inv": { required:"Introduza una linea investigacion", lettersonly:"Sólo se admiten letras en la investigacion"},
                    
                },
                 errorContainer: $("#divErrores"),
                 errorLabelContainer: "#divErrores ul",
                 errorElement: "span",
                 wrapper: "li",
                submitHandler: function(form){
                    alert("Los datos son correctos");
                }
            });
        });
    </script>


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
	<center><h1>REGISTRAR LINEA DE INVESTIGACION</h1></center>
	<br><br><br>
	<strong><?php echo $mensaje; ?></strong>
	<form name="form1" id="form1"  class="input" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<table>
		<tr>
			<div class="input-group ">
         <span class="input-group-addon"><span class="glyphicon glyphicon-book"></span></span>
         <input type="text" class="form-control" placeholder="Linea de investigacion"  name="Linea_inv">


         </div>
		</tr>
		<br><br>
		
         </div>
         </tr>
         </table>
         <center>
<input type="hidden" name="create1">
<input type="submit" class="btn btn-info" name="btnEnviar" id="btnEnviar" value="Enviar">


</center>
<br>
<center><div id="divErrores">
          <ul id="lista"></ul>
      </div></center>
	</form>

</div>
</body>
<div class="footer">
    <footer><center>Alexander Ceballos & Rafael Martines & Andres Sanchez &copy</center></footer>
    </div>
</html>