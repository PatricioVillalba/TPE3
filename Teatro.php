<?php

class teatro
{ 

    // ATRIBUTOS 
    private $idteatro;
    private $nombreTeatro;
    private $direccion;
    private $colObjFunciones;    
	private $mensajeoperacion;


    // CONSTRUCTORES    
    public function __construct()
    {
        $this->idteatro =0;
        $this->nombreTeatro ="";
        $this->direccion = "";
        $this->colObjFunciones = [];
    }

    // GET 
    public function getNombreTeatro()
    {
        return $this->nombreTeatro;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
    
    public function getIdteatro()
    {
        return $this->idteatro;
    }	
	public function getmensajeoperacion(){
		return $this->mensajeoperacion ;
	}
    public function getColObjFunciones()
    {
        if(empty($this->colObjFunciones)){
            $objCine = new funcionCine();
            $objMusical = new funcionMusical();
            $objObraTeatro = new funcionTeatro();
            $condicion = " idteatro=" . $this->getIdTeatro();

            $colCine = $objCine->listar($condicion);
            $colMusical = $objMusical->listar($condicion);
            $colObrasTeatro = $objObraTeatro->listar($condicion);           
            $coleccionFunciones = array_merge($colCine, $colMusical, $colObrasTeatro);
            $this->setColObjFunciones($coleccionFunciones);
        }
        return $this->colObjFunciones;
    }

    // SET 
    public function setNombreTeatro($n)
    {
        $this->nombreTeatro = $n;
    }
    public function setDireccion($d)
    {
        $this->direccion = $d;
    }

    // public function setFunciones($f)
    // {
    //     $this->funciones = $f;
    // }
    public function setIdteatro($id)
    {
        $this->idteatro = $id;
    }
    public function setmensajeoperacion($mensajeoperacion){
		$this->mensajeoperacion=$mensajeoperacion;
	}
    public function setColObjFunciones($colObjFunciones)
    {
        $this->colObjFunciones = $colObjFunciones;
    }

    // METODOS
    // public function cargar($funcion)
    // {
    //     $var=$this->horario($funcion->getHorario(),$funcion->getDuracion());
    //     if($var){ 
    //         array_push($this->colObjFunciones, $funcion);
    //         $this->setFunciones($this->getFunciones());
    //         echo 'Funcion cargada con exito .'."\n";}
    //         else{echo 'ERROR: Horario ocupado.'."\n";}
       
    // }

    public function cargar($idteatro,$nom,$dir){	
        $this->setIdteatro($idteatro);
	    $this->setNombreTeatro($nom);
        $this->setDireccion($dir);
    }
    /**
	 * Recupera los datos de una teatro por idteatro
	 * @param int $dni
	 * @return true en caso de encontrar los datos, false en caso contrario 
	 */		
    public function Buscar($idteatro){ 
		$base=new BaseDatos();
		$consultaTeatro="Select * from teatro where idteatro=".$idteatro;
		$resp= false;
		if($base->Iniciar()){
			if($base->Ejecutar($consultaTeatro)){
				if($row2=$base->Registro()){
				    $this->setNombreTeatro($row2['nombre_teatro']);
				    $this->setIdteatro($idteatro);
					$this->setDireccion($row2['direccion']);
                    // $condicion="idteatro =".$idteatro;
                    // // $objFuncion= new Funcion();
                    // // $arreFunciones=$objFuncion->listar($condicion);
                    // $objFuncionCine= new funcionCine();
                    // // $objFuncionTeatro= new funcionTeatro();
                    // // $objFuncionMusical= new funcionMusical();
                    // $colObjCine= $objFuncionCine->listar($condicion);
                    // // $colObjTeatro= $objFuncionTeatro->listar($condicion);
                    // // $colObjMusical= $objFuncionMusical->listar($condicion);
                    // // $arregloObjFunciones=array_merge($colObjTeatro,$colObjMusical,$colObjCine);
                    // var_dump($colObjCine);
                    // // $this->setColObjFunciones($arreFunciones);
                    // echo 'entro';
					$resp= true;
				}				
			
		 	}
		 }	
		 return $resp;
	}

    public static function listar($condicion=""){
	    $arregloteatro = null;
		$base=new BaseDatos();
		$consultaTeatro="Select * from teatro ";
		if ($condicion!=""){
		    $consultaTeatro=$consultaTeatro.' where '.$condicion;
		}
		$consultaTeatro.=" order by idteatro ";
		//echo $consultaTeatro;
		if($base->Iniciar()){
			if($base->Ejecutar($consultaTeatro)){				
				$arregloteatro= array();
				while($row2=$base->Registro()){
				    $idteatro=$row2['idteatro'];
					$nombreTeatro=$row2['nombre_teatro'];
					$direccion=$row2['direccion'];
				
					$teatro=new teatro();
					$teatro->cargar($idteatro,$nombreTeatro,$direccion);
					array_push($arregloteatro,$teatro);
	
				}			
			
		 	}
		 }	
		 return $arregloteatro;
	}	

    public function insertar(){
		$base=new BaseDatos();
		$resp= false;
		$consultaInsertar="INSERT INTO teatro(nombre_teatro, direccion) 
				VALUES ('".$this->getNombreTeatro()."','".$this->getDireccion()."')";
		if($base->Iniciar()){
            if($id = $base->devuelveIDInsercion($consultaInsertar)){
                $this->setIdteatro($id);
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
		$consultaModifica="UPDATE teatro SET nombre_teatro='".$this->getNombreTeatro()."',direccion='".$this->getDireccion()."'
                            WHERE idteatro=".$this->getIdteatro();
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
				$consultaBorra="DELETE FROM teatro WHERE idteatro=".$this->getIdteatro();
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



    // public function horario($horarioNuevo, $minutoAnadirnuevo)
    // {
    //     $sale=true;
    //     foreach ($this->getFunciones() as $funcion) {
    //         $horaInicialArre = $funcion->getHorario();
    //         $minutoAnadir = $funcion->getDuracion();

    //         $segundos_horaInicial = strtotime($horaInicialArre);
    //         $segundos_minutoAnadir = $minutoAnadir * 60;
    //         $horaInicialArre = date("H:i", $segundos_horaInicial);
    //         $horaFinArre = date("H:i", $segundos_horaInicial + $segundos_minutoAnadir);
           
    //         $segundos_horarioNuevo = strtotime($horarioNuevo);
    //         $segundos_minutoAnadir = $minutoAnadirnuevo * 60;

    //         $horarioNuevo = date("H:i", $segundos_horarioNuevo);
    //         $horaFinnueva = date("H:i", $segundos_horarioNuevo + $segundos_minutoAnadir);           

    //         if ($horarioNuevo < $horaInicialArre || $horarioNuevo > $horaFinArre) {
    //             if (
    //                 $horaFinnueva < $horaInicialArre || $horaFinnueva > $horaFinArre
    //             ) {
                   
    //             } else {
    //                 $sale=false;
    //             }
    //         } else {
    //             $sale=false;
    //         }
    //     }
    //     return $sale;
    // }

  
    // public function modificarNombreFuncion($i, $nom)
    // {
    //     $varArreglo = $this->getFunciones();
    //     $varArreglo[$i]->setNombre($nom);
    //     $this->setFunciones($varArreglo);
    // }

    // public function modificarPrecioFuncion($i, $prec)
    // {
    //     $varArreglo = $this->getFunciones();
    //     $varArreglo[$i]->setPrecio($prec);
    //     $this->setFunciones($varArreglo);
    // }

    public function __toString()
    {
        $salida = '';
        
        $salida='Teatro: '.$this->getNombreTeatro().' Direccion: '.$this->getDireccion()." \n";
         foreach ($this->getColObjFunciones() as $funcion) {
             $salida=$salida.$funcion->__toString()." \n";
         }
        
        return $salida;
    }

    // public function darCostos()
    // {
    //     $salida = '';      
        
    //      foreach ($this->getFunciones() as $funcion) {
    //         echo $funcion->incrementar()." \n";
    //      }       
    //     return $salida;
    // }


    /**
     * Get the value of colObjFunciones
     */ 
   
    // public function getcoleccionFuncion()
    // {
    //     if (count($this->$colObjFunciones) = 0) {
    //         $objCine = new Cine();
    //         $objMusical = new Musical();
    //         $objObraTeatro = new Teatro();
    //         $condicion = " idteatro=" . $this->getIdTeatro();

    //         $colCine = $objCine->listar($condicion);
    //         $colMusical = $objMusical->listar($condicion);
    //         $colObrasTeatro = $objObraTeatro->listar($condicion);
    //         $coleccionFunciones = array_merge($colCine, $colMusical, $colObrasTeatro);
    //         $this->setcoleccionFuncion($coleccionFunciones);
    //     }
    //     return $this->coleccionFuncion;
    // }
}