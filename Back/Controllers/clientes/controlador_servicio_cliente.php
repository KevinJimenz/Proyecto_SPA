<?php
include('../../Model/conexion.php');

$conexion = new Conexion();
$conexion ->conectar();
try {
    $consulta = "SELECT servicios.id , servicios.descripcion_servicio,  CONCAT(terapeutas.nombre , ' ', terapeutas.apellido) FROM servicios inner join terapeutas on servicios.id_Terapeuta = terapeutas.id";
    $clientes = $conexion->ConsultaCompleja($consulta);
    echo json_encode($clientes);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
