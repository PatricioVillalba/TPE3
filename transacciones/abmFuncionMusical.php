<?php

class abmFuncionMusical{
        function insertarFuncion($datos){ 
            $objfuncionMusical=new funcionMusical();
            $objfuncionMusical->cargar($datos);
            print_r($objfuncionMusical);
            $objfuncionMusical->insertar();
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
            $objfuncionMusical->setIdfuncion($id);
            $objfuncionMusical->modificar();
        }
    
    }