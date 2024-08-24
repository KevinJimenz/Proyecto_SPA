<?php 

include('../../../Model/conexion.php');

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$pass = md5($_POST['pass']);
$id_Rol = $_POST['id_Rol'];

$conexion = new Conexion();
$conexion->conectar();

try {
    // Validar Correo
    $validar_Correo = "SELECT * FROM usuarios WHERE correo = '".$correo."'";
    $stmt_Validar = $conexion -> consultaCompleja($validar_Correo);

    if (count($stmt_Validar) > 0 )
    {
        $message = array (
            'access' => false,
            'message' => 'El correo ya se encuentra registrado'
        );
        echo json_encode($message);
    }
    else
    {
        $consulta = "INSERT INTO usuarios (nombre, apellido, correo, telefono, password,  id_Rol) VALUES (:nombre, :apellido, :correo, :telefono, :pass, :id_Rol )";
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':nombre',$nombre, PDO::PARAM_STR);
        $stmt->bindParam(':apellido',$apellido, PDO::PARAM_STR);
        $stmt->bindParam(':correo',$correo, PDO::PARAM_STR);
        $stmt->bindParam(':telefono',$telefono, PDO::PARAM_INT);
        $stmt->bindParam(':pass',$pass, PDO::PARAM_STR);
        $stmt->bindParam(':id_Rol',$id_Rol, PDO::PARAM_INT);
        $resultado = $stmt->execute();

        if ($resultado) 
        {
            $message = array (
                'access' => true,
                'message' => 'Usuario creado exitosamente'
            );
            echo json_encode($message);
        } 
        else 
        {
            $message = array (
                'access' => false,
                'message' => 'Error en la insercion'
            );
            echo json_encode($message);
        }
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $conexion->Desconectar();
}