<?php
session_start();

require_once("modelo.php");

//Formulario de Login
if (isset($_REQUEST["login"])) {
    //Habría que validar en BBDD que el password sea correcto

    //Grabamos en la sesión el email logueado
    $_SESSION['usuario'] = $_REQUEST['email'];

    header("Location: clientes.php");
}

//Formulario de nuevo cliente
if (isset($_REQUEST["nuevoCliente"])) {
    insertCliente($_REQUEST['nombre'], $_REQUEST['dni'], $_REQUEST['email']);
    header("Location: clientes.php");
}

//Formulario de eliminar todos los clientes
if (isset($_REQUEST["eliminarClientes"])) {
    deleteAllCliente();
    header("Location: clientes.php");
}

//Formulario de nueva incidencia
if (isset($_REQUEST["nuevaIncidencia"])) {
    $incidencia = array("id" => $_REQUEST["id"], "dni" => $_REQUEST["dni"], "descr" => $_REQUEST["descr"]);
    array_push($_SESSION['incidencias'], $incidencia);
    header("Location: incidencias.php");
}

//Formulario de eliminar todas las incidencias
if (isset($_REQUEST["eliminarIncidencias"])) {
    $_SESSION['incidencias'] = array();
    header("Location: incidencias.php");
}


//Acciones por URL - GET
if (isset($_REQUEST['accion'])) {
    switch ($_REQUEST['accion']) {
        //Cerrar sesión y redirigir a login.php
        case 'cerrarsesion':
            session_destroy();
            header("Location: login.php");
            break;
        //Eliminar cliente
        case 'delCliente':
            //Eliminamos el cliente con ese id de bbdd
            $idCliente = $_REQUEST['id'];
            deleteClienteById($idCliente);

            header("Location: clientes.php");
            break;
        //Eliminar incidencia
        case 'delIncidencia':
            //Eliminamos la posición indicada del array
            $posicion = $_REQUEST['posicion'];
            unset($_SESSION['incidencias'][$posicion]);
            $_SESSION['incidencias'] = array_values($_SESSION['incidencias']); //Regenerar índices y no dejar huecos

            header("Location: incidencias.php");
            break;
        //Ver incidencia en detalle
        case 'verIncidencia':
            $idIncidencia = $_REQUEST['id'];
            //Buscamos la incidencia por su ID en la sesión
            foreach ($_SESSION['incidencias'] as $incidencia) {
                if (strcmp($incidencia['id'], $idIncidencia) == 0) {
                    $dni = $incidencia['dni'];
                    $descr = $incidencia['descr'];
                }
            }

            header("Location: verIncidencia.php?id=" . $idIncidencia . "&dni=" . $dni . "&descr=" . $descr);

            break;

        //Ver cliente en detalle
        case 'verCliente':
            $idCliente = $_REQUEST['id'];
            //Buscamos el cliente por id en la bbdd
            $cliente = getClienteById($idCliente);

            if ($cliente != null) {
                header("Location: verCliente.php?dni=" . $cliente['dni'] . "&nombre=" . $cliente['nombre'] . "&email=" . $cliente['email'] . "&direccion=" . $cliente['direccion'] . "&telefono=" . $cliente['telefono']);
            } else {
                header("Location: verCliente.php");
            }

            break;

        //Generar informe de incidencias
        case 'generarInformeIncidencias':
            header("Location: informeIncidencias.php");
            break;

        default:
            # code...
            break;
    }
}
