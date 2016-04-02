<?php
//Buscador de Autores

require "PDO_Pagination.php";
/* Config Connection */
$root = 'root';
$password = '';
$host = 'localhost';
$dbname = 'proyecto';
$connection = new PDO("mysql:host=$host;dbname=$dbname;", $root, $password);
$pagination = new PDO_Pagination($connection);
$search = null;
if(isset($_REQUEST["search"]) && $_REQUEST["search"] != "")
{
$search = htmlspecialchars($_REQUEST["search"]);
$pagination->param = "&search=$search";
$pagination->rowCount("SELECT * FROM linea_investigacion WHERE id_inv LIKE '%$search%' OR Linea_inv LIKE '%$search%'");
$pagination->config(3, 5);
$sql = "SELECT * FROM linea_investigacion WHERE id_inv LIKE '%$search%' OR Linea_inv LIKE '%$search%' ORDER BY Linea_inv ASC LIMIT $pagination->start_row, $pagination->max_rows";
$query = $connection->prepare($sql);
$query->execute();
$model = array();
while($rows = $query->fetch())
{
    $model[] = $rows;
}
}
else
{
$pagination->rowCount("SELECT * FROM linea_investigacion");
$pagination->config(3, 5);
$sql = "SELECT * FROM linea_investigacion ORDER BY Linea_inv ASC LIMIT $pagination->start_row, $pagination->max_rows";
$query = $connection->prepare($sql);
$query->execute();
$model = array();
while($rows = $query->fetch())
{
    $model[] = $rows;
}
}
?>
<!DOCTYPE HTML>
<html>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/estilo.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<style type="text/css">
        input[type="text"] { margin:2px; }
        #btnEnviar { margin-top:20px; }
        /* Definimos un estilo para el contenedor donde se mostrarán los mensajes de error */
         #divErrores { color:yellow;background-color:red;margin-bottom:10px; }
        /* Definimos un estilo personalizado para los mensajes de error */
         .error { font-weight:bold; }
    </style>
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
                    "search": { required:true, alphanumeric:true },
                     },
                messages: {
                    "search": { required:"Introduce el  Parametro de busqueda", alphanumeric:"Sólo se admiten letras y numeros "},
                     },
                 errorContainer: $("#divErrores"),
                 errorLabelContainer: "#divErrores ul",
                 errorElement: "span",
                 wrapper: "li",
                           });
        });
    </script>

    <head>
    <meta charset="UTF-8">
    <title>PDO Pagination</title>
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
<center><h1>Buscar Proyecto</h1></center>
<br>
<br>
<form  name="form1" id="form1" method="POST" action="<?php echo $_SERVER["PHP_SELF"] ?>">
<tr>
<center>
<div class="divbuscar">
<div class="input-group">
<input type="text" name="search" placeholder="Buscar Autor a eliminar" class="form-control" value="<?php echo $search ?>">
<span class="input-group-btn">
<button class="btn btn-default" type="submit" value="Search">Buscar</button>
</span>
</div>
<br>
<div id="divErrores">
          <ul id="lista"></ul>
      </div>
</div>
</center>
</tr>
</form>
<br><br>
    <center>
<div class="tablaver">
<table class="table table-bordered" >
    <tr>
        <th>id</th>
        <th>Nombre</th>
        <th>Actualizar</th>
        </tr>
    <?php
    foreach($model as $row)
    {
        echo "<tr>";
        echo "<td>".$row['id_inv']."</td>";
        echo "<td>".$row['Linea_inv']."</td>";
        echo "<td><a href='updatelinea.php?id_inv=".$row['id_inv']."'>Actualizar</a></td>";
        echo "</tr>";
    }
    ?>
</table>
</div>
        <br>
        <br>
        
<div>
<?php
$pagination->pages("btn");
?>
</div>
    </center>
    
    
</div>
    </body>
    <div class="footer">
    <footer><center>Alexander Ceballos & Rafael Martines & Andres Sanchez &copy</center></footer>
    </div>
</html>