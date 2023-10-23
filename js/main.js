var contenidos = document.getElementsByClassName("contenido_mostrado");
const opciones = document.getElementsByClassName("opciones_laterales");

for (let i = 0; i < opciones.length; i++) {

    // Borrar esta línea al final de la branch
    contenidos[5].style.display = "block";
    contenidos[i].style.display = "none";

    opciones[i].addEventListener("click", function () {

      // Oculta todos los elementos con la clase "contenido_mostrado"
      
      for (let j = 0; j < contenidos.length; j++) {
        contenidos[j].style.display = "none";
        opciones[j].style.backgroundColor = "#202020";
      }

      opciones[i].style.backgroundColor = "black";

      contenidos[i].style.display = "block";

    });
}

// Obtener todos los elementos con la clase 'pdf-div'
const pdfDivs = document.querySelectorAll('.archivo');

// Agregar un controlador de eventos clic a cada div
pdfDivs.forEach((div) => {
    div.addEventListener('click', (event) => {
        // Obtener el nombre del archivo del atributo personalizado
        const ruta = div.getAttribute('data-ruta-archivo');
        const nombre = div.getAttribute('data-nombre-archivo');
        
        // Construir la URL o la ruta al archivo PDF (asegúrate de que la ruta sea correcta)
        const urlArchivo = ruta + nombre;
        
        // Abrir el PDF en una nueva ventana o pestaña del navegador
        window.open(urlArchivo, '_blank');
    });
});
const calendar = document.getElementById('calendar');
const calendarBody = document.getElementById('calendar-body');
const monthYear = document.getElementById('month-year');
const currentDate = new Date();
let currentMonth = currentDate.getMonth();
let currentYear = currentDate.getFullYear();

// Función para crear el calendario
function generateCalendar(month, year) {
  calendarBody.innerHTML = '';
  const daysInMonth = new Date(year, month + 1, 0).getDate();
  const firstDay = new Date(year, month, 1).getDay();

  const monthNames = [
    "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
    "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
  ];

  const monthName = monthNames[month];
  const capitalizedMonth = monthName.charAt(0).toUpperCase() + monthName.slice(1);

  monthYear.innerText = capitalizedMonth + ' ' + year;

  let dayCounter = 1;

  for (let week = 0; week < 6; week++) {
    const row = document.createElement('tr');

    for (let day = 0; day < 7; day++) {
      const cell = document.createElement('td');

      if (week === 0 && day < firstDay) {
        cell.textContent = '';
      } else if (dayCounter <= daysInMonth) {
        cell.textContent = dayCounter;

        if (dayCounter === currentDate.getDate() && month === currentDate.getMonth() && year === currentDate.getFullYear()) {
          cell.classList.add('current-month', 'today');
        }

        dayCounter++;
      }

      row.appendChild(cell);
    }

    calendarBody.appendChild(row);
  }

  // Llama a la función para marcar fechas de parciales
  marcarFechasParciales();
}

generateCalendar(currentMonth, currentYear);

// Función para cambiar al mes anterior
function previousMonth() {
  currentYear = currentMonth === 0 ? currentYear - 1 : currentYear;
  currentMonth = currentMonth === 0 ? 11 : currentMonth - 1;
  generateCalendar(currentMonth, currentYear);
}

// Función para cambiar al mes siguiente
function nextMonth() {
  currentYear = currentMonth === 11 ? currentYear + 1 : currentYear;
  currentMonth = currentMonth === 11 ? 0 : currentMonth + 1;
  generateCalendar(currentMonth, currentYear);
}

// Agregar eventos a los botones para cambiar de mes
const previousButton = document.getElementById('previousMonth');
previousButton.addEventListener('click', previousMonth);

const nextButton = document.getElementById('nextMonth');
nextButton.addEventListener('click', nextMonth);

// Función para marcar las fechas de los parciales
function marcarFechasParciales() {
  const elementosFechaEvento = document.querySelectorAll('.fecha-parcial-cal');
  elementosFechaEvento.forEach((elemento) => {
    const fechaEvento = elemento.getAttribute('data-fecha');
    const fechaPartes = fechaEvento.split('-');
    const eventoYear = parseInt(fechaPartes[0], 10);
    const eventoMonth = parseInt(fechaPartes[1], 10) - 1;
    const eventoDay = parseInt(fechaPartes[2], 10);

    if (eventoYear === currentYear && eventoMonth === currentMonth) {
      const diaDelMes = eventoDay;
      const celdasCalendario = calendarBody.querySelectorAll('td');

      celdasCalendario.forEach((celda) => {
        if (parseInt(celda.textContent) === diaDelMes) {
          celda.classList.add('parciales-marcados');
        }
      });
    }
  });
}

const contenido_parciales_calendario = document.getElementsByClassName("contenido_parciales_calendario");
const parcial_calendario = document.getElementsByClassName("parcial_calendario");
const opciones_parciales_calendario = document.getElementById("opciones_parciales_calendario");
const volver_calendario = document.getElementsByClassName("volver_calendario");

for (let i = 0; i < parcial_calendario.length; i++) {

  // Borrar esta línea al final de la branch
  contenido_parciales_calendario[i].style.display = "none";

  parcial_calendario[i].addEventListener("click", function () {

    opciones_parciales_calendario.style.display = "none";

    for (let j = 0; j < contenido_parciales_calendario.length; j++) {
      contenido_parciales_calendario[j].style.display = "none";
    }

    contenido_parciales_calendario[i].style.display = "block";

  })

  // Borrar líneas al final de la branch
  // contenido_parciales_calendario[0].style.display = "block";
  // opciones_parciales_calendario.style.display = "none";
  
  volver_calendario[i].addEventListener("click", function (){

    opciones_parciales_calendario.style.display = "flex";
    contenido_parciales_calendario[i].style.display = "none";

  });
}

const contenidos_carpetas = document.getElementsByClassName("contenido_carpetas");
const archivo_materia = document.getElementsByClassName("archivo-materia");
const opciones_carpetas = document.getElementById("opciones_carpetas");
const volver = document.getElementsByClassName("volver");

for (let i = 0; i < archivo_materia.length; i++) {

  // Borrar esta línea al final de la branch
  contenidos_carpetas[i].style.display = "none";

  archivo_materia[i].addEventListener("click", function () {

    opciones_carpetas.style.display = "none";

    for (let j = 0; j < contenidos_carpetas.length; j++) {
      contenidos_carpetas[j].style.display = "none";
    }

    contenidos_carpetas[i].style.display = "flex";

  })

  // Borrar líneas al final de la branch
  // contenidos_carpetas[0].style.display = "flex";
  // opciones_carpetas.style.display = "none";
  
  volver[i].addEventListener("click", function (){

    opciones_carpetas.style.display = "block";
    contenidos_carpetas[i].style.display = "none";

  });
}

function zoom(e){
  var zoomer = e.currentTarget;
  e.offsetX ? offsetX = e.offsetX : offsetX = e.touches[0].pageX
  e.offsetY ? offsetY = e.offsetY : offsetX = e.touches[0].pageX
  x = offsetX/zoomer.offsetWidth*100
  y = offsetY/zoomer.offsetHeight*100
  zoomer.style.backgroundPosition = x + '% ' + y + '%';
}