var contenidos = document.getElementsByClassName("contenido_mostrado");
const opciones = document.getElementsByClassName("opciones_laterales");


for (let i = 0; i < opciones.length; i++) {

  // Quitar esta línea al terminar la branch
    contenidos[i].style.display = "none";

    contenidos[0].style.display = "block"

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
      
          const monthName = monthNames[month]; // Obtener el nombre del mes en mayúscula
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