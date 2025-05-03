<?php
require_once 'Converter.php';

/**
 * Clase para la conversión de unidades de energía
 */
class EnergyConverter extends Converter
{

    public function __construct()
    {
        // Unidades disponibles
        $this->units = ['julios', 'calorias', 'kilovatios-hora', 'electronvoltios', 'btu'];

        // Factores de conversión a julios (unidad base)
        $this->conversionFactors = [
            'julios' => 1,
            'calorias' => 4.184,
            'kilovatios-hora' => 3600000,
            'electronvoltios' => 1.602176634e-19,
            'btu' => 1055.06
        ];
    }

    /**
     * Realiza la conversión entre unidades de energía
     * @param float $value - El valor a convertir
     * @param string $fromUnit - La unidad de origen
     * @param string $toUnit - La unidad de destino
     * @return float - El resultado de la conversión
     */
    protected function performConversion($value, $fromUnit, $toUnit)
    {
        // Convertir primero a la unidad base (julios)
        $valueInBaseUnit = $value * $this->conversionFactors[$fromUnit];

        // Convertir de unidad base a unidad destino
        $result = $valueInBaseUnit / $this->conversionFactors[$toUnit];

        // Si el resultado es muy pequeño o muy grande, aplicar notación científica
        if (abs($result) < 0.0001 || abs($result) > 10000000)
        {
            return $result;
        }

        return $result;
    }

    /**
     * Devuelve el nombre de la magnitud
     * @return string - Nombre de la magnitud
     */
    public function getMagnitudeName()
    {
        return 'Energía';
    }
}
