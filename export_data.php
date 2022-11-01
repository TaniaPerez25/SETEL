<?php
/* Usuario para la conexion a Mysql. */
$usurio = "telesecu_carrera_admin";
/* Password para la conexion a Mysql. */
$passwd = "admin_carrera_2021";
 /* Host para la conexion a Mysql. */
$host = "localhost";
/* Base de Datos que se seleccionará. */
$bd = "telesecu_carreraadmin";
/* Nombre del fichero que se descargará. */
$nombre = "inscripcion.csv"; // nombre del archivo que queres que genere !!!
/* Determina si la tabla será vaciada (si existe) cuando  restauremos la tabla. */            
$drop = false;
/* 
* Array que contiene las tablas de la base de datos que seran resguardadas.
* Puede especificarse un valor false para resguardar todas las tablas
* de la base de datos especificada en  $bd.
* 
* Ejs.:
* $tablas = false;
*    o
* $tablas = array("tabla1", "tabla2", "tablaetc");
* 
*/
$tablas = false;
/* 
* Tipo de compresion.
* Puede ser "gz", "bz2", o false (sin comprimir)
*/
$compresion = false;

/* Conexion y eso*/
$conexion = mysql_connect($host, $usurio, $passwd)
or die("No se conectar con el servidor MySQL: ".mysql_error());
mysql_select_db($bd, $conexion)
or die("No se pudo seleccionar la Base de Datos: ". mysql_error());
<?php
if(isset($_POST["export_data"]))
{
	if(!empty($inscripcion))
	{
		$filename="inscripcion.xls";
		header("Content-Type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=".$filename);
		$mostrar_columnas=false;
		foreach($inscripcion as $inscripcion)
		{
			if(!$mostrar_columnas)
			{
				echo implode("\t",array_keys($inscripcion))."\n";
				$mostrar_columnas=true;
			}
			echo implode("\t",array_values($inscripcion))."\n";
		}
	}
		else
			{
				echo'No hay datos a exportar';
			}
				exit;
}
?>