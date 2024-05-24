<?php
class Equipo
{
    private $nombre;
    private $capitan;
    private $cantJugadores;
    private $objCategoria;

    public function __construct(
        $nombre,
        $capitan,
        $cantJugadores,
        $objCategoria
    ) {
        $this->nombre = $nombre;
        $this->capitan = $capitan;
        $this->cantJugadores = $cantJugadores;
        $this->objCategoria = $objCategoria;
    }

    //GETTERS
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getCapitan()
    {
        return $this->capitan;
    }
    public function getCantJugadores()
    {
        return $this->cantJugadores;
    }
    public function getObjCategoria()
    {
        return $this->objCategoria;
    }

    //SETTERS
    public function setCapitan($capitan)
    {
        $this->capitan = $capitan;
    }

    public function setCantJugadores($cantJugadores)
    {
        $this->cantJugadores = $cantJugadores;
    }

    public function setObjCategoria($objCategoria)
    {
        $this->objCategoria = $objCategoria;
    }

    public function __toString()
    {
        //string $cadena
        $cadena = 'Nombre: ' . $this->getNombre() . "\n";
        $cadena = $cadena . 'capitan: ' . $this->getCapitan() . "\n";
        $cadena =
            $cadena .
            'Categoria: ' .
            $this->getObjCategoria()->getDescripcion() .
            "\n";
        $cadena =
            $cadena . 'Cant. Jugadores: ' . $this->getCantJugadores() . "\n";
        return $cadena;
    }
}
?>
