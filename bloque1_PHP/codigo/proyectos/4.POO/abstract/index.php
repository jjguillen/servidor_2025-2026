<?php

//Autocargar las clases --------------------------
spl_autoload_register(function ($class) {
    //echo substr($class, strpos($class, "\\"));
    //$ruta = substr($class, strpos($class, "\\"));
    //$ruta = str_replace("\\", "/", $ruta);
    include_once "./" . $class . ".php";
});
//Fin Autcargar ----------------------------------

$c1 = new CuentaRemunerada("ES0032-4441-2223", 1000, 2);
$c2 = new CuentaCorriente("ES0032-4441-9874", 2000);

echo $c1->tipoInteres() . "<br>";
echo $c2->tipoInteres() . "<br>";


$cuentas = array();
array_push($cuentas, $c1);
array_push($cuentas, $c2);

foreach ($cuentas as $key => $value) {
    echo $value . "<br>";
}

$c1->retirar(500);
echo $c1 . "<br>";

$c2->retirar(2001);
echo $c2 . "<br>";
