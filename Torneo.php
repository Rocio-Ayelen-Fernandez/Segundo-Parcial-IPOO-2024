<?php

include_once 'Partido_Futbol.php';
include_once 'Partido_Basquetbol.php';

class Torneo
{
    private $colPartidos;
    private $importePremio;

    //CONSTRUCTOR
    public function __construct($importePremio)
    {
        $this->colPartidos = [];
        $this->importePremio = $importePremio;
    }

    //GETTERS
    public function getColPartidos()
    {
        return $this->colPartidos;
    }
    public function getImportePremio()
    {
        return $this->importePremio;
    }
    //SETTERS
    public function setImportePremio($importePremio)
    {
        $this->importePremio = $importePremio;
    }
    public function setColPartidos($colPartidos)
    {
        $this->colPartidos = $colPartidos;
    }

    /**
     * Implementar el método ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido) 
     * en la  clase Torneo el cual recibe por parámetro 2 equipos, la fecha en la que se realizará 
     * el partido y si se trata de un partido de futbol o basquetbol . El método debe crear y 
     * retornar la instancia de la clase Partido que corresponda y almacenarla en la colección 
     * de partidos del Torneo. Se debe chequear que los 2 equipos tengan la misma categoría e igual 
     * cantidad de jugadores, caso contrario no podrá ser registrado ese partido en el torneo.  

     */
    public function ingresarPartido(
        $OBJEquipo1,
        $OBJEquipo2,
        $fecha,
        $tipoPartido
    ) {
        $nuevoPartido = null; //Setteamos como null por si no coinciden los datos
        //VERIFICAMOS QUE TENGAN LA MISMA CANTIDAD DE JUGADORES Y TIPO DE CATEGORIA
        if (
            $OBJEquipo1->getObjCategoria()->getDescripcion() ==
                $OBJEquipo2->getObjCategoria()->getDescripcion() &&
            $OBJEquipo1->getCantJugadores() == $OBJEquipo2->getCantJugadores()
        ) {
            //REALIZAMOS PARA FUTBOL
            if ($tipoPartido == 'Futbol') {
                $nuevoPartido = new Partido_Futbol(
                    count($this->getColPartidos()) + 1,
                    $fecha,
                    $OBJEquipo1,
                    0,
                    $OBJEquipo2,
                    0
                );
                //O PARA BASQUETBOL
            } elseif ($tipoPartido == 'Basquetbol') {
                $nuevoPartido = new Partido_Futbol(
                    count($this->getColPartidos()) + 1,
                    $fecha,
                    $OBJEquipo1,
                    0,
                    $OBJEquipo2,
                    0,
                    0
                );
            }
            //AGREGAMOS EL PARTIDO A LA COLECCION
            $nuevaColeccion = $this->getColPartidos();
            $nuevaColeccion[count($nuevaColeccion)] = $nuevoPartido;

            $this->setColPartidos($nuevaColeccion);
        }
        //RETORNAMOS LA NUEVA INSTANCIA
        return $nuevoPartido;
    }

    /**
     * Implementar el método darGanadores($deporte) en la clase Torneo que
     * recibe por parámetro si se trata de un partido de fútbol o de básquetbol
     * y en  base  al parámetro busca entre esos partidos los equipos ganadores
     * ( equipo con mayor cantidad de goles). El método retorna una colección con
     * los objetos de los equipos encontrados.
     */
    public function darGanadores($deporte)
    {
        $coleccionEquipos = [];

        if ($deporte == 'Basquetbol') {
            foreach ($this->getColPartidos() as $partido) {
                if ($partido instanceof Partido_Basquetbol) {
                    $coleccionEquipos[
                        count($coleccionEquipos)
                    ] = $partido->darEquipoGanador();
                }
            }
        } else {
            foreach ($this->getColPartidos() as $partido) {
                if ($partido instanceof Partido_Futbol) {
                    $coleccionEquipos[
                        count($coleccionEquipos)
                    ] = $partido->darEquipoGanador();
                }
            }
        }

        return $coleccionEquipos;
    }

    /**
     * Implementar el método calcularPremioPartido($OBJPartido) que debe retornar
     * un arreglo asociativo donde una de sus claves es ‘equipoGanador’  y contiene
     * la referencia al equipo ganador; y la otra clave es ‘premioPartido’ que contiene
     * el valor obtenido del coeficiente del Partido por el importe configurado para el torneo.
     * (premioPartido = Coef_partido * ImportePremio)
     */
    public function calcularPremioPartido($OBJPartido)
    {
        $premio = $OBJPartido->coeficientePartido() * $this->getImportePremio();

        $arregloPremio = [
            'equipoGanador' => $OBJPartido->darEquipoGanador(),
            'premioPartido' => $premio,
        ];

        return $arregloPremio;
    }

    public function darString()
    {
        $cadena = '';
        foreach ($this->getColPartidos() as $partido) {
            $cadena = $cadena . $partido . "\n";
        }
        if ($cadena == '') {
            $cadena = 'No hay partidos ingresados ';
        }
        return $cadena;
    }

    //STRING
    public function __toString()
    {
        return "Partidos:\n" .
            $this->darString() .
            'Importe del premio: ' .
            $this->getImportePremio();
    }
}

?>
