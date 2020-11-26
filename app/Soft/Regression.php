<?php

namespace App\Soft;

class Regression
{

    private $x_coordenadas = [];
    private $y_coordenadas = [];
    private $y_diferencias = [];
    private $suma_acumulada = [];
    public $pendiente;
    private $interseccion;
    private $r_cuadrada;
    private $conteo_coordenadas = 0;
    private $xy = [];


    function __construct()
    {
    }

    public function entrenar(array $x_coordenadas, array $y_coordenadas)
    {
        $this->restablecer_valores();
        $this->adjuntar_datos($x_coordenadas, $y_coordenadas);
        $this->calcular();
    }

    private function adjuntar_datos(array $x_coordenadas, array $y_coordenadas)
    {
        $this->x_coordenadas = array_merge($this->x_coordenadas, $x_coordenadas);
        $this->y_coordenadas = array_merge($this->y_coordenadas, $y_coordenadas);
        $this->contar_coordenadas();
    }

    private function restablecer_valores()
    {
        $this->pendiente         = null;
        $this->interseccion     = null;
        $this->r_cuadrada      = null;
        $this->y_diferencias  = [];
        $this->suma_acumulada = [];
        $this->xy            = [];
    }

    private function limpiar_datos()
    {
        $this->x_coordenadas         = [];
        $this->y_coordenadas         = [];
        $this->conteo_coordenadas = 0;
    }

    public function restablecer()
    {
        $this->restablecer_valores();
        $this->limpiar_datos();
    }

    public function getPendiente(): float
    {
        return $this->excepcion_nulo($this->pendiente);
    }

    public function getInterseccion(): float
    {
        return $this->excepcion_nulo($this->interseccion);
    }

    public function getR_cuadrada()
    {
        return $this->excepcion_nulo($this->r_cuadrada);
    }

    private function contar_coordenadas(): int
    {
        $this->conteo_coordenadas = count($this->x_coordenadas);
        $yCount                = count($this->y_coordenadas);

        if ($this->conteo_coordenadas != $yCount) {
            // TODO: Lanzar excepción
        }
        if ($this->conteo_coordenadas === 0) {
            // TODO: Lanzar excepción
        }
        return $this->conteo_coordenadas;
    }

    private function excepcion_nulo(float $value)
    {
        if (null === $value) {
            // TODO: Lanzar excepción
        }
        return $value;
    }

    private function calcular()
    {

        // calcular sumas
        $x_sum = array_sum($this->x_coordenadas);
        $y_sum = array_sum($this->y_coordenadas);

        $xx_sum = 0;
        $xy_sum = 0;
        $yy_sum = 0;

        for ($i = 0; $i < $this->conteo_coordenadas; $i++) {
            $xy_sum += ($this->x_coordenadas[$i] * $this->y_coordenadas[$i]);
            $xx_sum += ($this->x_coordenadas[$i] * $this->x_coordenadas[$i]);
            $yy_sum += ($this->y_coordenadas[$i] * $this->y_coordenadas[$i]);
        }

        // calcular pendiente
        $this->pendiente = (($this->conteo_coordenadas * $xy_sum) - ($x_sum * $y_sum)) / (($this->conteo_coordenadas * $xx_sum) - ($x_sum * $x_sum));

        // calcular interseccion
        $this->interseccion = ($y_sum - ($this->pendiente * $x_sum)) / $this->conteo_coordenadas;

        // Calcular R cuadrada
        // Math.pow((n*sum_xy - sum_x*sum_y)/Math.sqrt((n*sum_xx-sum_x*sum_x)*(n*sum_yy-sum_y*sum_y)),2);
        $this->r_cuadrada = POW(($this->conteo_coordenadas * $xy_sum - $x_sum * $y_sum) / sqrt(($this->conteo_coordenadas * $xx_sum - $x_sum * $x_sum) * ($this->conteo_coordenadas * $yy_sum - $y_sum * $y_sum)),
            2);

    }

    // Predice el valor X para un valor Y
    public function predecir_x(float $y): float
    {
        return ($y - $this->getInterseccion()) / $this->getPendiente();
    }

    // Predice el valor Y para un valor X
    public function predecir_y(float $x): float
    {
        return $this->getInterseccion() + ($x * $this->getPendiente());
    }

    // Obtiene la diferencia entre la línea de regresión y los verdaderos datos
    public function obtener_diferencia_regresion()
    {
        if (0 === count($this->y_diferencias)) {
            for ($i = 0; $i < $this->conteo_coordenadas; $i++) {
                $this->y_diferencias[] = $this->y_coordenadas[$i] - $this->predictY($this->x_coordenadas[$i]);
            }
        }
        return $this->y_diferencias;
    }

    // Suma acumulada de diferencias de la línea de regresión
    public function obtener_suma_acumulada_diferencias()
    {
        if (0 === count($this->suma_acumulada)) {
            $diferencias         = $this->obtener_diferencia_regresion();
            $this->suma_acumulada = [$diferencias[0]];
            for ($i = 1; $i < $this->conteo_coordenadas; $i++) {
                $this->suma_acumulada[$i] = $diferencias[$i] + $this->suma_acumulada[$i - 1];
            }
        }
        return $this->suma_acumulada;
    }

    public function obtener_media_y()
    {
        return array_sum($this->y_coordenadas) / $this->conteo_coordenadas;
    }


    public function obtener_puntos_regresion()
    {
        if (0 == count($this->xy)) {
            $minX      = min($this->x_coordenadas);
            $maxX      = max($this->x_coordenadas);
            $x_tamanio_paso = (($maxX - $minX) / ($this->conteo_coordenadas - 1));
            $this->xy  = [];
            for ($i = 0; $i < $this->conteo_coordenadas; $i++) {
                $x          = $minX + ($i * $x_tamanio_paso);
                $y          = $this->predictY($x);
                $this->xy[] = new Point($x, $y); // add point
            }
        }
        return $this->xy;
    }
}