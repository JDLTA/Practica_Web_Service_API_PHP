<?php

	$conexion = mysqli_connect("localhost", "root", "", "escuela_web")
							or die(mysql_error());
	$respuesta = array();

	$sql = "SELECT * FROM alumnos";
	$consulta = mysqli_query($conexion, $sql);

	if (mysqli_num_rows($consulta) > 0) {
		$respuesta['alumnos'] = array();
		while ($fila = mysqli_fetch_assoc($consulta)) {
			$alumno = array();

			$alumno["nc"] = $fila["Num_Control"];
			$alumno["n"] = $fila["Nombre_Alumno"];
			$alumno["pa"] = $fila["Primer_Ap_Alumno"];
			$alumno["sa"] = $fila["Segundo_Ap_Alumno"];
			$alumno["e"] = $fila["Edad"];
			$alumno["s"] = $fila["Semestre"];
			$alumno["c"] = $fila["Carrera"];
			array_push($respuesta["alumnos"], $alumno);
		}
		$respuesta['exito'] = 1;
		echo json_encode($respuesta);
	}else{
		$respuesta['exito'] = 0;
		$respuesta['msj'] = "No hay registros";
		echo json_encode($respuesta);
	}
?>