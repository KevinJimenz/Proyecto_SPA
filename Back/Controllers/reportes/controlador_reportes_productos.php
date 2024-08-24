<?php
include('../../Model/conexion.php');

$conexion = new Conexion();

$conexion -> conectar();

try {
    $consulta = "SELECT productos.descripcion , productos.stock, COUNT(id_Producto) as consumidos FROM citas inner join servicios on id_Servicio = servicios.id inner join productos on servicios.id_Producto = productos.id GROUP BY id_Producto";
    $data = $conexion->ConsultaCompleja($consulta);
    echo json_encode($data);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
