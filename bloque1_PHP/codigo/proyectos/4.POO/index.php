<?php

include "Finca.php";
include "FincaEcologica.php";

$finca1 = new Finca("FI_0001", "Finca La Ermita", "Lechugas");
$finca1->setIdentificador("FI_0002");

echo "Identificador: " . $finca1->getIdentificador() . "<br>";

echo "Tipo Cultivo: " . $finca1->getTipoCultivo() . "<br>";

// $finca1->temperatura = 25; No permitido crear propiedades nuevas en tiempo ejecución

var_dump($finca1);

$finca2 = $finca1;       //DOS VARIABLES APUNTAN A LA MISMA ZONA DE MEMORIA

$finca2->setNombre("Finca rara");

echo "Nombre finca1: " . $finca1->getNombre() . "<br>";

$finca3 = clone $finca1; //GENERA UN NUEVO OBJETO COPIANDO LOS VALORES

$finca3->setNombre("Finca 3");

echo "Nombre finca1: " . $finca1->getNombre() . "<br>";
echo "Nombre finca3: " . $finca3->getNombre() . "<br>";

Finca::$cooperativa = "OTRA COOPERATIVA";

echo "Propiedad static finca3: " . Finca::$cooperativa . "<br>";
echo "Propiedad static finca1: " . Finca::$cooperativa . "<br>";


$finca4 = new FincaEcologica("FI_0005", "Finca Montilla", "Coles", "ISO-9001");

var_dump($finca4);

$finca4->regar();
