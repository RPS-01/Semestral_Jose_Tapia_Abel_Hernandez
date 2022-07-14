<?php
class Presion{

    //Variables
    private $sistolica;
    private $diastolica;


    //Asignacion de atributos
    public function Asignar($sistolica,$diastolica)
    {
        $this->sistolica = $sistolica;
        $this->diastolica = $diastolica;
    }

    //Metodo para calcular la presion
    public function CalcularPresion()
    {
        $sistolica = $this->sistolica;
        $diastolica = $this->diastolica;
        $resultado = 0;
        if( $sistolica < 120 && $diastolica < 80)
        {
            $resultado = "Normal";
        }
        if($sistolica >= 120 && $sistolica < 130 && $diastolica < 81)
        {
            $resultado = "Elevada";
        }
        if($sistolica >= 130 && $sistolica < 140 || $diastolica >= 80 && $diastolica < 90)
        {
            $resultado = "Presión Arterial Alta (Hipertensión) Nivel 1";
        }
        if($sistolica >= 140 || $diastolica >= 90)
        {
            $resultado = "Presión Arterial Alta (Hipertensión) Nivel 2";
        }
        if($sistolica > 180 || $diastolica > 120)
        {
            $resultado = "Crisis de Hipertensión";
        }
        return $resultado;
    }
    
}
