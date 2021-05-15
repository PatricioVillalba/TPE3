<?php
include 'Funcion.php';
include 'Teatro.php';
include 'funcionCine.php';
include 'funcionMusical.php';
include 'funcionTeatro.php';

$f1 = new funcionTeatro('funcion1','20:00','30','200'); 
$f2 = new funcionTeatro('funcion2','21:10','25','100');
$f3 = new funcionTeatro('funcion3','22:50','50','100');
$c3 = new funcionCine('chucky','22:50','50','100','terror','usa');
$m1 = new funcionMusical('aladin','22:50','50','100','juan','10');
$colObjFuncion = array($f1,$f2,$f3,$c3,$m1); 
$teat = new Teatro('colon', 'leloir', $colObjFuncion);

do {
    echo "--------------------------------------" . "\n";
    echo "ELIJA UNA OPCION: " . "\n";
    echo "1: Cargar Funcion" . "\n";
    echo "2: Ver Datos" . "\n";
    echo "3: Modificar Nombre de una Funcion" . "\n";
    echo "4: Modificar Precio de una Funcion" . "\n";
    echo "5: Modificar Nombre del Teatro" . "\n";
    echo "6: Modificar Direccion del Teatro" . "\n";
    echo "7: ver costos (TPE3)" . "\n";
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
            $funcion = new funcion($nombre,$hora,$duracion,$precio);
            $teat->cargar($funcion);
            break;
        case '2':
            $salida = $teat->__toString();
            if ($salida == '') {
                echo ("Primero debe cargar los datos." . "\n");
            } else {
                echo ($salida . "\n");
            }
            break;
        case '3':
            if ($teat->getNombreTeatro() != '') {
                echo "ELIJA UN N° DEl 1 AL ".count($teat->getFunciones())." PARA CAMBIAR EL NOMBRE DE UNA FUNCION: " . "\n";
                $num = trim(fgets(STDIN));
                if (is_numeric($num)  && ($num <= count($teat->getFunciones()) && $num > 0)) {
                    echo "ESCRIBA NUEVO NOMBRE" . "\n";
                    $nomNuevo = trim(fgets(STDIN));
                    $teat->modificarNombreFuncion($num - 1, $nomNuevo);
                    echo ("Datos Cargados con exito." . "\n");
                } else {
                    echo "ERROR: DEBE CARGAR UN NUMERO ENTRE 1 Y ".count($teat->getFunciones()) . "\n";
                }
            } else {
                echo ("Primero debe cargar los datos." . "\n");
            }
            break;
        case '4':
            if ($teat->getNombreTeatro() != '') {
                echo "ELIJA UN N° Del 1 al ".count($teat->getFunciones())." PARA CAMBIAR EL PRECIO DE UNA FUNCION: " . "\n";
                $num = trim(fgets(STDIN));
                if (is_numeric($num)  && ($num <= count($teat->getFunciones()) && $num > 0)) {
                    echo "ESCRIBA NUEVO PRECIO" . "\n";
                    $pre = trim(fgets(STDIN));
                    $teat->modificarPrecioFuncion($num - 1, $pre);
                    echo ("Datos Cargados con exito." . "\n");
                } else {
                    echo "ERROR: DEBE CARGAR UN NUMERO ENTRE 1 Y ".count($teat->getFunciones()) . "\n";
                }
            } else {
                echo ("Primero debe cargar los datos." . "\n");
            }
            break;
            case '5':
                if ($teat->getNombreTeatro() != '') {
                    echo "ELIJA UN NUEVO NOMBRE PARA EL TEATRO: " . "\n";
                    $nomT = trim(fgets(STDIN));
                    $teat->setNombreTeatro($nomT);
                } else {
                    echo ("Primero debe cargar los datos." . "\n");
                }    
            break;
            case '6':
                if ($teat->getNombreTeatro() != '') {
                    echo "ELIJA UNA NUEVA DIRECCION PARA EL TEATRO: " . "\n";
                    $dire = trim(fgets(STDIN));
                    $teat->setDireccion($dire);
                } else {
                    echo ("Primero debe cargar los datos." . "\n");
                }        
            case '7':
                if ($teat->getNombreTeatro() != '') {                    
                    $teat->darCostos();
                } else {
                    echo ("Primero debe cargar los datos." . "\n");
                }        
            break;
    }
} while ($opcion <> 0);
