<?php

include_once "Finca.php";

$finca1 = new Finca("FI_0001", "Finca La Ermita", "Lechugas");
$obj_serializado = serialize($finca1); // Convertir objeto a cadena

echo "Objeto serializado: " . $obj_serializado . "<br>";

$finca2 = unserialize($obj_serializado); //Convertir cadena a objeto

$finca2->setNombre("Finca Deserializada");
echo "Objeto deserializado: " . $finca2->getNombre() . "<br>";
