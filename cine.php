<?php

class funcionCine extends funcion{

    private $genero;
    private $pais;

    public function __construct($nombre, $horario,$duracion, $precio,$genero,$pais){
        parent::__construct($nombre, $horario,$duracion, $precio);
        $this->genero=$genero;
        $this->pais=$pais;
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
        $cadena.=" Pais: ".$this->getPais();
        return $cadena;
    }

    public function incrementar(){
        $valor= $this->getPrecio()+ $this->getPrecio()*0.65;
       return $valor;
    }
}