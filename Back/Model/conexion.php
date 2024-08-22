<?php
class Conexion {
    private $host = "localhost";
    private $dbname = "bd_spa";
    private $usuario = "root";
    private $contrasena = "";
    private $conexion;

    // Método para establecer la conexión a la base de datos
    public function conectar() {
        try {
            // Solo establecer la conexión si no está ya conectada
            if ($this->conexion === null) {
                $this->conexion = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->usuario, $this->contrasena);
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return $this->conexion;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    // Método para desconectar la base de datos
    public function desconectar() {
        try {
            // Verificar si la conexión está establecida y cerrarla
            if ($this->conexion !== null) {
                $this->conexion = null;
            }
        } catch (PDOException $e) {
            echo "Error al desconectar la base de datos: " . $e->getMessage();
        }
    }

    // Método para preparar una consulta SQL
    public function prepare($sql) {
        // Asegurarse de que la conexión esté establecida antes de preparar la consulta
        $this->conectar();
        return $this->conexion->prepare($sql);
    }

    // Método para consultas simples (INSERT, UPDATE, DELETE)
    public function consultaSimple($consulta) {
        try {
            // Establecer la conexión
            $this->conectar();
    
            // Preparar y ejecutar la consulta
            $stmt = $this->conexion->prepare($consulta);
            $stmt->execute();
    
            // Cerrar la conexión
            $this->desconectar();
    
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Método para consultas complejas (SELECT)
    public function consultaCompleja($consulta) {
        try {
            // Establecer la conexión
            $this->conectar();
    
            // Preparar y ejecutar la consulta
            $stmt = $this->conexion->prepare($consulta);
            $stmt->execute();
    
            // Obtener los resultados
            $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Cerrar la conexión
            $this->desconectar();
    
            return $resultado;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
?>