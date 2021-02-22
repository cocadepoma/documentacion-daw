<?php
interface Metodos
{
    function insertarIngrediente($nombre, $cantidad, $sal);
    function eliminarIngrediente($nombre);
    function cambiarCantidad($nombre, $cantidad);
    function isExcesosal();
}
