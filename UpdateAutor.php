<?php
require "Conexion.php";
require "Crud.php";

if (isset($_REQUEST['id_Autor'])) {
  $id_Autor= htmlspecialchars($_REQUEST['id_Autor']);
  $model = new Crud;
  $model->from='autor';
  $model->select='*';
  $model->condition='id_Autor='.$id_Autor;
  $todo = $model->Read();
  $filas = $model->rows;
  
  if(is_array($filas) || is_object($filas)){
  foreach ($filas as $fila) {
    //$ID=$fila["id_Autor"];
    $Tipo=$fila["Tipo"];
    $NumeroDocumento=$fila["NumeroDocumento"];
    $Nombre = $fila["Nombre"];
    $Apellido = $fila["Apellido"];
    $Proyecto = $fila["id_pro"];
    $Sexo = $fila["Sexo"];
    }
  }
}
$mensaje=null;
    if(isset($_POST["update"])){
      $ID= htmlspecialchars($_POST['id']);
      $Nombre = htmlspecialchars($_POST['Nombre']);
      $Tipo=htmlspecialchars($_POST['Tipo']);
      $NumeroDocumento= htmlspecialchars($_POST['NumeroDocumento']);
      $Apellido = htmlspecialchars($_POST['Apellido']);
  $Sexo = htmlspecialchars($_POST['Sexo']);
  $Proyecto = htmlspecialchars($_POST['id_pro']);
  $model = new Crud;
  $model->update="autor";
  $model->set="Nombre='$Nombre',Apellido='$Apellido',Tipo='$Tipo',NumeroDocumento='$NumeroDocumento' ,id_pro='$Proyecto',Sexo='$Sexo'";
  $model->condition="id_Autor=".$ID;
  $model->Update();
  $mensaje= $model->mensaje;
 

    }
    
    /*if (isset($id_Autor)){
      echo $id_Autor;
    }
    else{
      echo $ID;
    }*/
//select
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
                  "Tipo": "Introduce  un tipo de documento",
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
<a href="Read.php">Regresar a ver proyectos</a>
<center><h4>REGISTRAR AUTOR</h4></center>
<form name="form1" id="form1" class="input" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <table>
    <tr>
      <center><h6>---Tipo de Documento---</h6></center>
      <div class="input-group ">
         <span class="input-group-addon"><span class="glyphicon glyphicon-eye-open"></span></span>
         <input type="text" class="form-control" placeholder="Tipo de Documento" required name="Tipo" value="<?php echo $Tipo;?>">

         </div>
    </tr> 
    <center><h6>---Nombre---</h6></center>
    <tr>
      <div class="input-group ">
         <span class="input-group-addon"><span class="glyphicon glyphicon-book"></span></span>
         <input type="text" class="form-control" placeholder="Nombre de proyecto" required name="Nombre" value="<?php echo $Nombre; ?>">

         </div>
    </tr>
    <center><h6>---Apellidos---</h6></center>
    <tr>
      <div class="input-group ">
         <span class="input-group-addon"><span class="glyphicon glyphicon-eye-open"></span></span>
         <input type="text" class="form-control" placeholder="Nombre del asesor" required name="Apellido" value="<?php echo $Apellido;?>">

         </div>
    </tr>

   <center><h6>---Numero de Documento---</h6></center>
    
     <tr>
      <div class="input-group ">
         <span class="input-group-addon"><span class="glyphicon glyphicon-eye-open"></span></span>
         <input type="text" class="form-control" placeholder="Numero de Documento" required name="NumeroDocumento" value="<?php echo $NumeroDocumento;?>">

         </div>
    </tr>
        <tr>
   <center><h6>---Actualice Proyecto---</h6></center>
         <select name="id_pro" class="form-control">  
        <?php
    
    foreach ($filas1 as $fila) {

    
    if ($Proyecto == $fila["id"]) {
      //$fila["id_inv"] = $Linea_inv;
echo  "<option selected=".$Proyecto." value=".$fila['id']." >".$fila["Nombre"]."</option>";
      
    }
    elseif ($Proyecto != $fila["id"]){
        echo  "<option  value=".$fila['id'].">".$fila["Nombre"]."</option>";
    }
    

}

        ?>
  </select>  
  </tr>     
        
<center><h6>---Sexo---</h6></center>
    <tr>
    <div class="input-group ">
         
        

                                <select name="Sexo" class="form-control" selected="">
                                  <option value="0"  'selected' : ''; >Sexo</option>
                                  <?php if ($Sexo!="") {
                                    # code...
                                  
                                  echo  "<option selected=".$Sexo." value=".$Sexo." >".$Sexo."</option>";
                                  }


                                  ?>
                                  <?php 
                                  $Masculino="Masculino";
                                  $Femenino="Femenino";
                                  if ($Sexo!='Masculino') {
                                    # code...
                                  
                                    echo "<option value=".$Masculino." >".$Masculino."</option>";
                                    //<option value="Femenino" 'selected' : ''; >Femenino</option>
                                }
                                  if ($Sexo!="Femenino") {

                                    echo "<option value=".$Femenino." >".$Femenino."</option>";                                 }
                                    ?>
                                </select>
         
         </div>
         </tr>
     </table>
     <br>
         <center>
<input type="hidden" name="update">
<input type="hidden" name="id" value="<?php echo $id_Autor;?>">
<input type="submit" class="btn btn-info" value="Actualizar">
<br>
<center><div id="divErrores">
          <ul id="lista"></ul>
      </div></center>
<strong><?php echo $mensaje; ?></strong>
</center>
  </form>
  </div>
 </body>
</html>