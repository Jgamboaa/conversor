/**
 * app.js - Funcionalidades principales para el conversor de unidades físicas
 */
$(document).ready(function () {
  // Objeto con la configuración de las magnitudes y sus unidades disponibles
  const magnitudes = {
    longitud: {
      nombre: "Longitud",
      unidades: {
        metros: "Metros (m)",
        centimetros: "Centímetros (cm)",
        kilometros: "Kilómetros (km)",
        millas: "Millas (mi)",
        pulgadas: "Pulgadas (in)",
        pies: "Pies (ft)",
      },
      icono: "fas fa-ruler",
    },
    masa: {
      nombre: "Masa",
      unidades: {
        gramos: "Gramos (g)",
        kilogramos: "Kilogramos (kg)",
        libras: "Libras (lb)",
        onzas: "Onzas (oz)",
        toneladas: "Toneladas (t)",
      },
      icono: "fas fa-weight-hanging",
    },
    tiempo: {
      nombre: "Tiempo",
      unidades: {
        segundos: "Segundos (s)",
        minutos: "Minutos (min)",
        horas: "Horas (h)",
        dias: "Días (d)",
        semanas: "Semanas (sem)",
      },
      icono: "far fa-clock",
    },
    temperatura: {
      nombre: "Temperatura",
      unidades: {
        celsius: "Celsius (°C)",
        fahrenheit: "Fahrenheit (°F)",
        kelvin: "Kelvin (K)",
      },
      icono: "fas fa-thermometer-half",
    },
  };

  // Cargar el selector de magnitudes
  const $magnitudeSelect = $("#magnitude");
  $.each(magnitudes, function (key, value) {
    $magnitudeSelect.append(
      $("<option></option>")
        .attr("value", key)
        .text(value.nombre)
        .data("icon", value.icono)
    );
  });

  // Función para actualizar las unidades disponibles según la magnitud seleccionada
  function updateUnits() {
    const selectedMagnitude = $("#magnitude").val();
    const units = magnitudes[selectedMagnitude].unidades;
    const $fromUnit = $("#fromUnit");
    const $toUnit = $("#toUnit");

    // Guardar las selecciones actuales si existen
    const currentFromUnit = $fromUnit.val();
    const currentToUnit = $toUnit.val();

    // Limpiar los selectores
    $fromUnit.empty();
    $toUnit.empty();

    // Agregar las nuevas opciones
    $.each(units, function (key, value) {
      $fromUnit.append($("<option></option>").attr("value", key).text(value));
      $toUnit.append($("<option></option>").attr("value", key).text(value));
    });

    // Intentar restaurar las selecciones anteriores si son válidas
    if (units[currentFromUnit]) {
      $fromUnit.val(currentFromUnit);
    }
    if (units[currentToUnit]) {
      $toUnit.val(currentToUnit);
    }

    // Actualizar icono de la magnitud
    $("#magnitude-icon")
      .removeClass()
      .addClass(magnitudes[selectedMagnitude].icono + " magnitude-icon");
  }

  // Evento de cambio en el selector de magnitud
  $("#magnitude").on("change", function () {
    updateUnits();
    // Limpiar el valor de entrada
    $("#value").val("");
    // También limpiar resultados anteriores
    $("#result-container").addClass("d-none");
    $("#error-message").addClass("d-none");
  });

  // Inicializar las unidades con la primera magnitud
  updateUnits();

  // Función para validar el formulario
  function validateForm() {
    const value = $("#value").val();

    // Verificar que el valor sea numérico
    if (!$.isNumeric(value)) {
      showError("Por favor ingrese un valor numérico válido");
      return false;
    }

    return true;
  }

  // Función para mostrar errores
  function showError(message) {
    const $errorMessage = $("#error-message");
    $errorMessage.text(message);
    $errorMessage.removeClass("d-none");
    $("#result-container").addClass("d-none");
  }

  // Función para realizar la conversión vía AJAX
  function performConversion() {
    if (!validateForm()) {
      return;
    }

    // Ocultar mensajes anteriores
    $("#error-message").addClass("d-none");

    // Mostrar indicador de carga
    $("#loading-spinner").removeClass("d-none");

    const formData = {
      magnitude: $("#magnitude").val(),
      value: $("#value").val(),
      fromUnit: $("#fromUnit").val(),
      toUnit: $("#toUnit").val(),
    };

    $.ajax({
      url: "controllers/converter.php",
      type: "POST",
      data: formData,
      dataType: "json",
      success: function (response) {
        $("#loading-spinner").addClass("d-none");

        if (response.status === "error") {
          showError(response.message);
          return;
        }

        // Mostrar el resultado
        $("#result-value").text(response.formattedResult);
        $("#result-from").text($("#fromUnit option:selected").text());
        $("#result-to").text($("#toUnit option:selected").text());

        // Mostrar el contenedor de resultados con animación
        $("#result-container").removeClass("d-none").addClass("fade-in");
      },
      error: function () {
        $("#loading-spinner").addClass("d-none");
        showError(
          "Ha ocurrido un error al procesar la solicitud. Por favor, inténtalo de nuevo."
        );
      },
    });
  }

  // Evento de envío del formulario
  $("#converter-form").on("submit", function (e) {
    e.preventDefault();
    performConversion();
  });

  // Conversión automática cuando cambian los selectores
  $("#fromUnit, #toUnit").on("change", function () {
    if ($("#value").val()) {
      performConversion();
    }
  });

  // Conversión a medida que se escribe (con pequeño retraso)
  let typingTimer;
  $("#value").on("input", function () {
    clearTimeout(typingTimer);
    typingTimer = setTimeout(performConversion, 500);
  });

  // Botón para intercambiar unidades
  $("#swap-units").on("click", function () {
    const fromUnit = $("#fromUnit").val();
    const toUnit = $("#toUnit").val();

    $("#fromUnit").val(toUnit);
    $("#toUnit").val(fromUnit);

    if ($("#value").val()) {
      performConversion();
    }
  });
});
