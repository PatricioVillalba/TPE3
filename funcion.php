<?php
class funcion{
	
	private  $nombre ;
	private  $idfuncion ;
	// private  $idteatro ;
	private  $horario ;
	private  $duración ;
	private  $precio ;
	private  $mensajeoperacion;
	private  $objTeatro;
	
    public function  __construct(){
		$this->idfuncion = 0;
		$this->idteatro = "";
		$this->nombre = "";
		$this->horario = "";
		$this->duración = "";
		$this->precio= "";				 
	}
    // GET
    public function getNombre(){
		return $this->nombre;
	}
    public function getHorario(){
		return $this->horario;
	}
    public function getDuracion(){
		return $this->duración;
	}
    public function getPrecio(){
		return $this->precio;
	}
	public function getIdfuncion(){
	    return $this->idfuncion;
	}
	// public function getIdteatro()
	// {
	// 	return $this->idteatro;
	// }
	public function getMensajeoperacion()
	{
		return $this->mensajeoperacion;
	}
	public function getObjTeatro()
	{
		return $this->objTeatro;
	}

 	 // SET 

	public function setObjTeatro($objTeatro)
	{
		$this->objTeatro = $objTeatro;
	}

    public function setNombre($nom){
		$this->nombre=$nom;
	}
    public function setHorario($hor){
		$this->horario=$hor;
	}
    public function setDuracion($dur){
		$this->duración=$dur;
	}
    public function setPrecio($pre){
		$this->precio=$pre;
	}
	public function setIdfuncion($idfuncion)
	{
		$this->idfuncion = $idfuncion;
	}
	// public function setIdteatro($idteatro)
	// {
	// 	$this->idteatro = $idteatro;
	// }
	public function setMensajeoperacion($mensajeoperacion)
	{
		$this->mensajeoperacion = $mensajeoperacion;

		return $this;
	}
	// 
    public function __toString()
	{
		$sale= 'Id funcion: '. $this->getIdfuncion().' Nombre Funcion: '. $this->getNombre().' Horario: '.$this->getHorario().' Duracion: '.$this->getDuracion().' Precio: '.$this->getPrecio().' Teatro: '. $this->getObjTeatro()->getIdteatro();
		return $sale;
	}



    public function modificarNombreyPrecio($nom,$prec){
        $this->setNombre($nom);
        $this->setPrecio($prec);
    }

	public function cargar($datosTeatro){       
		$this->setIdfuncion($datosTeatro['idfuncion']);
        $this->setNombre($datosTeatro['nombre']);
	    $this->setObjTeatro($datosTeatro['objTeatro']);
        $this->setHorario($datosTeatro['hora']);
        $this->setDuracion($datosTeatro['duracion']);
        $this->setPrecio($datosTeatro['precio']);
    }

	public function Buscar($idfuncion){
		$base=new BaseDatos();
		$consultaFuncion="Select * from funcion where idfuncion=".$idfuncion;
		$resp= false;
		if($base->Iniciar()){
			if($base->Ejecutar($consultaFuncion)){
				if($row2=$base->Registro()){

					// $this->setIdteatro($row2['idteatro']);
					$this->setIdfuncion($idfuncion);					
					$this->setNombre($row2['nombre']);
					$this->setHorario($row2['hora']);
					$this->setDuracion($row2['duracion']);
					$this->setPrecio($row2['precio']);
					$objTeatro= new Teatro();
					$objTeatro->Buscar($row2['idteatro']);
					$this->setObjTeatro($objTeatro);
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
	    $arreglofunciones = null;
		$base=new BaseDatos();
		$consultaFuncion="Select * from funcion ";
		if ($condicion!=""){
		    $consultaFuncion=$consultaFuncion.' where '.$condicion;
		}
		$consultaFuncion.=" order by idfuncion ";
		// echo $consultaFuncion;
		if($base->Iniciar()){
			if($base->Ejecutar($consultaFuncion)){				
				$arreglofunciones= array();
				while($row2=$base->Registro()){
					$funcion= new funcion();
					$funcion->Buscar($row2['idfuncion']);
					// print_r($funcion);
					array_push($arreglofunciones,$funcion);	
				}			
			
		 	}
		 }	
		 return $arreglofunciones;
	}	

	public function insertar(){
		$base=new BaseDatos();
		$resp= false; 
		$consultaInsertar="INSERT INTO funcion(idteatro,nombre,hora,duracion,precio) 
				VALUES ('".$this->getObjTeatro()->getIdteatro()."','".$this->getNombre()."','".$this->getHorario()."','".$this->getDuracion()."','".$this->getPrecio()."')";
		// echo $consultaInsertar;
		if($base->Iniciar()){
            if($id = $base->devuelveIDInsercion($consultaInsertar)){
                $this->setIdfuncion($id);
			    $resp=  true;
			}	else {
                $this->setmensajeoperacion($base->getError());
            }
        } else {
            $this->setmensajeoperacion($base->getError());
        }
     
		return $resp;
	}

	public function modificar(){
	    $resp =false; 
	    $base=new BaseDatos();
		$consultaModifica="UPDATE funcion SET idteatro='".$this->getObjTeatro()->getIdteatro()."',nombre='".$this->getNombre()."',hora='".$this->getHorario()."',duracion='".$this->getDuracion()."',precio='".$this->getPrecio()."'
                            WHERE idfuncion=".$this->getIdfuncion();
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
		return $resp;
	}

    public function eliminar(){
		$base=new BaseDatos();
		$resp=false;
		if($base->Iniciar()){
				$consultaBorra="DELETE FROM funcion WHERE idfuncion=".$this->getIdfuncion();
				if($base->Ejecutar($consultaBorra)){
				    $resp=  true;
				}else{
						$this->setmensajeoperacion($base->getError());
					
				}
		}else{
				$this->setmensajeoperacion($base->getError());
			
		}
		return $resp; 
	}

	
	
}