<?php
include_once 'Categoria.php';
include_once 'Torneo.php';
include_once 'Equipo.php';
include_once 'Partido.php';
include_once 'Partido_Futbol.php';
include_once 'Partido_Basquetbol.php';

$catMayores = new Categoria(1, 'Mayores');
$catJuveniles = new Categoria(2, 'juveniles');
$catMenores = new Categoria(1, 'Menores');

$objE1 = new Equipo('Equipo Uno', 'Cap.Uno', 1, $catMayores);
$objE2 = new Equipo('Equipo Dos', 'Cap.Dos', 2, $catMayores);

$objE3 = new Equipo('Equipo Tres', 'Cap.Tres', 3, $catJuveniles);
$objE4 = new Equipo('Equipo Cuatro', 'Cap.Cuatro', 4, $catJuveniles);

$objE5 = new Equipo('Equipo Cinco', 'Cap.Cinco', 5, $catMayores);
$objE6 = new Equipo('Equipo Seis', 'Cap.Seis', 6, $catMayores);

$objE7 = new Equipo('Equipo Siete', 'Cap.Siete', 7, $catJuveniles);
$objE8 = new Equipo('Equipo Ocho', 'Cap.Ocho', 8, $catJuveniles);

$objE9 = new Equipo('Equipo Nueve', 'Cap.Nueve', 9, $catMenores);
$objE10 = new Equipo('Equipo Diez', 'Cap.Diez', 9, $catMenores);

$objE11 = new Equipo('Equipo Once', 'Cap.Once', 11, $catMayores);
$objE12 = new Equipo('Equipo Doce', 'Cap.Doce', 11, $catMayores);

//EJERCICIOS TEST
//__construct($importePremio)
$objTorneo = new Torneo(100000);

//Crear 3 obj Basquet
//__construct($idpartido,$fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2,$infracciones)

$objPartidoBasquet1 = new Partido_Basquetbol(
    11,
    '2024-05-05',
    $objE7,
    80,
    $objE8,
    120,
    7
);
$objPartidoBasquet2 = new Partido_Basquetbol(
    12,
    '2024-05-06',
    $objE9,
    81,
    $objE10,
    110,
    8
);
$objPartidoBasquet3 = new Partido_Basquetbol(
    13,
    '2024-05-07',
    $objE11,
    115,
    $objE12,
    85,
    9
);

//Crear 4 obj Futbol
//__construct($idpartido, $fecha, $objEquipo1, $cantGolesE1, $objEquipo2,$cantGolesE2)
$objPartidoFutbol1 = new Partido_Futbol(14, '2024-05-07', $objE1, 3, $objE2, 2);
$objPartidoFutbol2 = new Partido_Futbol(15, '2024-05-08', $objE3, 0, $objE4, 1);
$objPartidoFutbol3 = new Partido_Futbol(16, '2024-05-09', $objE5, 2, $objE6, 3);

//EJERCICIO 3

echo "IngresarPartido - objE5, objE11, 2024-05-23, Futbol \n";
print_r($objTorneo->ingresarPartido($objE5, $objE11, '2024-05-23', 'Futbol'));

echo "------Torneo-----\n" . $objTorneo . "\n";

echo "IngresarPartido - objE11, objE11, 2024-05-23, Basquetbol \n";
print_r(
    $objTorneo->ingresarPartido($objE11, $objE11, '2024-05-23', 'Basquetbol')
);

echo "------Torneo-----\n" . $objTorneo . "\n";

echo "IngresarPartido - objE9, objE10, 2024-05-23, Basquetbol \n";
print_r(
    $objTorneo->ingresarPartido($objE9, $objE10, '2024-05-23', 'Basquetbol')
);

echo "------Torneo-----\n" . $objTorneo . "\n";

echo "Ganadores Basquet\n";
print_r($objTorneo->darGanadores('Basquetbol'));

echo "Ganadores Futbol\n";
print_r($objTorneo->darGanadores('Futbol'));

echo "calcularPremioPartido\n";
echo "A-\nPartidos BASQUET\n";
echo "Partido_1\n";
print_r($objTorneo->calcularPremioPartido($objPartidoBasquet1));

echo "Partido_2\n";
print_r($objTorneo->calcularPremioPartido($objPartidoBasquet2));

echo "Partido_3\n";
print_r($objTorneo->calcularPremioPartido($objPartidoBasquet3));

echo "A-\nPartidos FUTBOL\n";

echo "Partido_1\n";
print_r($objTorneo->calcularPremioPartido($objPartidoFutbol1));

echo "Partido_2\n";
print_r($objTorneo->calcularPremioPartido($objPartidoFutbol2));

echo "Partido_3\n";
print_r($objTorneo->calcularPremioPartido($objPartidoFutbol3));

?>
