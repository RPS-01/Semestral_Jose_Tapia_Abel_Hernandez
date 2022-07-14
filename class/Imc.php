<?php
class Peso{

    //Variables
    private $peso;
    private $altura;

    //Asignacion de atributos
    public function Asignar($peso,$altura)
    {
        $this->peso = $peso;
        $this->altura = $altura;
    }
    //Metodo para calcular el indice de masa corporal
    public function CalcularIMC()
    {
        $peso = $this->peso;
        $altura = $this->altura;
        $imc = 0;
        $imc = $peso / ($altura * $altura);
        $imc = number_format((float)$imc, 1, '.', '');
        return $imc;
    }
    //Metodo para determinar el tipo de peso
    public function CalcularPeso(){
        $imc = $this->CalcularIMC();
        if($imc < 18.5){
            $resultado = "Peso bajo";
        }
        if($imc >= 18.5 && $imc < 25){
            $resultado = "Peso normal";
        }
        if($imc >= 25 && $imc < 30){
            $resultado = "Peso sobrepeso";
        }
        if($imc >= 30 && $imc < 40){
            $resultado = "Obesidad";
        }
        if($imc >= 40){
            $resultado = "Obesidad extrema";
        }
        return $resultado;
    }
    
}
?>