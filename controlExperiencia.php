<?php
function calcularExperienciaNivel1($porcentaje,$experiencia){
	switch($porcentaje){
		case 100:
			$experienciaObtenida=10;
			break;
		case 90:
			$experienciaObtenida=9;
			break;
		case 80:
			$experienciaObtenida=8;
			break;
		case 70:
			$experienciaObtenida=7;
			break;
		case 60:
			$experienciaObtenida=6;
			break;
		case 50:
			$experienciaObtenida=5;
			break;
		case 40:
			$experienciaObtenida=4;
			break;
		case 30:
			$experienciaObtenida=3;
			break;
		case 20:
			$experienciaObtenida=2;
			break;
		case 10:
			$experienciaObtenida=1;
			break;
	}
	echo "experiencia anterior: ".$experiencia." ";
	while($experiencia<500){
		$experiencia=$experienciaObtenida+$experiencia;
	}
	echo "experiencia despues: ".$experiencia."<br>";
	return $experiencia;
}
function calcularNivel($nivel,$experiencia){
	echo "Nivel: ".$nivel."<br>";
	echo "Exp: ".$experiencia;
	switch($experiencia){
		case 50:
			$nivel=2;
			break;
		case 100:
			$nivel=3;
			break;
		case 150:
			$nivel=4;
			break;
		case 200:
			$nivel=5;
			break;
		case 250:
			$nivel=6;
			break;
		case 300:
			$nivel=7;
			break;
		case 350:
			$nivel=8;
			break;
		case 400:
			$nivel=9;
			break;
		case 450:
			$nivel=10;
			break;
	}
	return $nivel;
}
?>
