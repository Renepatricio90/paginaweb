<?php

include_once 'Db.php';

/* Codigo para Insertar Datos */
if(isset($_POST['guardar']))
{

     $nombre = $MySQLiconn->real_escape_string($_POST['nombre']);
     $apellido = $MySQLiconn->real_escape_string($_POST['apellido']);
     $edad = $MySQLiconn->real_escape_string($_POST['edad']);
     $sexo = $MySQLiconn->real_escape_string($_POST['sexo']);
     $codigopostal = $MySQLiconn->real_escape_string($_POST['codigopostal']);
     $domicilio = $MySQLiconn->real_escape_string($_POST['domicilio']);
     $telefono = $MySQLiconn->real_escape_string($_POST['telefono']);

  $SQL = $MySQLiconn->query("INSERT INTO clientes(nombre,apellido,edad,sexo,codigopostal,domicilio,telefono) VALUES('$nombre','$apellido','$edad','$sexo','$codigopostal','$domicilio','$telefono')");
  
  if(!$SQL)
  {
   echo $MySQLiconn->error;
  } 
}


/* Codigo para eliminar Datos */
if(isset($_GET['eliminar']))
{
 $SQL = $MySQLiconn->query("DELETE FROM clientes WHERE id=".$_GET['eliminar']);
 header("Location:clientes.php");
}


/* Codigo para Editar Datos */
if(isset($_GET['editar']))
{

 $SQL = $MySQLiconn->query("SELECT * FROM clientes WHERE id=".$_GET['editar']);
 $getROW = $SQL->fetch_array();
}

/* Codigo para Actualizar Datos */
if(isset($_POST['actualizar']))
{
 $SQL = $MySQLiconn->query("UPDATE clientes SET nombre='".$_POST['nombre']."', apellido='".$_POST['apellido']."',edad='".$_POST['edad']."', sexo='".$_POST['sexo']."', codigopostal='".$_POST['codigopostal']."', domicilio='".$_POST['domicilio']."', telefono='".$_POST['telefono']."' WHERE id=".$_GET['editar']);
 header("Location:clientes.php");
}
?>