<?php


include_once('./class-recetas.php');

$receta1 = new Receta("paella", 60);
$receta1->insertarIngrediente('conejo', 1000, 2);
$receta1->insertarIngrediente('arroz', 150, 0);
$receta1->insertarIngrediente('costilla', 200);
$receta1->insertarIngrediente('calamar', 100, 3);
$receta1->insertarIngrediente('almejas', 100, 1);

$receta1->mostrar();

echo "<br>";

if ($receta1->isExcesosal()) {
    echo "hay exceso";
} else {
    echo "no hay exceso";
}

echo "<br>";

$receta1->eliminarIngrediente('almejas', 0);
$receta1->cambiarCantidad('arroz', 300);

echo "<br>";

$receta1->mostrar();
