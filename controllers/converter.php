<?php
// Prevenir acceso directo
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest')
{
    header('HTTP/1.0 403 Forbidden');
    exit('Acceso prohibido');
}

// Incluir las clases de conversión
require_once '../classes/Converter.php';
require_once '../classes/LengthConverter.php';
require_once '../classes/MassConverter.php';
require_once '../classes/TimeConverter.php';
require_once '../classes/TemperatureConverter.php';
require_once '../classes/EnergyConverter.php';

// Configuración
header('Content-Type: application/json');

// Verificar si se recibieron los parámetros necesarios
if (!isset($_POST['magnitude']) || !isset($_POST['value']) || !isset($_POST['fromUnit']) || !isset($_POST['toUnit']))
{
    echo json_encode([
        'status' => 'error',
        'message' => 'Faltan parámetros necesarios para la conversión'
    ]);
    exit;
}

// Obtener los parámetros
$magnitude = $_POST['magnitude'];
$value = $_POST['value'];
$fromUnit = $_POST['fromUnit'];
$toUnit = $_POST['toUnit'];

// Validar que el valor sea numérico
if (!is_numeric($value))
{
    echo json_encode([
        'status' => 'error',
        'message' => 'El valor debe ser numérico'
    ]);
    exit;
}

// Crear el conversor apropiado según la magnitud
$converter = null;
switch ($magnitude)
{
    case 'longitud':
        $converter = new LengthConverter();
        break;
    case 'masa':
        $converter = new MassConverter();
        break;
    case 'tiempo':
        $converter = new TimeConverter();
        break;
    case 'temperatura':
        $converter = new TemperatureConverter();
        break;
    case 'energia':
        $converter = new EnergyConverter();
        break;
    default:
        echo json_encode([
            'status' => 'error',
            'message' => 'Magnitud no soportada'
        ]);
        exit;
}

// Realizar la conversión
$result = $converter->convert($value, $fromUnit, $toUnit);

if ($result === null)
{
    echo json_encode([
        'status' => 'error',
        'message' => 'Error en la conversión. Verifique las unidades.'
    ]);
    exit;
}

// Formatear el resultado para valores muy grandes o pequeños
if (abs($result) < 0.0001 || abs($result) > 10000000)
{
    $formattedResult = sprintf("%.6e", $result);
}
else
{
    $formattedResult = number_format($result, 2, '.', ',');
}

// Devolver el resultado
echo json_encode([
    'status' => 'success',
    'result' => $result,
    'formattedResult' => $formattedResult,
    'originalValue' => $value,
    'fromUnit' => $fromUnit,
    'toUnit' => $toUnit,
    'magnitude' => $magnitude
]);
