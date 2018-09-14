   <?php

class DatosNegocio {

    private $miConexion;
    private $retorno;

    /**
     * Constructor de la clase
     */
    public function __construct() {
        $this->miConexion = Conexion::singleton();
        $this->retorno = new stdClass();
    }

    /**
     * Método para retornar los datos del empleado que inicia sesion
     * @param stdClass $usuario
     * @return type
     */
    public function iniciarSesion(stdClass $usuario) {
        try {
            $consulta = "SELECT personas.perIdentificacion, personas.perNombres, personas.perApellidos,"
                    . " empleados.idEmpleado, usuarios.usuRol FROM personas"
                    . " INNER JOIN empleados ON empleados.empPersona = personas.idPersona"
                    . " INNER JOIN usuarios ON usuarios.usuEmpleado=empleados.idEmpleado"
                    . " WHERE usuarios.usuUsuario=? and usuarios.usuPassword=?";

            $resultado = $this->miConexion->prepare($consulta);
            $resultado->bindParam(1, $usuario->login);
            $resultado->bindParam(2, md5($usuario->password));
            $resultado->execute();

            $retorno->estado = true;
            $retorno->datos = $resultado;
            $retorno->mensaje = "Datos del empleado";
        } catch (PDOException $ex) {
            $retorno->estado = false;
            $retorno->datos = null;
            $retorno->mensaje = $ex->getMessage();
        }
        return $retorno;
    }

}
