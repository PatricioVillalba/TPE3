<?php

class abmTeatro{

    function modificarTeatro($nombre,$objTeatro){
        $objTeatro->setNombreTeatro($nombre);
        $objTeatro->modificar();
    }

    function borrarTeatro($objTeatro){
        $arreFunciones= $objTeatro->getColObjFunciones();
        $retorno=true;
        $i=0;
        while($retorno && $i<count($arreFunciones)){
                        $retorno= $arreFunciones[$i]->eliminar();
            $i++;
        }
        if($retorno){
            $retorno=$objTeatro->eliminar();
        }   
        return $retorno;
    }

    function seleccionTeatro($idTeatro){
        $objTeatro=new teatro();
        $objTeatro->Buscar($idTeatro);      
        return $objTeatro;
    }

    function cargarTeatro($nombre,$direccion){
        $objTeatro= new teatro();
        $objTeatro->setNombreTeatro($nombre);
        $objTeatro->setDireccion($direccion);
        $objTeatro->insertar();
        return $objTeatro;
    }
    function ModificarNombreFuncion($id,$nombre){
        $objFuncion= new funcion();
        $objFuncion-> Buscar($id);
        $objFuncion->setNombre($nombre);
        $objFuncion->modificar();
    }
    function ModificarPrecioFuncion($id,$precio){
        $objFuncion= new funcion();
        $objFuncion-> Buscar($id);
        $objFuncion->setPrecio($precio);
        $objFuncion->modificar();
    }
    function ModificarNombreTeatro($id,$nombre){
        $objTeatro= new teatro();
        $objTeatro-> Buscar($id);
        $objTeatro->setNombreTeatro($nombre);
        $objTeatro->modificar();
    }
    function ModificarDireccionTeatro($id,$direccion){
        $objTeatro= new teatro();
        $objTeatro-> Buscar($id);
        $objTeatro->setDireccion($direccion);
        $objTeatro->modificar();
    }

    function verFunciones($idTeatro){ 
        $sale='';
        $objTeatro=new teatro();
        $objTeatro->Buscar($idTeatro);  
        $arreFunciones= $objTeatro->getColObjFunciones(); 
        foreach ($arreFunciones as $unaFuncion){	
            	$sale=$sale.$unaFuncion."------------------------------------------------------- \n";
            }
        // echo $sale;        
        return $sale;        
    }
    function darCostos($idTeatro){ 
        $sale=0;
        $objTeatro=new teatro();
        $objTeatro->Buscar($idTeatro);  
        $arreFunciones= $objTeatro->getColObjFunciones();
        foreach ($arreFunciones as $unaFuncion){	
            	$sale=$sale +$unaFuncion->incrementar();
                
            }
        // echo $sale;        
        return $sale;        
    }

    function verTeatros(){ 
        $sale='';
        $objTeatro=new teatro();        
        $arreFunciones= $objTeatro->listar();   
        foreach ($arreFunciones as $unaFuncion){	
                $sale=$sale.$unaFuncion."------------------------------------------------------- \n";
            };        
        return $sale;        
    }
}