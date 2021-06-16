<?php

class funcionMusical extends funcion{

    private $director;
    private $cantidadpers ;

    // public function __construct($nombre, $horario,$duracion, $precio,$director,$cantidadpers ){
    //     parent::__construct($nombre, $horario,$duracion, $precio);
    //     $this->director=$director;
    //     $this->cantidadpers =$cantidadpers ;
    // }
    public function __construct(){
        parent::__construct();
        $this->director="";
        $this->cantidadpers="";
    }

    /**
     * Get 
     */ 
    public function getdirector()
    {
        return $this->director;
    } 
    public function getcantidadpers ()
    {
        return $this->cantidadpers ;
    }

     /**
     * Set 
     */ 
    public function setdirector($director)
    {
        $this->director = $director;
    }
   
    public function setcantidadpers ($cantidadpers )
    {
        $this->cantidadpers  = $cantidadpers ;
    }

    public function __toString()
    {
        $cadena=parent::__toString();
        $cadena.=" director: ".$this->getdirector();
        $cadena.=" cantidad personas : ".$this->getcantidadpers ()."\n";
        return $cadena;
    }

    public function incrementar(){
        $valor= $this->getPrecio()+ $this->getPrecio()*0.12;
       return $valor;
    }
  
	public function cargar($datosTeatro){
		$datos=array('idfuncion' => $datosTeatro['idfuncion'],'idteatro'=>$datosTeatro['idteatro'],'nombre'=>$datosTeatro['nombre'],'hora'=>$datosTeatro['hora'],'duracion'=>$datosTeatro['duracion'],'precio'=>$datosTeatro['precio']);
		parent::cargar($datos);       
		$this->setdirector($datosTeatro['director']);
        $this->setcantidadpers($datosTeatro['cantpersonas']);
    }

    public function Buscar($idfuncion){
		$base=new BaseDatos();
		$consulta="Select * from musical where idfuncion=".$idfuncion;
		$resp= false;
		if($base->Iniciar()){
		    if($base->Ejecutar($consulta)){
				if($row2=$base->Registro()){	
				    parent::Buscar($idfuncion);
				    $this->setdirector($row2['director']);
				    $this->setcantidadpers($row2['cantPersonas']);
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
					$obj=new funcionMusical();
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
		    $consultaInsertar="INSERT INTO musical(idfuncion,director, cantPersonas)
				VALUES (".parent::getIdfuncion().",'".$this->getdirector()."',".$this->getcantidadpers().")";
				// echo $consultaInsertar;
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
	        $consultaModifica="UPDATE musical SET director='".$this->getdirector()."', cantPersonas=".$this->getcantidadpers()." WHERE idfuncion=". parent::getIdfuncion();
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
				$consultaBorra="DELETE FROM musical WHERE idfuncion=".parent::getIdfuncion();
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