<?php

class abmFuncionTeatro{

    function insertarFuncion($datos){ 
        $funcionteatro=new funcionTeatro();       
        $funcionteatro->cargar($datos);
        $objTeatro= $datos['objTeatro'];
        $HorarioSolapado=$objTeatro->horario($datos['hora'],$datos['duracion']);
        if($HorarioSolapado){
        $funcionteatro->insertar();}
        return $HorarioSolapado;
        
    }

    function eliminarFuncion($id){ 
        $objfuncionTeatro=new funcionTeatro();
        $objfuncion=new funcion();
        $objfuncionTeatro->buscar($id);
        $objfuncion->buscar($id);
        $objfuncionTeatro->eliminar();
        $objfuncion->eliminar();

    }

    function editarFuncion($datos,$id){ 
        $objfuncionTeatro=new funcionTeatro();
        $objfuncionTeatro->buscar($id);
        $objfuncionTeatro->cargar($datos);
        $objfuncionTeatro->modificar();
    }

    function verFunciones(){ 
        $sale='';
        $objfuncionTeatro=new funcionTeatro();        
        $arreFunciones= $objfuncionTeatro->listar();   
        foreach ($arreFunciones as $unaFuncion){	
                $sale=$sale.$unaFuncion."------------------------------------------------------- \n";
            };        
        return $sale;        
    }

}