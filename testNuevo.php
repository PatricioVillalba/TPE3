<?php
include 'Funcion.php';
include_once "BaseDatos.php";
include 'Teatro.php';
include 'funcionCine.php';
include 'funcionMusical.php';
include 'funcionTeatro.php';
include 'transacciones/abmTeatro.php';
include 'transacciones/abmFuncionTeatro.php';
include 'transacciones/abmFuncionCine.php';
include 'transacciones/abmFuncionMusical.php';
// $datos=array('idfuncion' => null,'idteatro'=>2,'nombre'=>'carlitos s','hora'=>22,'duracion'=>44,'precio'=>55,'director'=>'mauri','cantpersonas'=>900);


$abmFuncionTeatro =  new abmFuncionTeatro();
$abmFuncionCine =  new abmFuncionCine();
$abmFuncionMusical =  new abmFuncionMusical();
// $datos=array('idfuncion' => null,'idteatro'=>2,'nombre'=>'tini','hora'=>00,'duracion'=>1,'precio'=>20);

$abmTeatro= new abmTeatro();
$teatro= new teatro();

// $abmTeatro->borrarTeatro($teatro);
// $abmFuncionTeatro->insertarFuncion($datos);
// $abmTeatro =  new abmTeatro();
// $teatro=$abmTeatro->seleccionTeatro(2);
// $abmTeatro->verFunciones($teatro);
// $obj_funcion= new funcion();
// $obj_funcion->buscar(56);
// print_r($obj_funcion);
// echo($obj_funcion->getObjTeatro()->getIdteatro());
// exit;
// $obj_funcionMusical= new funcionCine();
// $colPersonas=$obj_funcionMusical->listar();
// foreach ($colPersonas as $unaPersona){
    $teatro=$abmTeatro->seleccionTeatro(5);
    // $abmTeatro->borrarTeatro($teatro);	
// 	echo $unaPersona;
// 	echo "------------------------------------------------------- \n";
// }
// $obj_teatro=new teatro();
// $obj_teatro->buscar(2);
// $obj_teatro->getColObjFunciones();
// print_r($obj_teatro);

// $obj_funcionMusical->cargar($datos);
// $obj_funcionMusical->insertar();
// var_dump($obj_funcion);
// $obj_funcion->Buscar(31);
// print_r($obj_funcionMusical);
// exit;
do {
    echo "--------------------------------------" . "\n";
    echo "ELIJA UNA OPCION: " . "\n";
    echo "1: Cargar Funcion teatro" . "\n";
    echo "2: Cargar Funcion cine" . "\n";
    echo "3: Cargar Funcion Musical" . "\n";
    echo "4: Ver Datos" . "\n";
    echo "5: Modificar Funcion teatro" . "\n";
    echo "6: Modificar Funcion cine" . "\n";
    echo "7: Modificar Funcion Musical" . "\n";
    echo "8: Modificar Nombre del Teatro" . "\n";
    echo "9: Modificar Direccion del Teatro" . "\n";
    echo "10: ver costos (TPE3)" . "\n";
    echo "11: eliminar funcion teatro" . "\n";
    echo "12: eliminar funcion cine" . "\n";
    echo "13: eliminar funcion musical" . "\n";
    echo "0: SALIR" . "\n";
    echo "-------------------------------------" . "\n";
    echo "Opcion: ";
    $opcion = trim(fgets(STDIN));
    switch ($opcion) {
        case '1':
            echo ("Cargar Nombre Funcion." . "\n");
            $nombre = trim(fgets(STDIN));
            echo ("Cargar Horario de la funcion HHMM." . "\n");
            $hora = trim(fgets(STDIN));
            echo ("Cargar Duracion Funcion." . "\n");
            $duracion = trim(fgets(STDIN));
            echo ("Caragr Precio de la funcion." . "\n");
            $precio = trim(fgets(STDIN));
			// $idTeatro=$teatro;
            $datos=array('idfuncion' =>null,'objTeatro'=>$teatro,'nombre'=>$nombre,'hora'=>$hora,'duracion'=>$duracion,'precio'=>$precio);
			$secargo=$abmFuncionTeatro->insertarFuncion($datos);
            if($secargo)echo 'obra cargada exitosamente'."\n";
            else echo 'El horario de la obra se sobrepone con una obra existente'."\n";
            break;

        case '2':
			echo ("Cargar Nombre Funcion." . "\n");
            $nombre = trim(fgets(STDIN));
            echo ("Cargar Horario de la funcion HHMM." . "\n");
            $hora = trim(fgets(STDIN));
            echo ("Cargar Duracion Funcion." . "\n");
            $duracion = trim(fgets(STDIN));
            echo ("Cargar Precio de la funcion." . "\n");
            $precio = trim(fgets(STDIN));
            echo ("Cargar genero Funcion." . "\n");
            $genero = trim(fgets(STDIN));
            echo ("Cargar Pais." . "\n");
            $pais = trim(fgets(STDIN));
			// $idTeatro=$teatro->getIdteatro();
            $datos=array('idfuncion' =>null,'objTeatro'=>$teatro,'nombre'=>$nombre,'hora'=>$hora,'duracion'=>$duracion,'precio'=>$precio,'genero'=>$genero,'origen'=>$pais);
			$secargo=$abmFuncionCine->insertarFuncion($datos);
            if($secargo)echo 'La pelicula fue cargada exitosamente'."\n";
            else echo 'El horario de la obra se sobrepone con una obra existente'."\n";
            break;
		case '3':
			echo ("Cargar Nombre Funcion." . "\n");
            $nombre = trim(fgets(STDIN));
            echo ("Cargar Horario de la funcion HHMM." . "\n");
            $hora = trim(fgets(STDIN));
            echo ("Cargar Duracion Funcion." . "\n");
            $duracion = trim(fgets(STDIN));
            echo ("Cargar Precio de la funcion." . "\n");
            $precio = trim(fgets(STDIN));
            echo ("Cargar director de la  Funcion." . "\n");
            $director = trim(fgets(STDIN));
            echo ("Cargar cantidad personas." . "\n");
            $cantpersonas = trim(fgets(STDIN));
			// $idTeatro=$teatro->getIdteatro();
            $datos=array('idfuncion' =>null,'objTeatro'=>$teatro,'nombre'=>$nombre,'hora'=>$hora,'duracion'=>$duracion,'precio'=>$precio,'director'=>$director,'cantpersonas'=>$cantpersonas);
			$secargo=$abmFuncionMusical->insertarFuncion($datos);
            if($secargo)echo 'El musical fue cargado exitosamente'."\n";
            else echo 'El horario de la obra se sobrepone con una obra existente'."\n";
            break;
		case '4':
            $idTeatro=$teatro->getIdteatro();
			echo $abmTeatro->verFunciones($idTeatro);
            break;
        case '5':
            echo $abmFuncionTeatro->verFunciones();
            echo "ESCRIBA EL ID DE LA FUNCION A MODIFICAR: " . "\n";
            $id = trim(fgets(STDIN));    
            echo ("Cargar Nombre Funcion." . "\n");
            $nombre = trim(fgets(STDIN));
            echo ("Cargar Horario de la funcion HHMM." . "\n");
            $hora = trim(fgets(STDIN));
            echo ("Cargar Duracion Funcion." . "\n");
            $duracion = trim(fgets(STDIN));
            echo ("Caragr Precio de la funcion." . "\n");
            $precio = trim(fgets(STDIN));
			// $idTeatro=$teatro;
            $datos=array('idfuncion' =>$id,'objTeatro'=>$teatro,'nombre'=>$nombre,'hora'=>$hora,'duracion'=>$duracion,'precio'=>$precio);
			$secargo=$abmFuncionTeatro->editarFuncion($datos,$id);
            if($secargo)echo 'obra modificada exitosamente'."\n";
            break;
        case '6': 
            echo $abmFuncionCine->verFunciones();
            echo "ESCRIBA EL ID DE LA FUNCION A MODIFICAR: " . "\n";
            $id = trim(fgets(STDIN)); 
            echo ("Cargar Nombre Funcion." . "\n");
            $nombre = trim(fgets(STDIN));
            echo ("Cargar Horario de la funcion HHMM." . "\n");
            $hora = trim(fgets(STDIN));
            echo ("Cargar Duracion Funcion." . "\n");
            $duracion = trim(fgets(STDIN));
            echo ("Cargar Precio de la funcion." . "\n");
            $precio = trim(fgets(STDIN));
            echo ("Cargar genero Funcion." . "\n");
            $genero = trim(fgets(STDIN));
            echo ("Cargar Pais." . "\n");
            $pais = trim(fgets(STDIN));
            $datos=array('idfuncion' =>$id,'objTeatro'=>$teatro,'nombre'=>$nombre,'hora'=>$hora,'duracion'=>$duracion,'precio'=>$precio,'genero'=>$genero,'origen'=>$pais);
			$secargo=$abmFuncionCine->editarFuncion($datos,$id);
            if($secargo)echo 'La pelicula fue cargada exitosamente'."\n";
            break;
        case '7':
            echo $abmFuncionMusical->verFunciones();
            echo "ESCRIBA EL ID DE LA FUNCION A MODIFICAR: " . "\n";
            $id = trim(fgets(STDIN)); 
            echo ("Cargar Nombre Funcion." . "\n");
            $nombre = trim(fgets(STDIN));
            echo ("Cargar Horario de la funcion HHMM." . "\n");
            $hora = trim(fgets(STDIN));
            echo ("Cargar Duracion Funcion." . "\n");
            $duracion = trim(fgets(STDIN));
            echo ("Cargar Precio de la funcion." . "\n");
            $precio = trim(fgets(STDIN));
            echo ("Cargar director de la  Funcion." . "\n");
            $director = trim(fgets(STDIN));
            echo ("Cargar cantidad personas." . "\n");
            $cantpersonas = trim(fgets(STDIN));
			// $idTeatro=$teatro->getIdteatro();
            $datos=array('idfuncion' =>$id,'objTeatro'=>$teatro,'nombre'=>$nombre,'hora'=>$hora,'duracion'=>$duracion,'precio'=>$precio,'director'=>$director,'cantpersonas'=>$cantpersonas);
			$secargo=$abmFuncionMusical->editarFuncion($datos,$id);
            if($secargo)echo 'El musical fue cargado exitosamente'."\n";
            break;
        case '8':
            echo $abmTeatro->verTeatros();
            echo "ESCRIBA EL ID DEl TEATRO PARA CAMBIAR EL NOMBRE: " . "\n";
            $id = trim(fgets(STDIN));
            if (is_numeric($id)) {
                    echo "ESCRIBA NUEVO NOMBRE" . "\n";
                    $precio = trim(fgets(STDIN));
                    $abmTeatro->ModificarNombreTeatro($id,$precio);}
            break;
        case '9':
            echo $abmTeatro->verTeatros();
            echo "ESCRIBA EL ID DEl TEATRO PARA CAMBIAR LA DIRECCION: " . "\n";
            $id = trim(fgets(STDIN));
            if (is_numeric($id)) {
                    echo "ESCRIBA NUEVA DIRECCION" . "\n";
                    $direccion = trim(fgets(STDIN));
                    $abmTeatro->ModificarDireccionTeatro($id,$direccion);}
            break;
        break;       
            case '10':
                echo "ESCRIBA EL ID DEl TEATRO PARA VER COSTOS: " . "\n";
                $id = trim(fgets(STDIN));
                if (is_numeric($id)) {
                 $costo=$abmTeatro->darCostos($id);
                 echo $costo."\n";
                }
                     
            break;
            case '11':
                echo $abmFuncionTeatro->verFunciones();
                echo "ESCRIBA EL ID DE LA FUNCION A ELIMINAR: " . "\n";
                $id = trim(fgets(STDIN));
                if (is_numeric($id)) {
                    $abmFuncionTeatro->eliminarFuncion($id);
                }     
            break;
            case '12':
                echo $abmFuncionCine->verFunciones();
                echo "ESCRIBA EL ID DE LA FUNCION A ELIMINAR: " . "\n";
                $id = trim(fgets(STDIN));
                if (is_numeric($id)) {
                    $abmFuncionCine->eliminarFuncion($id);
                }     
            break;
            case '13':
                echo $abmFuncionMusical->verFunciones();
                echo "ESCRIBA EL ID DE LA FUNCION A ELIMINAR: " . "\n";
                $id = trim(fgets(STDIN));
                if (is_numeric($id)) {
                    $abmFuncionMusical->eliminarFuncion($id);
                }     
            break;
            
    }
} while ($opcion <> 0);
