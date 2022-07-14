<?php
class GlucosaCalc{

    //Variables
    private $glucosa;
    private $ayuna;

    //Asignacion de atributos
    public function Asignar($glucosa,$ayuna)
    {
        $this->glucosa = $glucosa;
        $this->ayuna = $ayuna;
    }

    //Metodo para calcular la glucosa
    public function CalcularGlucosa()
    {
        $glucosa = $this->glucosa;
        $ayuna = $this->ayuna;
        $resultado = 0;
        if($ayuna == "si")
        {
            if($glucosa >= 70 && $glucosa < 100)
            {
                $resultado = "Sin diabetes";
            }
            if($glucosa >= 100 && $glucosa < 125)
            {
                $resultado = "Pre Diabetes";
            }
            if($glucosa >= 126 )
            {
                $resultado = "Diabetes";
            }
        }
        else
        {
            if($glucosa < 140){
                $resultado = "Sin diabetes";
            }
            if($glucosa >= 140 && $glucosa < 200){
                $resultado = "Pre Diabetes";
            }
            if($glucosa >= 200){
                $resultado = "Diabetes";
            }
        }
        return $resultado;
    }
}
?>