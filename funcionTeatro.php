<?php

class funcionTeatro extends funcion{

    public function __construct(){
        parent::__construct();
    }

    public function __toString()
    {
        $cadena=parent::__toString()."\n";;
        return $cadena;
    }

    public function incrementar(){
        $valor= $this->getPrecio()+ $this->getPrecio()*0.45;
        return $valor;
    }

    public function cargar($datosTeatro){
		$datos=array('idfuncion' => $datosTeatro['idfuncion'],'idteatro'=>$datosTeatro['idteatro'],'nombre'=>$datosTeatro['nombre'],'hora'=>$datosTeatro['hora'],'duracion'=>$datosTeatro['duracion'],'precio'=>$datosTeatro['precio']);
		parent::cargar($datos); 
    }

    public function Buscar($idfuncion){
		$base=new BaseDatos();
		$consulta="Select * from obra  where idfuncion=".$idfuncion;
      
		$resp= false;
		if($base->Iniciar()){
		    if($base->Ejecutar($consulta)){
				if($row2=$base->Registro()){	
				    parent::Buscar($idfuncion);
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
		$consulta="Select * from funcion  ";
		if ($condicion!=""){
		    $consulta=$consulta.' where '.$condicion;
		}
		$consulta.=" order by idfuncion ";
		// echo $consulta;
		if($base->Iniciar()){
		    if($base->Ejecutar($consulta)){				
			    $arreglo= array();
				while($row2=$base->Registro()){
					$obj=new funcionTeatro();
					$obj->Buscar($row2['idfuncion']);
					if($obj->getIdfuncion()!=0){
						array_push($arreglo,$obj);}	
				}
		 	}}
            return $arreglo;
	}	

    public function insertar(){
		$base=new BaseDatos();
		$resp= false;
		
		if(parent::insertar()){ 
		    $consultaInsertar="INSERT INTO obra(idfuncion)
				VALUES ('".parent::getIdfuncion()."')";
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

    public function eliminar(){
		$base=new BaseDatos();
		$resp=false;
		if($base->Iniciar()){
				$consultaBorra="DELETE FROM obra WHERE idfuncion=".parent::getIdfuncion();
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