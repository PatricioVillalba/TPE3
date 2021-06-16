<?php

class abmFuncionCine{

    function insertarFuncion($datos){ 
        // $dat=array('idfuncion' =>$datos['idfuncion'],'idteatro'=>$datos['idteatro'],'nombre'=>$datos['nombre'],
        // 'hora'=>$datos['horario'],'duracion'=>$datos['duracion'],'precio'=>$datos['precio'],'genero'=>$datos['genero'],'origen'=>$datos['origen']);
        $objfuncionCine=new funcionCine();
        $objfuncionCine->cargar($datos);
        print_r($objfuncionCine);
        $objfuncionCine->insertar();
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
        $objfuncionCine->setIdfuncion($id);
        $objfuncionCine->modificar();
    }

}