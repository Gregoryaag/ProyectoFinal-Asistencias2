

//Barra Lateral
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
    event.preventDefault(); // Evitasr que el enlace siga el enlace href="#" por defecto

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


// Obtiene el botón de cierre de sesión
const cerrarSesionButton = document.getElementById("cerrarSesion");

function handleCierreSesion() {
    // Verifica si el botón está activado (checked)
    if (cerrarSesionButton.checked) {
        // Desactivar temporalmente el botón y realizar la animación de slider
        cerrarSesionButton.disabled = true;
        sliderAnimation().then(() => {
            showCustomConfirmation();
        });
    }
}

// Función para simular la animación de slider
function sliderAnimation() {
    return new Promise((resolve) => {
        setTimeout(() => {
            cerrarSesionButton.checked = true;
            setTimeout(() => {
                cerrarSesionButton.checked = false;
                resolve(); 
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

// Función para mostrara una ventana de confirmacion
function showCustomConfirmation() {
    const confirmacion = window.confirm("¿Estás seguro de que deseas cerrar la sesión?");
    cerrarSesionButton.disabled = false; // Reactivar el botón
    if (confirmacion) {
        // Si el usuario hace clic en Si, redirige a la pagina de inicio de sesion
        window.location.href = "paginas/login-admin.php";
    } else {
        // Si el usuario hace clic en No, desactivael boton de cierre de sesion
        cerrarSesionButton.checked = false;
    }
}

// Agrega un evento de cambio al boton de cierre de sesion
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

  // Funcion para mostrar u ocultar campos adicionales
  function toggleCamposAdicionales() {
    var selectedRolId = rolSelect.value;

    // Oculta todos campos adicionales
    categoriaContainer.style.display = "none";
    cursoContainer.style.display = "none";
    diplomadoContainer.style.display = "none";
    turnoContainer.style.display = "none";
    profesorContainer.style.display = "none";
    inscripcionContainer.style.display = "none";
    modalidadContainer.style.display = "none";

    // Muestra campos adicionales correspondiente al rol seleccionado
    if (selectedRolId === "2") { // Identificador del rol estudiante
      modalidadContainer.style.display = "block";
      inscripcionContainer.style.display = "block";
    } else if (selectedRolId === "3") { // Identificador del rol profesor
      categoriaContainer.style.display = "block";
      cursoContainer.style.display = "none";
      diplomadoContainer.style.display = "none";
    } else if (selectedRolId === "1") { // Identificador del rol administrador
      
    }
  }

  // Agrega un controlador de eventos al selector de Rol para mostrar/ocultar campos adicionales
  rolSelect.addEventListener("change", toggleCamposAdicionales);

  toggleCamposAdicionales();
});

// Permite ocultar y mostrar opciones
document.addEventListener("DOMContentLoaded", function () {
  var inscripcionDiplomado = document.getElementById("diplomado");
  var inscripcionCurso = document.getElementById("curso");
  var cursoContainer = document.getElementById("curso-container");
  var categoriaContainer = document.getElementById("categoria-container");
  var turnoContainer = document.getElementById("turno-container");
  var profesorContainer = document.getElementById("profesor-container");
  var diplomadoContainer = document.getElementById("diplomado-container");

  // Funcion para mostrar u ocultar campos adicionales
  function toggleCamposAdicionales() {
    if (inscripcionDiplomado.checked) {
      categoriaContainer.style.display = "block";
      cursoContainer.style.display = "none"; // Oculta el contenedor de curso
      diplomadoContainer.style.display = "block";
      turnoContainer.style.display = "block";
      profesorContainer.style.display = "none";

    } else if (inscripcionCurso.checked) {
      categoriaContainer.style.display = "block";
      cursoContainer.style.display = "block";
      diplomadoContainer.style.display = "none";
      turnoContainer.style.display = "block"; 
      profesorContainer.style.display = "block";
      
    }
  }

  // Agrega eventos de escucha para el cambio de selección en los inputs tipo radio
  inscripcionDiplomado.addEventListener("change", toggleCamposAdicionales);
  inscripcionCurso.addEventListener("change", toggleCamposAdicionales);

  // Llama a la funcion una vez al cargar la pagina para establecer el estado inicial
  toggleCamposAdicionales();
});



/* document.addEventListener("DOMContentLoaded", function () {
  var generarIDButton = document.getElementById("generadorID");
  var idUsuarioInput = document.getElementById("idUsuario");
  var guardarIDButton = document.getElementById("guardarIDButton");

  generarIDButton.addEventListener("click", function () {
    var randomNumber = Math.floor(Math.random() * 9000) + 1000; // Genera un numero aleatorio de 4 digitos
    idUsuarioInput.value = randomNumber; // Asigna el numero aleatorio al campo de texto
  });

  guardarIDButton.addEventListener("click", function () {
    var idSesion = idUsuarioInput.value; // Obtiene el valor del campo de texto

    // Realizar una solicitud AJAX al servidor para guardar el ID en la base de datos
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "guardar_id.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        console.log("ID guardado en la base de datos");
      }
    };
    xhr.send("id_sesion=" + idSesion); // Envia el ID al servidor
  });
}); */


//Login para ingresar
var password = ""; // Variable para almacenar la contraseña

// Funcion para agregar un número a la contraseña
function agregarNumero(numero) {
  password += numero;
  mostrarPassword();
}

// Funcion para borrar el ultimo numero de la contraseña
function borrarUltimoNumero() {
  password = password.slice(0, -1);
  mostrarPassword();
}

// Funcion para mostrar la contraseña en el campo de texto
function mostrarPassword() {
  var passwordInput = document.getElementById("passwordInput");
  passwordInput.value = password;
}

// Funcion para confirmar la asistencia
function confirmarAsistencia() {
  console.log("Contraseña ingresada: " + password);
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

    if (found || i === 0) { // Mostrar las filas que coinciden con la busqueda y mantener el encabezado
      rows[i].style.display = "";
    } else {
      rows[i].style.display = "none";
    }
  }
}

var input = document.getElementById("buscarInput");
input.addEventListener("input", buscarEstudiantes);



document.addEventListener("DOMContentLoaded", function() {
  var table = document.getElementById("tablaEstudiantes");
  var rowsPerPage = 5; // Número de filas por pagina
  var currentPage = 1; // Pagina actual

  function displayRows() {
    var rows = table.getElementsByTagName("tbody")[0].getElementsByTagName("tr");

    // Calcula el indice inicial y final de las filas a mostrar
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


  //Paginacion en mi tabla de estudiantes
  function createPagination() {
    var rowCount = table.getElementsByTagName("tbody")[0].getElementsByTagName("tr").length; // Obtiene el numero total de filas
    var pageCount = Math.ceil(rowCount / rowsPerPage); // Calcula el numero total de paginas

    var paginationList = document.getElementsByClassName("pagination")[0]; // Selecciona la lista de paginacion
    paginationList.innerHTML = ""; // Limpiar la lista de paginación

    // Crear los enlaces de paginación
    for (var i = 1; i <= pageCount; i++) {
      var listItem = document.createElement("li");
      listItem.className = i === currentPage ? "page-item active" : "page-item";

      var link = document.createElement("a");
      link.href = "#";
      link.textContent = i;
      link.className = "page-link";

      // Asignar el evento onclick para cambiar de pagina
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

  // Mostrar las filas y crear la paginacion inicial
  displayRows();
  createPagination();
});


