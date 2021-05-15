<?php
class funcion{
	
	private  $nombre ;
	private  $horario ;
	private  $duración ;
	private  $precio ;
	
    public function  __construct($a, $b ,$c, $d){
		// Metodo constructor de la clase Punto
		$this->nombre = $a;
		$this->horario = $b;
		$this->duración = $c;
		$this->precio= $d;				 
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
    // SET 
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

    public function __toString()
	{
		$sale= 'Nombre Funcion: '. $this->getNombre().' Horario: '.$this->getHorario().' Duracion: '.$this->getDuracion().' Precio: '.$this->getPrecio();
		return $sale;
	}

    public function modificarNombreyPrecio($nom,$prec){
        $this->setNombre($nom);
        $this->setPrecio($prec);
    }
}