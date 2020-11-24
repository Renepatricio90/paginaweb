<?php

include_once 'Db.php';

/* Codigo para Insertar Datos */
if(isset($_POST['guardar']))
{

     $nombre = $MySQLiconn->real_escape_string($_POST['nombre']);
     $apellido = $MySQLiconn->real_escape_string($_POST['apellido']);
     $direccion = $MySQLiconn->real_escape_string($_POST['direccion']);
     $correo = $MySQLiconn->real_escape_string($_POST['correo']);
     $telefono = $MySQLiconn->real_escape_string($_POST['telefono']);

  $SQL = $MySQLiconn->query("INSERT INTO provedores(nombre,apellido,direccion,correo,telefono) VALUES('$nombre','$apellido','$direccion','$correo','$telefono')");
  
  if(!$SQL)
  {
   echo $MySQLiconn->error;
  } 
}


/* Codigo para eliminar Datos */
if(isset($_GET['eliminar']))
{
 $SQL = $MySQLiconn->query("DELETE FROM provedores WHERE id=".$_GET['eliminar']);
 header("Location:provedores.php");
}


/* Codigo para Editar Datos */
if(isset($_GET['editar']))
{

 $SQL = $MySQLiconn->query("SELECT * FROM provedores WHERE id=".$_GET['editar']);
 $getROW = $SQL->fetch_array();
}

/* Codigo para Actualizar Datos */
if(isset($_POST['actualizar']))
{
 $SQL = $MySQLiconn->query("UPDATE provedores SET nombre='".$_POST['nombre']."', apellido='".$_POST['apellido']."',direccion='".$_POST['direccion']."', correo='".$_POST['correo']."', telefono='".$_POST['telefono']."' WHERE id=".$_GET['editar']);
 header("Location:provedores.php");
}
?>