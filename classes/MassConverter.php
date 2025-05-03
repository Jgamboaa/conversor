<?php
require_once 'Converter.php';

/**
 * Clase para la conversión de unidades de masa
 */
class MassConverter extends Converter
{

    public function __construct()
    {
        // Unidades disponibles
        $this->units = ['gramos', 'kilogramos', 'libras', 'onzas', 'toneladas'];

        // Factores de conversión a gramos (unidad base)
        $this->conversionFactors = [
            'gramos' => 1,
            'kilogramos' => 1000,
            'libras' => 453.592,
            'onzas' => 28.3495,
            'toneladas' => 1000000
        ];
    }

    /**
     * Realiza la conversión entre unidades de masa
     * @param float $value - El valor a convertir
     * @param string $fromUnit - La unidad de origen
     * @param string $toUnit - La unidad de destino
     * @return float - El resultado de la conversión
     */
    protected function performConversion($value, $fromUnit, $toUnit)
    {
        // Convertir primero a la unidad base (gramos)
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
        return 'Masa';
    }
}
