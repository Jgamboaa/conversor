<?php
require_once 'Converter.php';

/**
 * Clase para la conversión de unidades de tiempo
 */
class TimeConverter extends Converter
{

    public function __construct()
    {
        // Unidades disponibles
        $this->units = ['segundos', 'minutos', 'horas', 'dias', 'semanas'];

        // Factores de conversión a segundos (unidad base)
        $this->conversionFactors = [
            'segundos' => 1,
            'minutos' => 60,
            'horas' => 3600,
            'dias' => 86400,
            'semanas' => 604800
        ];
    }

    /**
     * Realiza la conversión entre unidades de tiempo
     * @param float $value - El valor a convertir
     * @param string $fromUnit - La unidad de origen
     * @param string $toUnit - La unidad de destino
     * @return float - El resultado de la conversión
     */
    protected function performConversion($value, $fromUnit, $toUnit)
    {
        // Convertir primero a la unidad base (segundos)
        $valueInBaseUnit = $value * $this->conversionFactors[$fromUnit];

        // Convertir de unidad base a unidad destino
        $result = $valueInBaseUnit / $this->conversionFactors[$toUnit];

        return $result;
    }

    /**
     * Devuelve el nombre de la magnitud
     * @return string - Nombre de la magnitud
     */
    public function getMagnitudeName()
    {
        return 'Tiempo';
    }
}
