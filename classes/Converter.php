<?php

/**
 * Clase abstracta que define la estructura básica para los conversores de unidades físicas
 * Esta clase sirve como base para todas las clases de conversión de unidades específicas
 */
abstract class Converter
{
    /**
     * Lista de unidades disponibles para la conversión
     * @var array
     */
    protected $units = [];

    /**
     * Factores de conversión entre unidades
     * @var array
     */
    protected $conversionFactors = [];

    /**
     * Realiza la conversión entre dos unidades
     * @param float $value - El valor a convertir
     * @param string $fromUnit - La unidad de origen
     * @param string $toUnit - La unidad de destino
     * @return float|null - El resultado de la conversión o null si hay un error
     */
    public function convert($value, $fromUnit, $toUnit)
    {
        // Verificación de parámetros
        if (!is_numeric($value))
        {
            return null;
        }

        // Verificar si las unidades existen
        if (!in_array($fromUnit, $this->units) || !in_array($toUnit, $this->units))
        {
            return null;
        }

        // Si son las mismas unidades, devolver el mismo valor
        if ($fromUnit === $toUnit)
        {
            return floatval($value);
        }

        // Realizar conversión específica según la magnitud
        return $this->performConversion($value, $fromUnit, $toUnit);
    }

    /**
     * Método abstracto para realizar la conversión específica de cada magnitud
     * @param float $value - El valor a convertir
     * @param string $fromUnit - La unidad de origen
     * @param string $toUnit - La unidad de destino
     * @return float - El resultado de la conversión
     */
    abstract protected function performConversion($value, $fromUnit, $toUnit);

    /**
     * Devuelve la lista de unidades disponibles para este conversor
     * @return array - Lista de unidades disponibles
     */
    public function getAvailableUnits()
    {
        return $this->units;
    }

    /**
     * Devuelve el nombre de la magnitud
     * @return string - Nombre de la magnitud
     */
    abstract public function getMagnitudeName();
}
