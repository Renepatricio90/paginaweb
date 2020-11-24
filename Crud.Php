<?php

include_once 'Db.php';

/* Codigo para Insertar Datos */
if(isset($_POST['guardar']))
{

     $fn = $MySQLiconn->real_escape_string($_POST['fn']);
     $ln = $MySQLiconn->real_escape_string($_POST['ln']);
 	 $dir = $MySQLiconn->real_escape_string($_POST['dir']);

  $SQL = $MySQLiconn->query("INSERT INTO data(fn,ln,direccion) VALUES('$fn','$ln','$dir')");
  
  if(!$SQL)
  {
   echo $MySQLiconn->error;
  } 
}


/* Codigo para eliminar Datos */
if(isset($_GET['eliminar']))
{
 $SQL = $MySQLiconn->query("DELETE FROM data WHERE id=".$_GET['eliminar']);
 header("Location:contactos.php");
}


/* Codigo para Editar Datos */
if(isset($_GET['editar']))
{

 $SQL = $MySQLiconn->query("SELECT * FROM data WHERE id=".$_GET['editar']);
 $getROW = $SQL->fetch_array();
}

/* Codigo para Actualizar Datos */
if(isset($_POST['actualizar']))
{
 $SQL = $MySQLiconn->query("UPDATE data SET fn='".$_POST['fn']."', ln='".$_POST['ln']."',direccion='".$_POST['dir']."' WHERE id=".$_GET['editar']);
 header("Location:contactos.php");
}
?>