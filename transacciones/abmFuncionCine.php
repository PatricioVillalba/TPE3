<?php

class abmFuncionCine{

    function insertarFuncion($datos){
        $objfuncionCine=new funcionCine();
        $objfuncionCine->cargar($datos);
        $objTeatro= $datos['objTeatro'];
        $HorarioSolapado=$objTeatro->horario($datos['hora'],$datos['duracion']);
        if($HorarioSolapado){
        $objfuncionCine->insertar();}
        return $HorarioSolapado;
    }

    function eliminarFuncion($id){ 
        $objfuncionCine=new funcionCine();
        $objfuncion=new funcion();
        $objfuncionCine->buscar($id);
        $objfuncion->buscar($id);
        $objfuncionCine->eliminar();
        $objfuncion->eliminar();

    }

    function editarFuncion($datos,$id){ 
        $objfuncionCine=new funcionCine();
        $objfuncionCine->buscar($id);
        $objfuncionCine->cargar($datos);
        $objfuncionCine->modificar();
    }

    function verFunciones(){ 
        $sale='';
        $objfuncionCine=new funcionCine();        
        $arreFunciones= $objfuncionCine->listar();   
        foreach ($arreFunciones as $unaFuncion){	
            	$sale=$sale.$unaFuncion."------------------------------------------------------- \n";
            }
        // echo $sale;        
        return $sale;        
    }

}