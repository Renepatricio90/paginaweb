<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Esta es la meta descripción de la página">
	<META HTTP-EQUIV=Refresh CONTENT="4; URL=index.html">
	<title>ENVIAR FORMULARIO</title>
</head>
<body>
	
<?php 
if(isset($_POST['email'])) 
{
	$email_to = "willian.dzulcastillo@itsva.edu.mx.com"; 
	$email_subject = "Contacto desde el sitio web";


// Aquí se deberían validar los datos ingresados por el usuario 

if(!isset($_POST['nombre']) || 
!isset($_POST['email']) || 
!isset($_POST['direccion']) || 
!isset($_POST['comentarios'])) {  

echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />"; 
echo "Por favor, vuelva atrás y verifique la información ingresada<br />"; 
die(); }  
$email_message = "Detalles del formulario de contacto:\n\n"; 
$email_message .= "Nombre: " . $_POST['nombre'] . "\n";  
$email_message .= "E-mail: " . $_POST['email'] . "\n"; 
$email_message .= "Dirección: " . $_POST['direccion'] . "\n"; 
$email_message .= "Comentarios: " . $_POST['comentarios'] . "\n\n";   // Ahora se envía el e-mail usando la función mail() de PHP 

$headers = 'From: '.$_POST[email]."\r\n". 
'Reply-To: '.$_POST[email]."\r\n" . 
'X-Mailer: PHP/' . phpversion(); 
@mail($email_to, $email_subject, $email_message, $headers);  
echo "¡El formulario se ha enviado con éxito!"; } ?>



</body>
</html>

