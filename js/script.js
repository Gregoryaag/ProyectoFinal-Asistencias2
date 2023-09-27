document.addEventListener("DOMContentLoaded", function () {
  var usuariosLink = document.getElementById("usuarios-link");
  var dropdownMenu = document.querySelector(".drop-menu");

  usuariosLink.addEventListener("click", function (event) {
    event.preventDefault(); // Evitar que el enlace siga el enlace href="#" por defecto

    if (dropdownMenu.style.display === "none" || dropdownMenu.style.display === "") {
      dropdownMenu.style.display = "block"; // Mostrar la lista desplegable
    } else {
      dropdownMenu.style.display = "none"; // Ocultar la lista desplegable
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  var usuariosLink = document.getElementById("cursos-link");
  var dropdownMenu = document.querySelector(".drop-menu-cursos");

  usuariosLink.addEventListener("click", function (event) {
    event.preventDefault(); // Evitar que el enlace siga el enlace href="#" por defecto

    if (dropdownMenu.style.display === "none" || dropdownMenu.style.display === "") {
      dropdownMenu.style.display = "block"; // Mostrar la lista desplegable
    } else {
      dropdownMenu.style.display = "none"; // Ocultar la lista desplegable
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  var usuariosLink = document.getElementById("reportes-link");
  var dropdownMenu = document.querySelector(".drop-menu-reportes");

  usuariosLink.addEventListener("click", function (event) {
    event.preventDefault(); // Evitar que el enlace siga el enlace href="#" por defecto

    if (dropdownMenu.style.display === "none" || dropdownMenu.style.display === "") {
      dropdownMenu.style.display = "block"; // Mostrar la lista desplegable
    } else {
      dropdownMenu.style.display = "none"; // Ocultar la lista desplegable
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  var cerrarSesionButton = document.getElementById("cerrarSesionButton");
  var mensajeCerrarSesion = document.getElementById("mensajeCerrarSesion");

  cerrarSesionButton.addEventListener("mouseenter", function () {
    mensajeCerrarSesion.style.display = "block"; // Mostrar el mensaje al pasar el mouse
  });

  cerrarSesionButton.addEventListener("mouseleave", function () {
    mensajeCerrarSesion.style.display = "none"; // Ocultar el mensaje al quitar el mouse
  });
});

/*
document.addEventListener("DOMContentLoaded", function() {
  var fechaNacimientoInput = document.getElementById("fechaNacimiento");

  fechaNacimientoInput.addEventListener("input", function() {
      var inputValue = fechaNacimientoInput.value;

      // Comprueba si la entrada coincide con el formato dd/mm/aaaa
      var regex = /^(\d{2})\/(\d{2})\/(\d{4})$/;
      if (regex.test(inputValue)) {
          // La entrada es válida, no hacemos nada
      } else {
          // La entrada no coincide con el formato esperado, borra el contenido
          fechaNacimientoInput.value = "";
      }
  });
});
*/

document.addEventListener("DOMContentLoaded", function () {
  var rolSelect = document.getElementById("rol");
  var categoriaContainer = document.getElementById("categoria-container");
  var cursoContainer = document.getElementById("curso-container");
  var cursoContainerAdd = document.getElementById("curso-container-add");
  var turnoContainer = document.getElementById("turno-container");
  var profesorContainer = document.getElementById("profesor-container");
  var salonContainer = document.getElementById("salon-container");

  // Función para mostrar u ocultar campos adicionales
  function toggleCamposAdicionales() {
    var selectedRol = rolSelect.value;

    // Oculta todos los grupos de campos adicionales
    categoriaContainer.style.display = "none";
    cursoContainer.style.display = "none";
    cursoContainerAdd.style.display = "none";
    turnoContainer.style.display = "none";
    profesorContainer.style.display = "none";
    salonContainer.style.display = "none";

    // Muestra el grupo de campos adicionales correspondiente al rol seleccionado
    if (selectedRol === "estudiante") {
      categoriaContainer.style.display = "block";
      cursoContainer.style.display = "block";
      turnoContainer.style.display = "block";
      profesorContainer.style.display = "block";
      salonContainer.style.display = "block";

    } else if (selectedRol === "profesor") {
      categoriaContainer.style.display = "block";
      cursoContainer.style.display = "block";
      cursoContainerAdd.style.display = "block";

    } else if (selectedRol === "administrador") {
    }
  }

  // Agrega un controlador de eventos al selector de "Rol" para mostrar/ocultar campos adicionales
  rolSelect.addEventListener("change", toggleCamposAdicionales);

  // Ejecuta la función para establecer el estado inicial
  toggleCamposAdicionales();
});






