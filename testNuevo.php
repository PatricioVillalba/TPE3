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
    echo "5: Modificar Nombre de una Funcion" . "\n";
    echo "6: Modificar Precio de una Funcion" . "\n";
    echo "7: Modificar Nombre del Teatro" . "\n";
    echo "8: Modificar Direccion del Teatro" . "\n";
    echo "9: ver costos (TPE3)" . "\n";
    echo "0: SALIR" . "\n";
    echo "-------------------------------------" . "\n";
    echo "Opcion: ";
    $opcion = trim(fgets(STDIN));
    switch ($opcion) {
        case '1':
            echo ("Cargar Nombre Funcion." . "\n");
            $nombre = trim(fgets(STDIN));
            echo ("Cargar Horario de la funcion HH-MM." . "\n");
            $hora = trim(fgets(STDIN));
            echo ("Cargar Duracion Funcion." . "\n");
            $duracion = trim(fgets(STDIN));
            echo ("Caragr Precio de la funcion." . "\n");
            $precio = trim(fgets(STDIN));
			$idTeatro=$teatro->getIdteatro();
            $datos=array('idfuncion' =>null,'idteatro'=>$idTeatro,'nombre'=>$nombre,'hora'=>$hora,'duracion'=>$duracion,'precio'=>$precio);
			$abmFuncionTeatro->insertarFuncion($datos);
            break;

        case '2':
			echo ("Cargar Nombre Funcion." . "\n");
            $nombre = trim(fgets(STDIN));
            echo ("Cargar Horario de la funcion HH-MM." . "\n");
            $hora = trim(fgets(STDIN));
            echo ("Cargar Duracion Funcion." . "\n");
            $duracion = trim(fgets(STDIN));
            echo ("Cargar Precio de la funcion." . "\n");
            $precio = trim(fgets(STDIN));
            echo ("Cargar genero Funcion." . "\n");
            $genero = trim(fgets(STDIN));
            echo ("Cargar Pais." . "\n");
            $pais = trim(fgets(STDIN));
			$idTeatro=$teatro->getIdteatro();
            $datos=array('idfuncion' =>null,'idteatro'=>$idTeatro,'nombre'=>$nombre,'hora'=>$hora,'duracion'=>$duracion,'precio'=>$precio,'genero'=>$genero,'origen'=>$pais);
			$abmFuncionCine->insertarFuncion($datos);
            break;
		case '3':
			echo ("Cargar Nombre Funcion." . "\n");
            $nombre = trim(fgets(STDIN));
            echo ("Cargar Horario de la funcion HH-MM." . "\n");
            $hora = trim(fgets(STDIN));
            echo ("Cargar Duracion Funcion." . "\n");
            $duracion = trim(fgets(STDIN));
            echo ("Cargar Precio de la funcion." . "\n");
            $precio = trim(fgets(STDIN));
            echo ("Cargar director de la  Funcion." . "\n");
            $director = trim(fgets(STDIN));
            echo ("Cargar cantidad personas." . "\n");
            $cantpersonas = trim(fgets(STDIN));
			$idTeatro=$teatro->getIdteatro();
            $datos=array('idfuncion' =>null,'idteatro'=>$idTeatro,'nombre'=>$nombre,'hora'=>$hora,'duracion'=>$duracion,'precio'=>$precio,'director'=>$director,'cantpersonas'=>$cantpersonas);
			$abmFuncionMusical->insertarFuncion($datos);
            break;
		case '4':
            $idTeatro=$teatro->getIdteatro();
			echo $abmTeatro->verFunciones($idTeatro);
            break;
        case '5':
        //     
            echo "ESCRIBA EL ID DE LA FUNCION PARA CAMBIAR EL NOMBRE: " . "\n";
            $id = trim(fgets(STDIN));
            if (is_numeric($id)) {
                    echo "ESCRIBA NUEVO NOMBRE" . "\n";
                    $nomNuevo = trim(fgets(STDIN));
                    $abmTeatro->ModificarNombreFuncion($id,$nomNuevo);
        //             echo ("Datos Cargados con exito." . "\n");
            }
            break;
        case '6': 
           echo "ESCRIBA EL ID DE LA FUNCION PARA CAMBIAR EL NOMBRE: " . "\n";
            $id = trim(fgets(STDIN));
            if (is_numeric($id)) {
                    echo "ESCRIBA NUEVO PRECIO" . "\n";
                    $precio = trim(fgets(STDIN));
                    $abmTeatro->ModificarPrecioFuncion($id,$precio);}
            break;
        case '7':
            echo "ESCRIBA EL ID DEl TEATRO PARA CAMBIAR EL NOMBRE: " . "\n";
            $id = trim(fgets(STDIN));
            if (is_numeric($id)) {
                    echo "ESCRIBA NUEVO NOMBRE" . "\n";
                    $precio = trim(fgets(STDIN));
                    $abmTeatro->ModificarNombreTeatro($id,$precio);}
            break;
        case '8':
            echo "ESCRIBA EL ID DEl TEATRO PARA CAMBIAR LA DIRECCION: " . "\n";
            $id = trim(fgets(STDIN));
            if (is_numeric($id)) {
                    echo "ESCRIBA NUEVA DIRECCION" . "\n";
                    $direccion = trim(fgets(STDIN));
                    $abmTeatro->ModificarDireccionTeatro($id,$direccion);}
            break;
        break;       
            case '9':
                echo "ESCRIBA EL ID DEl TEATRO PARA VER COSTOS: " . "\n";
                $id = trim(fgets(STDIN));
                if (is_numeric($id)) {
                 $costo=$abmTeatro->darCostos($id);
                 echo $costo."\n";
                }
                     
            break;
    }
} while ($opcion <> 0);
