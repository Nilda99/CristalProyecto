<?php
class Usuario
{
 //propiedades de la clase usuario
 public $idUsuario;
 public $idSucursal;
 public $idRol;
 public $ciUsuario;
 public $primerNombre;
 public $segundoNombre;
 public $apellidoPaterno;
 public $apellidoMaterno;
 public $genero;
 public $direccion;
 public $fechaNacimiento;
 public $telefonoFijo;
 public $celular;
 public $usuario;
 public $contrasenia;
 public $activo;
 public $fechaCreacion;
 public $fechaActualizacion;

 public $nombreCompleto;
    //constructor
    function __construct()
    { 
        //llamando a la clase conexion
      $this->conexion= new Conexion();
    }

    //funciones SET del Usuario, se colocan los datos
    public function setIdCliente($idUsuario){$this->idUsuario = $idUsuario;}
    public function setIdSucursal($idSucursal){$this->idSucursal  = $idSucursal;}
    public function setIdRol($idRol){$this->idRol=$idRol;}
    public function setCiUsuario($ciUsuario){$this->ciUsuario = $ciUsuario;}
    public function setPrimerNombre($primerNombre){$this->primerNombre = $primerNombre;}
    public function setSegundoNombre($segundoNombre){$this->segundoNombre = $segundoNombre;}
    public function setApellidoPaterno($apellidoPaterno){$this->apellidoPaterno = $apellidoPaterno;}
    public function setApellidoMaterno($apellidoMaterno){$this->apellidoMaterno = $apellidoMaterno;}
    public function setGenero($genero){$this->genero=$genero;}
    public function setDireccion($direccion){$this->direccion=$direccion;}
    public function setFechaNacimiento($fechaNacimiento){$this->fechaNacimiento=$fechaNacimiento;}
    public function setTelefonoFijo($telefonoFijo){$this->telefonoFijo=$telefonoFijo;}
    public function setCelular($celular){$this->celular=$celular;}
    public function setUsuario($usuario){$this->usuario=$usuario;}
    public function setContrasenia($contrasenia){$this->contrasenia=$contrasenia;}
    public function setActivo($activo){$this->activo=$activo;}
    public function setFechaCreacion($fechaCreacion){$this->fechaCreacion=$fechaCreacion;}
    public function setFechaActualizacion($fechaActualizacion){$this->fechaActualizacion=$fechaActualizacion;}
    
    public function setNombreCompleto($nombreCompleto){$this->nombreCompleto = $nombreCompleto;}

    //funciones GET del cliente, devuelven los datos
    public function getIdUsuario(){return $this->idUsuario;}
    public function getIdSucursal(){return $this->idSucursal;}
    public function getIdRol(){return $this->idRol;}
    public function getCiUsuario(){return $this->ciUsuario;}
    public function getPrimerNombre(){return $this->primerNombre;}
    public function getSegundoNombre(){return $this->segundoNombre;}
    public function getApellidoPaterno(){return $this->apellidoPaterno;}
    public function getApellidoMaterno(){return $this->apellidoMaterno;}
    public function getGenero(){return $this->genero;}  
    public function getDireccion(){return $this->direccion;} 
    public function getFechaNacimiento(){return $this->fechaNacimiento;} 
    public function getTelefonoFijo(){return $this->telefonoFijo;}   
    public function getCelular(){return $this->celular;}
    public function getUsuario(){return $this->usuario;}
    public function getContrasenia(){return $this->contrasenia;}
    public function getActivo(){return $this->activo;}  
    public function getFechaCreacion(){return $this->fechaCreacion;} 
    public function getFechaActualizacion(){return $this->fechaActualizacion;}     
  
    public function getNombreCompleto(){return $this->nombreCompleto;}

    // funciones para hacer consultas
    // funciones de seleccion

    public function listaDeUsuario($idSucursal)// ´para  listar todos lis clientes
        {
            $sqlListaDeUsuario = "
              SELECT u.idUsuario,u.idSucursal,u.idRol,u.ci,
                   concat_ws(' ',u.apellidoPaterno,u.apellidoMaterno,u.primerNombre,u.segundoNombre)as NombreCompleto,u.ci,u.genero
                   ,u.usuario,u.activo,u.fotografia

            FROM sucursal s join usuario u on s.idSucursal = u.idSucursal
            join   rol r
            where s.idSucursal = :idSucursal
	 	 group by NombreCompleto
	         ORDER BY u.apellidoPaterno,u.apellidoMaterno,u.primerNombre,u.segundoNombre; ";
            //preparando para ejecutar la consulta.
            $cmd = $this->conexion->prepare($sqlListaDeUsuario);
            $cmd->bindParam(':idSucursal', $idSucursal);



            //ejecuta la consulta
            $cmd->execute();
            //variable para recibir la consulta en un areglo
            $listaDeUsuariosDeLaConsulta = $cmd->fetchAll();

            return $listaDeUsuariosDeLaConsulta;

        }//end function

   public function listaDeUsuarioDadoIdSucursal($idSucursal)//para editar 
        {
            $sqlListaDeUsuario = "
            SELECT u.idUsuario,u.idSucursal,u.idRol,u.ci,
            u.apellidoPaterno,u.apellidoMaterno,u.primerNombre,u.segundoNombre,u.genero,u.direccion,u.FechaNacimiento,u.telefonoFijo,
            u.celular,u.usuario,u.contrasenia,u.activo,u.fechaCreacion,u.fechaActualizacion

            FROM sucursal s join usuario u 
            join   rol r

            WHERE s.idSucursal = u.idSucursal AND s.idSucursal = :codigoSucursal
            ORDER BY u.apellidoPaterno,u.apellidoMaterno,u.primerNombre,u.segundoNombre;
                         ";

            $cmd = $this->conexion->prepare($sqlListaDeUsuario);
            //asignando el valor de la sucursal
            $cmd->bindParam(':codigoSucursal', $idSucursal);
            //ejecuta la consulta
            $cmd->execute();
            //variable para recibir la consulta en un areglo
            $listaDeUsuariosDeLaConsulta = $cmd->fetchAll();

            return $listaDeUsuariosDeLaConsulta;
        }//end functionz

 public function registrarUsuario($idSucursal,$idRol,$ci,$primerNombre,$segundoNombre,$apellidoPaterno,
                                  $apellidoMaterno,$genero,$direccion,$fechaNacimiento,$telefonoFijo,$celular,
                                  $usuario,$contrasenia,$activo,$fotografia)
    {
        $sqlInsertarUsuario = "
                                INSERT INTO usuario(idSucursal,idRol,ci,primerNombre,segundoNombre,apellidoPaterno,apellidoMaterno,genero,direccion,fechaNacimiento,telefonoFijo,celular,usuario,contrasenia,activo,fotografia) 
                                VALUES (:idSucursal,:idRol,:ci,:primerNombre,:segundoNombre,:apellidoPaterno,:apellidoMaterno,:genero,:direccion,:fechaNacimiento,:telefonoFijo,:celular,:usuario,:contrasenia,:activo,:fotografia);
                              ";

        try{
                $cmd = $this->conexion->prepare($sqlInsertarUsuario);
                $cmd->bindParam(':idSucursal', $idSucursal);
                $cmd->bindParam(':idRol', $idRol);
                $cmd->bindParam(':ci', $ci);
                $cmd->bindParam(':primerNombre', $primerNombre);
                $cmd->bindParam(':segundoNombre', $segundoNombre);
                $cmd->bindParam(':apellidoPaterno', $apellidoPaterno);
                $cmd->bindParam(':apellidoMaterno', $apellidoMaterno);
                $cmd->bindParam(':genero', $genero);
                $cmd->bindParam(':direccion', $direccion);
                $cmd->bindParam(':fechaNacimiento', $fechaNacimiento);
                $cmd->bindParam(':telefonoFijo', $telefonoFijo);
                $cmd->bindParam(':celular', $celular);
                $cmd->bindParam(':usuario', $usuario);
                $cmd->bindParam(':contrasenia', $contrasenia);
                $cmd->bindParam(':activo', $activo);
                $cmd->bindParam(':fotografia',$fotografia);
                $cmd->execute();
                return $this->conexion->lastInsertId();

        }catch(PDOException $e){
            echo 'ERROR: No se logro realizar la nueva inserción - '.$e->getMesage();
            exit();
            return 0;
        }
    }//end function
    public function verificarUsuarioContrasenia($usuario,$contrasenia)
    {
        // $sqlVerificarUsuario = "
        // SELECT *
        // FROM usuario
        // WHERE usuario = :usuario AND contrasenia = :contrasenia;
        //                     ";
        $sqlVerificarUsuario="CALL sp_VerificarUsuarioContrasenia(:usuario,:contrasenia);";
        //preparando para ejecutar la consulta.
        $cmd = $this->conexion->prepare($sqlVerificarUsuario);
        //asignando los valores de los parametros
        $cmd->bindParam(':usuario', $usuario);
        $cmd->bindParam(':contrasenia', $contrasenia);
        //ejecuta la consulta
        $cmd->execute();
        //variable para recibir la consulta en un areglo
        $registroUsuario = $cmd->fetch();
        if($registroUsuario){
            return $registroUsuario;
        }else{
            return false;
        }
        // return $registroUsuario;

    }//end function
}
?>