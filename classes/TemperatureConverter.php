<?php
require_once 'Converter.php';

/**
 * Clase para la conversión de unidades de temperatura
 */
class TemperatureConverter extends Converter
{

    public function __construct()
    {
        // Unidades disponibles
        $this->units = ['celsius', 'fahrenheit', 'kelvin'];
    }

    /**
     * Realiza la conversión entre unidades de temperatura
     * Las conversiones de temperatura requieren fórmulas especiales, no solo factores multiplicativos
     * @param float $value - El valor a convertir
     * @param string $fromUnit - La unidad de origen
     * @param string $toUnit - La unidad de destino
     * @return float - El resultado de la conversión
     */
    protected function performConversion($value, $fromUnit, $toUnit)
    {
        // Primero convertimos al valor a Celsius (unidad base)
        $valueInCelsius = $this->toCelsius($value, $fromUnit);

        // Luego convertimos de Celsius a la unidad destino
        $result = $this->fromCelsius($valueInCelsius, $toUnit);

        return $result;
    }

    /**
     * Convierte una temperatura a Celsius
     * @param float $value - Valor de temperatura
     * @param string $fromUnit - Unidad original
     * @return float - Temperatura en Celsius
     */
    private function toCelsius($value, $fromUnit)
    {
        switch ($fromUnit)
        {
            case 'celsius':
                return $value;
            case 'fahrenheit':
                return ($value - 32) * 5 / 9;
            case 'kelvin':
                return $value - 273.15;
            default:
                return $value;
        }
    }

    /**
     * Convierte una temperatura desde Celsius a otra unidad
     * @param float $celsius - Valor en Celsius
     * @param string $toUnit - Unidad destino
     * @return float - Temperatura en la unidad destino
     */
    private function fromCelsius($celsius, $toUnit)
    {
        switch ($toUnit)
        {
            case 'celsius':
                return $celsius;
            case 'fahrenheit':
                return ($celsius * 9 / 5) + 32;
            case 'kelvin':
                return $celsius + 273.15;
            default:
                return $celsius;
        }
    }

    /**
     * Devuelve el nombre de la magnitud
     * @return string - Nombre de la magnitud
     */
    public function getMagnitudeName()
    {
        return 'Temperatura';
    }
}
