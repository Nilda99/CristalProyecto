<?php
class Cliente
{
 //propiedades de la clase Cliente
 public $idCliente;
 public $idSucursal;
 public $ciCliente;
 public $nit;
 public $primerNombre;
 public $segundoNombre;
 public $apellidoPaterno;
 public $apellidoMaterno;

 public $nombreCompleto;
    //constructor
    function __construct()
    { 
        //llamando a la clase conexion
        $this->conexion =  new Conexion();
    }

    //funciones SET del cliente, se colocan los datos
    public function setIdCliente($idCliente){$this->idCliente = $idCliente;}
    public function setIdSucursal($idSucursal){$this->idSucursal  = $idSucursal;}
    public function setCiCliente($ciCliente){$this->ciCliente = $ciCliente;}
    public function setNit($nit){$this->nit  = $nit;}
    public function setPrimerNombre($primerNombre){$this->primerNombre = $primerNombre;}
    public function setSegundoNombre($segundoNombre){$this->segundoNombre = $segundoNombre;}
    public function setApellidoPaterno($apellidoPaterno){$this->apellidoPaterno = $apellidoPaterno;}
    public function setApellidoMaterno($apellidoMaterno){$this->apellidoMaterno = $apellidoMaterno;}
    
    public function setNombreCompleto($nombreCompleto){$this->nombreCompleto = $nombreCompleto;}

    //funciones GET del cliente, devuelven los datos
    public function getIdCliente(){return $this->idCliente;}
    public function getIdSucursal(){return $this->idSucursal;}
    public function getCiCliente(){return $this->ciCliente;}
    public function getNit(){return $this->nit;}  
    public function getPrimerNombre(){return $this->primerNombre;}
    public function getSegundoNombre(){return $this->segundoNombre;}
    public function getApellidoPaterno(){return $this->apellidoPaterno;}
    public function getApellidoMaterno(){return $this->apellidoMaterno;}
  
    public function getNombreCompleto(){return $this->nombreCompleto;}

    // funciones para hacer consultas
    // funciones de seleccion

    public function listaDeClientes()// ´para  listar todos lis clientes
        {
            $sqlListaDeClientes = "
            SELECT c.idCliente,c.idSucursal,c.ci,c.nit,
                   c.apellidoPaterno,c.apellidoMaterno,c.primerNombre,c.segundoNombre
            FROM sucursal s join cliente c
            WHERE s.idSucursal = c.idSucursal AND s.idSucursal = 1
            ORDER BY c.apellidoPaterno,c.apellidoMaterno,c.primerNombre,c.segundoNombre;
                                ";
            //preparando para ejecutar la consulta.
            $cmd = $this->conexion->prepare($sqlListaDeClientes);
            //ejecuta la consulta
            $cmd->execute();
            //variable para recibir la consulta en un areglo
            $listaDeClientesDeLaConsulta = $cmd->fetchAll();

            return $listaDeClientesDeLaConsulta;

        }//end function

   public function listaDeClientesDadoIdSucursal($idSucursal)//para editar 
        {
            $sqlListaDeClientes = "
            SELECT c.idCliente,c.idSucursal,c.ci,c.nit,
                   CONCAT_WS(' ',c.apellidoPaterno,c.apellidoMaterno,c.primerNombre,c.segundoNombre) AS nombreCompleto 
            FROM sucursal s join cliente c
            WHERE s.idSucursal = c.idSucursal AND s.idSucursal = :codigoSucursal
            ORDER BY c.apellidoPaterno,c.apellidoMaterno,c.primerNombre,c.segundoNombre;

                                ";

            $cmd = $this->conexion->prepare($sqlListaDeClientes);
            //asignando el valor de la sucursal
            $cmd->bindParam(':codigoSucursal', $idSucursal);
            //ejecuta la consulta
            $cmd->execute();
            //variable para recibir la consulta en un areglo
            $listaDeClientesDeLaConsulta = $cmd->fetchAll();

            return $listaDeClientesDeLaConsulta;
        }//end function

 public function registrarCliente($idSucursal,$ci,$nit,$primerNombre,$segundoNombre,$apellidoPaterno,$apellidoMaterno) 
    {
        $sqlInsertarCliente = "
                                INSERT INTO cliente(idSucursal,ci,nit,primerNombre,segundoNombre,apellidoPaterno,apellidoMaterno) 
                                VALUES (:idSucursal,:ci,:nit,:primerNombre,:segundoNombre,:apellidoPaterno,:apellidoMaterno);
                              ";

        try{
                $cmd = $this->conexion->prepare($sqlInsertarCliente);
                $cmd->bindParam(':idSucursal', $idSucursal);
                $cmd->bindParam(':ci', $ci);
                $cmd->bindParam(':nit', $nit);
                $cmd->bindParam(':primerNombre', $primerNombre);
                $cmd->bindParam(':segundoNombre', $segundoNombre);
                $cmd->bindParam(':apellidoPaterno', $apellidoPaterno);
                $cmd->bindParam(':apellidoMaterno', $apellidoMaterno);
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