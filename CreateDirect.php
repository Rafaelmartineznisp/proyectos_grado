'  <?php
//Registra Proyectos

session_start();
require "Crud.php";
require "Conexion.php";

if(isset($_GET['id'])){
$inp1=$_GET['id'];
}

$mensaje=null;
if(isset($_POST["create"])){
  $Nombre = htmlspecialchars($_POST['Nombre']);
  $Asesor = htmlspecialchars($_POST['Asesor']);
  $Nota = htmlspecialchars($_POST['Nota']);
  $Fecha = date("Y-m-d");
  //$Linea_inv = $_POST['id'];
  $Linea_inv = htmlspecialchars($_POST['Linea_inv']);

  if (!is_numeric($Nota)) {
    $mensaje ='Error, el campo es solo numerico';
      }
  else{
    $model= new Crud;
        $model->select='*';
    $model->condition='Nombre="'.$Nombre.'"';
    $model->from='proyecto';
    $model->Read();
    $filas=$model->rows;
if($filas){
    foreach ($filas as $fila) {
      if ($Nombre==$fila['Nombre']) {
        $mensaje="Ya existe un proyecto con ese nombre";
      }
      
      }
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
  }

//$fora=$inp;
  $model = new Crud;
  $model->from='linea_investigacion';
  $model->select='*';
  /*if ($fora='') {
    //$fora=$inp;
    $model->condition='id_pro='.$inp;
    }
    else{*/
  //$model->condition='id=5';
//}
  $todo = $model->Read();
  $filas1 = $model->rows;
  //echo $todo;
  /*if(is_array($filas) || is_object($filas)){
  foreach ($filas as $fila) {
    $Nombre = $fila["Nombre"];
    
    $Apellido = $fila["Apellido"];
    $Sexo = $fila["Sexo"];
    
    }
  }*/



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
                    "Nombre": { required:true, lettersonly:true },
                    "Asesor": { required:true, lettersonly:true },
                    "Nota": { required:true, number:true, min:0, max:5},
                    "Linea_inv": { required:true },
                    
                },
                messages: {
                    "Nombre": { required:"Introduce el nombre", lettersonly:"Sólo se admiten letras en el nombre"},
                    "Asesor": { required:"Introduce Asesor", lettersonly:"Sólo se admiten letras en el Asesor "},
                    "Nota": { required:"Introduce una Nota", digits:"Sólo pueden haber números en la Nota", min:"Nota invalida",max:"Nota invalida" },
                    "Linea_inv": "Selecciona  una linea investigación",
                    
                },
                 errorContainer: $("#divErrores"),
                 errorLabelContainer: "#divErrores ul",
                 errorElement: "span",
                 wrapper: "li",
               
            });
        });
    </script>
  </head>
  <body><div class="contenedor">
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
<center><h1>REGISTRAR PROYECTOS</h1></center>
  <strong><?php echo $mensaje; ?></strong>
      <form name="form1" id="form1" class="input" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <table>
    <tr>
    <br>
      <div class="input-group ">
         <span class="input-group-addon"><span class="glyphicon glyphicon-book"></span></span>
         <input type="text" class="form-control" placeholder="Nombre de proyecto"  name="Nombre" autofocus >

         </div>
    </tr>
    <br>
    <tr>
      <div class="input-group ">
         <span class="input-group-addon"><span class="glyphicon glyphicon-eye-open"></span></span>
         <input type="text" class="form-control" placeholder="Nombre del asesor"  name="Asesor">

         </div>
    </tr>
    <br>
    <tr>
    <div class="input-group ">
         <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span></span>
         <input type="number" max="5" min="0" class="form-control" placeholder="Nota recibida"  name="Nota">
         </div>
         </tr>
         <br>
        <select name="Linea_inv" class="form-control" >
        <option ></option>
        <?php
    
    foreach ($filas1 as $fila) {
    
    

        echo  "<option value=".$fila["id_inv"].">".$fila["Linea_inv"]."</option>";
    }
        ?>
  </select> 
        
         <br>
         </table>
         <center>
<input type="hidden" name="create">
<input type="submit" class="btn btn-info" value="Enviar">
<?php /*if(isset($inp1)) {?>
                <input type="text" class="form-control" placeholder="Proyecto" required name="id" id="id_inv" value="<?php echo $inp1; ?>"> 

<?php  } else {?>
<input type="text" class="form-control" placeholder="Proyecto" required name="id" id="id_inv" value="<?php echo $Linea_inv; ?>"> 
<?php } */?>

</center>
<br>

<center><div id="divErrores">
          <ul id="lista"></ul>
      </div></center>
  </form>
  </body>
</html>