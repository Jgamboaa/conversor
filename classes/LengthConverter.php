<?php
require_once 'Converter.php';

/**
 * Clase para la conversión de unidades de longitud
 */
class LengthConverter extends Converter
{

    public function __construct()
    {
        // Unidades disponibles
        $this->units = ['metros', 'centimetros', 'kilometros', 'millas', 'pulgadas', 'pies'];

        // Factores de conversión a metros (unidad base)
        $this->conversionFactors = [
            'metros' => 1,
            'centimetros' => 0.01,
            'kilometros' => 1000,
            'millas' => 1609.34,
            'pulgadas' => 0.0254,
            'pies' => 0.3048
        ];
    }

    /**
     * Realiza la conversión entre unidades de longitud
     * @param float $value - El valor a convertir
     * @param string $fromUnit - La unidad de origen
     * @param string $toUnit - La unidad de destino
     * @return float - El resultado de la conversión
     */
    protected function performConversion($value, $fromUnit, $toUnit)
    {
        // Convertir primero a la unidad base (metros)
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
        return 'Longitud';
    }
}
