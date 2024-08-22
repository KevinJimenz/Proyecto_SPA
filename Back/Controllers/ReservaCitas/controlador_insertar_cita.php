<?php
include('../../Model/conexion.php');

$fecha = $_POST['fecha'];
$horaInicio = $_POST['hora_Inicio'];
$id_cliente = $_POST['id_Cliente'];
$servicios = $_POST['servicio'];
$conexion = new conexion();
$conexion->conectar();

try {
    $minutosPor_Servicio = [];
    $sumaDuracion_servicios = 0;
    $id_Producto = [];
    for ($i=0; $i < count($servicios) ; $i++) { 
        // Traer informacion de los servicios seleccionados
        $getDuration = "SELECT duracion, id_Producto FROM servicios WHERE id = '".$servicios[$i]."' ";
        $stmtDuration = $conexion -> ConsultaCompleja($getDuration);
        $minutosPor_Servicio[$i] = $stmtDuration[0]['duracion'];
        $sumaDuracion_servicios += $stmtDuration[0]['duracion'];
        $id_Producto[$i] = $stmtDuration[0]['id_Producto'];
    }

    $fechaActual = new DateTime(); 
    // a la fecha actual le concateno la hora inicio
    $horaCompleta = $fechaActual->format('Y-m-d') . ' ' . $horaInicio . ':00';
    // luego convierto la fechaActual + la horaInicio a una nueva fecha
    $fechaCompleta = new DateTime($horaCompleta);
    // a la hora de esa nueva fecha le sumo la duracion del servicio en minutos
    $sumaMinutos = $fechaCompleta->modify('+'. $sumaDuracion_servicios . ' minutes');
    // capturo la hora
    $hora_fin = $sumaMinutos -> format("H:i:s");
  
    // Traigo la hora inicio y hora fin de todas las citas
    $consultaVerificacion = "SELECT hora_Inicio, hora_Fin FROM citas WHERE fecha = '".$fecha."'";
    $stmtVerificacion = $conexion->ConsultaCompleja($consultaVerificacion);

    $citaRegistrada = false;

    for ($i=0; $i < count($stmtVerificacion); $i++) { 

        // Acceder a los valores específicos del array
        $horaInicioStored = $stmtVerificacion[$i]['hora_Inicio'];
        $horaFinStored = $stmtVerificacion[$i]['hora_Fin'];
        
        if ( $horaInicio. ':00' === $horaInicioStored && $hora_fin === $horaFinStored ) 
        {
            $citaRegistrada = true;
            break;
        } 
        if ($horaInicio. ':00' >= $horaInicioStored && $horaInicio. ':00' <= $horaFinStored && $hora_fin >= $horaInicioStored && $hora_fin <= $horaFinStored)
        {
            $citaRegistrada = true;
            break;
        }
        if ( $horaInicio. ':00' != $horaInicioStored && $hora_fin != $horaFinStored )
        {
            $citaRegistrada = false;
        }
    }

    if ($citaRegistrada == true) {
        $data = array (
            'access' => false,
            'message' => 'Ya se encuentra una cita registrada en esta hora.'
        );
        echo json_encode($data);
    } 
    else 
    { 
        $horaCompleta = $fechaActual->format('Y-m-d') . ' ' . $horaInicio . ':00';
        // luego convierto la fechaActual + la horaInicio a una nueva fecha
        $nuevaFecha = new DateTime($horaCompleta);

        for ($i=0; $i < count($servicios) ; $i++) { 

           
            $traer_Duracion = "SELECT duracion, id_Producto FROM servicios WHERE id = '".$servicios[$i]."' ";
            $stmt = $conexion -> ConsultaCompleja($traer_Duracion);
            $duracion = $nuevaFecha->modify('+'. $stmt[0]['duracion'] . ' minutes');
            $hora_fin_individual = $duracion -> format("H:i:s");
            // Inserta la cita
            $consultaInsertar = "INSERT INTO citas (fecha, hora_Inicio, hora_Fin, id_Cliente, id_Servicio) VALUES (:fecha, :horaInicio, :horaFin, :id_cliente, :id_Servicio)";
            $stmtInsertar = $conexion->prepare($consultaInsertar);
            $stmtInsertar->bindParam(':fecha', $fecha);
            $stmtInsertar->bindParam(':horaInicio', $horaInicio);
            $stmtInsertar->bindParam(':horaFin', $hora_fin_individual);
            $stmtInsertar->bindParam(':id_cliente', $id_cliente);
            $stmtInsertar->bindParam(':id_Servicio', $servicios[$i]);
            $stmtInsertar->execute();
             // Traigo la ultima hora fin registrada
            $ultima_horaFin = "SELECT hora_Fin FROM `citas`  ORDER BY id DESC LIMIT 1 ";
            $stmt_UltimaHora = $conexion -> ConsultaCompleja($ultima_horaFin);
            $horaInicio = $stmt_UltimaHora[0]['hora_Fin'];
            
        }

        $stock_Producto = [];
        // Traigo todos los stocks de productos
        for ($i=0; $i < count($servicios) ; $i++) { 
            $Traer_stock_Producto = "SELECT stock FROM productos WHERE id = '".$id_Producto[$i]."' ";
            $stmt_stock = $conexion -> ConsultaCompleja($Traer_stock_Producto);
            $stock_Producto[$i] = $stmt_stock[0]['stock'];
        }
        // divido la cantidad de servicios por si mismo para saber la cantidad de producto
        $cantidad_Producto = count($servicios) / count($servicios) ;
        // Le quito a cada stock la cantidad del producto
        for ($i=0; $i < count($servicios) ; $i++) { 
            $stock_Producto[$i] = $stock_Producto[$i] - $cantidad_Producto ;
        }
        // Actulizo el stock
        for ($i=0; $i < count($servicios) ; $i++) { 
            $actuliazar_Stock = "UPDATE productos SET stock = '".$stock_Producto[$i]."' WHERE id = '".$id_Producto[$i]."' ";
            $stmt_Actualizar = $conexion -> ConsultaCompleja($actuliazar_Stock);
        }

        $data = array(
            'access' => true,
            'message' => 'Cita reservada exitosamente',
        );
        echo json_encode($data);
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}