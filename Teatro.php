<?php

class teatro
{ 

    // ATRIBUTOS 
    private $nombreTeatro;
    private $direccion;
    private $colObjFunciones;

    // CONSTRUCTORES    
    public function __construct($n,$d,$col)
    {
        $this->nombreTeatro = $n;
        $this->direccion = $d;
        $this->colObjFunciones = $col;
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
    public function getFunciones()
    {
        return $this->colObjFunciones;
    }
    

    // SET 
    public function setNombreTeatro($n)
    {
        $this->colObjFunciones = $n;
    }
    public function setDireccion($d)
    {
        $this->direccion = $d;
    }

    public function setFunciones($f)
    {
        $this->funciones = $f;
    }


    // METODOS
    public function cargar($funcion)
    {
        $var=$this->horario($funcion->getHorario(),$funcion->getDuracion());
        if($var){ 
            array_push($this->colObjFunciones, $funcion);
            $this->setFunciones($this->getFunciones());
            echo 'Funcion cargada con exito .'."\n";}
            else{echo 'ERROR: Horario ocupado.'."\n";}
       
    }

    public function horario($horarioNuevo, $minutoAnadirnuevo)
    {
        $sale=true;
        foreach ($this->getFunciones() as $funcion) {
            $horaInicialArre = $funcion->getHorario();
            $minutoAnadir = $funcion->getDuracion();

            $segundos_horaInicial = strtotime($horaInicialArre);
            $segundos_minutoAnadir = $minutoAnadir * 60;
            $horaInicialArre = date("H:i", $segundos_horaInicial);
            $horaFinArre = date("H:i", $segundos_horaInicial + $segundos_minutoAnadir);
           
            $segundos_horarioNuevo = strtotime($horarioNuevo);
            $segundos_minutoAnadir = $minutoAnadirnuevo * 60;

            $horarioNuevo = date("H:i", $segundos_horarioNuevo);
            $horaFinnueva = date("H:i", $segundos_horarioNuevo + $segundos_minutoAnadir);           

            if ($horarioNuevo < $horaInicialArre || $horarioNuevo > $horaFinArre) {
                if (
                    $horaFinnueva < $horaInicialArre || $horaFinnueva > $horaFinArre
                ) {
                   
                } else {
                    $sale=false;
                }
            } else {
                $sale=false;
            }
        }
        return $sale;
    }

  
    public function modificarNombreFuncion($i, $nom)
    {
        $varArreglo = $this->getFunciones();
        $varArreglo[$i]->setNombre($nom);
        $this->setFunciones($varArreglo);
    }

    public function modificarPrecioFuncion($i, $prec)
    {
        $varArreglo = $this->getFunciones();
        $varArreglo[$i]->setPrecio($prec);
        $this->setFunciones($varArreglo);
    }

    public function __toString()
    {
        $salida = '';
        
        $salida='Teatro: '.$this->getNombreTeatro().' Direccion: '.$this->getDireccion()." \n";
         foreach ($this->getFunciones() as $funcion) {
             $salida=$salida.$funcion->__toString()." \n";
         }
        
        return $salida;
    }

    public function darCostos()
    {
        $salida = '';      
        
         foreach ($this->getFunciones() as $funcion) {
            echo $funcion->incrementar()." \n";
         }       
        return $salida;
    }
}