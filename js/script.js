

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

// Obtener el elemento del botón de cierre de sesión
const cerrarSesionButton = document.getElementById("cerrarSesion");

// Función para manejar el evento de cambio del botón de cierre de sesión
function handleCierreSesion() {
    // Verificar si el botón está activado (checked)
    if (cerrarSesionButton.checked) {
        // Desactivar temporalmente el botón y realizar la animación de slider
        cerrarSesionButton.disabled = true;
        sliderAnimation().then(() => {
            // Cuando se completa la animación, mostrar la ventana de confirmación personalizada
            showCustomConfirmation();
        });
    }
}

// Función para simular la animación de slider (puedes personalizar esta función)
function sliderAnimation() {
    return new Promise((resolve) => {
        setTimeout(() => {
            // Simular la animación (cambia el estado del botón después de un retraso)
            cerrarSesionButton.checked = true;
            setTimeout(() => {
                cerrarSesionButton.checked = false;
                resolve(); // Resuelve la promesa después de la animación
            }, 400); // Duración de la animación en milisegundos 
        }, 200); // Retraso antes de la animación en milisegundos 
    });
}

function cambiorol() {
  var rolSelect = document.getElementById("rol");
  if (rolSelect.value === "2") { // Identificador del rol "estudiante"
    console.log('aja');
    modalidadContainer.style.display = "block";
    inscripcionContainer.style.display = "block";
  } else if (rolSelect.value === "3") { // Identificador del rol "profesor"
    categoriaContainer.style.display = "block";
    cursoContainer.style.display = "none";
    diplomadoContainer.style.display = "none";
  } else if (rolSelect.value === "1") { // Identificador del rol "administrador"
    
  }

}

// Función para mostrar una ventana de confirmación personalizada
function showCustomConfirmation() {
    const confirmacion = window.confirm("¿Estás seguro de que deseas cerrar la sesión?");
    cerrarSesionButton.disabled = false; // Reactivar el botón
    if (confirmacion) {
        // Si el usuario hace clic en "Sí", redirigir a la página de inicio de sesión
        window.location.href = "paginas/login-admin.php";
    } else {
        // Si el usuario hace clic en "No", desactivar el botón de cierre de sesión
        cerrarSesionButton.checked = false;
    }
}

// Agregar un evento de cambio al botón de cierre de sesión
cerrarSesionButton.addEventListener("change", handleCierreSesion);



document.addEventListener("DOMContentLoaded", function () {
  var rolSelect = document.getElementById("rol");
  var categoriaContainer = document.getElementById("categoria-container");
  var cursoContainer = document.getElementById("curso-container");
  var diplomadoContainer = document.getElementById("diplomado-container");
  var turnoContainer = document.getElementById("turno-container");
  var profesorContainer = document.getElementById("profesor-container");
  var inscripcionContainer = document.getElementById("select-inscripcion-container");
  var modalidadContainer = document.getElementById("select-modalidad-container");

  // Función para mostrar u ocultar campos adicionales
  function toggleCamposAdicionales() {
    var selectedRolId = rolSelect.value;

    // Oculta todos los grupos de campos adicionales
    categoriaContainer.style.display = "none";
    cursoContainer.style.display = "none";
    diplomadoContainer.style.display = "none";
    turnoContainer.style.display = "none";
    profesorContainer.style.display = "none";
    inscripcionContainer.style.display = "none";
    modalidadContainer.style.display = "none";

    // Muestra el grupo de campos adicionales correspondiente al rol seleccionado
    if (selectedRolId === "2") { // Identificador del rol "estudiante"
      modalidadContainer.style.display = "block";
      inscripcionContainer.style.display = "block";
    } else if (selectedRolId === "3") { // Identificador del rol "profesor"
      categoriaContainer.style.display = "block";
      cursoContainer.style.display = "none";
      diplomadoContainer.style.display = "none";
    } else if (selectedRolId === "1") { // Identificador del rol "administrador"
      
    }
  }

  // Agrega un controlador de eventos al selector de "Rol" para mostrar/ocultar campos adicionales
  rolSelect.addEventListener("change", toggleCamposAdicionales);

  // Llamar manualmente a la función para aplicar las condiciones y mostrar/ocultar campos adicionales
  toggleCamposAdicionales();
});




document.addEventListener("DOMContentLoaded", function () {
  var inscripcionDiplomado = document.getElementById("diplomado");
  var inscripcionCurso = document.getElementById("curso");
  var cursoContainer = document.getElementById("curso-container");
  var categoriaContainer = document.getElementById("categoria-container");
  var turnoContainer = document.getElementById("turno-container");
  var profesorContainer = document.getElementById("profesor-container");
  var diplomadoContainer = document.getElementById("diplomado-container");

  // Función para mostrar u ocultar campos adicionales
  function toggleCamposAdicionales() {
    if (inscripcionDiplomado.checked) {
      categoriaContainer.style.display = "block";
      cursoContainer.style.display = "none"; // Ocultar el contenedor de curso
      diplomadoContainer.style.display = "block";
      turnoContainer.style.display = "block";
      profesorContainer.style.display = "none";
      // Mostrar otros elementos relacionados con la inscripción de diplomado
    } else if (inscripcionCurso.checked) {
      categoriaContainer.style.display = "block";
      cursoContainer.style.display = "block";
      diplomadoContainer.style.display = "none"; // Ocultar el contenedor de diplomado
      turnoContainer.style.display = "block"; // Ocultar el contenedor de turno
      profesorContainer.style.display = "block"; // Ocultar el contenedor de profesor
      // Mostrar otros elementos relacionados con la inscripción de curso
    }
  }

  // Agregar eventos de escucha para el cambio de selección en los inputs tipo radio
  inscripcionDiplomado.addEventListener("change", toggleCamposAdicionales);
  inscripcionCurso.addEventListener("change", toggleCamposAdicionales);

  // Llamar a la función una vez al cargar la página para establecer el estado inicial
  toggleCamposAdicionales();
});



document.addEventListener("DOMContentLoaded", function () {
  var generarIDButton = document.getElementById("generadorID");
  var idUsuarioInput = document.getElementById("idUsuario");
  var guardarIDButton = document.getElementById("guardarIDButton");

  generarIDButton.addEventListener("click", function () {
    var randomNumber = Math.floor(Math.random() * 9000) + 1000; // Genera un número aleatorio de 4 dígitos
    idUsuarioInput.value = randomNumber; // Asigna el número aleatorio al campo de texto
  });

  guardarIDButton.addEventListener("click", function () {
    var idSesion = idUsuarioInput.value; // Obtiene el valor del campo de texto

    // Realizar una solicitud AJAX al servidor para guardar el ID en la base de datos
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "guardar_id.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Aquí puedes realizar cualquier acción después de guardar exitosamente el ID
        console.log("ID guardado en la base de datos");
      }
    };
    xhr.send("id_sesion=" + idSesion); // Envia el ID al servidor
  });
});


var password = ""; // Variable para almacenar la contraseña

// Función para agregar un número a la contraseña
function agregarNumero(numero) {
  password += numero;
  mostrarPassword();
}

// Función para borrar el último número de la contraseña
function borrarUltimoNumero() {
  password = password.slice(0, -1);
  mostrarPassword();
}

// Función para mostrar la contraseña en el campo de texto
function mostrarPassword() {
  var passwordInput = document.getElementById("passwordInput");
  passwordInput.value = password;
}

// Función para confirmar la asistencia
function confirmarAsistencia() {
  // Realizar las acciones necesarias al confirmar la asistencia
  // Puedes acceder a la contraseña ingresada a través de la variable "password"
  console.log("Contraseña ingresada: " + password);
  // Aquí puedes enviar la contraseña al servidor para su validación, por ejemplo
}


//Realiza la busqueda en mi tabla de estudiantes

function buscarEstudiantes() {
  var input = document.getElementById("buscarInput");
  var filter = input.value.toUpperCase();
  var table = document.getElementById("tablaEstudiantes");
  var rows = table.getElementsByTagName("tr");

  for (var i = 0; i < rows.length; i++) {
    var cells = rows[i].getElementsByTagName("td");
    var found = false;

    for (var j = 0; j < cells.length; j++) {
      var cell = cells[j];
      if (cell) {
        var value = cell.textContent || cell.innerText;
        if (value.toUpperCase().indexOf(filter) > -1) {
          found = true;
          break;
        }
      }
    }

    if (found || i === 0) { // Mostrar las filas que coinciden con la búsqueda y mantener el primer row (encabezados)
      rows[i].style.display = "";
    } else {
      rows[i].style.display = "none";
    }
  }
}

var input = document.getElementById("buscarInput");
input.addEventListener("input", buscarEstudiantes);



document.addEventListener("DOMContentLoaded", function() {
  var table = document.getElementById("tablaEstudiantes"); // Seleccionar la tabla
  var rowsPerPage = 5; // Número de filas por página
  var currentPage = 1; // Página actual

  function displayRows() {
    var rows = table.getElementsByTagName("tbody")[0].getElementsByTagName("tr"); // Seleccionar las filas en el cuerpo de la tabla

    // Calcular el índice inicial y final de las filas a mostrar
    var startIndex = (currentPage - 1) * rowsPerPage;
    var endIndex = startIndex + rowsPerPage;

    // Ocultar todas las filas
    for (var i = 0; i < rows.length; i++) {
      rows[i].style.display = "none";
    }

    // Mostrar las filas correspondientes a la página actual
    for (var j = startIndex; j < endIndex && j < rows.length; j++) {
      rows[j].style.display = "";
    }
  }

  function createPagination() {
    var rowCount = table.getElementsByTagName("tbody")[0].getElementsByTagName("tr").length; // Obtener el número total de filas
    var pageCount = Math.ceil(rowCount / rowsPerPage); // Calcular el número total de páginas

    var paginationList = document.getElementsByClassName("pagination")[0]; // Seleccionar la lista de paginación
    paginationList.innerHTML = ""; // Limpiar la lista de paginación

    // Crear los enlaces de paginación
    for (var i = 1; i <= pageCount; i++) {
      var listItem = document.createElement("li");
      listItem.className = i === currentPage ? "page-item active" : "page-item";

      var link = document.createElement("a");
      link.href = "#";
      link.textContent = i;
      link.className = "page-link";

      // Asignar el evento onclick para cambiar de página
      link.addEventListener("click", (function(page) {
        return function() {
          currentPage = page;
          displayRows();
          createPagination();
        };
      })(i));

      listItem.appendChild(link);
      paginationList.appendChild(listItem);
    }

    // Deshabilitar/enabled el enlace "Previous" y "Next" según la página actual
    var prevLink = paginationList.getElementsByClassName("prev-link")[0];
    var nextLink = paginationList.getElementsByClassName("next-link")[0];

    if (currentPage === 1) {
      prevLink.classList.add("disabled");
    } else {
      prevLink.classList.remove("disabled");
    }

    if (currentPage === pageCount) {
      nextLink.classList.add("disabled");
    } else {
      nextLink.classList.remove("disabled");
    }
  }

  // Mostrar las filas y crear la paginación inicial
  displayRows();
  createPagination();
});



document.addEventListener("DOMContentLoaded", function() {
  var tabla = document.getElementById("tablaEstudiantes");
  var filas = tabla.getElementsByTagName("tbody")[0].getElementsByTagName("tr");

  // Función para manejar la acción de modificar
  function modificarEstudiante(index) {
    var fila = filas[index];
    var nombre = fila.getElementsByTagName("td")[0].textContent;
    var edad = fila.getElementsByTagName("td")[1].textContent;

    // Aquí puedes implementar la lógica para mostrar un formulario de modificación
    // con los valores actuales del estudiante y permitir al usuario realizar los cambios necesarios.
    // Por ejemplo, puedes mostrar un modal con un formulario prellenado.

    // Una vez que se realicen los cambios, puedes actualizar los valores en la fila correspondiente.
    // Supongamos que tienes acceso a los nuevos valores del estudiante después de la modificación:
    var nuevoNombre = "Nuevo nombre";
    var nuevaEdad = 30;

    fila.getElementsByTagName("td")[0].textContent = nuevoNombre;
    fila.getElementsByTagName("td")[1].textContent = nuevaEdad;
  }

  // Función para manejar la acción de eliminar
  function eliminarEstudiante(index) {
    // Aquí puedes implementar la lógica para confirmar la eliminación del estudiante.
    // Por ejemplo, puedes mostrar un mensaje de confirmación o un modal de confirmación.
    // Si el usuario confirma la eliminación, puedes proceder a eliminar la fila correspondiente.

    filas[index].remove();
  }

  // Asignar eventos a los botones de modificar y eliminar
  var btnModificar = tabla.getElementsByClassName("btn-modificar");
  var btnEliminar = tabla.getElementsByClassName("btn-eliminar");

  for (var i = 0; i < btnModificar.length; i++) {
    // Utilizamos una función de cierre para capturar el valor actual de 'i'
    (function(index) {
      btnModificar[index].addEventListener("click", function() {
        modificarEstudiante(index);
      });

      btnEliminar[index].addEventListener("click", function() {
        eliminarEstudiante(index);
      });
    })(i);
  }
});