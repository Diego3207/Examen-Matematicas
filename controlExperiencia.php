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
	$experiencia=$experienciaObtenida+$experiencia;
	if($experiencia>=500){
		$experiencia=500;
	}
	return $experiencia;
}
function calcularExperienciaNivel2($porcentaje,$experiencia){
	switch($porcentaje){
		case 100:
			$experienciaObtenida=20;
			break;
		case 90:
			$experienciaObtenida=18;
			break;
		case 80:
			$experienciaObtenida=16;
			break;
		case 70:
			$experienciaObtenida=14;
			break;
		case 60:
			$experienciaObtenida=12;
			break;
		case 50:
			$experienciaObtenida=10;
			break;
		case 40:
			$experienciaObtenida=8;
			break;
		case 30:
			$experienciaObtenida=6;
			break;
		case 20:
			$experienciaObtenida=4;
			break;
		case 10:
			$experienciaObtenida=2;
			break;
	}
	$experiencia=$experienciaObtenida+$experiencia;
	if($experiencia>=500){
		$experiencia=500;
	}
	return $experiencia;
}
function calcularExperienciaNivel3($porcentaje,$experiencia){
	switch($porcentaje){
		case 100:
			$experienciaObtenida=30;
			break;
		case 90:
			$experienciaObtenida=27;
			break;
		case 80:
			$experienciaObtenida=24;
			break;
		case 70:
			$experienciaObtenida=21;
			break;
		case 60:
			$experienciaObtenida=18;
			break;
		case 50:
			$experienciaObtenida=15;
			break;
		case 40:
			$experienciaObtenida=12;
			break;
		case 30:
			$experienciaObtenida=9;
			break;
		case 20:
			$experienciaObtenida=6;
			break;
		case 10:
			$experienciaObtenida=3;
			break;
	}
	$experiencia=$experienciaObtenida+$experiencia;
	if($experiencia>=500){
		$experiencia=500;
	}
	return $experiencia;
}
function calcularNivel($nivel,$experiencia){
	echo "Nivel: ".$nivel."<br>";
	echo "Exp: ".$experiencia."<br>";
	switch($experiencia){
	case ($experiencia>=50 and $nivel==1):
			$nivel=2;
			$experiencia=0;
			break;
		case ($experiencia>=100 and $nivel==2):
			$nivel=3;
			$experiencia=0;
			break;
		case ($experiencia>=150 and $nivel==3):
			$nivel=4;
			$experiencia=0;
			break;
		case ($experiencia>=200 and $nivel==4):
			$nivel=5;
			$experiencia=0;
			break;
		case ($experiencia>=250 and $nivel==5):
			$nivel=6;
			$experiencia=0;
			break;
		case ($experiencia>=300 and $nivel==6):
			$nivel=7;
			$experiencia=0;
			break;
		case ($experiencia>=350 and $nivel==7):
			$nivel=8;
			$experiencia=0;
			break;
		case ($experiencia>=400 and $nivel==8):
			$nivel=9;
			$experiencia=0;
			break;
		case ($experiencia>=450 and $nivel==9):
			$nivel=10;
			$experiencia=0;
			break;
	}
	return [$nivel,$experiencia];
}
?>
