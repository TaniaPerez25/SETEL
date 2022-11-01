<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Enviar Contacto</title>
</head>
<body>
<?php
$email = $_POST['Email'];
function form_mail($sPara, $sAsunto, $sTexto, $sDe)
{ 
$bHayFicheros = 0; 
$sCabeceraTexto = "";
$sAdjuntos = "";
 
if ($sDe)$sCabeceras = "From:".$sDe."\n"; 
else $sCabeceras = ""; 
$sCabeceras .= "MIME-version: 1.0\n"; 
foreach ($_POST as $sNombre => $sValor) 
$sTexto = $sTexto."\n".$sNombre." = ".$sValor;
foreach ($_FILES as $vAdjunto)
 
{
 
if ($bHayFicheros == 0)
 
{

$bHayFicheros = 1;
$sCabeceras .= "Content-type: multipart/mixed;";
$sCabeceras .= "boundary=\"--_Separador-de-mensajes_--\"\n";
$sCabeceraTexto = "----_Separador-de-mensajes_--\n";
$sCabeceraTexto .= "Content-type: text/plain;charset=iso-8859-1\n";
$sCabeceraTexto .= "Content-transfer-encoding: 7BIT\n";
$sTexto = $sCabeceraTexto.$sTexto;
 
}
 
if ($vAdjunto["size"] > 0)
 
{
 
$sAdjuntos .= "\n\n----_Separador-de-mensajes_--\n";
$sAdjuntos .= "Content-type: ".$vAdjunto["type"].";name=\"".$vAdjunto["name"]."\"\n";;
$sAdjuntos .= "Content-Transfer-Encoding: BASE64\n";
$sAdjuntos .= "Content-disposition: attachment;filename=\"".$vAdjunto["name"]."\"\n\n";
$oFichero = fopen($vAdjunto["tmp_name"], 'r');
$sContenido = fread($oFichero, filesize($vAdjunto["tmp_name"]));
$sAdjuntos .= chunk_split(base64_encode($sContenido));
fclose($oFichero);
}
}
 
if ($bHayFicheros)
$sTexto .= $sAdjuntos."\n\n----_Separador-de-mensajes_----\n";
return(mail($sPara, $sAsunto, $sTexto, $sCabeceras));
 
}
 
//cambiar aqui el email
// echo "Gracias por tu inscripción.<BR>Estaremos en contacto por medio de su correo.<BR><br>";
// echo "<b>Telesecundaria.gob.mx</b><BR><br>";
// echo "<A HREF='../formponencia.html'><U>Regresar</U></A>.";
 
if (form_mail("edggar_dise@telesecundaria.gob.mx", "CONTACTO",
"Los datos introducidos en el formulario son:\n", $email))
echo "<b><h3>El mensaje ha sido enviado correctamente!</h3></b><BR><br><br>";
echo "Gracias por su Comentario.  <BR>Lo mantendremos informado.  <BR><br><meta http-equiv='refresh' content='3; url=contacto.html' >"; 

?>
 
</body>
</html>
