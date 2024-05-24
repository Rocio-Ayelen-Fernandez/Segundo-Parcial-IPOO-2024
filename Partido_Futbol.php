<?php

include_once 'Partido.php';
class Partido_Futbol extends Partido
{
    public function coeficientePartido()
    {
        $valor = parent::coeficientePartido();

        $coefMenores = 0.13;
        $coefJuveniles = 0.19;
        $coefMayores = 0.27;

        if (
            $this->getObjEquipo1()
                ->getObjCategoria()
                ->getDescripcion() == 'Mayores'
        ) {
            $valor *= 1 * $coefMayores;
        } elseif (
            $this->getObjEquipo1()
                ->getObjCategoria()
                ->getDescripcion() == 'juveniles'
        ) {
            $valor *= 1 * $coefJuveniles;
        } elseif (
            $this->getObjEquipo1()
                ->getObjCategoria()
                ->getDescripcion() == 'Menores'
        ) {
            $valor *= 1 * $coefMenores;
        }
        return $valor;
    }

    public function __toString()
    {
        return parent::__toString();
    }
}

?>
