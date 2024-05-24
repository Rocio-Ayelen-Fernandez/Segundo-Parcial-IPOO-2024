<?php

include_once 'Partido.php';
class Partido_Basquetbol extends Partido
{
    private $infracciones;

    public function __construct(
        $idpartido,
        $fecha,
        $objEquipo1,
        $cantGolesE1,
        $objEquipo2,
        $cantGolesE2,
        $infracciones
    ) {
        parent::__construct(
            $idpartido,
            $fecha,
            $objEquipo1,
            $cantGolesE1,
            $objEquipo2,
            $cantGolesE2
        );
        $this->infracciones = $infracciones;
    }

    //METODOS DE ACCESO
    //GETTERS

    public function setInfracciones($infracciones)
    {
        $this->infracciones = $infracciones;
    }

    //SETTERS
    public function getInfracciones()
    {
        return $this->infracciones;
    }

    /**
     * Por otro lado, si se trata de un partido de basquetbol  se almacena
     * la cantidad de infracciones de manera tal que al coeficiente base se debe
     * restar un coeficiente de penalización, cuyo valor por defecto es: 0.75, *
     * (por) la cantidad de infracciones. Es decir:
     * coef  = coeficiente_base_partido  - (coef_penalización*cant_infracciones);
     */
    public function coeficientePartido()
    {
        $valor = parent::coeficientePartido();
        $coefPenalizacion = 0.75;

        $valor -= $coefPenalizacion * $this->getInfracciones();

        return $valor;
    }

    public function __toString()
    {
        return parent::__toString() .
            ', Infracciones: ' .
            $this->getInfracciones();
    }
}
?>

