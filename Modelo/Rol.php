
<?php
class Rol
{
    private $idRol;
    private $nombre;
    // public $conexion;
//    private $conexion;
    /**
     * @var Conexion
     */
//    private $conexion;
function __construct()
{
    $this->conexion= new Conexion();
}

    public function listaRoles()
    {
        $sqlListaRoles = "CALL SP_ListaRoles();";

//        $cmd = $this->conexion->prepare($sqlListaRoles);
        $cmd = $this->conexion->prepare("CALL SP_ListaRoles");
        // ejecuta la conexion
        $cmd->execute();
        //variable para recibir la consulta en un areglo
        $listaRoles = $cmd->fetchAll();
        if ($listaRoles) {
            return $listaRoles;
        } else {
            return false;
        }
    }
}
?>