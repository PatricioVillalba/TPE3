<?php

class abmFuncionTeatro{

    function insertarFuncion($datos){ 
        $funcionteatro=new funcionTeatro();
        // $dat=array('idfuncion' => null,'idteatro'=>2,'nombre'=>'carlitos s','hora'=>22,'duracion'=>44,'precio'=>55,'director'=>'mauri','cantpersonas'=>900);        
        $funcionteatro->cargar($datos);
        $funcionteatro->insertar();
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
        $objfuncionTeatro->setIdfuncion($id);
        $objfuncionTeatro->modificar();
    }

}