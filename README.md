# Conversor de Unidades Físicas

Una aplicación web para realizar conversiones entre diferentes unidades físicas de manera clara y didáctica.

Este proyecto fue desarrollado para el curso Física I de la carrera Ingeniería en Sistemas de la Universidad Mariano Galvez de Guatemala con fines educativos.

## Descripción

Este proyecto implementa un conversor de unidades físicas utilizando PHP para el backend, y Bootstrap con jQuery para el frontend. La aplicación permite convertir entre diferentes unidades de las siguientes magnitudes físicas:

- **Longitud**: metros, centimetros, kilómetros, millas, pulgadas, pies
- **Masa**: gramos, kilogramos, libras, onzas, toneladas
- **Tiempo**: segundos, minutos, horas, días, semanas
- **Temperatura**: Celsius, Fahrenheit, Kelvin

## Características

- Interfaz limpia y responsiva diseñada con Bootstrap 5
- Conversión en tiempo real sin necesidad de recargar la página usando jQuery y AJAX
- Validación de entradas en el cliente y en el servidor
- Manejo claro de errores
- Arquitectura orientada a objetos con clases PHP bien estructuradas
- Diseño adaptable a dispositivos móviles

## Requisitos

- Servidor web Apache
- PHP 8.0 o superior
- Navegador web moderno con soporte para JavaScript

## Instalación

1. Clona o descarga este repositorio en tu servidor web local (por ejemplo, en la carpeta `www` o `htdocs`).

```bash
git clone https://github.com/Jgamboaa/conversor.git
```

2. No se requieren dependencias adicionales ni instalación de paquetes.

3. Accede a la aplicación desde tu navegador visitando:

```
http://localhost/fisica/
```

o, si estás usando un servidor virtual como Laragon:

```
http://fisica.dev/
```

## Estructura del proyecto

```
/fisica
|-- assets/
|   |-- css/
|   |   `-- styles.css
|   |-- img/
|   `-- js/
|       `-- app.js
|-- classes/
|   |-- Converter.php
|   |-- LengthConverter.php
|   |-- MassConverter.php
|   |-- TimeConverter.php
|   |-- TemperatureConverter.php
|   `-- EnergyConverter.php
|-- controllers/
|   `-- converter.php
|-- includes/
|-- index.php
`-- README.md
```

## Cómo usar

1. Abre la aplicación en tu navegador web.
2. Selecciona la magnitud física que deseas convertir (longitud, masa, etc.).
3. Ingresa el valor a convertir.
4. Selecciona la unidad de origen y la unidad destino.
5. El resultado se mostrará automáticamente sin necesidad de recargar la página.

También puedes intercambiar las unidades de origen y destino con el botón "Intercambiar unidades".

## Arquitectura

La aplicación sigue una arquitectura orientada a objetos:

- `Converter.php`: Clase base abstracta que define la estructura común para todos los conversores.
- Clases específicas para cada magnitud (LengthConverter, MassConverter, etc.) que extienden de la clase base.
- Controlador AJAX (`converter.php`) que recibe las peticiones del cliente y devuelve los resultados en formato JSON.
- Frontend con jQuery para manejar la interacción del usuario y las peticiones asincrónicas.

## Extensibilidad

Para añadir una nueva magnitud física:

1. Crea una nueva clase que extienda de `Converter.php`
2. Implementa los métodos abstractos
3. Añade la nueva magnitud en el objeto `magnitudes` en `app.js`

## Autor

- Jonatan Isaí Gamboa [@Jgamboaa](https://www.github.com/Jgamboaa)
