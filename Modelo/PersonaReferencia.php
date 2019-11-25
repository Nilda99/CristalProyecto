<?php
class PersonaReferencia
{
 //propiedades de la clase
 public $ciPersonaReferencia;
 public $idSucursal;
 public $primerNombre;
 public $segundoNombre;
 public $apellidoPaterno;
 public $apellidoMaterno;
 public $telefono;

 public $nombreCompleto;
    //constructor
    function __construct()
    { 
        //llamando a la clase conexion
        $this->conexion =  new Conexion();
    }

    //funciones SET del cliente, se colocan los datos
    public function setCiPersonaReferncia($ciPersonaReferencia){$this->ciPersonaReferencia = $ciPersonaReferencia;}
    public function setIdSucursal($idSucursal){$this->idSucursal  = $idSucursal;}
    public function setPrimerNombre($primerNombre){$this->primerNombre = $primerNombre;}
    public function setSegundoNombre($segundoNombre){$this->segundoNombre = $segundoNombre;}
    public function setApellidoPaterno($apellidoPaterno){$this->apellidoPaterno = $apellidoPaterno;}
    public function setApellidoMaterno($apellidoMaterno){$this->apellidoMaterno = $apellidoMaterno;}
    public function setTelefono($telefono){$this->telefono = $telefono;}
    
    public function setNombreCompleto($nombreCompleto){$this->nombreCompleto = $nombreCompleto;}

    //funciones GET del cliente, devuelven los datos
    public function getIdCliente(){return $this->ciPersonaReferencia;}
    public function getIdSucursal(){return $this->idSucursal;}
    public function getPrimerNombre(){return $this->primerNombre;}
    public function getSegundoNombre(){return $this->segundoNombre;}
    public function getApellidoPaterno(){return $this->apellidoPaterno;}
    public function getApellidoMaterno(){return $this->apellidoMaterno;}
    public function getTelefono(){return $this->telefono;}
  
    public function getNombreCompleto(){return $this->nombreCompleto;}

    // funciones para hacer consultas
    // funciones de seleccion

//     public function listaDePersonaReferencia()// ´para  listar todos lis clientes
//         {
//             $sqlListaDePersonaReferencia = "CALL SP_ListaPersonaReferencia();";
//             //preparando para ejecutar la consulta.
//             $cmd = $this->conexion->prepare(" CALL SP_ListaPersonaReferencia");
//             //ejecuta la consulta
//             $cmd->execute();
//             //variable para recibir la consulta en un areglo
//             $sqlListaDePersonaReferencia = $cmd->fetchAll();
// if($sqlListaDePersonaReferencia){
//     return $sqlListaDePersonaReferencia;
// }else{
//     return false;
// } 
// }//end function

   public function listaDePersonaReferencia($idUsuario)//para editar 
        {
            $sqlListaDePersonaReferencia = "CALL SP_ListaPersonaReferencia(:idUsuario);";

            $cmd = $this->conexion->prepare($sqlListaDePersonaReferencia);
            //asignando el valor de la sucursal
            $cmd->bindParam(':idUsuario', $idUsuario);
            //ejecuta la consulta
            $cmd->execute();
            //variable para recibir la consulta en un areglo
            $listaDeClientesDeLaConsulta = $cmd->fetchAll();

            return $listaDeClientesDeLaConsulta;
        }//end function

 public function registrarPersonaReferencia($idUsuario,$ci,$primerNombre,$segundoNombre,$apellidoPaterno,$apellidoMaterno,
                                            $telefono,$imagenCiAmverso,$imagenCiReverso)
    {
        $sqlInsertarCliente = "
                                INSERT INTO personareferencia(idUsuario, ci, primerNombre,segundoNombre,apellidoPaterno,apellidoMaterno,telefono,imagenCiAmverso,imagenCiReverso) 
                                VALUES (:idUsuario,:ci,:primerNombre,:segundoNombre,:apellidoPaterno,:apellidoMaterno,:telefono,:imagenCiAmverso,:imagenCiReverso);
                              ";

        try{
                $cmd = $this->conexion->prepare($sqlInsertarCliente);
                $cmd->bindParam(':ci', $ci);
                $cmd->bindParam(':idUsuario', $idUsuario);
                $cmd->bindParam(':primerNombre', $primerNombre);
                $cmd->bindParam(':segundoNombre', $segundoNombre);
                $cmd->bindParam(':apellidoPaterno', $apellidoPaterno);
                $cmd->bindParam(':apellidoMaterno', $apellidoMaterno);
                $cmd->bindParam(':telefono', $telefono);
            $cmd->bindParam(':imagenCiAmverso', $imagenCiAmverso);
            $cmd->bindParam(':imagenCiReverso', $imagenCiReverso);
                $cmd->execute();
              return 1;
        }catch(PDOException $e){
            echo 'ERROR: No se logro realizar la nueva inserción - '.$e->getMesage();
            exit();
            return 0;
        }
    }//end function

}
?>