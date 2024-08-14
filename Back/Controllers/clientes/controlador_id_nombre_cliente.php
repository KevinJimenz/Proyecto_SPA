<?php
include('../../Model/conexion.php');

$conexion = new Conexion();
$conexion ->conectar();
try {
    $consulta = "SELECT id, nombre FROM clientes;";
    $clientes = $conexion->ConsultaCompleja($consulta);
    echo json_encode($clientes);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
