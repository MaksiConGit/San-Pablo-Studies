var contenidos = document.getElementsByClassName("contenido_mostrado");
const opciones = document.getElementsByClassName("opciones_laterales");


for (let i = 0; i < opciones.length; i++) {

    // Borrar esta línea al final de la branch
    contenidos[0].style.display = "block"
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


const contenido_parciales = document.getElementsByClassName("contenido_parciales");
const parcial = document.getElementsByClassName("parcial");
const opciones_parciales = document.getElementById("opciones_parciales");
const volver_calendario = document.getElementsByClassName("volver_calendario");

for (let i = 0; i < parcial.length; i++) {

  // Borrar esta línea al final de la branch
  contenido_parciales[i].style.display = "none";

  parcial[i].addEventListener("click", function () {

    opciones_parciales.style.display = "none";

    for (let j = 0; j < contenido_parciales.length; j++) {
      contenido_parciales[j].style.display = "none";
    }

    contenido_parciales[i].style.display = "block";

  })

  // Borrar líneas al final de la branch
  // contenido_parciales[0].style.display = "block";
  // opciones_parciales.style.display = "none";
  
  volver_calendario[i].addEventListener("click", function (){

    opciones_parciales.style.display = "flex";
    contenido_parciales[i].style.display = "none";

  });
}
