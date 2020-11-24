<?php
include_once 'CrudC.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 20px;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body>

<div class="dropdown">
  <div class="container text-center">
    <h1>Sistema Contacts</h1>      
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="../index.php">Inicio</a></li>
        <li><a href="contactos.php">Contactos</a></li>
        <li><a href="clientes.php">Clientes</a></li>
        <li><a href="proveedores.php">Provedores</a></li>
        <li><a href="informacion.php">informacion</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid ">
  
 <h2 class="text-center">Clientes</h2>
 <form method="post">
    <div class="form-group">
        <label class="control-label" for="nombre">Nombre(s):</label>
       <div class="col bg-info">
         <input type="text" class="form-control text-uppercase" id='nombre' name="nombre" placeholder="Nombre(s)"
           value="<?php
                      if(isset($_GET['editar'])) echo $getROW['nombre']; ?>" />
       </div>
    </div>

    <div class="form-group">
       <label class="control-label" for="apellido">Apellido(s):</label>
       <div class="col">
          <input type="text" class="form-control text-uppercase" name="apellido" placeholder="Apellido(s)"
          value="<?php if(isset($_GET['editar'])) echo $getROW['apellido'];  ?>" />
       </div>
    </div>

    <div class="form-group">
       <label class="control-label" for="edad">Edad:</label>
       <div class="col">
          <input type="text" class="form-control text-uppercase" name="edad" placeholder="Edad"
          value="<?php if(isset($_GET['editar'])) echo $getROW['edad'];  ?>" />
       </div>
    </div>

    <div class="form-group">
       <label class="control-label" for="sexo">Sex0:</label>
       <div class="col">
          <input type="text" class="form-control text-uppercase" name="sexo" placeholder="H | M"
          value="<?php if(isset($_GET['editar'])) echo $getROW['sexo'];  ?>" />
       </div>
    </div>

    <div class="form-group">
       <label class="control-label" for="codigopostal">Codigo Postal:</label>
       <div class="col">
          <input type="text" class="form-control text-uppercase" name="codigopostal" placeholder="97780"
          value="<?php if(isset($_GET['editar'])) echo $getROW['codigopostal'];  ?>" />
       </div>
    </div>

    <div class="form-group">
       <label class="control-label" for="domicilio">domicilio:</label>
       <div class="col">
          <input type="text" class="form-control text-uppercase" name="domicilio" placeholder="Domicilio"
          value="<?php if(isset($_GET['editar'])) echo $getROW['domicilio'];  ?>" />
       </div>
    </div>

    <div class="form-group">
       <label class="control-label" for="telefono">Telefono:</label>
       <div class="col">
          <input type="text" class="form-control text-uppercase" name="telefono" placeholder="999-1234567"
          value="<?php if(isset($_GET['editar'])) echo $getROW['telefono'];  ?>" />
       </div>
    </div>

    <div class="form-group">	      
       <?php
        if(isset($_GET['editar']))
         {
       ?>
       <div class="col-12">
          <button type="submit" class="btn btn-primary" name="actualizar">Actualizar</button>
         </div>
      <?php
     }
     else
     {
      ?>

<br><br>
      <div class="col-12">			 
        <button type="submit" class="btn btn-info btn-block" name="guardar">Guardar</button>
      </div>


      <?php
     }
     ?>	      
    </div>
 </form>

 <h3>Listado de Clientes</h3>

 <table class="table table-hover table-bordered shadow p-3 mb-5 bg-white rounded">
   <tr>
       <th>ID</th>
       <th>Nombre(S)</th>
       <th>Apellido(s)</th>
       <th>Edad</th>
       <th>Sexo</th>
       <th>Codigo Postal</th>
       <th>Domicilio</th>
       <th>Telefono</th>
       <th>Acciones</th>
      
    </tr>

   <?php

   $res = $MySQLiconn->query("SELECT * FROM clientes");
   while($row=$res->fetch_array())
   {
    ?>
       <tr>
         <td><?php echo $row['id']; ?></td>
         <td><?php echo $row['nombre']; ?></td>
         <td><?php echo $row['apellido']; ?></td>
         <td><?php echo $row['edad']; ?></td>
         <td><?php echo $row['sexo']; ?></td>
         <td><?php echo $row['codigopostal']; ?></td>
         <td><?php echo $row['domicilio']; ?></td>
         <td><?php echo $row['telefono']; ?></td>
         <td>
           <a href="?editar=<?php
            echo $row['id'];
             ?>" onclick="return confirm('¿Deseas Editarlo ?'); ">

             <span class="glyphicon  glyphicon glyphicon-pencil"></span>

           </a>

           <a href="?eliminar=<?php echo $row['id']; ?>" onclick="return confirm('¿Seguro deseas eliminarlo?'); ">
             <span class="glyphicon  glyphicon glyphicon-trash"></span>
         </a>
       </td> 
       </tr>
       <?php
   }
   ?>
 </table>
 
</div>

<div class="container">
  <br><br>
  <p><em>Num. pagina</em>.</p>
  <ul class="pagination">
    <li ><a href="#">1</a></li>
    <li ><a href="#">2</a></li>
    <li class="active"><a href="paginas/clientes.php">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
  </ul>
</div>


</body>
</html>
