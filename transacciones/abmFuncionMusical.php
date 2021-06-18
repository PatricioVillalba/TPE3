<?php

class abmFuncionMusical{
        function insertarFuncion($datos){ 
            $objfuncionMusical=new funcionMusical();
            $objfuncionMusical->cargar($datos);            
            $objTeatro= $datos['objTeatro'];
            $HorarioSolapado=$objTeatro->horario($datos['hora'],$datos['duracion']);
            if($HorarioSolapado){
            $objfuncionMusical->insertar();}
            return $HorarioSolapado;
        }
    
        function eliminarFuncion($id){ 
            $objfuncionMusical=new funcionMusical();
            $objfuncion=new funcion();
            $objfuncionMusical->buscar($id);
            $objfuncion->buscar($id);
            $objfuncionMusical->eliminar();
            $objfuncion->eliminar();
    
        }
    
        function editarFuncion($datos,$id){  
                $objfuncionMusical=new funcionMusical();
                $objfuncionMusical->buscar($id);
                $objfuncionMusical->cargar($datos);
                $objfuncionMusical->modificar();
            }

        function verFunciones(){ 
            $sale='';
            $objfuncionMusical=new funcionMusical();        
            $arreFunciones= $objfuncionMusical->listar();   
            foreach ($arreFunciones as $unaFuncion){	
                    $sale=$sale.$unaFuncion."------------------------------------------------------- \n";
                };        
            return $sale;        
        }
    
    }