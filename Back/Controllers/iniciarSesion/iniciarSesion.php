<?php

    include ('../../Model/conexion.php');
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $conexion = new conexion();
    $conexion -> conectar();
    $mensaje_Validado ;
    try{
        $consulta = "SELECT correo FROM usuarios WHERE correo = :correo" ;
        $stmt = $conexion ->prepare($consulta) ;
        $stmt -> bindParam(':correo', $email, PDO::PARAM_STR);
        $stmt-> execute();

        if($stmt -> rowCount() > 0)
        {
            // Traigo la password de la base de datos y la almaceno
            $consultaPassword = "SELECT password FROM usuarios WHERE correo = '".$email."'";
            $bd_password = $conexion -> ConsultaCompleja($consultaPassword);
            if ( md5($pass) === $bd_password[0]['password'] )
            {
                session_start();
                $_SESSION['acceso'] = true;
                $consulta = "SELECT id as id, CONCAT(nombre, ' ' , apellido) as nombre, id_Rol as rol FROM usuarios WHERE correo = '".$email."' and password = '".md5($pass)."' ;" ;
                $stmt = $conexion ->ConsultaCompleja($consulta) ;
                $mensaje = array (
                    'message' => 'Existe',
                    'data' => $stmt,
                    'route' => '/Front/Views/Access/Admin/Graficos'
                );
                $datos = json_encode($mensaje);
                echo $datos;
            }
            else {
                $mensaje = array (
                    'title' => 'Error',
                    'message' =>  'La contraseña es incorrecta'
                );
                $datos = json_encode($mensaje);
                echo $datos;
            }
        }
        else
        {
            $mensaje= array (
                'message' => 'El usuario no existe' 
            );
            $mensaje_Validado = json_encode($mensaje);
            echo $mensaje_Validado;
        }
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    } finally {
        $conexion->Desconectar();
    }
?>