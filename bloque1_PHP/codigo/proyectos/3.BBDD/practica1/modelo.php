<?php


function conexionDB()
{
    // Con un el método PDO::setAttribute
    try {
        //mariadb -> nombre del contenedor donde está bbdd
        //3306 -> puerto interno del contenedor
        $dsn = "mysql:host=mariadb:3306;dbname=ejemplo";
        $conexion = new PDO($dsn, "usuario", "usuario");
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    return $conexion;
}

function getClientes()
{
    //Conectar a BD
    $conexion = conexionDB();

    $stmt = $conexion->prepare("SELECT * FROM clientes");
    $stmt->execute();
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC); //Array asociativo
    return $clientes;
}

function getClienteById($id)
{
    //Conectar a BD
    $conexion = conexionDB();

    $stmt = $conexion->prepare("SELECT * FROM clientes WHERE id=?");
    $stmt->bindParam(1, $id);
    $stmt->execute();
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC); //Array asociativo

    if (count($clientes) == 1) { //Encontrado
        return $clientes[0];
    } else { //No hay ningún cliente con ese id
        return null;
    }
}

function deleteClienteById($id)
{
    //Conectar a BD
    $conexion = conexionDB();

    $stmt = $conexion->prepare("DELETE FROM clientes WHERE id=?");
    $stmt->bindParam(1, $id);
    $stmt->execute();
}

function deleteAllCliente()
{
    //Conectar a BD
    $conexion = conexionDB();

    $stmt = $conexion->prepare("DELETE FROM clientes");
    $stmt->execute();
}

function insertCliente($nombre, $dni, $email)
{

    //Conectar a BD
    $conexion = conexionDB();

    $stmt = $conexion->prepare("INSERT INTO clientes (nombre,dni,email) VALUES (:nombre, :dni, :email)");
    $stmt->bindValue(':nombre', $nombre);
    $stmt->bindValue(':dni', $dni);
    $stmt->bindValue(':email', $email);
    $stmt->execute();
}
