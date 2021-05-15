<?php

class funcionTeatro extends funcion{

    public function __construct($nombre, $horario,$duracion, $precio){
        parent::__construct($nombre, $horario,$duracion, $precio);
    }

    public function __toString()
    {
        $cadena=parent::__toString();
        return $cadena;
    }

    public function incrementar(){
        $valor= $this->getPrecio()+ $this->getPrecio()*0.45;
        return $valor;
    }
}