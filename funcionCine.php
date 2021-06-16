<?php

use funcionCine as GlobalFuncionCine;

class funcionCine extends funcion{

    private $genero;
    private $pais;

    // public function __construct($nombre, $horario,$duracion, $precio,$genero,$pais){
    //     parent::__construct($nombre, $horario,$duracion, $precio);
    //     $this->genero=$genero;
    //     $this->pais=$pais;
    // }
    public function __construct(){
        parent::__construct();
        $this->genero="";
        $this->pais="";
    }

    /**
     * Get 
     */ 
    public function getGenero()
    {
        return $this->genero;
    } 
    public function getPais()
    {
        return $this->pais;
    }

     /**
     * Set 
     */ 
    public function setGenero($genero)
    {
        $this->genero = $genero;
    }
   
    public function setPais($pais)
    {
        $this->pais = $pais;
    }

    public function __toString()
    {
        $cadena=parent::__toString();
        $cadena.=" genero: ".$this->getGenero();
        $cadena.=" Pais: ".$this->getPais()."\n";
        return $cadena;
    }

    public function incrementar(){
        $valor= $this->getPrecio()+ $this->getPrecio()*0.65;
       return $valor;
    }
    
	// public function cargar($idfuncion,$idteatro,$nombre,$hora,$duracion,$precio,$genero,$pais){	
	//     parent::cargar($idfuncion,$idteatro,$nombre,$hora,$duracion,$precio);
	//     $this->setGenero($genero);
	//     $this->setPais($pais);
    // }
	public function cargar($datosTeatro){
		$datos=array('idfuncion' => $datosTeatro['idfuncion'],'idteatro'=>$datosTeatro['idteatro'],'nombre'=>$datosTeatro['nombre'],'hora'=>$datosTeatro['hora'],'duracion'=>$datosTeatro['duracion'],'precio'=>$datosTeatro['precio']);
		parent::cargar($datos);      
		$this->setGenero($datosTeatro['genero']);
        $this->setPais($datosTeatro['origen']);
    }

    public function Buscar($idfuncion){
		$base=new BaseDatos();
		$consulta="Select * from cine where idfuncion=".$idfuncion;
		$resp= false;
		if($base->Iniciar()){
		    if($base->Ejecutar($consulta)){
				if($row2=$base->Registro()){	
				    parent::Buscar($idfuncion);
				    $this->setGenero($row2['genero']);
				    $this->setPais($row2['origen']);
					$resp= true;
				}				
			
		 	}	else {
		 			$this->setmensajeoperacion($base->getError());
		 		
			}
		 }	else {
		 		$this->setmensajeoperacion($base->getError());
		 	
		 }		
		 return $resp;
	}	

    public static function listar($condicion=""){
	    $arreglo = null;
		$base=new BaseDatos();
		$consulta="Select * from funcion ";
		
		if ($condicion!=""){
		    $consulta=$consulta.' where '.$condicion;
		}
		$consulta.=" order by idfuncion ";
		// echo $consulta;
		if($base->Iniciar()){
		    if($base->Ejecutar($consulta)){				
				$arreglo= array();
				while($row2=$base->Registro()){
					$obj=new FuncionCine();
					$obj->Buscar($row2['idfuncion']);
					if($obj->getIdfuncion()!=0){
					array_push($arreglo,$obj);}
				}
		 	}	
		 }
		 
		 return $arreglo;
	}	

	public function insertar(){
		$base=new BaseDatos();
		$resp= false;
		
		if(parent::insertar()){ 
		    $consultaInsertar="INSERT INTO cine(idfuncion,genero, origen)
				VALUES (".parent::getIdfuncion().",'".$this->getGenero()."','".$this->getPais()."')";
                // echo($consultaInsertar);
		    if($base->Iniciar()){
		        if($base->Ejecutar($consultaInsertar)){
		            $resp=  true;
		        }	else {
		            $this->setmensajeoperacion($base->getError());
		        }
		    } else {
		        $this->setmensajeoperacion($base->getError());
		    }
		 }
		return $resp;
	}

    public function modificar(){
	    $resp =false; 
	    $base=new BaseDatos();
	    if(parent::modificar()){
	        $consultaModifica="UPDATE cine SET genero='".$this->getGenero()."',origen='".$this->getPais()."' WHERE idfuncion=". parent::getIdfuncion ();
			// echo $consultaModifica;
	        if($base->Iniciar()){
	            if($base->Ejecutar($consultaModifica)){
	                $resp=  true;
	            }else{
	                $this->setmensajeoperacion($base->getError());
	                
	            }
	        }else{
	            $this->setmensajeoperacion($base->getError());
	            
	        }
	    }
		
		return $resp;
	}

    public function eliminar(){
		$base=new BaseDatos();
		$resp=false;
		if($base->Iniciar()){
				$consultaBorra="DELETE FROM cine WHERE idfuncion=".parent::getIdfuncion();
				if($base->Ejecutar($consultaBorra)){
				    if(parent::eliminar()){
				        $resp=  true;
				    }
				}else{
						$this->setmensajeoperacion($base->getError());
					
				}
		}else{
				$this->setmensajeoperacion($base->getError());
			
		}
		return $resp; 
	}
}