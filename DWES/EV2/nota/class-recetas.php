<?php

include_once('./interface-metodos.php');

class Receta
{

    private $nombre;
    private $tiempo;
    private $ingredientes = array();
    private $sal;

    public function __construct($nombre, $tiempo)
    {
        $this->nombre = $nombre;
        $this->tiempo = $tiempo;
    }

    public function insertarIngrediente($nombre, $cantidad, $sal = 0)
    {
        $existe = false;

        if (count($this->ingredientes) > 0) {

            foreach ($this->ingredientes as $ingrediente) {
                if ($nombre === $ingrediente) {
                    $this->ingredientes[$nombre] += $cantidad;
                    $existe = true;
                }
            }

            if (!$existe) {
                $this->ingredientes[$nombre] = $cantidad;
            }
        } else {
            $this->ingredientes[$nombre] = $cantidad;
        }

        $this->sal += $sal;
    }
    public function eliminarIngrediente($nombre)
    {
        foreach ($this->ingredientes as $ingrediente => $cant) {

            if ($nombre == $ingrediente) {
                unset($this->ingredientes[$nombre]);
            }
        }
    }
    public function cambiarCantidad($nombre, $cantidad)
    {

        foreach ($this->ingredientes as $ingrediente => $cant) {
            if ($nombre == $ingrediente) {
                $this->ingredientes[$nombre] = $cantidad;
            }
        }
    }
    public function isExcesosal()
    {
        if ($this->sal > 10) {
            return true;
        } else {
            return false;
        }
    }

    public function mostrar()
    {
        echo "Receta: $this->nombre";
        echo "<br>";
        echo "Tiempo: $this->tiempo";
        echo "<br>";
        foreach ($this->ingredientes as $ingrediente => $cantidad) {
            echo "Ingrediente:" . $ingrediente . "| Cantidad:" . $cantidad;
            echo "<br>:";
        }
        echo "Cantidad Sal: $this->sal";
    }
}
