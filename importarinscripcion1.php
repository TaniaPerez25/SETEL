<?php
$conexion = mysqli_connect("Localhost","telesecu_carrera_admin","admin_carrera_2021");
mysqli_select_db($conexion,"telesecu_carreraadmin");
$sql="SELECT * FROM inscripcion";
$resultado=mysqli_query($conexion,$sql) or die(mysql_error());
$inscripcion=array();
hile($rows=mysqli_fetch_assoc($resultado))
{
$inscripcion[]=$rows;
}
mysqli_close($conexion);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<div class="container">
	<h2>Exportar datos </h2>
		<div class="well-sm col-sm-12">
			<div class="btn-group pull-right">
				<form  action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">	
					<button type="submit" id="export_data" name='export_data'
					value="Export to excel"class="btn btn-info">Exportar a Excel</button>
				</form>
			</div>
		</div>
		<table id="" class="table table-striped table-bordered">
			<tr>
				<th>FECHA</th>
				<th>INCORPORACÍON:</th>
				<th>NOMBRE</th>
				<th>FILIACIÓN</th>
				<th>NUM. CELULAR</th>
				<th>CURP</th>
				<th>VERTIENTE</th>
				<th>SECTOR</th>
				<th>ZONA</th>
				<th>CLAVECT</th>
				<th>TEL. DEL CCT</th>
				<th>COMUNIDAD</th>
				<th>MUNICIPIO</th>
				<th>E-mail</th>
				<th>PLAZA</th>
				<th>ANTIGÜEDAD</th>
				<th>FECHA INGRESO</th>
				<th>DESEMPEÑO</th>
				<th>JEFE</th>
				<th>MAIL JEFE</th>
				<th>COMPAÑERO No. 1</th>
				<th>EMAIL No. 1</th>
				<th>COMPAÑERO No.2</th>
				<th>EMAIL No. 2</th>
				<th>CURSOS</th>
		</tr>
			<tbody>
			<?php foreach($inscripcion as $inscrip){?>
				<tr>
					<td><?php echo $inscrip['fecha']; ?></td>
					<td><?php echo $inscrip['incorp']; ?></td>
					<td><?php echo $inscrip['nombre']; ?></td>
					<td><?php echo $inscrip['rfc']; ?></td>
					<td><?php echo $inscrip['cel']; ?></td>
					<td><?php echo $inscrip['curp']; ?></td>
					<td><?php echo $inscrip['ver']; ?></td>
					<td><?php echo $inscrip['sec']; ?></td>
					<td><?php echo $inscrip['zona'];?></td>
					<td><?php echo $inscrip['cct']; ?></td>
					<td><?php echo $inscrip['telcct']; ?></td>
					<td><?php echo $inscrip['comun']; ?></td>
					<td><?php echo $inscrip['mun']; ?></td>
					<td><?php echo $inscrip['email']; ?></td>
					<td><?php echo $inscrip['plaza']; ?></td>
					<td><?php echo $inscrip['ant']; ?></td>
					<td><?php echo $inscrip['fechaing']; ?></td>
					<td><?php echo $inscrip['desemp']; ?></td>
					<td><?php echo $inscrip['nomjefe']; ?></td>
					<td><?php echo $inscrip['emailjef']; ?></td>
					<td><?php echo $inscrip['comp1']; ?></td>
					<td><?php echo $inscrip['email1']; ?></td>
					<td><?php echo $inscrip['comp2']; ?></td>
					<td><?php echo $inscrip['email2']; ?></td>
					<td><?php echo $inscrip['curs']; ?></td>
					
				</tr>
			<?php}?>
		</tbody>
		</table>
</div>
</body>
</html>
