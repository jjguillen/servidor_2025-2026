<?php

//Autocargar las clases --------------------------
spl_autoload_register(function ($class) {
    echo "Cargando la clase: " . $class . "<br>";
    //echo substr($class, strpos($class, "\\") + 1) . "<br>";
    $ruta = substr($class, strpos($class, "\\") + 1);
    $ruta = substr($ruta, strpos($ruta, "\\") + 1);
    //$ruta = str_replace("\\", "/", $ruta);
    //echo "Ruta: " . $ruta . "<br>";
    include_once "./" . $ruta . ".php";
});
//Fin Autcargar ----------------------------------

use Agrotech\MiApp\Finca;

$finca1 = new Finca("Id-001", "Mifinca", "Olivo");

echo $finca1;
