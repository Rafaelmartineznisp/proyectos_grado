<?php
//No registra Usuarios Directamente, sino desde el proyecto

session_start();
require "Crud.php";
require "Conexion.php";

//extract($_REQUEST);
if(isset($_GET['id_pro'])){
$inp=$_GET['id_pro'];
}

$mensaje=null;
if(isset($_POST["create1"])){
$Tipo= htmlspecialchars($_POST['Tipo']);
  $NumeroDocumento = htmlspecialchars($_POST['NumeroDocumento']);
  $Nombre = htmlspecialchars($_POST['Nombre']);
  $Apellido = htmlspecialchars($_POST['Apellido']);
  $Sexo = htmlspecialchars($_POST['Sexo']);
	$fora=$_POST['id'];


	if (!is_numeric($NumeroDocumento)) {
    $mensaje ='Ingrese un documento valido';
      }
      else{
    $model= new Crud;
    $model->select='*';
    $model->condition='NumeroDocumento="'.$NumeroDocumento.'"';
    $model->from='autor';
    $model->Read();
    $filas=$model->rows;
if($filas){
    foreach ($filas as $fila) {
      if ($NumeroDocumento==$fila['NumeroDocumento']) {
        $mensaje="Ya existe un autor con esa cedula";
      }
      
      }
    }
  else{
$model= new Crud;
    $model->insertInto ='autor';
    $model->insertColumns='Tipo, NumeroDocumento ,Nombre,  Apellido, Sexo, id_pro';
    $model->insertValues="'$Tipo','$NumeroDocumento','$Nombre', '$Apellido', '$Sexo', $fora";
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
   <style type="text/css">
               input[type="text"] { margin:2px; }
        #btnEnviar { margin-top:20px; }
        /* Definimos un estilo para el contenedor donde se mostrarán los mensajes de error */
         #divErrores { color:yellow;background-color:red;margin-bottom:10px; font-size: 12px; }
        /* Definimos un estilo personalizado para los mensajes de error */
         .error { font-weight:bold; }
    </style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/estilo.css">
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
                   "Tipo": { required:true },
                    "NumeroDocumento": { required:true, digits:true, rangelength:[7,10] },
                    "Nombre": { required:true, lettersonly:true },
                    "Apellido": { required:true, lettersonly:true },
                     "Sexo": { required:true },
                    "id_pro": { required:true },
                    
                },
                messages: {
                  "Tipo": "Selecciona  un tipo de documento",
                  "NumeroDocumento": { required:"Introduce una Cédula", digits:"Sólo pueden haber números en la Cédula", rangelength:"Cédula invalida" },
                    "Nombre": { required:"Introduce el nombre", lettersonly:"Sólo se admiten letras en el nombre"},
                    "Apellido": { required:"Introduce Apellido", lettersonly:"Sólo se admiten letras en el Apellido "},
                     "Sexo": "Selecciona  un Sexo",
                    "id_pro": "Selecciona  un Proyecto",
                    
                },
                 errorContainer: $("#divErrores"),
                 errorLabelContainer: "#divErrores ul",
                 errorElement: "span",
                 wrapper: "li",
               
            });
        });
    </script>
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
  <center><h3>REGISTRAR AUTOR</h3>
  <strong><?php echo $mensaje; ?></strong></center>
  <form  name="form1" id="form1" class="input" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <table>
   <tr>
    <center><h5>---Seleccione un Tipo de Documento---</h5></center>

         <select name="Tipo" class="form-control">
                                  <option></option>
                                    <option value="TI"  'selected' : ''; >Tarjeta identidada</option>
                                    <option value="CC" 'selected' : ''; >Cedula de cuidadania</option>
                                    <option value="PSPT" 'selected' : ''; >Pasaporte</option>
                                </select>
                             
        </tr>
      
    <tr>
    <br>
      <div class="input-group ">
         <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
         <input type="text" class="form-control" placeholder="CEDULA"  name="NumeroDocumento">

         </div>
    </tr>
    <br>
    <tr>
      <div class="input-group ">
         <span class="input-group-addon"><span class="glyphicon glyphicon-book"></span></span>
         <input type="text" class="form-control" placeholder="Nombre"  name="Nombre">

         </div>
    </tr>
    <br>
    <tr>
      <div class="input-group ">
         <span class="input-group-addon"><span class="glyphicon glyphicon-eye-open"></span></span>
         <input type="text" class="form-control" placeholder="Apellido"  name="Apellido">

         </div>
    </tr>
     <center><h5>---Seleccione el Sexo---</h5></center>
    <tr>
    
         
         

                                <select name="Sexo" class="form-control">
                                  <option></option>
                                    <option value="Masculino"  'selected' : ''; >Masculino</option>
                                    <option value="Femenino" 'selected' : ''; >Femenino</option>
                                </select>
        
        
         </tr>
         
        <center>
<br>
<input type="hidden" name="create1">
<input type="submit" class="btn btn-info" value="Enviar">

<?php if(isset($inp)) {?>
                <input type="hidden" class="form-control" placeholder="Proyecto" required name="id" id="id_pro" value="<?php echo $inp; ?>"> 

<?php  } else {?>
<input type="hidden" class="form-control" placeholder="Proyecto" required name="id" id="id_pro" value="<?php echo $fora; ?>"> 
<?php } ?>
</center>
<center><div id="divErrores">
          <ul id="lista"></ul>
      </div></center>
	</form>

    </div>
    </body>
</html>