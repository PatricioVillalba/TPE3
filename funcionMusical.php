<?php

class funcionMusical extends funcion{

    private $director;
    private $cantidadpers ;

    public function __construct($nombre, $horario,$duracion, $precio,$director,$cantidadpers ){
        parent::__construct($nombre, $horario,$duracion, $precio);
        $this->director=$director;
        $this->cantidadpers =$cantidadpers ;
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
        $cadena.=" cantidad personas : ".$this->getcantidadpers ();
        return $cadena;
    }

    public function incrementar(){
        $valor= $this->getPrecio()+ $this->getPrecio()*0.12;
       return $valor;
    }
}